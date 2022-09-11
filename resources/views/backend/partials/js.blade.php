
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/datatables/advanced/column-rendering.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>
<script src="{{asset('assets/js/pages/features/charts/apexcharts.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/js/pages/crud/forms/editors/summernote.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/barcodes/JsBarcode.code128.min.js"></script>
<!--end::Page Vendors-->



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
 
 <script>
    function CreatePDFfromHTML() {
        var HTML_Width = $(".html-content").width();
        var HTML_Height = $(".html-content").height();

        var top_left_margin = 1;

        var PDF_Width = HTML_Width + (top_left_margin * 1);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2 );

        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


        html2canvas($(".html-content")[0]).then(function (canvas) {

            var imgData = canvas.toDataURL("image/jpeg", 1);

            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);

            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

            for (var i = 1; i <= totalPDFPages; i++) {

                pdf.addPage(PDF_Width, PDF_Height);

                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);

              }
            pdf.save("Certificate.pdf");
           // {{--  $(".html-content").hide();  --}}
        });
    }
  $('#cmd').click(function() {
    CreatePDFfromHTML() ;
  });
 </script>



<script>
    function CreatePDFCourseCalender() {
        var HTML_Width = $(".courseListCalender").width();
        var HTML_Height = $(".courseListCalender").height();
        var top_left_margin = 1;
        var PDF_Width = HTML_Width + (top_left_margin * 1);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2 );
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($(".courseListCalender")[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
              }
            pdf.save("Certificate.pdf");
           // {{--  $(".html-content").hide();  --}}
        });
    }
  $('#downloadCourseCalender').click(function() {
    CreatePDFCourseCalender() ;
  });
 </script>








<script>
    //after window is loaded completely 
    window.onload = function(){
        //hide the preloader
        document.querySelector(".bbs-loader-wrapper").style.display = "none";
    }
</script>

<script> 
    // Select2
    $('.select2').select2();
    $('.select3').select2();
    $('.select4').select2();
    $('.select22').select2();
    $('.select-multiple').select2({
        dropdownAutoWidth: false,
        multiple: true,
        width: '100%',
        height: '30px',
        placeholder: "Select An Option",
        allowClear: true
    });
    $('.select2-selection--multiple .select2-search__field').css('width', '100%');

    $('.select-multiple-additional').select2({
        dropdownAutoWidth: false,
        multiple: true,
        width: '100%',
        height: '30px',
        placeholder: "Select One or More",
        allowClear: true
    });
</script>


<script> 
    // $('form')
    //     .each(function(){
    //         $(this).data('serialized', $(this).serialize())
    //     })
    //     .on('change input', function(){
    //         $(this)             
    //             .find('input:submit, button:submit')
    //                 .prop('disabled', $(this).serialize() == $(this).data('serialized'))
    //         ;
    //     })
    //     .find('input:submit, button:submit')
    //         .prop('disabled', true);

    // $('form').find('#course_list_btn')
    //         .prop('disabled', false);

    // $('form').find('.wing-modal-confirm')
    //         .prop('disabled', false);
</script>

<script> 

    // $('.wing-modal-confirm').on('click', function(){
    //     var allItems =[]
    //     const data = [...document.querySelectorAll('.dept_list_item:checked')].map(e => e.value);
    //     allItems.push(data)
    //     var course_id = $('#course_id').val();
      
    //     $.ajax({
    //         type: 'POST',
    //         url: "{{ route('admin.calender.sendCalenderList') }}",
    //         data: {_token:$('input[name=_token]').val(), dept_ids: allItems[0], course_id: course_id},
    //         success:function(response){
                
    //         }

    //     });

    // })
</script>

<script> 


    $('.create-trainee-list').on('click', function(){
        var traineeIds =[]
        const seleted_data = [...document.querySelectorAll('.trainee_candidate_cls:checked')].map(e => e.value);
        traineeIds.push(seleted_data)
        
        var training_list_id = $('#training_list_id').val();
    
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.course.createTraineeList', 900) }}",
            data: {_token:$('input[name=_token]').val(), training_list_id:training_list_id, trainee_ids: traineeIds[0]},
            success:function(response){
                    $('#sendToWingModal').modal("hide");
                    location.reload();
                    
            }

        });

    })
</script>


<!-- Ajax Files -->
@include('backend.ajax.addressDynamic')
@include('backend.ajax.designationDynamic')
@include('backend.ajax.serviceItemDynamic')
@include('backend.ajax.searchFilter')
@include('backend.ajax.searchUser')
@include('backend.ajax.notification')

<!-- Stack Scripts -->
@stack('stackScript')
