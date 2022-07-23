<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select(['id', 'name', 'price', 'created_at'])
                             ->latest('id')
                             ->paginate(5);

        $products = $products->map(function($product){
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => number_format($product->price),
                'created_at' => $product->created_at->toFormattedDateString(),
            ];
        });

        return response()->json(compact('products'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json(compact('product'),201);
    }

    public function show($id)
    {
        $product = Product::select('id','name','price','created_at')->find($id);

        if(! $product){
            return response()->json([],404);    
        }

        return response()->json(compact('product'),200);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

        if(! $product){
            return response()->json([],404);    
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return response()->json(compact('product'),200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(! $product){
            return response()->json([],404);    
        }

        $product->delete();

        return response()->json([],200);
    }
}