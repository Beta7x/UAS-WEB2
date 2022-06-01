<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudinaryStorageController extends Controller
{
    private const folder_path = 'utscrud';

    public static function path($path) {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($image, $filename) {
        $newFileName = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFileName;
        $result = cloudinary()->upload($image, [
            "public_id" => self::path($public_id),
            "folder"    => self::folder_path
        ])->getSecurePath();

        return $result;
    }

    public static function replace($path, $image, $public_id) {
        self::delete($path);
        return self::upload($image, $public_id);
    }

    public static function delete($path) {
        $public_id = self::folder_path.'/'.self::path($path);
        return cloudinary()->destroy($public_id);
    }
    
}
