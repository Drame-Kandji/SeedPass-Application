<?php

namespace App\Http\Controllers;

use App\Models\SeedLot;
use App\Http\Requests\StoreSeedLotRequest;
use App\Http\Requests\UpdateSeedLotRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SeedLotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $seedLots = SeedLot::with('productor')->get();
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
            return response()->json($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $seedlot = SeedLot::with('productor')->find($id);
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

    //cette fonction permet de certifier un lot de semence
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

            // Créer les données du QR Code
            $qrCodeData = "*Semence certifiée :*\n" .
            "Variété : " . $seedLot->variety . "\n" .
            "Numéro de lot : " . $seedLot->lot_number . "\n" .
            "Zone Geographique:"  . $seedLot->geographicOrigin . "\n" .
            "Annee de production : " . $seedLot->yearOfHarvest . "\n" .
            "Traitement:" . $seedLot->processing . "\n" .
            "Condition de croissance : " . $seedLot->growingConditions . "\n\n" .

            "*Production:*\n" .
            "Producteur : " . $seedLot->productor->firstName . " " . $seedLot->productor->lastName . "\n" .
            "Email : " . $seedLot->productor->email . "\n" .
            "Adresse : " . $seedLot->productor->address . "\n" .
            "Organisation : " . $seedLot->productor->organisation . "\n" .
            "Identification : " . $seedLot->productor->identificationNumber . "\n" .
            "Téléphone : " . $seedLot->productor->phone . "\n\n" .

            "*Certification :*\n" .
            "Oganisme de certification : " . $seedLot->certification_body->name . "\n" .
            "Date de certification : " . now()->format('Y-m-d') . "\n" .
            "Numéro d'identification  : " . $seedLot->certification_body->identificationNumber . "\n\n" .
            "Adresse :" . $seedLot->certification_body->location . "\n".
            "Email :" . $seedLot->certification_body->emailAddress . "\n" .
            "Téléphone :" . $seedLot->certification_body->phoneNumber . "\n";

            // Vérifier si l'utilisateur est un organisme de certification
            if (auth()->guard('certification_body')->check()) {
                return response()->json(['error' => 'Accès non autorisé'], 403);
            }


            //si le QrCode vous renvoie une erreur, veuillez installer le package simple-qrcode
            // avec la commmande: composer require simplesoftwareio/simple-qrcode
            // Générer le QR Code avec les données du lot
            $qrCodeImage = QrCode::format('svg')->size(200)->generate($qrCodeData);
            //dd($qrCodeImage);

            // Sauvegarder le QR code dans le stockage
            $qrCodePath = "qrcodes/lot_{$seedLot->lot_number}.svg";
            Storage::disk('public')->put($qrCodePath, $qrCodeImage);

            // Mettre à jour le chemin du QR code dans la base de données
            $seedLot->update(['qr_code' => $qrCodePath]);

            return response()->json([
                'message' => 'Lot de semence certifié avec succès',
                'seedlot' => $seedLot
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la certification'], 500);
        }
    }




}
