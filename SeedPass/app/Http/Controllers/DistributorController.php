<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Distributor;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $distributors = Distributor::all();
            return response()->json([
                'status'=>200,
                'message'=>'Liste des Distributeurs',
                'data'=>$distributors
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistributorRequest $request)
    {
        try{
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $distributor = Distributor::create($data);
            return response()->json([
                'status'=>200,
                'message'=>'Distributeur créé avec success',
                'data'=>$distributor
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
            $distributor = Distributor::find($id);
            if($distributor){
                return response()->json([
                    'status'=>200,
                    'message'=>'Distributeur Trouvé',
                    'data'=>$distributor
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Distributeur non trouvé',
                ]);
            }
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistributorRequest $request, string $id)
    {
        try{
            $distributor= Distributor::find($id);
            if(!$distributor){
                return response()->json('Distributeur non trouvé', 404);
            }
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $distributor->update($data);
            response()->json( [
               'message'=>'Distributeur modifié avec success',
               'status'=>200,
               'data'=>$distributor,
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
            $distributor = Distributor::find($id);
            if($distributor){
                $distributor->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Distributeur supprimé avec success',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Distributeur non trouvé',
                ]);
            }
        }catch(Exception $e){
            return response()->json($e);
        }
    }
}
