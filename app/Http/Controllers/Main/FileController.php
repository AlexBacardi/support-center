<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function downLoad(File $file)
    {

        $filePath = Storage::path($file->path);
        
        $mimeType = Storage::mimeType($filePath);

        $headers = [['Content-Type' => $mimeType]];

        return response()->downLoad($filePath, $file->name, $headers);
    }
}
