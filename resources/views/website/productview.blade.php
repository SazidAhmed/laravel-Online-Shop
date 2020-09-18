@extends('layouts.app')
@section('content')

<div class="container my-5 py-5 z-depth-1">


  <!--Section: Content-->
  <section class="text-center">

    <!-- Section heading -->
    <h3 class="font-weight-bold mb-5">Product Details</h3>

    <div class="row">
      <div class="col-lg-6">

        <!--Carousel Wrapper-->
        <div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

          <!--Slides-->
          <div class="carousel-inner text-center text-md-left" role="listbox">
            <div class="carousel-item active">
              <img src="{{ asset('storage/product/'.$product->image) }}"  alt="First slide" class="img-fluid">
            </div>
          </div>
          <!--/.Slides-->

          <!--Thumbnails-->
          <a class="carousel-control-prev" href="#carousel-thumb1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-thumb1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Thumbnails-->

        </div>
        <!--/.Carousel Wrapper-->
        
      </div>

      <div class="col-lg-5 text-center text-md-left">

        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">{{$product->name}}</h2>
        <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">bestseller</span>
        <span class="badge badge-success product mb-4 ml-2">SALE</span>

        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
          <span class="red-text font-weight-bold">
            <strong>{{$product->price}}</strong>
          </span>
          <span >
            <small>
              tk
            </small>
          </span>
        </h3>

        <div class="font-weight-normal">
          
          <p class="ml-xl-0 ml-4">{!!$product->description!!}</p>
          <p class="ml-xl-0 ml-4">{!!$product->additional_info!!}</p>
          <!-- <div class="form-row ml-xl-0 ml-4 mb-4">
              <div class="md-form">
              <strong>Quantity:</strong>
                  <input type="number" value="1" class="form-control">
              </div>
          </div> -->
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus dolorem hic dolor dolores repellat vel maiores at, nobis itaque velit adipisci sint ducimus, error earum, cupiditate suscipit minus debitis accusamus!</p>
          
          <div class="mt-5">
            <div class="row mt-3 mb-4">
              <div class="col-md-12 text-center text-md-left text-md-right">
                <a href="{{route('add.cart',[$product->id])}}">
                <button class="btn btn-primary btn-rounded">
                  <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </section>
  <!--Section: Content-->
</div>
<div class="container my-5 py-5 z-depth-1">
  <h3 class="text-center">You May Also Like</h3>
  <!-- products -->
  <div class="row text-center">
    @foreach($productFromSameCategories as $product)
    <div class="col-lg-4 col-md-12 mb-4">

      <a href="{{ route('product.view',[$product->id]) }}" class="waves-effect waves-light">
        <img src="{{ URL::asset('storage/product/'.$product->image) }}" class="img-fluid" alt="">
      </a>

      <p class="mb-1"><a href="" class="font-weight-bold black-text">{{$product->name}}</a></p>

      <p class="mb-1"><small class="mr-1">tk</small><strong>{{$product->price}}</strong></p>

      <a href="{{route('add.cart',[$product->id])}}">
      <button type="button" class="btn btn-indigo btn-rounded btn-sm px-3">Add to Cart</button>
      </a>
      </a>
      <a href="{{ route('product.view',[$product->id]) }}">
      <button type="button" class="btn btn-outline-indigo btn-rounded btn-sm px-3 waves-effect">Details</button>
      </a>

    </div>
    @endforeach
  </div>

</div>

@endsection