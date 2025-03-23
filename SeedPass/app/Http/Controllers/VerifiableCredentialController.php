<?php

namespace App\Http\Controllers;

use App\Models\SeedLot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VerifiableCredentialController extends Controller
{
    /**
     * Génère un credential vérifiable pour un lot de semences
     */
    public function generateCredential($seedId)
    {
        // Récupérer les informations de la semence
        $seed = SeedLot::with('productor')->findOrFail($seedId);

        // Générer un DID unique pour ce lot
        $did = "did:seedpass:" . md5($seed->lot_number . time());

        // Récupérer la date actuelle pour l'émission
        $issuanceDate = now()->toIso8601String();
        $expirationDate = now()->addYears(3)->toIso8601String();

        // Créer le credential
        $credential = [
            "id" => $did,
            "type" => [
                "VerifiableCredential",
                "SeedAuthenticationCredential"
            ],
            "proof" => [
                "type" => "Ed25519Signature2020",
                "created" => now()->toIso8601String(),
                "proofValue" => $this->generateProofValue($seed),
                "proofPurpose" => "assertionMethod",
                "verificationMethod" => "did:web:seedpass.sn:keys#key-1"
            ],
            "issuer" => "did:web:seedpass.sn",
            "@context" => [
                "https://www.w3.org/2018/credentials/v1",
                "https://seedpass.sn/contexts/seed-context.json",
                "https://w3id.org/security/suites/ed25519-2020/v1"
            ],
            "issuanceDate" => $issuanceDate,
            "expirationDate" => $expirationDate,
            "credentialSubject" => [
                "id" => "did:seedpass:lot:" . $seed->lot_number,
                "type" => "SeedAuthenticationCredential",
                "lotNumber" => $seed->lot_number,
                "variety" => $seed->variety,
                "geographicOrigin" => $seed->geographicOrigin,
                "yearOfHarvest" => $seed->yearOfHarvest,
                "processing" => $seed->processing,
                "certification" => $seed->certification,
                "germinationQuality" => $seed->germinationQuality,
                "productionSplot" => $seed->productionSplot,
                "quantityProduced" => $seed->quantityProduced,
                "growingConditions" => $seed->growingConditions,
                "producer" => [
                    "name" => $seed->productor->firstName . " " . $seed->productor->lastName,
                    "organisation" => $seed->productor->organisation,
                    "identificationNumber" => $seed->productor->identificationNumber
                ]
            ]
        ];

        // Générer le QR code
        $qrCode = $this->generateQrCode($credential, $seed->lot_number);

        // Mettre à jour l'enregistrement de la semence avec le chemin du QR code
        $seed->qr_code = $qrCode;
        $seed->save();

        return response()->json([
            'credential' => $credential,
            'qr_code_url' => url(Storage::url($qrCode))
        ]);
    }

    /**
     * Vérifie un credential fourni
     */
    public function verifyCredential(Request $request)
    {
        $credential = $request->input('credential');

        // Vérifier la signature
        $isSignatureValid = $this->verifySignature($credential);

        // Vérifier la date d'expiration
        $isExpired = false;
        if (isset($credential['expirationDate'])) {
            $expirationDate = \Carbon\Carbon::parse($credential['expirationDate']);
            $isExpired = $expirationDate->isPast();
        }

        // Vérifier si le lot existe dans la base de données
        $lotNumber = $credential['credentialSubject']['lotNumber'] ?? null;
        $lotExists = false;
        if ($lotNumber) {
            $lotExists = SeedLot::where('lot_number', $lotNumber)->exists();
        }

        return response()->json([
            'isValid' => $isSignatureValid && !$isExpired && $lotExists,
            'isSignatureValid' => $isSignatureValid,
            'isExpired' => $isExpired,
            'exists' => $lotExists
        ]);
    }

    /**
     * Génère une valeur de preuve (signature)
     */
    private function generateProofValue($seed)
    {
        // Dans une implémentation réelle, vous utiliseriez une bibliothèque cryptographique
        // pour générer une signature Ed25519 appropriée
        // Ceci est une simulation simplifiée
        return base64_encode(hash('sha256', json_encode($seed->toArray()) . env('APP_KEY'), true));
    }

    /**
     * Vérifie la signature d'un credential
     */
    private function verifySignature($credential)
    {
        // Dans une implémentation réelle, vous vérifieriez la signature cryptographique
        // Pour l'instant, nous supposons que la signature est valide si le credential a un champ proof
        return isset($credential['proof']) && isset($credential['proof']['proofValue']);
    }

    /**
     * Génère un QR code pour un credential
     */
    private function generateQrCode($credential, $lotNumber)
    {
        $path = 'qrcodes/seed_' . $lotNumber . '.png';

        // Générer et sauvegarder le QR code
        QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate(json_encode($credential), storage_path('app/public/' . $path));

        return $path;
    }
}
