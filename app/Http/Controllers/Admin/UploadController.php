<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('public/uploads', $filename);

        return response()->json([
            'url' => asset('storage/uploads/' . $filename)
        ]);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
}

}
