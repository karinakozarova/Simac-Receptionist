<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QRcode;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="QRcode",
 *     description="API Endpoints of QRcode Controller"
 * )
 */
class QRcodeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="information about the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function show(QRcode $qrCode) : GeneralResource
    {
        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Get(
     *     path="/api/qrcodes",
     *     @OA\Response(response="default", description="information about all the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(QRcode::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/qrcodes",
     *     @OA\Response(response="default", description="information about the created qrCode (code, visitor id, and schedule)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'code'          => 'required',
            'visitor_id'    => 'required',
            'schedule'      => 'required',
        ]);

        $qrCode = QRcode::create($request ->all());

        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Put(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="updated information about the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function update(QRcode $qrCode, Request $request) : GeneralResource
    {
        $qrCode -> update($request -> all());

        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Delete(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(QRcode $qrCode)
    {
        $qrCode -> delete();

        return response() -> json();
    }

    public function make(){
        $file = public_path('qr.png');
        return \QRCode::text('QR Code Generator for Laravel!')->setOutfile($file)->png();
    }

    public function vcard(){
        // Personal Information
    $firstName = 'John';
    $lastName = 'Doe';
    $title = 'Mr.';
    $email = 'john.doe@example.com';
    
    // Addresses
    $workAddress = [
       'type' => 'work',
       'pref' => false,
       'floor' => '1',
       'number' => '1.132B',
    ];
    
    $addresses = [$workAddress];
    
    // Phones
    $workPhone = [
        'type' => 'work',
        'number' => '001 555-1234',
        'cellPhone' => false
    ];
    
    $phones = [$workPhone];
    
    return \QRCode::vCard($firstName, $lastName, $title, $email, $addresses, $phones)
                ->setErrorCorrectionLevel('H')
                ->setSize(4)
                ->setMargin(2)
                ->svg();
    }


}
