<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use App\Models\Multipic;
use App\Models\Service;

class PageController extends Controller
{
    public function Portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }

    public function Contact()
    {
        return view('pages.contact');
    }

    public function About()
    {
        $about = HomeAbout::first();
        return view('pages.about', compact('about'));
    }

    public function Services()
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }
}
