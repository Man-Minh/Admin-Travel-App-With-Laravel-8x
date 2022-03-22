<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage; // Man create
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class Controller extends BaseController // 
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveImage($img, $path= 'public') // Man update 13/01/2022 : 20:47:22 | Fix error img 
    {
        if(!$img)
        {
            return null;
        }

        $fileName =  time().'.png';
        \Storage::disk($path)->put($fileName, base64_decode($img) );

        // return URL::to('/').'/storage/'.$path.'/'.$fileName; // http://localhost:8000/storage/hinh_bai_viet/1212.jpg
        return $fileName;
    }    // Man update 07/01/2022 function SaveIMG
    
}
