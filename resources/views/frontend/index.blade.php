@extends('layouts.frontend')



@section('content')



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
          
              @if($categories)
                @foreach($categories as $k => $category)
                  <div class="accordion-group">
                      <div class="accordion-heading">
                          <a href="#faq-{{$k}}" data-parent="#my-accordion" data-toggle="collapse" class="accordion-toggle"><h3 class="box-title">{{$category->translate($locale)->name}}</h3></a>
                      </div>
                      <div class="accordion-body collapse {{($k==0)?'in':''}}" id="faq-{{$k}}">
                      
                      @if(count($category->faqs) >0)
                          @foreach($category->faqs as $k1 => $faq)
                         
                            <div class="accordion-inner">
                            <div>
                            <b>{{$faq->translate($locale)->question}}</b><br>
                              {{$faq->translate($locale)->answer}}
                            </div>
                            </div><!-- .accordion-inner -->
                            @php if($k1==1)break; @endphp
                          @endforeach
                      @endif
                      </div><!-- .accordion-body -->
                  </div><!-- .accordion-group -->
                  @endforeach
              @endif
                
                 

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

    </section>  


@endsection

<script>

jQuery('document').ready(function() {
    jQuery('#my-accordion').on('show hide', function() {
        jQuery(this).css('height', 'auto');
    });
    jQuery('#my-accordion').collapse({ parent: true, toggle: true }); 
});
</script>