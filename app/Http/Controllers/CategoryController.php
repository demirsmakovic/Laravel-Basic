<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    public function AddCat(Request $request)
    {
    $request->validate([
        'category_name' => 'required|unique:categories|max:255',
    ],
    [
         'category_name.required' => 'Please input category name',
    ]
       
    );
    Category::insert([
        'category_name' => $request->category_name,
        'user_id' => Auth::user()->id,
        'created_at' => Carbon::now()
        ]);

    return Redirect()->back()->with('succes','Category inserted successfull');
    
}

    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));

    }

    public function Update(Request $request, $id){
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('succes','Category Updated Successfull');

    }

    public function SoftDelete($id){
        Category::find($id)->delete();
        return Redirect()->route('all.category')->with('succes','Category Soft Delete Successfully');
    }

    public function Restore($id){
        Category::withTrashed()->find($id)->restore();
        return Redirect()->route('all.category')->with('succes','Category Restore Successfully');
    }

    public function Pdelete($id){
        Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('all.category')->with('succes','Category P Delete Successfully');
    }



}