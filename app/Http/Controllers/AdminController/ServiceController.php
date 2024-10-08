<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //

    public function index()
    {
        $services = Service::all();
        return view('admin.services.services', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string|max:255',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Service::create([
            'service_title' => $request->service_title,
            'description' => $request->description,
            'image' => $imageName,
            'link' => $request->link,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $service->image = $imageName;
        }

        $service->update([
            'service_title' => $request->service_title,
            'description' => $request->description,
            'image' => $service->image,
            'link' => $request->link,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }


    public function destroy(Service $service)
    {
        if ($service->image) {
            unlink(public_path('images') . '/' . $service->image);
        }

        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
