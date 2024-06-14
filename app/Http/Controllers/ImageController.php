<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload_image(Request $request)
    {
        $image = $request->file('file');
        $image->storeAs('public/question', $image->hashName(), 'public');
        $request->merge(['image' => asset('storage/public/question/' . $image->hashName())]);
        return response()->json(['location' => asset('storage/public/question/' . $image->hashName())]);
    }
}
