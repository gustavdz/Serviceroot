<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * which auth guard we use
     * @return mixed
     */
    private function guard() {
        return Auth::guard('jwt');
    }

    /**
     * Get token by credentials
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');

        if (! $token = $this->guard()->attempt(compact('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $token;
    }

    /**
     * refresh token
     * @return mixed
     */
    public function refresh() {
        return $this->guard()->refresh();
    }

    /**
     * get current login user
     * @return mixed
     */
    public function user() {
        return $this->guard()->user();
    }
}
