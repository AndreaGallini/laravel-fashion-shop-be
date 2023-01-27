<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'category', 'texture')->get(); //aggiungere colori
        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('brand', 'category', 'texture', 'tags', 'colors')->first();
        if ($product) {
            return response()->json([
                'success' => true,
                'results' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessun prodotto trovatoo'
            ]);
        }
    }
}
