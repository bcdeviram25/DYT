<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

class AdminBannerController extends Controller
{
    //

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'banner_short_description' => 'required|string',
            'image' => 'required|image|max:1024',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('banners'), $imageName);

        Banner::create([
            'title' => $validated['title'],
            'banner_short_description' => $validated['banner_short_description'],
            'image' => $imageName,
            'is_visible' => true,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'banner_short_description' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {

            // Upload the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('banners'), $imageName);
            $banner->image = $imageName;
        }

        $banner->update([
            'title' => $validated['title'],
            'banner_short_description' => $validated['banner_short_description'],
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        // Delete the banner from the database
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }

    public function toggle(Banner $banner)
    {
        $banner->is_visible = !$banner->is_visible;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner visibility updated.');
    }
}
