<?php

namespace App\Traits;

trait Images{
    public function savePhoto($photo , $folder){
        $file_ext = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_ext;
        $path = $folder;
        $photo->move($path,$file_name);
        return $file_name;
    }
}
