<?php

namespace App\Services;

class GeneralService
{
    public function uploadImage($path ,$get_image){
        if (!is_null($get_image)) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            return $new_image;
        }
    }

    public function deleteImage($path, $image){
        $path_link = $path.''.$image;
        if (file_exists($path_link)) {
            unlink($path_link);
        }
    }
}