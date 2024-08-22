<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $whyus = WhyUs::all();
        $services = Service::all();
        return view('frontend.home', compact('services', 'whyus'));
    }
}
