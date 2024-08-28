<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function about()
    {

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

        return view('frontend.about', compact('mainPages', 'subPages', 'subSubPages', 'contactus'));
    }
}
