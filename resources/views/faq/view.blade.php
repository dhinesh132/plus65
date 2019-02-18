@extends('layouts.admin')



@section('content')



<!-- Content Header (Page header) -->

    


    <!-- Main content -->

    <section class="content">

      <div class="box">

            <div class="box-header">

              <p> <a href = "{{url('admin/faq/category/create')}}" class="btn btn-success"> <i class="fa fa-plus"></i> Create Category </a></p>

            </div>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

              @if (session('status'))

            <div class="alert alert-info">

                {{ session('status') }}

            </div>

        @endif

          <div class="col-sm-12">
       
              
            
            <div class = "row" >
              <div class = "col-xs-3" style="float: right;">
                <div class = "form-group" >
                  <input type="text" class="form-control" id="nameInput" name="nameInput"
                    placeholder="Search here" onkeyup="searchKeyword()" <span class="input-group-btn">
                </div>
              </div>

              
            </div>
            
       
        </div>
        <br>

               <table class="table table-striped" id="myTable" style="border:1px solid #2ae0bb">

            <thead>

              <tr>

                <th>#</th>

                <th>Name</th>

                <th colspan = "2" width="4%">Actions</th>

              </tr>

            </thead>

            <tbody>

             

              

              <tr>

                <td>{{$category->translate('fr')->name}}</td>

                <td></td>


                

             
              

            </tbody>

        </table>




            </div>

        </div>

    </section>        



@endsection
