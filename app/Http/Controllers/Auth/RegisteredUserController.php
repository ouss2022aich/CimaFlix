<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {       
        try {
            //code...
         
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'min:6'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
            ]);
           
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username, // Corrected this line
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
          

   
          
            return response()->json([
                'status' => 1,
                'user' => $user
            ]);
        } catch (ValidationException $e) {
            //throw $th;
            return response()->json([
                'status' => '-1',
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
