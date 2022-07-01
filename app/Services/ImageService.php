<?php

namespace App\Services;

use Storage;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageService
{
    public function upload($image_id, Request $request)
    {
        $image = Image::findOrFail($image_id);

        $file       = $request->file('file');
        $directory  = $image->getFileDirectoryAttribute();
        $filename   = time().$file->getClientOriginalName();

        Storage::disk('local')->putFileAs($directory, $file, $filename);

        $image->update(['file' => $filename]);
    }

    public function delete($image_id)
    {
        $image      = Image::findOrFail($image_id);
        $directory  = $image->getFileDirectoryAttribute();

        if (Storage::disk('local')->has($directory.$image->file)) {
            Storage::disk('local')->delete($directory.$image->file);
        }
    }
}