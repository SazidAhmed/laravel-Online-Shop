@extends('layouts.app')
@section('content')

<div class="container my-5 py-3 z-depth-1 rounded">

  <div class="row justify-content-end">
    @if(Session::has('message'))
    <div class="alert alert-rounded alert-success">
      {{Session::get('message')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    @endif

    @if ($errors->any())
      @foreach ($errors->all() as $error) 
        <div class="alert alert-rounded alert-danger">
          {{ $error }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
      @endforeach
    @endif
  </div>
  <!--Section: Content-->
  <section class="dark-grey-text">

    <!-- Shopping Cart table -->
    <div class="table-responsive">

      <table class="table product-table mb-0">
        @if($cart)
        <!-- Table head -->
        <thead class="mdb-color deep-purple text-white">
          <tr>
            <th></th>
            <th class="font-weight-bold">
              <strong>Product</strong>
            </th>
            <th></th>
            <th class="font-weight-bold">
              <strong>Price</strong>
            </th>
            <th class="font-weight-bold">
              <strong>Quantity</strong>
            </th>
            <th class="font-weight-bold">
              <strong>Amount</strong>
            </th>
            <th></th>
          </tr>
        </thead>
        <!-- /.Table head -->
       
        <!-- Table body -->
        <tbody>
          <!-- Cart items-->
          @foreach($cart->items as $product)
          <tr>
            <th scope="row">
              <img src="{{ URL::asset('storage/product/'.$product['image']) }}" alt="" class="img-fluid z-depth-0">
            </th>
            <td>
              <h5 class="mt-3">
                <strong>{{$product['name']}}</strong>
              </h5>
            </td>
            <td></td>
            <td>
              <h6 class="mt-3">
                tk {{$product['price']}}</td>
              </h6>
            <td>
              <form action="{{route('cart.update',$product['id'])}}" method="POST">@csrf
                <input type="number" name="qty" value="{{$product['qty']}}" aria-label="Search" class="form-control" style="width: 100px">
                <button class="btn btn-cyan btn-rounded btn-sm"><i class="fas fa-sync"></i> Update</button>
              </form>
            </td>
            <td>
              <h6 class="mt-3">
              <strong>tk {{$product['price']*$product['qty']}}</strong>
              </h6>
            </td>
            <td>
              <form action="{{route('cart.remove',$product['id'])}}" method="POST">@csrf
              <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                title="Remove Product">X
              </button>
              </form>
            </td>
          </tr>
          @endforeach
          <!--total Payment-->
          <tr>
            <td colspan="3"></td>
            <td></td>
            <td >
              <h4 class="mt-2">
                <strong>Total Amount</strong>
              </h4>
            </td>
            <td class="mt-2 ">
              <h4 class="mt-2">
                <strong>{{$cart->totalPrice}} Taka</strong>
              </h4>
            </td>
            <td colspan="3" class="text-right">
              
            </td>
          </tr>
          <tr>
            <td colspan="3" class="text-left">
              <a href="{{ route('home')}}">
              <button type="button" class="btn btn-info btn-rounded "> <i class="fas fa-angle-left left"></i>Shop</button>
              </a>
            </td>
            <td></td>
            <td colspan="3" class="text-right">
              <a href="{{ route('cart.checkout',$cart->totalPrice)}}">
              <button type="button" class="btn btn-success btn-rounded ">CheckOut
                <i class="fas fa-angle-right right"></i>
              </button>
              </a>
            </td>
          </tr>
        </tbody>
          @else
          <p class="text-center text-primary">No Item In The Cart<p>
          <p class="text-center text-primary">You Can Add product From The Shop<p>
          <p class="text-center text-primary"><a href="{{ route('home')}}" class="btn btn-info btn-rounded">Shop</a><p>
          @endif
      </table>
    </div>
    <!-- /.Shopping Cart table -->

  </section>
  <!--Section: Content-->


</div>

@endsection
