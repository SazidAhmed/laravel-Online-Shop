<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Subcategory;
use App\Category;
class ProductController extends Controller
{
   public function index(){
      $products = Product::latest()->get();
      return view('product.product',compact('products'));
   }

   public function store(Request $request){
      // dd($request);
      
      $this->validate($request,[
         'name'=>'required',
         'description'=>'required|min:3',
         'image'=>'required|mimes:jpeg,png',
         'price'=>'required|numeric',
         'stock'=>'required|numeric',
         'additional_info'=>'required',
         'category_id'=>'required'
      ]);
      // dd($request);
     
      if($request->hasFile('image')){
         $image = $request->image->hashName();
         $request->image->storeAs('public/product', $image);
     }else{
         $image = 'avatar2.png';
     } 
        Product::create([
           
         'name'=>$request->name,
         'description'=>$request->description,
         'image'=>$image,
         'price'=>$request->price,
         'stock'=>$request->stock,
         'additional_info'=>$request->additional_info,
         'category_id'=>$request->category_id,
         'subcategory_id'=>$request->subcategory_id
      ]);
      // dd($request);
      return redirect()->back()->with('message', 'Product Has Been Created successfully!');  
   }

   public function update(Request $request,$id){
      $product = Product::find($id);
        
      $image = $product->image;
      if($request->hasFile('image')){
         $image = $request->image->hashName();
         $request->image->storeAs('public/product', $image);
            \Storage::delete('public/product/'.$product->image); 
      }

      $product->name= $request->name;
      $product->description= $request->description;
      $product->image=$image;
      $product->price=$request->price;
      $product->stock=$request->stock;
      $product->additional_info = $request->additional_info;
      $product->category_id = $request->category_id;
      $product->subcategory_id = $request->subcategory_id;
      $product->save();
      return redirect()->back()->with('message', 'Product Has Been Updated successfully!');
   }

    public function destroy($id){

      $product = Product::find($id);
      $product->delete();
      \Storage::delete('public/product/'.$product->image); 
      return redirect()->back()->with('message', 'Product Has Been Deleted successfully!');

      // notify()->success('Product deleted successfully!');
      // return redirect()->route('product.index');
   }

    public function loadSubCategories(Request $request,$id){
        $subcategory  = Subcategory::where('category_id',$id)->pluck('name','id');
        return response()->json($subcategory);
    }
    //http://shopcorner.saz/subcatories/24

}
