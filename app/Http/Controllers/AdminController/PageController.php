<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index()
    {
        $pages = Page::orderBy('order_number', 'asc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('admin.pages.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|max:2048',
            'page_title' => 'nullable|string|max:255',
            'page_type' => 'required|integer',
            'related_page' => 'nullable|integer|exists:pages,id',
            'page_style' => 'required|string',
            'link' => 'nullable|string|url|max:255',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('banners');
        }

        $data['order_number'] = Page::max('order_number') + 1;
        $data['is_visible'] = true; // Default to visible

        Page::create($data);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        $pages = Page::all();
        return view('admin.pages.edit', compact('page', 'pages'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'page_name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|max:2048',
            'page_title' => 'nullable|string|max:255',
            'page_type' => 'required|integer',
            'related_page' => 'nullable|integer|exists:pages,id',
            'page_style' => 'required|string',
            'link' => 'nullable|string|url|max:255',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('banners');
        }

        $page->update($data);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }

    public function toggleVisibility(Page $page)
    {
        $page->is_visible = !$page->is_visible;
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page visibility updated.');
    }

    public function updateOrder(Request $request, Page $page)
    {
        $data = $request->validate([
            'order_number' => 'required|integer'
        ]);

        $page->update(['order_number' => $data['order_number']]);

        return redirect()->route('pages.index')->with('success', 'Page order updated successfully.');
    }

    // In your PageController
    public function showNavbar()
    {
        // Fetch pages
        $mainPages = Page::where('page_type', 1)->get();
        $subPages = Page::where('page_type', 2)->get();
        $subSubPages = Page::where('page_type', 3)->get();

        return view('frontend.navbar', compact('mainPages', 'subPages', 'subSubPages'));
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);

        $mainPages = Page::where('page_type', 1)
            ->where('is_visible', 1)
            ->orderBy('order_number', 'asc')
            ->get();

        $subPages = Page::where('page_type', 2)
            ->where('is_visible', 1)
            ->orderBy('order_number', 'asc')
            ->get();

        $subSubPages = Page::where('page_type', 3)
            ->where('is_visible', 1)
            ->orderBy('order_number', 'asc')
            ->get();

        // Check if the page style is content
        if ($page->page_style == 'content') {
            return view('frontend.show', compact('page', 'mainPages', 'subPages', 'subSubPages'));
        }

        // If the page style is link, redirect to the link
        return redirect()->away($page->link);
    }
}
