<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\SSW;
use Illuminate\Http\Request;

class AdminSSWController extends Controller
{
    //
    public function index()
    {
        $ssws = SSW::all();
        return view('admin.ssw.index', compact('ssws'));
    }

    public function create()
    {
        return view('admin.ssw.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        SSW::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => true,
        ]);

        return redirect()->route('admin.ssw.index');
    }

    public function edit($id)
    {
        $ssw = SSW::findOrFail($id);
        return view('admin.ssw.edit', compact('ssw'));
    }

    public function update(Request $request, $id)
    {
        $ssw = SSW::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ssw->title = $request->title;
        $ssw->description = $request->description;
        $ssw->save();

        return redirect()->route('admin.ssw.index');
    }

    public function destroy($id)
    {
        $ssw = SSW::findOrFail($id);
        $ssw->delete();
        return redirect()->route('admin.ssw.index');
    }

    public function toggleStatus($id)
    {
        $ssw = SSW::findOrFail($id);
        $ssw->status = !$ssw->status;
        $ssw->save();
        return redirect()->route('admin.ssw.index');
    }
}
