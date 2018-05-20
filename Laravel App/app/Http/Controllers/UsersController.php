<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Image;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	return view('users.profile');
    	# code...
    }

    public function edit()
    {
    	return view('users.edit');
    }

        public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email|min:10|max:100|unique:users,email,'. $user->id,
            'nic' => 'required|min:10|max:20|unique:users,nic,'. $user->id,
            'avatar' => 'sometimes|mimes:jpg,jpeg,bmp,png,JPG|max:10000',
            'contact' => 'min:10'
        ]);
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->nic = $request->get('nic');
        $user->contact_no = $request->get('contact');
        if ($request->hasfile('avatar')) { 
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(256, 256)->save( public_path().'\img\users\\' . $filename );
            $user->avatar = '/img/users/' . $filename;
            $user->save();      
        }
        $user->save();        
        return redirect('/home/profile')->with('success','Successfully updated');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if (!Hash::check($request->current_password, auth()->user()->getAuthPassword())){
            return redirect()->back()->withErrors(['current_password' => 'Password is not correct'])->withInput();
        }
        auth()->user()->password = bcrypt($request->get('password'));
        
        auth()->user()->save();
        return redirect('/home/profile')->with('success','Successfully updated');
    }
}
