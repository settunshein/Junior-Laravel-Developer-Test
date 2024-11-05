<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {

            $credentials = $request->validate(['email' => 'required|email','password' => 'required']);

            if (Auth::attempt($credentials)) {
                $user  = auth()->user();
                $token = $user->createToken('Laravel')->accessToken;

                return ResponseHelper::success($token, 'LoggedIn Successfully!');
            }

        } catch(ValidationException $e) {

            return ResponseHelper::error([], $e->getMessage(), 422);

        } catch(\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }



    public function logout()
    {
        try {

            auth()->user()->token()->revoke();

            return ResponseHelper::success([], 'Logged Out Successfully!');

        } catch(\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }
}
