<?php

namespace App\Services;
use Intervention\Image\ImageManagerStatic as Image;

class UploaderService {

    public $file;
    public $dir;
    public $saveFileName;
    public $destination;
    public $editableInstance;

    public function upload ($file, $dir = null) {

        $this->file = $file;
        $this->dir = $dir;

        $fileName = str_random(8);
        $fileExtension = $this->file->getClientOriginalExtension();
        $this->saveFileName = $fileName. "." . $fileExtension;
        $uploadsHome = "/uploads/";
        $this->dir = $this->dir ? $uploadsHome.$this->dir."/" : $uploadsHome; 
        $this->destination = public_path($this->dir);
        $this->file->move($this->destination, $this->saveFileName);
        $this->editableInstance = Image::make(public_path($this->dir. '/'. $this->saveFileName));
        return $this;
    }

    public function watermark () {
        $this->editableInstance
            ->insert(public_path('images/watermark.png'), 'bottom-right', 10, 10)
            ->save();
        return $this;
    }

    public function greyscale () {
        $this->editableInstance
            ->greyscale()
            ->save();
        return $this;
    }

    public function invert () {
        $this->editableInstance
            ->invert()
            ->save();
        return $this;
    }

    public function pixelate () {
        $this->editableInstance
            ->pixelate()
            ->save();
        return $this;
    }

    public function blur ($value = 0) {
        $this->editableInstance
            ->blur($value)
            ->save();
        return $this;
    }

}