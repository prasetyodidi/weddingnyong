<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function create()
    {
        $qr = new Qr();
        $uri = $qr->create();
        $data['uri'] = $uri;
        return view('qr', $data);
    }

    public function read()
    {
    }
}
