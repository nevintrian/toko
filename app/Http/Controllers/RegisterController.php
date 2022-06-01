<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        //validator rules
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8']
            ]
        );

        //data must require the rules
        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            $responseArr['token'] = '';
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }

        //try create user
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Register Failed $e",
            ], Response::HTTP_UNAUTHORIZED);
        }

        //if data valid return 200 and token
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Register Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], Response::HTTP_OK);
    }
}
