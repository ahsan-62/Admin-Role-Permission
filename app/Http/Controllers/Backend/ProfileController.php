<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileStoreRequest;

class ProfileController extends Controller
{
    public function getUpdateProfile()
    {
        $authuser=Auth::user();
        return view('Admin.layouts.pages.profile.update-profile',compact('authuser'));
    }

    public function updateProfile(ProfileStoreRequest $request)
    {
        $user=User::whereEmail($request->email)->first();
        $this->image_upload($request, $user->id);

        Toastr::success('Profile Updated Successfully!!');
        return redirect()->route('home');
    }


    public function getUpdatePassword()
    {

        return view('Admin.layouts.pages.profile.update-password');
    }

    public function updatePassword(PasswordChangeRequest $request)
    {

        $user = Auth::user();
        $hashedPassword = $user->password;

        // existing password === request password
        if(Hash::check($request->old_password, $hashedPassword)){

            // new password == old stored passowrd
            if(!Hash::check($request->password, $hashedPassword)){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);

            Auth::logout();
            Toastr::success('password updated successfully');
            return redirect()->route('login');
            }else{
                Toastr::error('New Password cannot be the same as old password');
                return back();
            }
        }else{
            Toastr::error("Credentials doesn't match");
            return back();
        }
    }



    public function image_upload($request, $user_id)
    {
        //check it image uploaeded
        if($request->hasFile('user_image')){
            $user = User::find($user_id);

            //check if already exists previous image
            if($user->user_image != null){
                // delete old photo
                $old_photo_path = 'public/uploads/profile_images/'.$user->user_image;
                @unlink(base_path($old_photo_path));
            }


            $photo_location = 'public/uploads/profile_images/';
            $uploaded_photo = $request->file('user_image');
            $new_photo_name = $user_id.'.'.$uploaded_photo->getClientOriginalExtension(); /// 1.jpg
            $new_photo_location = $photo_location.$new_photo_name;

            // Save image
            Image::make($uploaded_photo)->resize(600,600)->save(base_path($new_photo_location));

            $user->update([
                'user_image' => $new_photo_name,
            ]);

        }
    }
}
