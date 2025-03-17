<?php

namespace App\Http\Controllers;

use App\Models\SeedLot;
use App\Http\Requests\StoreSeedLotRequest;
use App\Http\Requests\UpdateSeedLotRequest;
use Illuminate\Support\Facades\Auth;

class SeedLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seedLots = SeedLot::all();
        return response()->json(['data' => $seedLots],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeedLotRequest $request)
    {
        try {
            $data = $request->validated();

            // Ajouter le numéro de lot généré si non fourni dans la requête

            $data['lot_number'] = SeedLot::generateUniqueLotNumber();


            $seedlot = SeedLot::create($data);

            return response()->json([
                'message' => 'Lot de semence créé avec succès',
                'seedlot' => $seedlot
            ], 201);
        } catch (\Exception $e) {
            return response()->json($e);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $seedlot = SeedLot::find($id);
        return response()->json(['data' => $seedlot],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeedLotRequest $request, string $id)
    {
        //$id_user = auth()->user()->id;
        try {
            $data = $request->validated();
            $seedlot = SeedLot::findOrFail($id);

            // Ne pas modifier le lot_number si l'utilisateur ne le met pas à jour
            if (!isset($data['lot_number'])) {
                $data['lot_number'] = $seedlot->lot_number;
            }

            $seedlot->update($data);

            return response()->json([
                'message' => 'Lot de semence mis à jour avec succès',
                'seedlot' => $seedlot
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour'], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $seedlot = SeedLot::find($id);
        $seedlot->delete();
        return response()->json(['message' => 'Lot de semence supprimé avec succès'], 200);

    }

    public function certify($id)
{
    try {
        // Récupérer le lot de semences
        $seedLot = SeedLot::findOrFail($id);

        // Vérifier si l'utilisateur est un organisme de certification
        if (auth()->guard('certification_body')->check()) {
            return response()->json(['error' => 'Accès non autorisé'], 403);
        }

        // Mettre à jour la certification
        $seedLot->update(['isCertified' => true]);

        return response()->json([
            'message' => 'Lot de semence certifié avec succès',
            'seedlot' => $seedLot
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la certification'], 500);
    }
}




}
