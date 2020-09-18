@extends('layouts.app')
@section('content')
<div class="container my-1 py-2">
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    @foreach($sliders as $key=>$slider)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
      <div class="view">
        <img class="d-block w-100" src="storage/slider/{{$slider->image}}"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">{{$slider->name}}</h3>
        <p>Slider Tag Line Here</p>
      </div>
    </div>
    @endforeach
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
</div>
  <!-- Product Wrapper -->
<div class="container my-2 py-5">
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
    <a href="{{ route('shop') }}">
    <button class="btn btn-outline-indigo btn-rounded btn-sm px-3 waves-effect">See More Products</button> </a>
  </section>
  <!--Section: Content-->
 
</div>
{{-- slider --}}
<div class="container my-5">
  <!-- Section:Card Slider -->
  <section>
    <h3 class="font-weight-bold text-center dark-grey-text mb-4">Featured Products</h3>
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
      <!-- Controls -->
      <div class="controls-top mb-4">
        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
          <i class="fas fa-chevron-left"></i>
        </a>
        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <!-- Indicators -->
      <ol class="carousel-indicators mb-n2">
        <li class="primary-color active" data-target="#multi-item-example" data-slide-to="0"></li>
        <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>
      </ol>
      <!-- Slides -->
      <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item pt-3 active">
          @foreach($randomActiveProducts as $product)
          <div class="col-md-4  mb-4">
            <div class="card card-ecommerce">
              <div class="view overlay">
                <img src="storage/product/{{$product->image}}" class="img-fluid"
                  alt="">
                <a href="{{ route('product.view',[$product->id]) }}">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body ">
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="{{ route('product.view',[$product->id]) }}" class="dark-grey-text">{{$product->name}}</a>
                  </strong>
                </h5>
                <span class="badge badge-danger mb-2">{{$product->category->name??''  }}</span>
                <span class="badge badge-info mb-2">{{$product->subcategory->name??''  }}</span>
                <!-- Card footer -->
                <div class="card-footer pb-0">
                  <div class="row mb-0">
                    <span class="float-left text-primary">
                      <strong>tk {{$product->price}}</strong>
                    </span>
                    <span class="float-right">
                      <a href="{{route('add.cart',[$product->id])}}" class="text-success" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fas fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                    <span class="float-right">
                      <a href="{{ route('product.view',[$product->id]) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Product Details">
                        <i class="fas fa-eye ml-3"></i>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Second slide -->
        <div class="carousel-item pt-3">
          @foreach($randomItemProducts as $product)
          <div class="col-md-4  mb-4">
            <div class="card card-ecommerce">
              <div class="view overlay">
                <img src="storage/product/{{$product->image}}" class="img-fluid"
                  alt="">
                <a href="{{ route('product.view',[$product->id]) }}"> 
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body ">
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="{{ route('product.view',[$product->id]) }}" class="dark-grey-text">{{$product->name}}</a>
                  </strong>
                </h5>
                <span class="badge badge-danger mb-2">{{$product->category->name??''  }}</span>
                <span class="badge badge-info mb-2">{{$product->subcategory->name??''  }}</span>
                <!-- Card footer -->
                <div class="card-footer pb-0">
                  <div class="row mb-0">
                    <span class="float-left text-primary">
                      <strong>tk {{$product->price}}</strong>
                    </span>
                    <span class="float-right">
                      <a href="{{route('add.cart',[$product->id])}}" class="text-success" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fas fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                    <span class="float-right">
                      <a href="{{ route('product.view',[$product->id]) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Product Details">
                        <i class="fas fa-eye ml-3"></i>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

  </section>
  <!-- Section: Block Content -->

</div>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>

@endsection
