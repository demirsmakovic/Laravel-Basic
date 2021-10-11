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
        $notification = array(
            'message' => 'Slide Inserted Successfull',
            'alert-type' => 'success'
        );

    return Redirect()->route('home.slider')->with($notification);
    
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

        $notification = array(
            'message' => 'Slider Update Successfully',
            'alert-type' => 'warning'
        );

         return Redirect()->route('home.slider')->with($notification);

        }else{

        Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider Update Succesfully',
            'alert-type' => 'warning'
        );

         return Redirect()->route('home.slider')->with($notification);

        }
    }

    public function Delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        $notification = array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
