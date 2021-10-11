<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CPassword extends Controller
{
    public function CPassword()
    {
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
        'oldpassword' => 'required',
        'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('success', 'Password changed successfully');
        }else{
            return redirect()->back()->with('error', 'Current Password IS Invalid');
        }
    }

    public function PUpdate()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.profile.update', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
            if($user){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();

                return redirect()->back()->with('success', 'Profile updated successfully');
        }else{
            return redirect()->back();
        }
    }


}
