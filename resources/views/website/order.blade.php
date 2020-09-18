@extends('layouts.app')
@section('content')
<div class="container my-5 py-3 ">
  <section class="mb-4">
    <div class="row">
      <div class="col-md-12 mb-md-0 mb-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title h1-responsive font-weight-bold text-center my-4">Order History</h4>
            @foreach($carts as $cart)
            <div class="table-responsive">
              <table class="table product-table mb-0">
                @if($cart)
                <!-- Table head -->
                <thead class="mdb-color cyan text-white">
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
                      {{$product['qty']}}
                    </td>
                    <td>
                      <h6 class="mt-3">
                      <strong>tk {{$product['price']*$product['qty']}}</strong>
                      </h6>
                    </td>
                    <td>
                    </td>
                  </tr>
                  @endforeach
                  <!--total Payment-->
                  <tr>
                    <td colspan="3">
                      <h4 class="mt-2">
                        <strong></strong>
                      </h4>
                    </td>
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
                </tbody>
                  @else
                  <p class="text-center text-primary">You Don't Have Any Item To Order<p>
                  <p class="text-center text-primary">You Can Add product From The Shop<p>
                  <p class="text-center text-primary"><a href="{{ route('home')}}" class="btn btn-info btn-rounded">Shop</a><p>
                  
                  @endif
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection