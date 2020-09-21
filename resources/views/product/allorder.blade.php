@extends('layouts.admin.app')

@section('content')

  <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
          <h3 class="text-themecolor">Dashboard</h3>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>
      </div>
  </div>
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

  <div class="row">
    <!-- order -->
    <div class="col-lg-8 col-xlg-8 col-md-12">
      <div class="ribbon-wrapper card">
        <div class="ribbon ribbon-bookmark ribbon-danger">Customer & Orders</div>
        <div class="card-body">
           <!-- Create modal -->
          <div class="align-self-center">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Index</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allOrders as $key=>$order)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$order->user->name}}</td>
                  <td>{{$order->user->email}}</td>
                  <td>{{$order->user->mobile}}</td>
                  <td>{{$order->user->address}}</td>
                  <td>{{date('d-M-y', strtotime($order->created_at))}}</td>     
                 <td>
                    <!-- View button -->
                    <a href="{{route('user.order',[$order->user_id,$order->id])}}"><i class="material-icons text-info ">visibility</i></a>
                    <!-- edit button -->
                    <a data-toggle="modal" href="#editmodaluser{{$order->id}}"><i class="material-icons text-success">edit</i></a>
                    <!-- Delete button -->
                    <a data-toggle="modal" href="#deletemodaluser{{$order->id}}"><i class="material-icons text-danger">delete</i></a>
                 </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Action Modal -->

@foreach($allOrders as $key=>$order)
<!-- View Modal -->

<!-- Delete Modal -->
<div id="deletemodaluser{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <form action="#" method="post">@csrf
    {{method_field('DELETE')}}
      <div class="modal-content">
        <div class="ribbon-wrapper">
          <div class="ribbon ribbon-bookmark ribbon-primary">Product : {{$order->name}}</div>
        </div>
        <div class="modal-body">
          <h4 class="text-center">Confirm To Delete</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-rounded btn-danger"
              data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-rounded btn-success">Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!--Edit Modal -->
<div id="editmodaluser{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="floating-labels m-t-40" id="proForm" action="#" method="post" enctype="multipart/form-data">@csrf
      {{method_field('PATCH')}}
      <div class="modal-content">
        <div class="ribbon-wrapper">
          <div class="ribbon ribbon-bookmark ribbon-primary">Update</div>
        </div>
        <div class="modal-body">
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="ename" name="name"><span class="bar"></span>
            <label for="ename">Name</label>
          </div>
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="eemail" name="email"><span class="bar"></span>
            <label for="eemail">Email</label>
          </div>
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="epassword" name="password"><span class="bar"></span>
            <label for="epassword">Password</label>
          </div>
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="ephone" name="phone"><span class="bar"></span>
            <label for="ephone">Mobile</label>
          </div>
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="eaddress" name="address"><span class="bar"></span>
            <label for="eaddress">Address</label>
          </div>
          <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="erole" name="is_admin"><span class="bar"></span>
            <label for="erole">Role</label>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-rounded btn-danger"
              data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-rounded btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach


@endsection
