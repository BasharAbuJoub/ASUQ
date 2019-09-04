<?php 
namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageUploader{

    
    public function upload(UploadedFile $image, $folder = 'images'){
        $name = Str::uuid();
        $savedImage = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());
        return $savedImage;
    }

}