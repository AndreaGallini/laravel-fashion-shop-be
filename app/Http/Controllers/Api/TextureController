<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Texture;


class TextureController extends Controller
{
    public function index()
    {
        $categories = Texture::with('products')->get(); //aggiungere colori
        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    public function show($slug)
    {
        $texture = Texture::where('slug', $slug)->with('products')->first();
        if ($texture) {
            return response()->json([
                'success' => true,
                'results' => $texture
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessuna categoria trovata'
            ]);
        }
    }
}
