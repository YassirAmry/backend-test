<?php

namespace App\Http\Controllers\Api;

use Storage;
use App\Models\Image;
use App\Http\Controllers\Controller;

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

        abort(404);
    }
}
