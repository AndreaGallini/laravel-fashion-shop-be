<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'success' => true,
            'results' => $product
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('brand', 'category', 'tags')->first();
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
