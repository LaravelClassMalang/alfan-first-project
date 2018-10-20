<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class ImageController extends Controller
{
    public function imagePath() {
        return view('images.path');
    }

    
    public function imageBlob() {
        return view('images.blob');
    }

    public function storeBlob(Request $request) {
        // dd($request->all());

        // Get the file from the request
        $file = $request->file('image_blob');

        // dd($file->path());
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());

        // Store the contents to the database
        $user = Admin::find(1);
        $user->avatar = $contents;
        $user->save();
    }
}
