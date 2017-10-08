<?php
    function uploads($fileName, $dir = null)
    {
        $uploadsHome = "/uploads/";
        $dir = $dir ? $uploadsHome.$dir."/" : $uploadsHome; 
        return $dir.$fileName;
    }

    function productsImage($fileName)
    {
        return uploads($fileName, "products");
    }

    function upload($file, $dir = null)
    {
        $uploadsHome = "/uploads/";
        $dir = $dir ? $uploadsHome.$dir."/" : $uploadsHome; 

        $fileName = str_random(8);
        $fileExtension = $file->getClientOriginalExtension();
        $saveFileName = $fileName. "." . $fileExtension;

        $destination = public_path($dir);
        
        $file->move($destination, $saveFileName);
        return $saveFileName;
    }