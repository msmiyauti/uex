<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    /**
     * Gera novo token para api
     */
    public function generateToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $token = $request->user()->createToken('all')->plainTextToken;
            return response(['token' => $token], 200);   
        }
        return response('Not Authorized', 403);
        
        
    }


    /**
     * Deslogar 
     */
    public function logout(Request $request)
    {
		
		$request->user()->tokens()->delete();
		
		$request->user()->currentAccessToken()->delete();

		return response()->json(['message' => 'You have been successfully logged out.'], 200);
    }
    
}
