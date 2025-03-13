<?php

namespace App\Http\Controllers;

use App\Models\CertificationBody;
use App\Http\Requests\StoreCertificationBodyRequest;
use App\Http\Requests\UpdateCertificationBodyRequest;

class CertificationBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CertificationBody::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificationBodyRequest $request)
    {
        CertificationBody::create($request->validate());
        return response()->json(['message' => 'Organisme de certification crée avec succès '], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $certificationBody = CertificationBody::find($id);
        if (!$certificationBody) {
            return response()->json(['message' => 'Non trouvée'], 404);
        }
        return response()->json(['data' => $certificationBody], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCertificationBodyRequest $request, string $id)
    {
        $certificationBody = CertificationBody::find($id);
        if (!$certificationBody) {
            return response()->json(['message' => 'Certification Body not found'], 404);
        }
        $certificationBody->update($request->validate());
        return response()->json(['message'=>'Cet organisme est modifié avec succès '], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificationBody = CertificationBody::find($id);
        $certificationBody->delete();
        return response()->json(['message' => 'Organisme supprimé avec succès'], 204);
    }
}
