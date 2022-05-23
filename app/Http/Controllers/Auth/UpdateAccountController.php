<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Traits\Images;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UpdateAccountController extends Controller
{

    use Images;

    /**
     * Get data from User Model
     * @param int $id
     * @return User json data in 'auth.updateAccount' view with url('/updateAccount/{id}'
     * */
    public function index($id)
    {
        $user = User::select('name' ,'email', 'facebook','profile', 'about', 'password','gender','birthday','mobile','user_type')->find($id);
        return view('auth.updateAccount')->with(compact('user'));
    }
    /**
     * Get data from auth.updateAccount view to update it
     * @param Request $request
     * @param int $id
     * @return view redirect to auth.updateAccount view after updating
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // get image data
//        $profile = $request->file('profile');
//        $profileContents = $profile->openFile()->fread($profile->getSize());

        if($request['profile'] != null) {
            File::delete('assets/img/profile/' . $user['profile']);
            $profile = $this->savePhoto($request['profile'] , 'assets/img/profile');
        }
        else $profile = $user->profile;

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'facebook' => $request['facebook'],
            'password' => Hash::make($request['password']),
            'user_type' => $request['user_type'],
            'birthday' => $request['birthday'],
            'gender' => $request['gender'],
            'mobile' => $request['mobile'],
            'about' => $request['about'],
            'profile' => $profile,
            ]);
        $driverExist = Driver::where('user_id' , $user->id)->get();
        if($request['user_type'] == "driver" && !$driverExist ){
            $driver = Driver::create([
                'user_id' => $user->id,
                'permanent_driver' => 0,
                'driver_license' => null,
            ]);
        }
        return redirect()->back();
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
}
