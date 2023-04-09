<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileStoreRequest;
use Brian2694\Toastr\Facades\Toastr;
use Image;

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
