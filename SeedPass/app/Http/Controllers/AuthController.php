<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Vérifier l'utilisateur dans toutes les tables possibles
        $user = null;
        $models = [
            'famers' => \App\Models\Famer::class,
            'distributors' => \App\Models\Distributor::class,
            'productors' => \App\Models\Productor::class,
            'certification_bodies' => \App\Models\CertificationBody::class,
            'users' => \App\Models\User::class,
        ];

        foreach ($models as $model) {
            $user = $model::where('email', $request->email)->first();
            if ($user) {
                break;
            }
        }

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

        // Vérifier quel guard utiliser en fonction du profil
        $guard = match ($user->profile) {
            'agriculteur' => 'famers',
            'distributeur' => 'distributors',
            'producteur' => 'productors',
            'organisme' => 'certification_bodies',
            default => 'api'
        };

        // Essayer l'authentification avec le bon guard
        if (!$token = auth($guard)->attempt($credentials)) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }

        return response()->json([
            'token' => $token,
            'status' => 200,
            'message' => 'Connexion réussie!!!! Bienvenu '. $user->firstName . " " . $user->lastName . ", vous avez le profil $user->profile",
            'profile' => $user->profile,
            'user' => $user,
        ]);
    }

    public function logout()
    {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'Déconnexion réussie']);
    }

    public function me()
{
    return response()->json(auth()->guard('api')->user());
}



}

