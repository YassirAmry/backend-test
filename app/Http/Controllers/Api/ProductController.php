<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    use ApiResponse;
    
    /**
     * Display all products
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $datas = Product::with(['categories', 'images'])->latest('id')->simplePaginate($limit)->appends($request->all());

        return $this->sendResponse(new ProductCollection($datas), 'Show products');
    }

    /**
     * Store a new product
     */
    public function store(ProductRequest $request)
    {
        $store = Product::create($request->all());

        if($request->has('categories')){
            $store->categories()->attach(explode(',', $request->categories));
        }

        if($request->has('images')){
            $store->images()->attach(explode(',', $request->images));
        }

        return $this->sendResponse(null, 'Product added successfully');
    }

    /**
     * Display the specified product
     */
    public function show($id)
    {
        $data = Product::with(['categories', 'images'])->find($id);

        return $this->sendResponse(new ProductResource($data), 'Detail Product');
    }

    /**
     * Update the specified product
     */
    public function update(ProductRequest $request, $id)
    {
        $data = Product::find($id);
        $data->update($request->all());

        if($request->has('categories')){
            $data->categories()->sync(explode(',', $request->categories));
        }

        if($request->has('images')){
            $store->images()->sync(explode(',', $request->images));
        }
                
        return $this->sendResponse(null, 'Product updated successfully');
    }

    /**
     * Remove the specified product
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return $this->sendResponse(null, 'Product deleted successfully');
    }
}
