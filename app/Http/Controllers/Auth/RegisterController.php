<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\Images;
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
    use Images;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required' , 'string'],
            'birthday' => ['required' , 'date'],
            'gender' => ['required' , 'string'],
            'mobile' => ['required' , 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // get image data
//        $profile = $data->file('profile');
//        $profileContents = $profile->openFile()->fread($profile->getSize());
        if(isset($data['profile']))
            $profile = $this->savePhoto($data['profile'] , 'assets/img/profile');
        else $profile = null;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'facebook' => $data['facebook'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'mobile' => $data['mobile'],
            'profile' => $profile,
            'about' => $data['about']
        ]);
        if($data['user_type'] == "driver"){
            $driver = Driver::create([
                'user_id' => $user->id,
                'permanent_driver' => 0,
                'driver_license' => null,

            ]);
        }
        return $user;
    }
}
