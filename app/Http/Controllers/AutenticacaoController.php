<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticacaoController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where("email", $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.'],
            ]);}
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json(["token"=> $token]);
        
    }
    public function registar(Request $request){
        $user = User::create([
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
            "name"=> $request->name,
            "is_admin"=> true,
        ]);
        return response()->json(["User"=> $user]);
    }
}
