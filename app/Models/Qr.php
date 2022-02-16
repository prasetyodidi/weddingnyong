<?php

namespace App\Models;

use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\URL;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Label\Font\NotoSans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

class Qr extends Model
{
    use HasFactory;

    public function create()
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('www.ucup&putri.weddingnyong/attende-list')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            // ->logoPath(URL::to('/img/web') . '/laravel-logo.png')
            ->labelText('Putri & Ucup')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();

        // header('Content-Type: ' . $result->getMimeType());
        // echo $result->getString();
        // $result->saveToFile(URL::to('/public/img/invitation/qr') . '/qrcode.png');
        $dataUri = $result->getDataUri();
        // $type = 'png';
        return $dataUri;
        // list($type, $dataUri) = explode(';', $dataUri);
        // list(, $dataUri)      = explode(',', $dataUri);
        // $dataUri = base64_decode($dataUri);

    }
}
