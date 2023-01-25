<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function index()
    {
        $categories = Brand::with('products')->get(); //aggiungere colori
        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    public function show($slug)
    {
        $brand = Brand::where('slug', $slug)->with('products')->first();
        if ($brand) {
            return response()->json([
                'success' => true,
                'results' => $brand
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessun Brand trovata'
            ]);
        }
    }
}
