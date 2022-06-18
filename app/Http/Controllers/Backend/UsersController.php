<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Setting;
use DB;
use Mail;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $datas = User::orderBy('name','asc')->get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Users.index',compact('datas','setting','config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Users.create',compact('setting','config'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            if(Auth::user()->status == 'staff') {
                return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
            }

            $count    = User::where('email',$request->input('email'))
                            ->count();

            if($count>0){
                    return redirect()->to('admin/users')->with('error','Email  Already Exists');
                }

                $this->validate($request, [
                    // 'photo'     => 'required',
                    'name'      => 'required',
                    'email'     => 'required',
                    // 'password'  => 'required',
                ],[
                    
                    // 'photo.required'     => 'Please enter Photo',
                    'name.required'      => 'Please enter Name',
                    'email.required'     => 'Please enter Email',
                    // 'password.required'  => 'Please enter Password',
                ]);

            // if ($request->file('photo')) {
            //     $file             = $request->file('photo');
            //     $inisial          = $request->input('name');
            //     $acak             = $file->getClientOriginalExtension();
            //     $filename         = $inisial.' - photo '.'.'.$acak;
            //     $request          -> file('photo')->move("images/users", $filename);
            //     $photo             = $filename;
            //     } else {
            //         $photo             = NULL;
            //     }

            $count2  = User::where('username',$request->input('name'))
                ->count();

            $name  = $request->input('name');
            $name2 = str_replace(' ', '', $name);
            $rand  = str_random(3);

            if($count2>0){
                User::create([
                    // 'photo'           => $photo,
                    'name'            => $request->get('name'),
                    'username'        => $name2.$rand,
                    'password'        => bcrypt($name2),
                    'password_md5'    => md5($name2),
                    'email'           => $request->get('email'),
                    'status'          => 'staff',
                ]);
            }else{
                    User::create([
                        // 'photo'           => $photo,
                        'name'            => $request->get('name'),
                        'username'        => str_replace(' ', '', $request->input('name')),
                        'password'        => bcrypt($name2),
                        'password_md5'    => md5($name2),
                        'email'           => $request->get('email'),
                        'status'          => 'staff',
                    ]);
            }

            Mail::send('Backend.Email.email', ['email' => $request->email, 'password' => $name2, 'nama_pesantren' => $request->name], function ($message) use ($request)
            {
                $message->subject('Users Account');
                $message->from('bobashop27@gmail.com',);
                $message->to($request->email);
            });
            return redirect()->to('admin/users')->with('success','Pesantren Berhasil Ditambahkan!');

        } catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }



        return redirect()->to('admin/users')->with('success','Add Users Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($users_id)
    {
        if(Auth::user()->level == 'staff') {
            return redirect()->to('/admin/dashboard/');
        }

        $data = User::findOrFail($users_id);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Users.edit',compact('data','config','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $users_id)
    {
        $data = User::findOrFail($users_id);

        // if ($request->file('photo')) 
        // {

        //     $pic_path         = public_path().'/images/users/'.$data->photo;
        //     unlink($pic_path);

        //     $file                 = $request->file('photo');
        //     $inisial              = $request->input('name');
        //     $acak                 = $file->getClientOriginalExtension();
        //     $filename             = $inisial.' - photo '.'.'.$acak;
        //     $request              -> file('photo')->move("images/users", $filename);
        //     $data                 ->photo = $filename;
        // }

        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = bcrypt($request->get('password'));
        $data->update();

        return redirect()->to('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($users_id)
    {
        $hapus            = User::findOrFail($users_id);
        // $pic_path         = public_path().'/images/users/'.$hapus->photo;
        // unlink($pic_path);
        $hapus->delete();
    }
}
