<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    use ApiResponse;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    
    /**
     * Display all images
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $datas = Image::latest('id')->simplePaginate($limit)->appends($request->all());

        return $this->sendResponse($datas, 'Show images');
    }

    /**
     * Store a new image
     */
    public function store(ImageRequest $request)
    {
        $store = Image::create($request->only('name', 'enable'));
        $this->imageService->upload($store->id, $request);

        return $this->sendResponse($store, 'Image added successfully');
    }

    /**
     * Display the specified image
     */
    public function show($id)
    {
        $data = Image::find($id);

        return $this->sendResponse($data, 'Detail Image');
    }

    /**
     * Update the specified image
     */
    public function update(ImageRequest $request, $id)
    {
        $data = Image::find($id);
        $data->update($request->only('name', 'enable'));

        if($request->hasFile('file')){
            $this->imageService->delete($data->id);
            $this->imageService->upload($data->id, $request);
        }
                
        return $this->sendResponse($data, 'Image updated successfully');
    }

    /**
     * Remove the specified image
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $this->imageService->delete($image->id);
        $image->delete();

        return $this->sendResponse(null, 'Image deleted successfully');
    }
}
