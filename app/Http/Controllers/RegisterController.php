<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class RegisterController extends Controller {
    

    public function signIn(Request $request) {

        if ($request->isMethod('post')) {

            $data = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $credentials = $request->only('email', 'password');

            $remember_me = $request->has('remember_me') ? true : false;

            if(auth()->attempt($credentials, $remember_me)) {

                $request->session()->regenerate();

                if(auth()->user()->hasVerifiedEmail()) {

                    return redirect('home')->with('signed-in', '<p>You are signed in now.</p> Enjoy shopping.');

                } else {
                   
                    return $this->signOut($request)->with('email-verify-failed', $request->email);

                }

            } 

            return back()->with('sign-in-failed', 'These credentials do not match our records.');

        }

        return view('sign-in.index');

    }

    public function signUp(Request $request) {

        if ($request->isMethod('post')) {

            $data = $request->validate([
                'name' => ['required', 'min:3', 'max:255'],
                'username' => ['required', 'min:3', 'max:100'],
                'email' => ['required', 'email', 'unique:users', 'max:255'],
                'gender' => ['required', 'in:male,female'],
                'avatar' => $request->avatar ? ['image', 'mimes:jpg,bmp,png', 'dimensions:max_width=300,max_height=300'] : [],
                'password' => ['required', 'min:8', 'max:255', 'alpha_num', 'confirmed'],
                'password_confirmation' => ['required']
            ]);
            
           $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'gender' => $request->gender,
                'profile_image' => $request->avatar ? $request->file('avatar')->store('public/profile-images') : null,
                'password' => Hash::make($request->password)
            ]);

            event(new Registered($user));

            return back()->with('sign-up-success', '<span class="fw-bold display-6">Thank you for registering.</span> <br> <small fw-bold>We send you activation link, please check your email.</small>');

        }

        return view('sign-up.index');

    }

    public function signOut(Request $request) {

        if ($request->isMethod('post')) {

            auth()->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('sign-in');

        }

        return abort('404');

    }

    public function updateProfile() {

        if(request()->isMethod('post')) {

            $validation = request()->validate([

                'avatar' => ['image', 'mimes:jpg,bmp,png', 'dimensions:max_width=300,max_height=300'],
                'name' => ['required', 'min:3', 'max:255'],
                'username' => ['required', 'min:3', 'max:100'],
                'password' => ['required', 'min:8', 'max:255', 'alpha_num', 'password'],
                'newPassword' => ['required', 'min:8', 'max:255', 'alpha_num', 'confirmed'],
                'newPassword_confirmation' => ['required']

            ]);

                $user = User::where('id', auth()->user()->id)->update([

                    'name' => request('name'),
                    'username' => request('username'),
                    'password' => Hash::make(request('newPassword')),
                    'profile_image' => request('avatar') ? request()->file('avatar')->store('public/profile-images') : null
    
                ]);

                return $user ? back()->with('profile-update-success', 'Your profile has been updated successfully!') : back()->with('profile-update-failed', 'Something went wrong!');

        }

        return view('update-profile.index');

    }


    public function removeProfileImage() {

        $user = User::where('id', auth()->user()->id)->update([

            'profile_image' => null 

        ]);

        return back();

    }

}