<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    //
    public function index()
    {
        $whyUs = WhyUs::all();
        return view('admin.whyus.index', compact('whyUs'));
    }

    public function create()
    {
        return view('admin.whyus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        WhyUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('whyus.index')
            ->with('success', 'Why Us item created successfully.');
    }

    public function edit(WhyUs $whyU)
    {
        return view('admin.whyus.edit', compact('whyU'));
    }

    public function update(Request $request, WhyUs $whyU)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $whyU->image = $imageName;
        }

        $whyU->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $whyU->image,
        ]);

        return redirect()->route('whyus.index')
            ->with('success', 'Why Us item updated successfully.');
    }

    public function destroy(WhyUs $whyU)
    {
        if ($whyU->image) {
            unlink(public_path('images') . '/' . $whyU->image);
        }

        $whyU->delete();
        return redirect()->route('whyus.index')
            ->with('success', 'Why Us item deleted successfully.');
    }
}
