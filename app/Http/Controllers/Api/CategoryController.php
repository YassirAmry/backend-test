<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    use ApiResponse;

    /**
     * Display all categories
     */
    public function index(Request $request)
    {
        $datas = Category::latest('id')->get();

        return $this->sendResponse(CategoryResource::collection($datas), 'Show categories');
    }

    /**
     * Store a new category
     */
    public function store(CategoryRequest $request)
    {
        $store = Category::create($request->all());

        return $this->sendResponse($store, 'Category added successfully');
    }

    /**
     * Display the specified category
     */
    public function show($id)
    {
        $data = Category::find($id);

        return $this->sendResponse($data, 'Detail Category');
    }

    /**
     * Update the specified category
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = Category::find($id);
        $data->update($request->all());
                
        return $this->sendResponse($data, 'Category updated successfully');
    }

    /**
     * Remove the specified category
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return $this->sendResponse(null, 'Category deleted successfully');
    }
}
