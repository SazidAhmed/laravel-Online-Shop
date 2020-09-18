@extends('layouts.app')
@section('content')
<div class="container my-5 py-5">
  <div class="row ml-2 mb-5">
    @foreach(App\Category::all() as $cat)
    <a href="{{ route('product.list',[$cat->slug]) }}">
    <button type="button" class="btn btn-outline-indigo btn-rounded btn-sm px-3 waves-effect">{{$cat->name}}</button>
    </a>
    @endforeach
  </div>
  <div class="row">
      <!--SubCategories -->
    <div class="col-md-2">
      <h4>SubCategories</h4>
      <form action="{{ route('product.list',[$slug]) }}" method="GET">
        @foreach($subcategories as $subcategory)
        <ul class="list-group">
          <li class="list-group-item list-group-item-info"><input type="checkbox" name="subcategory[]" value="{{$subcategory->id}}"
            @if(isset($filterSubcategories))
              {{in_array($subcategory->id, $filterSubcategories)?'checked ="checked" ' :''}}
            @endif
          > {{ $subcategory->name }}
          </li>
        </ul>
        @endforeach
        <input type="submit" value="filter" class="btn aqua-gradient btn-rounded btn-sm my-2">
      </form>
      <br>
      <h4>Filter By Price</h4>
      <form action="{{ route('product.list',[$slug]) }}" method="GET">
        <ul class="list-group">
          <li class="list-group-item list-group-item-info">
            <input type="text" name="min" class="form-control" placeholder="Minimum" required=""><hr>
            <input type="text" name="max" class="form-control" placeholder="Maximum" required="">
            <input type="hidden" name="categoryId" value="{{$categoryId}}">
          </li>
        </ul>
        <input type="submit" value="filter" class="btn aqua-gradient btn-rounded btn-sm my-2">
      </form>
      <hr>
      <a href="{{ route('product.list',[$slug]) }}" class="btn peach-gradient  my-2">Refresh</a>
    </div>
    <div class="col-md-10">
      <div class="row text-center">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-4 mb-4">

          <a href="{{ route('product.view',[$product->id]) }}" class="waves-effect waves-light">
            <img src="{{ URL::asset('storage/product/'.$product->image) }}" class="img-fluid" alt="">
          </a>
          
          <p class="mb-1"><a href="" class="font-weight-bold black-text">{{$product->name}}</a></p>

          <p class="mb-1"><small class="mr-1">tk</small><strong>{{$product->price}}</strong></p>
          <a href="{{route('add.cart',[$product->id])}}">
          <button type="button" class="btn purple-gradient btn-rounded btn-sm px-3">Add to Cart</button>
          </a>
          <a href="{{ route('product.view',[$product->id]) }}">
          <button type="button" class="btn blue-gradient btn-rounded btn-sm px-3">Details</button>
          </a>

        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
@endsection
