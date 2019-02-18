<?php $__env->startSection('content'); ?>



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Category

      </h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Category</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            <div class="box-header">

              <p> <a href = "<?php echo e(url('admin/categories/create')); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Create Category </a></p>

            </div>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

              <?php if(session('status')): ?>

            <div class="alert alert-info">

                <?php echo e(session('status')); ?>


            </div>

        <?php endif; ?>

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

              <?php if($categories): ?>



              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              

              <tr>

                <td><?php echo e($k+1); ?></td>

                <td><?php echo e($category->name); ?></td>

                <td>

                  <a href="<?php echo e(url("admin/categories/faq/list/$category->id")); ?>" title = "Manage FAQ" class="btn btn-warning"> <i class="fa fa-question-circle-o"></i> Manage FAQ</a>

                </td>

                <td>
                  <a href="<?php echo e(url("admin/categories/$category->id/edit")); ?>" title = "Edit" class="btn btn-primary"> <i class="fa fa-eye"></i> View / Edit</a>

                </td>
                
               

                <td>

                  <a href="#" onclick="delete_record('<?php echo e(url("admin/categories/delete/$category->id")); ?>');" title = "Delete" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</a>

                </td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>

              

            </tbody>

        </table>



        <?php echo e($categories->links()); ?>


            </div>

        </div>

    </section>        



<?php $__env->stopSection(); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>