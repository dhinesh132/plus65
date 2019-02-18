@extends('layouts.admin')



@section('content')



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Create FAQ

      </h1>

      <ol class="breadcrumb">

      <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{url('admin/categories')}}"><i class="fa fa-folder"></i> Category</a></li>
      <li><a href='{{url("admin/categories/faq/list/$catObj->id")}}'><i class="fa fa-folder"></i> FAQ</a></li>
      <li class="active">FAQ</li>

    </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            
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

              {!! Form::open(['method' => 'POST', 'action' => 'FaqController@store', 'files' => false]) !!}

              <div class = "row">

              
              @if($locales)

              @foreach($locales as $k => $locale)
              <div class = "col-xs-12">
                <div class = "form-group">
                <h3 class="box-title"><u>{{ucfirst($locale)}}</u></h3>
                </div>
              </div>

              <div class = "col-xs-6">

              <div class = "form-group">

              {{ Form::label('name', "Question:") }}:

              {{ Form::text("question-$locale", null, ['class'=>'form-control','placeholder' => "Enter Question"]) }}

              </div>

              </div>
              <div class = "col-xs-10">

              <div class = "form-group">

              {{ Form::label('Description', 'Answer:') }}
             
              {{ Form::textarea("answer-$locale", null, ['class'=>'form-control','placeholder' => 'Enter Answer']) }}

              </div>

              </div>

              @endforeach

              @endif


              

            </div>



            <div class = "form-group">
              <input type="hidden" name="category_id" value="{{$catObj->id}}">
              {{ Form::submit('Create FAQ', ['class'=>'btn btn-primary']) }}

            </div>  

              {!! Form::close() !!}

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  
    
@stop