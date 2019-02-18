<?php $__env->startSection('content'); ?>



<section class="content-header">

      <h1>

       FAQ

      </h1>
  

      
    </section>



    <!-- Main content -->

    <section class="content">

      <div class="box">

            

            <!-- /.box-header -->

            <div class="box-body">

             
            <div id="my-accordion" class="accordion">
          
              <?php if($categories): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="accordion-group">
                      <div class="accordion-heading">
                          <a href="#faq-<?php echo e($k); ?>" data-parent="#my-accordion" data-toggle="collapse" class="accordion-toggle"><h3 class="box-title"><?php echo e($category->translate($locale)->name); ?></h3></a>
                      </div>
                      <div class="accordion-body collapse <?php echo e(($k==0)?'in':''); ?>" id="faq-<?php echo e($k); ?>">
                      
                      <?php if(count($category->faqs) >0): ?>
                          <?php $__currentLoopData = $category->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                            <div class="accordion-inner">
                            <div>
                            <b><?php echo e($faq->translate($locale)->question); ?></b><br>
                              <?php echo e($faq->translate($locale)->answer); ?>

                            </div>
                            </div><!-- .accordion-inner -->
                            <?php if($k1==1)break; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      </div><!-- .accordion-body -->
                  </div><!-- .accordion-group -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
                
                 

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  


<?php $__env->stopSection(); ?>

<script>

jQuery('document').ready(function() {
    jQuery('#my-accordion').on('show hide', function() {
        jQuery(this).css('height', 'auto');
    });
    jQuery('#my-accordion').collapse({ parent: true, toggle: true }); 
});
</script>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>