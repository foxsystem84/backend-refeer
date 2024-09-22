<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>['required', 'string'],
            'email'=>['required','email','unique:users'],
            'password'=>['required', 'min:6'],
            'local'=>'string'
        ]);
        $user = User::create($validatedData);       
        
        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($validatedData['password'], $user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['user' => $user]);
           
        
    }
}
