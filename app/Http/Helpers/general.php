<?php
    function uploads($fileName, $dir = null) {
        $uploadsHome = "/uploads/";
        $dir = $dir ? $uploadsHome.$dir."/" : $uploadsHome; 
        return $dir.$fileName;
    }

    function productsImage($fileName) {
        return uploads($fileName, "products");
    }