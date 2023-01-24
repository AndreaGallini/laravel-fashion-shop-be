<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get(); //aggiungere colori
        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('products')->first();
        if ($category) {
            return response()->json([
                'success' => true,
                'results' => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessuna categoria trovata'
            ]);
        }
    }
}
