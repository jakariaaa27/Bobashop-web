<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Validator;
use Hash;
use App\Setting;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::findOrFail($users_id);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Profile.profile',compact('data','config','setting'));
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
        $data->update();

        return redirect()->to('admin/profile/'.Auth::user()->users_id.'/edit')->with('success','Update Profile Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function PWIndex()
    {
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Profile.password',compact('config','setting'));
    }

    public function updatePassword(Request $request, $users_id)
    {

    Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
        return Hash::check($value, \Auth::user()->password);
    });

    $messages = [
        'password_old' => 'Your old Password Wrong',
    ];

    $validator = Validator::make(request()->all(), [
        'password_old'          => 'required|password',
        'password'              => 'required|confirmed',
        'password_confirmation' => 'required',

    ], $messages = [
        'password_old.password'     => 'Your Old Password is Wrong',
        'password.confirmed'        => 'Password Doesnt Match',
        'password_old.required'     => 'Please Enter Old Password',
        'password.required'         => 'Please Enter New Password',
        'password_confirmation.required' => 'Harap isi field konfirmasi password baru'
    ]);

        if ($validator->fails()) {
            return redirect('admin/change-password/')
                        ->with('error','Change Password Doenst Success')
                        ->withErrors($validator->errors());
    }

    $user = User::find(Auth::id());

    $user->password       = bcrypt(request('password'));
    $user->save();

    return redirect()->to('admin/dashboard/')->with('success','Change Password Succes');
    }
}
