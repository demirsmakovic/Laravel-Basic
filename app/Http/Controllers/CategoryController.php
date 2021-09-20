<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->paginate(2);
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request)
{
    $validated = $request->validate([
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
}