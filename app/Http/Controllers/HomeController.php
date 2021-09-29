<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();

        return view('admin.slider.index', compact('sliders'));
    }

    public function Create()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required',
        ],
        [
         'title.required' => 'Please input slider title',
        ]);

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;
        
        Slider::insert([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
        ]);

    return Redirect()->route('home.slider')->with('succes','Slide Inserted Successfull');
    
}

    public function Edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

        $old_image = $request->old_image;

        $slider_image = $request->file('slider_image');

        if($slider_image){

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;
        
        unlink($old_image);
        Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
        ]);

         return Redirect()->route('home.slider')->with('succes','Slider Update Successfully');

        }else{

        Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'created_at' => Carbon::now()
        ]);

         return Redirect()->route('home.slider')->with('succes','Slider Update Successfully');

        }
    }

    public function Delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->back()->with('succes','Slider Delete Successfully');
    }
}
