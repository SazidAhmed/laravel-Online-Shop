<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::get();
        return view('product.slider',compact('sliders'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'required|mimes:jpeg,png'
        ]);
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->storeAs('public/slider', $image);
        }else{
            $image = 'avatar2.png';
        }
        Slider::create([
            'name'=>$request->name,
            'image'=>$image
        ]);
        return redirect()->back()->with('message', 'Slider created successfully!');

    }
   
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        
        $image = $slider->image;
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->storeAs('public/slider', $image);
             \Storage::delete('public/slider/'.$slider->image); 
        }

        $slider->name= $request->name;
        $slider->image=$image;
        $slider->save();
        return redirect()->back()->with('message', 'Slider Updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        \Storage::delete('public/slider/'.$slider->image); 
        return redirect()->back()->with('message', 'Slider Deleted successfully!');
    }
}
