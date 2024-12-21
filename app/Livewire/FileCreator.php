<?php

namespace App\Livewire;

class FileCreator
{

    public function __construct()
    {
    }

    public function createFile($filename, $content)
    {
        $path = public_path($filename);
        file_put_contents($path, $content);
        return $path;
    }
}
