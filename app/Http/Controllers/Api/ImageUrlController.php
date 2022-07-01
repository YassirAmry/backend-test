<?php

namespace App\Http\Controllers\Api;

use Storage;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ImageUrlController extends Controller
{
    /**
     * Show image as url path
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $image = Image::find($id);

        if ($image){
            if(Storage::disk('local')->has($image->getFilePathAttribute())) {
                return Storage::disk('local')->response($image->getFilePathAttribute());
            }
        }

        abort(Response::HTTP_NOT_FOUND);
    }
}
