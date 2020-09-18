@extends('layouts.admin.app')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card m-b-0">
                  <!-- .chat-row -->
                  <div class="chat-main-box">
                      <!-- .chat-left-panel -->
                      <div class="chat-left-aside">
                          <div class="open-panel"><i class="ti-angle-right"></i></div>
                          <div class="chat-left-inner">
                              <div class="form-material">
                                  <input class="form-control p-20" type="text" placeholder="Search Contact">
                              </div>
                              <ul class="chatonline style-none ">
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)" class="active"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
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
                                  <li class="p-20"></li>
                              </ul>
                          </div>
                      </div>
                      <!-- .chat-left-panel -->
                      <!-- .chat-right-panel -->
                      <div class="chat-right-aside">
                          <div class="chat-main-header">
                              <div class="p-20 b-b">
                                  <h3 class="box-title">Chat Message</h3>
                              </div>
                          </div>
                          <div class="chat-rbox">
                              <ul class="chat-list p-20">
                                  <li>
                                      <div class="chat-img"><img src="{{ asset('assets/images/chat.jpg')}}" alt="user" /></div>
                                      <div class="chat-content">
                                          <div class="box bg-light-inverse">Hi
                                          
                                          </div>
                                      </div>
                                  </li>
                                 
                                  <!--Row -->
                                  <li class="reverse">
                                      <div class="chat-content">
                                          <div class="box bg-light-inverse">Hello</div>
                                      </div>
                                  </li>
                                  
                              </ul>
                          </div>
                          <div class="card-body b-t">
                              <div class="row">
                                  <div class="col-8">
                                      <textarea placeholder="Type your message here" class="form-control b-0"></textarea>
                                  </div>
                                  <div class="col-4 text-right">
                                      <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- .chat-right-panel -->
                  </div>
                  <!-- /.chat-row -->
              </div>
          </div>
      </div>
    </div>
</div>

@endsection