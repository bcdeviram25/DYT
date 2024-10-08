<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Service;
use App\Models\WhyUs;
use App\Models\Testimonial;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {

        // Fetch pages based on their type
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

        $testimonialdata = Testimonial::where('is_visible', 1)->get();

        $contactus = Contact::where('status', 1)->get();

        $gallery = GalleryImage::where('status', 1)->get();

        $bannerImage = Banner::where('is_visible', 1)->orderBy('id')->get();


        $whyus = WhyUs::all();
        $services = Service::all();
        return view('frontend.home', compact('services', 'whyus', 'mainPages', 'subPages', 'subSubPages', 'testimonialdata', 'contactus', 'gallery', 'bannerImage'));
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

        $contactus = Contact::where('status', 1)->get();


        // Check if the page style is content   
        if ($page->page_style == 'content') {
            return view('frontend.show', compact('page', 'mainPages', 'subPages', 'subSubPages', 'contactus'));
        }

        // If the page style is link, redirect to the link
        return redirect()->away($page->link);
    }
}
