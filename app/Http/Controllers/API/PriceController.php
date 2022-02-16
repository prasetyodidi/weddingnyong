<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:prices'],
            'price' => ['required'],
        ]);

        $price = [
            'name' => $request->name,
            'price' => $request->price
        ];

        Price::create($price);

        return response()->json([
            'message' => 'new price has been created',
            'price' => $price
        ], 200);
    }

    public function getAllPrice()
    {
        $prices = Price::all();

        return response()->json([
            'message' => 'success',
            'prices' => $prices
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price
        ];

        Price::where('id', $id)->update($data);
        $price = Price::where('id', $id)->get();

        return response()->json([
            'message' => 'price has been updated',
            'price' => $price
        ], 200);
    }

    public function delete(Request $request)
    {
        Price::where('name', $request->name)->delete();

        return response()->json([
            'message' => 'price has been deleted',
        ], 200);
    }
}
