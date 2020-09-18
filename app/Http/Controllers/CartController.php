<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use App\Mail\Sendmail;

use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CartController extends Controller
{
    public function addToCart(Product $product){
        //if session has cart then get the cart
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }//If session has no cart then instantiate a new cart
        else{
           $cart = new Cart();
        }
        $cart->add($product);
        // dd($cart);

        session()->put('cart',$cart);
        return redirect()->back()->with('message', 'Product Has Been Added To Cart');
    }

    public function showCart(){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }
        else{
           $cart = null;
        }
        // dd($cart);
        // dd($cart->items);
        return view('website.cart',compact('cart'));
    }

    public function updateCart(Request $request, Product $product){
        $request->validate(['qty'=>'required|numeric|min:1']);

        $cart = new Cart(session()->get('cart'));

        $cart->updateQty($product->id, $request->qty);
        session()->put('cart',$cart);
        return redirect()->back()->with('message', 'Cart Has Been Updated ');
    }

    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);

        if($cart->totalQty<=0){
            session()->forget('cart');
        }
        else{
            session()->put('cart',$cart);
        }
        return redirect()->back()->with('message', 'Product Has Been Removed ');

    }

    public function checkout($amount){

        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }
        else{
           $cart = null;
        }
        return view('website.checkout',compact('amount', 'cart'));
    }
    //Product Purchase method
    public function charge(Request $request){
        // return $request->stripeToken;
        $charge = Stripe::charges()->create([
            'currency'=>'USD',
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            'description'=>'Test',
        ]);

        $chargeId = $charge['id'];
        //mail
        // if(session()->has('cart')){
        //     $cart = new Cart(session()->get('cart'));
        // }
        // else{
        //    $cart = null;
        // }
        // \Mail::to(auth()->user()->email)->send(new Sendmail($cart));
        //order create
        if($chargeId){
            auth()->user()->orders()->create([
                'cart'=>serialize(session()->get('cart'))
            ]);

            session()->forget('cart');
            return redirect()->to('/')->with('message', 'Order Has Been Placed successfully ');
        }
        else{
            return redirect()->back()->with('message', 'Transaction Problem ! Please Try Again');
        }

    }

    //for Customer 
    public function order(){
        
        // $orders = Order::where('user_id',auth()->user()->id)->get();
        // dd($orders);
        $orders = auth()->user()->orders;
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        // dd($orders);
        // dd($carts);
        return view('website.order',compact('carts','orders'));

    }

    //for AdminPanel
    public function allOrder(){
        $allOrders = Order::latest()->get();
        return view('product.allorder',compact('allOrders'));

    }

    public function viewUserOrder($userid, $orderid){
        
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        return view('product.vieworder',compact('carts'));
    }


}
