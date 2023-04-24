<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Create method handles a user creation process
     *
     * @return void
     */
    public function create(\App\Http\Requests\User\UserRegisterRequest $request)
    {
        $newUser = (new \App\Actions\CreateNewUser($request))();
        // sends email
        Mail::to($newUser->email)->send(new \App\Mail\WelcomeUser($newUser->name));
        $verifyAccount = (new \App\Actions\User\ValidateUserEmail($newUser))();
        session(['email' => $newUser->email, 'masked_email' => Str::mask($newUser->email, "**", 0, 4), 'destination' => 'login', 'permitted' => true]);
        return redirect()->route('verify-email');
    }

    /**
     * Initiate the process to recover password
     *
     * @param \App\Http\Requests\User\PasswordResetRequest $request
     * @return void
     */
    public function initiatePasswordReset(\App\Http\Requests\User\UserEmailRequest $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();
        $verifyAccount = (new \App\Actions\User\ValidateUserEmail($user))();
        session(['destination' => 'reset-password', 'email' => $user->email, 'masked_email' => Str::mask($user->email, "**", 0, 4), 'permitted' => true]);
        return redirect()->route('verify-email');
    }

    /**
     * Undocumented function
     *
     * @param \App\Http\Requests\User\ValidateEmailRequest $request
     * @return void
     */

    public function validateEmail(\App\Http\Requests\User\ValidateEmailRequest $request)
    {
        // validate that code is correct
        $user = \App\Models\User::where('email', ($request->has('email') ? $request->email : $request->session()->get('email')))->first();
        $code = (int) $request->code;
        if ($code !== $user->code) {
            Session::flash('code', "Invalid request provided");
            return back();
        }
        // $modifiedUser = tap($user)->update(['verified' => 1]);
        $user->verified = true;
        $user->save();
        return redirect()->route(session('destination'));
    }

    /**
     * Reset the password of unauthenticated user
     *
     * @return void
     */
    public function resetPassword(\App\Http\Requests\User\PasswordResetRequest $request)
    {
        if ($request->password !== $request->password2) {
            return back()->withErrors(['combined' => 'Password and confirmation password are not the same']);
        }
        $saveNewPassword = (new \App\Actions\User\SaveNewPassword(($request->has('email') && $request->email != null) ? $request->email : $request->session()->get('email'), $request->password))();
        return redirect('login');
    }

    public function login(\App\Http\Requests\User\UserLoginRequest $request)
    {
        // verify user password
        $user = \App\Models\User::select('id', 'email', 'name', 'verified', 'phone')->where('email', $request->email)->first();
        if ($user->verified != 1) {
            // send verification code to email address
            $verifyAccount = (new \App\Actions\User\ValidateUserEmail($user))();
            session(['destination' => 'login', 'email' => $user->email, 'permitted' => true]);
            return redirect()->route('verify-email');
        }
        // check if the password is correct and Authenticate user
        if (!\Illuminate\Support\Facades\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors(['message' => 'Invalid email or password']);
        }
        return redirect()->route('dashboard');
    }
}