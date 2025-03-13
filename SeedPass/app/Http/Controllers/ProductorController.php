<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Productor;
use Illuminate\Http\Request;
use App\Http\Requests\ProductorRequest;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $productors = Productor::all();
            return response()->json([
                'status'=>200,
                'message'=>'Liste des Producteurs',
                'data'=>$productors
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductorRequest $request)
    {
        try{
            $productor = Productor::create($request->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Producteur créé avec success',
                'data'=>$productor
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       try{
            $productor = Productor::find($id);
            return response()->json([
                'status'=>200,
                'message'=>'Producteur Trouvé',
                'data'=>$productor
            ]);
        }catch(Exception $e){
            return response()->json($e);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductorRequest $request, string $id)
    {
        try{
            $productor = Productor::find($id);
            if(!$productor){
                return response()->json('Producteur non trouvé', 404);
            }
            $productor->update($request->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Producteur modifié avec success',
                'data'=>$productor
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try{
            $productor = Productor::find($id);
            if(!$productor){
                return response()->json('Producteur non trouvé', 404);
            }
            $productor->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Producteur supprimé avec success'
            ]);
       }catch(Exception $e){
           return response()->json($e);
       }
    }
}
