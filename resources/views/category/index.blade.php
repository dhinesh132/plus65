@extends('layouts.admin')



@section('content')



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Category

      </h1>

      <ol class="breadcrumb">

        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Category</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            <div class="box-header">

              <p> <a href = "{{url('admin/categories/create')}}" class="btn btn-success"> <i class="fa fa-plus"></i> Create Category </a></p>

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

                <th colspan = "3" width="4%">Actions</th>

              </tr>

            </thead>

            <tbody>

              @if($categories)



              @foreach($categories as $k => $category)

              

              <tr>

                <td>{{$k+1}}</td>

                <td>{{$category->name}}</td>

                <td>

                  <a href="{{url("admin/categories/faq/list/$category->id")}}" title = "Manage FAQ" class="btn btn-warning"> <i class="fa fa-question-circle-o"></i> Manage FAQ</a>

                </td>

                <td>
                  <a href="{{url("admin/categories/$category->id/edit")}}" title = "Edit" class="btn btn-primary"> <i class="fa fa-eye"></i> View / Edit</a>

                </td>
                
               

                <td>

                  <a href="#" onclick="delete_record('{{url("admin/categories/delete/$category->id")}}');" title = "Delete" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</a>

                </td>

              </tr>

              @endforeach

              @endif

              

            </tbody>

        </table>



        {{ $categories->links() }}

            </div>

        </div>

    </section>        



@endsection

<script>

function searchKeyword() {
 var input, filter, table, tr, td,tds,i,td2,td3,td4,td5;
  input = document.getElementById("nameInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];

    if (td || td2|| td3|| td4|| td5) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>