<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    public function index()

    {
        return response()->json(User::all());
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json([
            'status '=>201,
            'message'  => "Admin crée avec succès",
            'data' => $user,
        ]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::guard('user')->attempt($credentials)) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }

        return response()->json([
            'token' => $token,
            'status' => 200,
            'message' => 'Connecté avec succès',
            'certification_body' => Auth::guard('user')->user()
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


}
