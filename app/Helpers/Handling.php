<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;


class Handling{
    
    public static function Upload($customName ,$file, $directory = '')
    {
       

        try {
            Storage::putFileAs($directory, $file, $customName);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>