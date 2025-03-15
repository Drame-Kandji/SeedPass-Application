<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CertificationBody;
use App\Http\Requests\StoreCertificationBodyRequest;
use App\Http\Requests\UpdateCertificationBodyRequest;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class CertificationBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $certification_bodies = CertificationBody::all();
            return response()->json([
                'status' =>200,
                'message' => 'Liste des Organismes de certification',
                'data' => $certification_bodies
            ]);

        }catch (Exception $e){
            return response()->json($e);

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificationBodyRequest $request)
    {
        try {
            CertificationBody::create($request->validated());
            return response()->json([
                'status' =>200,
                'message' => 'L\'Organismes de certification créé avec succée',
                'data' => $certification_bodies
            ]);
        }catch (\Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        try {
            $certificationBody = CertificationBody::find($id);
            if (!$certificationBody) {
                return response()->json(['message' => 'Non trouvée'], 404);
            }
            return response()->json([
                'status' =>200,
                'message' => "L'organisme de certification trouvée",
                'data' => $certificationBody
            ]);
        }catch (\Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCertificationBodyRequest $request, string $id)
    {
        try {
            $certificationBody = CertificationBody::find($id);
            if (!$certificationBody) {
                return response()->json(['message' => 'Certification Body not found'], 404);
            }
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $certificationBody->update($data);
            return response()->json([
                'status' =>200,
                'message' =>'Organisme de certification mis à jour avec succée',
                'data' => $certificationBody
            ]);
        }catch (\Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $certificationBody = CertificationBody::find($id);
            $certificationBody->delete();
            return response()->json(['message' => 'Organisme supprimé avec succès'], 204);
        }catch (\Exception $e){
            return response()->json($e);
        }
    }

    //Fonction pour se connecter
    public function login()
    {
        $credentials = request(['emailAddress', 'password']);

        if (!$token = Auth::guard('certification_body')->attempt($credentials)) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }

        return response()->json([
            'token' => $token,
            'status' => 200,
            'message' => 'Connecté avec succès',
            'certification_body' => Auth::guard('certification_body')->user()
        ]);
    }


    //fonction pour se deconnecter

    public function logout()
    {
        Auth::guard('certification_body')->logout();
        return response()->json([
            'status' => 200,
            'message' => 'Déconnexion réussie']);
    }

    public function me()
    {
        return response()->json(Auth::guard('certification_body')->user());
    }


}
