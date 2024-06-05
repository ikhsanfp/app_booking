<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.uploudGambar', [
            "title" => "index",

        ]);
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $image = new Image;
            $image->file_name = $fileName;
            $image->file_path = '/storage/' . $filePath;
            $image->save();

            return back()->with('success', 'Image uploaded successfully')
                ->with('file_name', $fileName);
        }

        return back()->with('error', 'Image upload failed');
    }
}
