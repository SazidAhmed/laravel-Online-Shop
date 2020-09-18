@extends('layouts.app')
@section('content')
<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>


<div class="container-fluid my-5 py-3 ">
  <section class="mb-4 px-5">
    <div class="row">
      <div class="col-md-7 mb-md-0 mb-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title h1-responsive font-weight-bold text-center my-4">Order Items</h4>
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
              </tbody>
                @else
                <p class="text-center text-primary">You Don't Have Any Item To Order<p>
                <p class="text-center text-primary">You Can Add product From The Shop<p>
                <p class="text-center text-primary"><a href="{{ route('home')}}" class="btn btn-info btn-rounded">Shop</a><p>
                
                @endif
            </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 mb-md-0 mb-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title h1-responsive font-weight-bold text-center my-4">Checkout</h4><hr>
            <form id="payment-form" name="contact-form" action="{{route('cart.charge')}}" method="POST">@csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" class="form-control">
                    <label for="name" class="">Full Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="address" name="address" class="form-control">
                    <label for="address" class="">Address</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="city" name="city" class="form-control">
                    <label for="city" class="">City</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="state" name="state" class="form-control">
                    <label for="state" class="">State</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="postalcode" name="postalcode" class="form-control">
                    <label for="postalcode" class="">Postal Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="md-form mb-4">
                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>
                  </div>
                </div>
                <input type="hidden" name="amount" value="{{$amount}}">
              </div>
              <div class="text-center text-md-left">
                  <button type="submit" class="btn btn-success btn-rounded">Confirm Order</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  // Create a Stripe client.
window.onload=function(){
var stripe = Stripe('pk_test_51HPyGlAzRs5zRlc868rdPxDTnRirVFypXyFXUETjzKWkwwPdQRfawQfQiIwTnPVLRrREr8rwhtEfUP5y8O1ijxXO006uxbyjH2');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options={
    name:document.getElementById('name').value,
    address_line1:document.getElementById('address').value,
    address_city:document.getElementById('city').value,
    address_state:document.getElementById('state').value,
    address_zip:document.getElementById('postalcode').value,
  }

  stripe.createToken(card,options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
}
</script>
@endsection
