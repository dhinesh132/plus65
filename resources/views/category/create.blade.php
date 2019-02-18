@extends('layouts.admin')



@section('content')



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Create Category

      </h1>

     <ol class="breadcrumb">

        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Add Category</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            <div class="box-header">

              <h3 class="box-title">Please fill the form below to create a category!</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              @if ($errors->any())

                  <div class="alert alert-danger">

                      <ul>

                          @foreach ($errors->all() as $error)

                              <li>{{ $error }}</li>

                          @endforeach

                      </ul>

                  </div>

              @endif

              {!! Form::open(['method' => 'POST', 'action' => 'CategoryController@store', 'files' => false]) !!}

              <div class = "row">

              
              @if($locales)

              @foreach($locales as $k => $locale)
              <div class = "col-xs-6">

              <div class = "form-group">

              {{ Form::label('name', "Category ".ucfirst($locale)) }}:

              {{ Form::text("name-$locale", null, ['class'=>'form-control','placeholder' => "Enter Category Title ".ucfirst($locale)]) }}

              </div>

              </div>
              @endforeach

              @endif


              

            </div>



            <div class = "form-group">

              {{ Form::submit('Create Category', ['class'=>'btn btn-primary']) }}

            </div>  

              {!! Form::close() !!}

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  

@stop