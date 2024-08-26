<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use File;
use Auth;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pages.profile.manage');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ( !is_null( $user ) ){
            $this->validate($request, [
                'name'      => 'required',
                'email'     => 'required',
            ],
            [
                'name.required'         => 'Please Enter Your Name',
                'email.required'        => 'Please Enter Your Email Address',
            ]);

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->address      = $request->address;
            
            if ( $request->image ){
                $image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = time() . '-logo.' . $image->getClientOriginalExtension();
                $img = $manager->read($image);
                $img = $img->resize(110,110);
                $location = public_path("uploads/profile/" . $name_gen);
                $img->save($location);
                $user->image = $name_gen;
            }

            $user->save();

            $notification = array(
                'message'       => 'Your Profile Is Updated',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.profileView')->with($notification);
        }
    }

}
