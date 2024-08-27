<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    //

    public function index()
    {
        $images = GalleryImage::all();
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'name' => $request->name,
            'image_path' => $imagePath,
            'status' => true,
        ]);

        return redirect()->route('admin.gallery.index');
    }

    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('admin.gallery.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = GalleryImage::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
            $image->image_path = $imagePath;
        }

        $image->name = $request->name;
        $image->save();

        return redirect()->route('admin.gallery.index');
    }

    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->delete();
        return redirect()->route('admin.gallery.index');
    }

    public function toggleStatus($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->status = !$image->status;
        $image->save();
        return redirect()->route('admin.gallery.index');
    }
}
