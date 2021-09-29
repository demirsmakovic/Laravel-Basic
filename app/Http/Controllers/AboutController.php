<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $abouts = HomeAbout::latest()->get();

        return view('admin.about.index', compact('abouts'));
    }

    public function Create()
    {
        return view('admin.about.create');
    }

    public function StoreAbout(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'short_des' => 'required',
        'long_des' => 'required',
        ],
        [
         'title.required' => 'Please input about title',
        ]);
        
        HomeAbout::insert([
        'title' => $request->title,
        'short_des' => $request->short_des,
        'long_des' => $request->long_des,
        'created_at' => Carbon::now()
        ]);

    return Redirect()->route('home.about')->with('succes','About Inserted Successfull');
    
}

    public function Edit($id)
    {
        $abouts = HomeAbout::find($id);
        return view('admin.about.edit', compact('abouts'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',
        'short_des' => 'required',
        'long_des' => 'required',
    ]);

        HomeAbout::find($id)->update([
        'title' => $request->title,
        'short_des' => $request->short_des,
        'long_des' => $request->long_des,
        'created_at' => Carbon::now()
        ]);

         return Redirect()->route('home.about')->with('succes','About Update Successfully');
    }

    public function Delete($id)
    {
        HomeAbout::find($id)->delete();
        return Redirect()->back()->with('succes','About Delete Successfully');
    }
}
