<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

class BannerController extends Controller
{
    //

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'required|image|max:1024',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('banners'), $imageName);

        Testimonial::create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'image' => $imageName,
            'is_visible' => true,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {

            // Upload the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('banners'), $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->update([
            'name' => $validated['name'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {

        // Delete the testimonial from the database
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function toggle(Testimonial $testimonial)
    {
        $testimonial->is_visible = !$testimonial->is_visible;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial visibility updated.');
    }
}
