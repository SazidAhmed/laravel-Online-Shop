@extends('layouts.admin.app')

@section('content')

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
              <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form and <code>has-warning, has-success, has-danger & has-error</code> for various inputs. For input with icon add <code>has-feedback</code> class.</h6>
              <form class="floating-labels m-t-40">
                  <div class="form-group m-b-40">
                      <input type="text" class="form-control input-lg" id="input8"><span class="bar"></span>
                      <label for="input8">Large Input</label>
                  </div>
                  <div class="form-group m-b-40">
                      <input type="text" class="form-control input-sm" id="input9"><span class="bar"></span>
                      <label for="input9">Small Input</label>
                  </div>
                  <div class="form-group has-warning m-b-40">
                      <input type="text" class="form-control" id="input10"><span class="bar"></span>
                      <label for="input10">Warning State</label>
                  </div>
                  <div class="form-group has-success m-b-40">
                      <input type="text" class="form-control" id="input11"><span class="bar"></span>
                      <label for="input11">Success State</label>
                  </div>
                  <div class="form-group has-error has-danger m-b-40">
                      <input type="text" class="form-control" id="input12"><span class="bar"></span>
                      <label for="input12">Error State</label>
                  </div>
                  <div class="form-group has-warning has-feedback m-b-40">
                      <input type="text" class="form-control form-control-warning" id="input13"><span class="bar"></span>
                      <label for="input13">Warning State With Feedback</label>
                  </div>
                  <div class="form-group has-success has-feedback m-b-40">
                      <input type="text" class="form-control form-control-success" id="input14"><span class="bar"></span>
                      <label for="input14">Success State With Feedback</label>
                  </div>
                  <div class="form-group has-danger has-error has-feedback m-b-5">
                      <input type="text" class="form-control form-control-danger" id="input15"><span class="bar"></span>
                      <label for="input15">Error State With Feedback</label>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Validation with Custom Styles -->
<div class="card">
  <div class="card-body">
      <h4 class="card-title">Validation with Custom Styles</h4>
      <form class="needs-validation" novalidate>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">First name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
              </div>
              <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom03">City</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom04">State</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom05">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
      </form>
  </div>
</div>
<!-- Supported Elements -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Supported Elements</h4>
        <form class="was-validated">
            <div class="mb-3">
                <label for="validationTextarea">Textarea</label>
                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                  Please enter a message in the textarea.
                </div>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2custom" required>
                <label class="form-check-label" for="invalidCheck2custom">
                    Check this custom checkbox
                </label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>
            <div class="custom-control custom-radio pl-0">
                <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
            </div>
            <div class="custom-control custom-radio mb-3 pl-0">
                <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
                <div class="invalid-feedback">More example invalid feedback text</div>
            </div>
            <div class="form-group">
                <select class="custom-select" required>
                  <option value="">Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
        </form>
    </div>
</div>
<!-- Validation with Tooltips -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Validation with Tooltips</h4>
        <form class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationTooltip01">First name</label>
              <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationTooltip02">Last name</label>
              <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationTooltipUsername">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                <div class="invalid-tooltip">
                  Please choose a unique and valid username.
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationTooltip03">City</label>
              <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
              <div class="invalid-tooltip">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip04">State</label>
              <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
              <div class="invalid-tooltip">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationTooltip05">Zip</label>
              <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
              <div class="invalid-tooltip">
                Please provide a valid zip.
              </div>
            </div>
          </div>
          <button class="btn btn-primary mt-4" type="submit">Submit form</button>
        </form>
    </div>
</div>


<!-- File Upload -->

<div class="container-fluid">

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Forms</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <div class="chart-text m-r-10">
                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                <div class="spark-chart">
                    <div id="monthchart"></div>
                </div>
            </div>
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <div class="chart-text m-r-10">
                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                <div class="spark-chart">
                    <div id="lastmonthchart"></div>
                </div>
            </div>
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload1</h4>
                <label for="input-file-now">Your so fresh input file — Default version</label>
                <input type="file" id="input-file-now" class="dropify" />
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload2</h4>
                <label for="input-file-now-custom-1">You can add a default value</label>
                <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="../assets/plugins/dropify/src/images/test-image-1.jpg" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload3</h4>
                <label for="input-file-now-custom-2">You can set the height</label>
                <input type="file" id="input-file-now-custom-2" class="dropify" data-height="500" />
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload4</h4>
                <label for="input-file-now-custom-3">You can combine options</label>
                <input type="file" id="input-file-now-custom-3" class="dropify" data-height="500" data-default-file="../assets/plugins/dropify/src/images/test-image-2.jpg" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload5</h4>
                <label for="input-file-max-fs">You can add a max file size</label>
                <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Upload6</h4>
                <label for="input-file-disable-remove">You can disable remove button</label>
                <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" />
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
            <ul class="m-t-20 chatonline">
                <li><b>Chat option</b></li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>

@endsection
