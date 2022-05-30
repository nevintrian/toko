<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        //validator rules
        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        );

        //data must require the rules
        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            $responseArr['token'] = '';
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }

        //if data not valid return 400
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Login Failed'
            ], Response::HTTP_UNAUTHORIZED);
        }

        //if data valid return 200 and token
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], Response::HTTP_OK);
    }
}
