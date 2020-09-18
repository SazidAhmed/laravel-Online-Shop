@extends('layouts.app')
@section('content')
  <!-- Product Wrapper -->
  <div class="container my-5 py-5">
    <!-- Search form -->
  <form class="form-inline md-form mr-auto mb-4" action="{{route('shop')}}" method="GET">
      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Product Here" aria-label="Search">
      <button class="btn btn-outline-info btn-rounded btn-sm my-0" type="submit">Search</button>
    </form>
    
    <br><br>
    <section class="text-center">
      <div class="row ml-2 mb-5">
        @foreach(App\Category::all() as $cat)
        <a href="{{ route('product.list',[$cat->slug]) }}">
        <button type="button" class="btn btn-outline-indigo btn-rounded btn-sm px-3 waves-effect">{{$cat->name}}</button>
        </a>
        @endforeach
      </div>
      <!-- products -->
      <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-4 col-sm-6 col-6  mb-4">
  
          <a href="product/{{$product->id}}" class="waves-effect waves-light">
            <img src="{{ URL::asset('storage/product/'.$product->image) }}" class="img-fluid" alt="">
          </a>
          
          <p class="mb-1"><a href="{{ route('product.view',[$product->id]) }}" class="font-weight-bold black-text">{{$product->name}}</a></p>
  
          <p class="mb-1"><small class="mr-1">tk</small><strong>{{$product->price}}</strong></p>
  
          <a href="{{route('add.cart',[$product->id])}}">
          <button type="button" class="btn purple-gradient btn-rounded btn-sm px-3">Add to Cart</button>
          </a>
          <a href="product/{{$product->id}}">
          <button type="button" class="btn blue-gradient btn-rounded btn-sm px-3">Details</button>
          </a>
  
        </div>
        @endforeach
      </div><br><br>
      {!! $products->render() !!}

    </section>
    <!--Section: Content-->
  </div>
@endsection