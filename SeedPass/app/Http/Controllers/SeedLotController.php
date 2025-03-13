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
            $seedlot = SeedLot::create($data);

            return response()->json([
                'message' => 'Lot de semence créé avec succès',
                'seedlot' => $seedlot
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la création'], 500);
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
        $seedLot = SeedLot::find($id);
        $id_user = auth()->user()->id;

        $seedlot->update($request->validated());
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
}
