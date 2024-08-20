<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Exception;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {


        
        $credentials = [
               filter_var( $request->email , FILTER_VALIDATE_EMAIL ) ?  "email" : "username" => $request->email,
               "password"=> $request->password,
        ];
  
    

        if (!Auth::attempt($credentials)) {

            return response()->json([
                "status" => "-1",
                "message" => "invalid login details"
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => 1,
            "message" => "sucessfull login",
            "access_token" => $token,
            'token_type' => 'Bearer',
            'user' => $user

        ], 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {    

         if ( $request->bearerToken() == null ){
            return response()->json(["status" => -1, 'message' => 'You did not provide the access token']);
        }else{
            try {
                $request->user()->currentAccessToken()->delete();
                return response()->json(["status" => 1, 'message' => 'Successfully logged out']);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }   
        }
        
    }
}
