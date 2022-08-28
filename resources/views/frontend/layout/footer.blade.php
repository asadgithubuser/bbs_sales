   @include('frontend.partials.rightSidebar')
   
   <!-- footer -->
   <div class="footer">

    <div class="container w-75">
       <div class="row">
          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">Home</h6>
                <li><a href="#" target="_blank" class="card-link" >About Us</a></li>
                <li><a href="#" target="_blank" class="card-link">Contact</a></li>
             </ul>
          </div>

          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">User Manual</h6>
                <li><a href="#" class="card-link">User Guide</a></li>
                <li><a href="#" class="card-link">Your Question</a></li>
             </ul>
          </div>

          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">Other Links</h6>
                <li><a href="#" class="card-link" >Our Organization</a></li>
                <li><a href="#" class="card-link">Useful Application</a></li>
             </ul>
          </div>

       </div>
    </div>
    <!-- end of row -->
 </div>
 <!-- end of container -->
</div>
<!-- end of footer -->

<!-- end of footer -->
<div class="footer-bottom">
 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="fa fa-chevron-circle-up"></span></a>
</div>

</div> <!-- end of sc_main_container -->

</body>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('frontend/assets/js/tether.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script> 
   // Select2
   $('.select2').select2();
   $('.select3').select2();
   $('.select4').select2();
   $('.select22').select2();

   $('.select-multiple-publication').select2({
        dropdownAutoWidth: false,
        multiple: true,
        width: '100%',
        height: '30px',
        placeholder: "Select Publications",
        allowClear: true
    });
</script>

{{-- <script> 
   $('form')
       .each(function(){
           $(this).data('serialized', $(this).serialize())
       })
       .on('change input', function(){
           $(this)             
               .find('input:submit, button:submit')
                   .prop('', $(this).serialize() == $(this).data('serialized'))
           ;
       })
       .find('input:submit, button:submit')
           .prop('disabled', true)
   ;
</script> --}}

@include('backend.ajax.addressDynamic')
@include('backend.ajax.serviceItemDynamic')

@stack('frontScript')

</html>