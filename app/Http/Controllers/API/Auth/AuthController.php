<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = \JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $response = [
            'token' => $token,
            'token_type' => 'Bearer',
        ];
        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->logout();

        return response()->json([
            'message' => 'logout success'
        ], 200);
    }
}
