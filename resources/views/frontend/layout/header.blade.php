<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Welcome to BBS</title>
   <link rel="icon" type="image/ico" href="{{asset('frontend/assets/images/favicon.ico')}}"/>
   <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/baguetteBox.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/gallery-grid.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



   <style> 
      /* frontend css */
      .card-link .sc_animate .sc_box {
         height: 150px;
      }

      body {
         font-family: 'Open Sans', Kalpurush, sans-serif;
         font-size: 0.9rem;
			font-weight: 400;
			line-height: 1.6;
			color: #212529;
			text-align: left;
         
      }
      .list-group-item {
         box-shadow: none;
      }

      a.app_purchase_btn {
         color: #fff;
         background: linear-gradient(90deg, rgba(80,199,31,1) 0%, rgba(41,175,173,1) 100%);
         float: right;
         font-size: 1rem;
         padding: 0.75rem 1.25rem;
         border-radius: 5px;
         font-weight: 800;
         text-decoration: none;
      }

      .application-card .alert.alert-custom.alert-default {
         background: #0bb7af6b;
      }

      .application-card .checkbox {
         display: block;
      }

      #receiving_mode2 .col-form-label.radio {
         display: block;
      }

      .selection .select2-selection.select2-selection--single {
         height: 37px;
      }

      .select2-container--default .select2-selection--single .select2-selection__rendered {
         line-height: 36px;
      }

      .card.card-custom.example.example-compact .usage-type {
         margin-bottom: 1rem !important;
      }

      #selectedServices .alert.alert-custom.alert-default {
         background: none;
      }

      #selectedServices {
         background: #0bb7af6b !important;
      }

      input[type=radio], input[type=checkbox] {
         cursor: pointer;
      }

      .select2.select2-container.select2-container--default {
         width: 100% !important;
      }

      a.sample_data_btn {
         color: #fff;
         background: linear-gradient(90deg, rgba(31,110,199,1) 0%, rgba(95,45,144,1) 100%);
         font-size: 1rem;
         padding: 0.75rem 1.25rem;
         border-radius: 5px;
         font-weight: 800;
         text-decoration: none
      }
   </style>
   
</head>

<body>
    <div class="sc_main_container" style="font-family: 'Open Sans', Kalpurush, sans-serif; font-weight: bold;">

        <div class="sc_header">
           <div class="container w-75">
              <div class="d-flex justify-content-end">
                 <div class="mr-auto p-2 text-white font-weight-bold d-none d-sm-block" ><a style="color: #fff;
                  font-weight: 800;
    font-size: 15px;"href="http://www.bangladesh.gov.bd/">Bangladesh National Portal</a></div>
                  
                 <div class="p-2 text-white">
                    {{-- <a href="#" class="badge badge-warning text-white card-link py-2 px-2" style="border-radius: 0;">Bangla</a> --}}
                    <button type="button" class="badge badge-warning text-white card-link py-2 px-2 lang-btn" style="border-radius: 5px;
                    cursor: pointer;
                    border: none;
                    background: #5BBA5B;">English</button>
                 </div>

              </div>
           </div>
        </div>
    
        <div class="container bg-faded w-75 pb-2">
           <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-2">
                 <a href="{{route('index')}}" style="text-decoration: none;">
                    <img src="{{asset('frontend/assets/images/bbs_logo.png')}}" class="img-fluid" style="width: 95px;">
                    <span style="color:red; font-size:35px; font-weight:bolder; padding-left: 15px;">Bangladesh Bureau of Statistics</span>
                 </a>
                 
              </div>
              
           </div>
        </div>

            <script>
               $('.lang-btn').on('click', function(){

                  console.log('hello');
                  let lang = $('.lang-btn').text();
                  if (lang == 'Bangla') {
                     $('.lang-btn').text('English');
                  } else {
                     $('.lang-btn').text('Bangla');
                  }
               });
            </script>