<?php

namespace App\Http\Controllers\Voyager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoyagerRecaptchaAuthController extends Controller
{
    public function postLogin(Request $request){
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request){
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|voyager_recaptcha',
        ]);
    }
}
