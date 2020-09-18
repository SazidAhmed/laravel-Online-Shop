<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Slider;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::latest()->limit(6)->get();
        
        //Random Active product for slider
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $randomActiveProductsIds=[];
        foreach( $randomActiveProducts as $product){
            array_push(  $randomActiveProductsIds, $product->id);
        }
        //Random product except active products
        $randomItemProducts = Product::whereNotIn('id', $randomActiveProductsIds)->limit(3)->get();
        //homepage slider
        $sliders = Slider::get();

        return view('website.home',compact('products','randomActiveProducts','randomItemProducts', 'sliders'));
    }

    public function view($id){
        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder()
                                    ->where('category_id', $product->category_id)
                                    ->where('id','!=', $product->id)
                                    ->limit(3)
                                    ->get();
        // return $productFromSameCategories;
        return view('website.productview',compact('product','productFromSameCategories'));
    }

    //Filter Products based on category
    public function allProduct($name,Request $request){
        $category = Category::where ('slug',$name)->first();
        $categoryId = $category->id;
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;
        //filter
        if($request->subcategory){
            $products = $this->filterProducts($request);
            $filterSubcategories = $this->getSubcategoriesId($request);
            return view('website.category',compact ('products', 'filterSubcategories', 'subcategories', 'slug','categoryId'));
            
        }
        elseif($request->min || $request->max){
            $products = $this->filterByPrice($request);
            return view('website.category',compact ('products', 'subcategories', 'slug', 'categoryId'));
        } 
        else{
            $products = Product::where ('category_id', $category->id)->get();
            return view('website.category',compact ('products', 'subcategories', 'slug', 'categoryId'));
        }

    }

    //Filter By Subcategory Function
    public function filterProducts(Request $request){
        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn ('subcategory_id', $subId)->get();
        return $products;
    }

    //Filter click remember Function
    public function getSubcategoriesId(Request $request){
        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        return $subId;
    }

    public function filterByPrice(Request $request){
        $categoryId = $request->categoryId;
        $products = Product::whereBetween ('price',[$request->min, $request->max] )
                    ->where('category_id', $categoryId)
                    ->get();
        return $products;
    }
    //Search Product
    public function moreProducts(Request $request){
        if($request->search){
            $products = Product::where('name','like','%'.$request->search.'%')
            ->orWhere('description','like','%'.$request->search.'%')
            ->orWhere('price','like','%'.$request->search.'%')
            ->paginate(50);
            return view('website.shop',compact('products'));
        }

        $products = Product::latest()->paginate(50);
        return view('website.shop',compact('products'));
    }
   
}
