<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\Famer;
use App\Models\SeedLot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreFamerRequest;
use App\Http\Requests\UpdateFamerRequest;
use Illuminate\Support\Facades\Auth;


class FamerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $famers = Famer::all();
            return response()->json([
                'status'=>200,
                'message'=>'Liste des Agriculteurs',
                'data'=>$famers
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamerRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $famer = Famer::create($data);

            return response()->json(
                [
                    'status'=>200,
                    'message'=>'Agriculteur créé avec success',
                    'data'=>$famer
                ]);

        } catch (Exception $e) {
            return response()->json($e);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $famer = Famer::find($id);
        try {
            return response()->json([
                'status'=>200,
                'message'=>'Agriculteur Trouvée',
                'data'=>$famer
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamerRequest $request, string $id)
    {
        try {
            $famer = Famer::find($id);
            if(!$famer){
                return response()->json('Agriculteur non trouvé', 404);
            }
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $famer->update($data);
            return response()->json(
                ['status'=>200,
                    'message'=>'Agriculteur mis à jour avec success ',
                    'data'=>$famer
                ] );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $famer = Famer::find($id);
            if(!$famer){
                return response()->json('Agriculteur non trouvé', 404);
            }
            $famer->delete();
            return response()->json([
                'message'=>'Agriculteur supprimer avec success',
                'status'=> 200]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function login(){
        $credentials = request(['email', 'password']);
        if (! $token = auth::guard('farmer')->attempt($credentials)) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }
        return response()->json([
            'token' => $token,
            'status' => 200,
            'message' => 'Connexion réussie',
            'famer' => auth::guard('farmer')->user()
        ]);

    }

    public function logout()
    {
        auth::guard()->logout();
        return response()->json(['message' => 'Deconnexion reussie']);
    }

    public function me()
    {
        return response()->json(auth::guard('farmer')->user());
    }

    /**
     * Scan a seed lot and retrieve its information.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scan_seedLot(Request $request)
    {
        try {
            // Validation des données
            $request->validate([
                'lot_code' => 'required|string',
            ]);

            // Récupération du code du lot
            $lotCode = $request->lot_code;

            // Recherche du lot de semence dans la base de données
            $seedLot = SeedLot::where('lot_number', $lotCode)->first();

            // Vérification si le lot existe
            if (!$seedLot) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Lot de semence non trouvé. Veuillez procéder à un signalement',
                ], 404);
            }

            // Récupération des informations complémentaires du lot
            $seedLot->load(['productor', 'certification_body']);

//            // Enregistrement éventuel de l'historique de scan
//            $user = auth::guard('farmer')->user();
//            if ($user) {
//                $seedLot->scans()->create([
//                    'famer_id' => $user->id,
//                    'scanned_at' => now(),
//                    'location' => $request->location ?? null,
//                ]);
//            }

            // Retour des informations du lot de semence
            return response()->json([
                'status' => 200,
                'message' => 'Authentique',
                'data' => $seedLot
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erreur lors du scan du lot de semence',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
