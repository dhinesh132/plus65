<?php $__env->startSection('content'); ?>



<!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Update FAQ

      </h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

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

              <?php if($errors->any()): ?>

                  <div class="alert alert-danger">

                      <ul>

                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <li><?php echo e($error); ?></li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </ul>

                  </div>

              <?php endif; ?>

              <?php echo Form::model($faqObj,['method' =>'PATCH','action' => ['FaqController@update',$faqObj->id]]); ?>


              <div class = "row">

               

              <?php if($locales): ?>

              <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class = "col-xs-12">
                <div class = "form-group">
                <h3 class="box-title"><u><?php echo e(ucfirst($locale)); ?></u></h3>
                </div>
              </div>

              <div class = "col-xs-6">

              <div class = "form-group">

              <?php echo e(Form::label('name', "Question:")); ?>:

              <?php echo e(Form::text("question-$locale", $faqObj->translate($locale)->question, ['class'=>'form-control','placeholder' => "Enter Question"])); ?>


              </div>

              </div>
              <div class = "col-xs-10">

              <div class = "form-group">

              <?php echo e(Form::label('Description', 'Answer:')); ?>

             
              <?php echo e(Form::textarea("answer-$locale", $faqObj->translate($locale)->answer, ['class'=>'form-control','placeholder' => 'Enter Answer'])); ?>


              </div>

              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>




              

            </div>



            <div class = "form-group">

              <?php echo e(Form::submit('Update', ['class'=>'btn btn-primary'])); ?>


            </div>  

              <?php echo Form::close(); ?>


            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>