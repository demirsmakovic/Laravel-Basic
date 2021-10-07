<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function AllService()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }
    public function StoreService(Request $request)
    {
        $request->validate([
        'title' => 'required|min:4',
        'icon' => 'required|mimes:jpg.jpeg,png',
    ]);

        $icon = $request->file('icon');
        $name_gen = hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
        Image::make($icon)->resize(40,40)->save('image/service/'.$name_gen);
        $last_img = 'image/service/'.$name_gen;
        
        Service::insert([
        'title' => $request->title,
        'icon' => $last_img,
        'description' => $request->description,
        'created_at' => Carbon::now()
        ]);

    return Redirect()->back()->with('succes','Service Inserted Successfull');
    
}
}
