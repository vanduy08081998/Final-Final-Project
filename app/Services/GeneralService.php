<?php

namespace App\Services;

class GeneralService
{
    public function uploadImage($path ,$get_image){

        if (!is_null($get_image)) {
            $imageName = $get_image->getClientOriginalName();
            $get_image->move($path, $imageName);
            return $imageName;
        }

    }

    public function deleteImage($path, $image){

        $path_link = $path.''.$image;
        if (file_exists($path_link)) {
            unlink($path_link);
        }
        
    }
}