<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


use App\Models\Category;

class CategoryController extends Controller
{
    // public function create()
    // {
    //     return view('categories.create');
    // }
    
    // // public function store(Request $request)
    // // {
    // //     $category = new Category;
    // //     $category->id = $request->input('id');
    // //     $category->email = $request->input('email');
    // //     $category->name = $request->input('name');
    // //     $category->save();
    
    // //     return redirect()->route('categories.index');
    // // }
    
    // // public function index()
    // // {
    // //     $categories = Category::all();
    // //     return view('categories.index', compact('categories'));
    // // }

    public function displayCategories()
    {
        $categories = Category::latest()->paginate('5');
        return view('admin.categories', compact('categories'));
    }


    public function AddCat(Request $request) {

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',


        ]);


        Category::create([

            
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()


        ]);

        return Redirect()->back()->with('success','Category Inserted Sucessfully');
    }


    public function Edit($id){

        
        $categories = Category::find($id);

        return view('admin.edit',compact('categories'));
    }


    public function Update(Request $request, $id){
        $update = Category::find($id)->update ([


            'category_name'=>$request->category_name,
            'user_id' => Auth::user()->id
        ]);
return Redirect()->route('categories')->with('success','Updated Successfully');
    }



}
