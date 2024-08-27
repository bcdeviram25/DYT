<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FormData;
use App\Models\Page;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    //

    public function form()
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

        $contactus = Contact::where('status', 1)->get();

        return view('frontend.user_info', compact('mainPages', 'subPages', 'subSubPages', 'contactus'));
    }

    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:form_data',
            'phone_no' => 'required|string|max:20',
            'interested_country' => 'required|string|max:255',
            'interested_field' => 'required|string|max:255',
            'work_experience' => 'required|string',
        ]);

        // Store the data in the database
        FormData::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your information has been submitted successfully!');
    }
}
