@extends('layouts.master')
@section('title')
        <title>Student edit </title>

@endsection

@section('content')
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Register</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
@if(session()->has('msg'))
  <div class="alert alert-success">{{session()->get('msg')}}</div>
@endif
  <form class="form-horizontal form-label-left"  method="POST" action="{{route('Student.update',$student->id)}}">
              <input type="hidden" name="_method" value="PUT">

@csrf
                      <span class="section">{{$student->Fname}}| </span>
  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{$student->Fname}}" type="text" name="Fname" placeholder="First Name" class="form-control col-md-7 col-xs-12" >
                                     <span class="text-danger" >

                               {{$errors->has('Fname')?$errors->first('Fname'): ''}} </span>

                        </div>
                      </div>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="{{$student->Lname}}" name="Lname" placeholder="Last Name" class="form-control col-md-7 col-xs-12" >
                                                                     <span class="text-danger" >

                                 {{$errors->has('Lname')?$errors->first('Lname'): ''}} </span>

                        </div>
                      </div>
                             <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"value="{{$student->email}}" name="email" placeholder="email" class="form-control col-md-7 col-xs-12" >
                                                                     <span class="text-danger" >

                            {{$errors->has('email')?$errors->first('email'): ''}}</span>

                        </div>
                      </div>
                                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="{{$student->address}}" name="address" placeholder="address" class="form-control col-md-7 col-xs-12" >
                                                                     <span class="text-danger" >

                        {{$errors->has('address')?$errors->first('address'): ''}} </span>
                        </div>
                      </div>
                                 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Class <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="{{$student->class}}" name="class" placeholder="class" class="form-control col-md-7 col-xs-12" >
                                                                     <span class="text-danger" >

                        {{$errors->has('class')? $errors->first('class'): ''}} </span>
                        </div>
                      </div>
                   
               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection