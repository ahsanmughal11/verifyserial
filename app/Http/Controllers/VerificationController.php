<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    public function index()
    {
        return view('verify');
    }

    public function verify(Request $request)
    {
        $serialNumber = $request->input('serial_number');

        $product = Product::where('serial_number', $serialNumber)->first();

        if ($product) {
            return view('certificate', [
                'product' => $product,
                'serial_number' => $serialNumber
            ]);
        }

        return view('verify', [
            'verified' => false,
            'serial_number' => $serialNumber
        ]);
    }

}
