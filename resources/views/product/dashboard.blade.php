@extends('layouts.admin.app')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Website</a></li>
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


<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-light">{{App\Category::get()->count()}}</h3>
                            <h5 class="text-muted m-b-0">Total Orders</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{App\Product::get()->count()}}</h3>
                            <h5 class="text-muted m-b-0">New Orders</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{App\Order::get()->count()}}</h3>
                            <h5 class="text-muted m-b-0">Delivery On Process</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-bullseye"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{App\Order::get()->count()}}</h3>
                            <h5 class="text-muted m-b-0">Returned</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-primary">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                        <div>
                            <h3 class="card-title">Registerd Customers</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <h2 class="font-light text-white text-center">50</h2>
                        </div>
                        <div class="col-8 p-t-10 p-b-20 align-self-center">
                            <div class="usage chartist-chart" style="height:65px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card card-inverse card-success">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                        <div>
                            <h3 class="card-title">Products In Stock</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <h2 class="font-light text-white text-center">30</h2>
                        </div>
                        <div class="col-8 p-t-10 p-b-20 text-right">
                            <div class="spark-count" style="height:65px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                        <div>
                            <h3 class="card-title">Total Revenue</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <h2 class="font-light text-white text-center">50</h2>
                        </div>
                        <div class="col-8 p-t-10 p-b-20 align-self-center">
                            <div class="usage chartist-chart" style="height:65px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <h4 class="card-title">Recent Orders</h4>
                    </div>
                    <div class="table-responsive m-t-20">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Assigned</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th>Budget</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:50px;"><span class="round">S</span></td>
                                    <td>
                                        <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small></td>
                                    <td>Elite Admin</td>
                                    <td><span class="label label-success">Low</span></td>
                                    <td>$3.9K</td>
                                </tr>
                                <tr class="active">
                                    <td><span class="round"><img src="../assets/images/users/2.jpg" alt="user" width="50"></span></td>
                                    <td>
                                        <h6>Andrew</h6><small class="text-muted">Project Manager</small></td>
                                    <td>Real Homes</td>
                                    <td><span class="label label-info">Medium</span></td>
                                    <td>$23.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-success">B</span></td>
                                    <td>
                                        <h6>Bhavesh patel</h6><small class="text-muted">Developer</small></td>
                                    <td>MedicalPro Theme</td>
                                    <td><span class="label label-primary">High</span></td>
                                    <td>$12.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-primary">N</span></td>
                                    <td>
                                        <h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small></td>
                                    <td>Elite Admin</td>
                                    <td><span class="label label-danger">Low</span></td>
                                    <td>$10.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-warning">M</span></td>
                                    <td>
                                        <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small></td>
                                    <td>Helping Hands</td>
                                    <td><span class="label label-warning">High</span></td>
                                    <td>$12.9K</td>
                                </tr>
                                <tr>
                                    <td><span class="round round-danger">N</span></td>
                                    <td>
                                        <h6>Johnathan</h6><small class="text-muted">Graphic</small></td>
                                    <td>Digital Agency</td>
                                    <td><span class="label label-info">High</span></td>
                                    <td>$2.6K</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection