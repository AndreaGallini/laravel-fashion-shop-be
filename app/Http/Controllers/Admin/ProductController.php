<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Texture;
use App\Models\Tag;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {

        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $tags = Tag::all();
        $colors = Color::all();

        return view('admin.products.create', compact('categories', 'brands', 'textures', 'tags', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();


        $slug = Product::generateSlug($request->name);

        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('images', $request->image);
            $data['image'] = $path;
        }
        $newProduct = Product::create($data);

        if($request->has('tags')){
            $newProduct->tags()->attach($request->tags);
        }
        if($request->has('colors')){
            $newProduct->colors()->attach($request->colors);
        }
        return redirect()->route('admin.products.index', $newProduct->slug)->with('message', "La creazione di $newProduct->title è andata a buon fine!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $tags = Tag::all();
        $colors = Color::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'textures', 'tags', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $path = Storage::disk('public')->put('product_image', $request->image);
            $data['image'] = $path;
        }
        $product->update($data);

        if($request->has('tags')){
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->sync([]);
        }

        if($request->has('colors')){
            $product->colors()->sync($request->colors);
        } else {
            $product->colors()->sync([]);
        }
        return redirect()->route('admin.products.index')->with('message', "$product->name aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name cancellato");
    }
}
