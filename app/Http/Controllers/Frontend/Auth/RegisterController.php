<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Setting;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {

        try{

            // if(Auth::user()->status == 'staff') {
            //     return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
            // }

            $count    = User::where('email',$request->input('email'))
                            ->count();

            if($count>0){
                    return redirect()->to('/')->with('error','Email  Already Exists');
                }

                $this->validate($request, [
                    'name'      => 'required',
                    'email'     => 'required',
                    // 'password'  => 'required',
                ],[
                    
                    'name.required'      => 'Please enter Name',
                    'email.required'     => 'Please enter Email',
                    // 'password.required'  => 'Please enter Password',
                ]);

            $count2  = User::where('username',$request->input('name'))
                ->count();

            $name  = $request->input('name');
            $name2 = str_replace(' ', '', $name);
            $rand  = str_random(3);

            if($count2>0){
                User::create([
                    'name'            => $request->get('name'),
                    'username'        => $name2.$rand,
                    'password'        => bcrypt($name2),
                    'password_md5'    => md5($name2),
                    'email'           => $request->get('email'),
                    'status'          => 'staff',
                ]);
            }else{
                    User::create([
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
            return redirect()->to('/admin/login')->with('success','Pesantren Berhasil Ditambahkan!');

        } catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }



        return redirect()->to('/admin/login')->with('success','Add Users Success');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return Destination::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        try{
            $count    = User::where('email',$data['email'])
                        ->count();

            if($count>0){
                // Alert::warning('message', 'anda sudah terdaftar')->persistent('Close');
                return redirect()->to('/');
            }

            $count2  = User::where('username',$data['name'])
                ->count();

            $name  = $data['name'];
            $name2 = str_replace(' ', '', $name);
            $rand  = str_random(3);

            if($count2>0){
                User::create([
                    'photo'           => $photo,
                    'name'            => $data['name'],
                    'username'        => $name2.$rand,
                    'password'        => bcrypt($data['password']),
                    'password_md5'    => md5($data['password']),
                    'email'           => $data['email'],
                    'status'          => 'staff',
                ]);
            }else{
                    User::create([
                        'photo'           => $photo,
                        'name'            => $data['name'],
                        'username'        => str_replace(' ', '', $data['name']),
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
            // return redirect()->route('Users.index')->with('success','Pesantren Berhasil Ditambahkan!');

            // Alert::info('message', 'We sent a comfirmation email to your email, please click on link inside before login')->persistent('Close');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function showRegistrationForm()
    {

        // $admin = AdminType::get();

        $setting                    = Setting::get();
        $config                     = DB::table('setting')
                                        ->get()[0];

        return view('Frontend.auth.register', compact('setting', 'config'));
    }
}
