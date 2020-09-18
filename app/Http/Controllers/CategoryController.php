<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Subcategory;
class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('product.category',compact('categories', 'subcategories'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png'
        ]);
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->storeAs('public/category', $image);
        }else{
            $image = 'avatar2.png';
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'image'=>$image
        ]);
        return redirect()->back()->with('message', 'Category created successfully!');

    }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'name'=>'required|unique:categories',
    //         'description'=>'required',
    //         'image'=>'required|mimes:jpeg,png'
    //     ]);
        
    //     $image = $request->file('image')->store('public/files');
    //     Category::create([
    //         'name'=>$request->name,
    //         'slug'=>Str::slug($request->name),
    //         'description'=>$request->description,
    //         'image'=>$image


    //     ]);
       
    //     return redirect()->route('category.index');

    // }

   
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        $image = $category->image;
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->storeAs('public/category', $image);
             \Storage::delete('public/category/'.$category->image); 
        }

        $category->name= $request->name;
        $category->description= $request->description;
        $category->image=$image;
        $category->save();
        return redirect()->back()->with('message', 'Category Updated successfully!');
    }

    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();
        \Storage::delete('public/category/'.$category->image); 
        return redirect()->back()->with('message', 'Category Deleted successfully!');

        // $category = Category::find($id);
        // if(Storage::delete('public/category/'.$category->image))
        // {
        //   $category->delete();
        //   return redirect()->back()->with('message', 'Category Deleted successfully!');
        // }
    }
}
