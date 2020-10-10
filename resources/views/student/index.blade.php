@extends('layouts.master')
@section('title')
        <title>Students </title>
@endsection
@section('content')
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Students <small>Details</small></h3>
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
@if(session()->has('msg'))
  <div class="alert alert-success">{{session()->get('msg')}}</div>
@endif
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students</h2>
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


                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Class</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($students as $student)
                                <tr>
                          <td>#</td>
                          <td>
                            <a>{{$student->Fname}}</a>
                          </td>
                            <td>
                            <a>{{$student->Lname}}</a>
                          </td>
                            <td>
                            <a>{{$student->email}}</a>
                         
                          </td>
                            <td>
                            <a>{{$student->address}}</a>
                           
                          </td>
                            <td>
                            <a>{{$student->class}}</a>
                            
                          </td>
                          
                     
                          <td>
                    <form method="POST" action="{{route('Student.destroy',$student->id)}}" >

                          @csrf
                          @method('DELETE')
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete </button>
                          <a href="{{route('Student.edit',$student->id)}}"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                          </td>
                    </form>

                        </tr>


                      @endforeach
                      
                      </tbody>
                    </table>
                    {{$students->links()}}
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection