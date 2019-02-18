@extends('layouts.admin')



@section('content')



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Update FAQ

      </h1>

      <ol class="breadcrumb">

        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Edit Category</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            <div class="box-header">

              <h3 class="box-title">Please fill the form below to update the faq!</h3>

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

              {!! Form::model($faqObj,['method' =>'PATCH','action' => ['FaqController@update',$faqObj->id]]) !!}

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

              {{ Form::text("question-$locale", $faqObj->translate($locale)->question, ['class'=>'form-control','placeholder' => "Enter Question"]) }}

              </div>

              </div>
              <div class = "col-xs-10">

              <div class = "form-group">

              {{ Form::label('Description', 'Answer:') }}
             
              {{ Form::textarea("answer-$locale", $faqObj->translate($locale)->answer, ['class'=>'form-control','placeholder' => 'Enter Answer']) }}

              </div>

              </div>

              @endforeach

              @endif




              

            </div>



            <div class = "form-group">

              {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}

            </div>  

              {!! Form::close() !!}

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  

@stop