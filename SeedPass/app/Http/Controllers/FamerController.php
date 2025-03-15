<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Famer;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreFamerRequest;
use App\Http\Requests\UpdateFamerRequest;

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
                'data'=>$famer] );
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
}
