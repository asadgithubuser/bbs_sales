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


    <link rel="stylesheet" href="{{asset('assets/plugins/global/plugins.bundle.css')}}" />

   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style> 

    .btn-circle {
        position: absolute;
    }

    .btn-circle>i {
        top: -4px;
        left: 8px;
        position: absolute;
        width: 24px;
        height: 24px;
        padding: 5px;
        background-color: white;
        box-shadow: 0px 4px 5px 2px #bdbbbb;
        border-radius: 50%;
        font-size: 13px;
    }
    
    /* custom css */
    .table thead th{
        color: #000 !important;
    }
    body, html {
        font-family: 'Open Sans', Kalpurush, sans-serif;
        font-size: 14px!important;
    }
    .form-group label {
        font-size: 1.1rem;
    }
    li.breadcrumb-item a {
        color: #333 !important;
    }

    .table {
        text-align: center;
    }

    table.dataTable>thead>tr>td:not(.sorting_disabled), table.dataTable>thead>tr>th:not(.sorting_disabled) {
        padding-right: 18px;
    }

    .application-card .alert.alert-custom.alert-default {
        background-color: #0bb7af6b;
    }

    .service_item_list {
        margin: 0 auto 1rem auto;
    }
    .service_additional_item_list {
        margin: 0 auto 1rem auto;
    }

    .invalid-feedback {
        color: red !important;
    }

    .dash-count-card{
        height: 160px;
    }

    .form_header {
        font-size: 15px;
    }
    .weight_500 {
        font-weight: 500;
    }
    .dash-count-card .card-spacer {
        padding: 35px 10px !important;
    }
    .form-control {
        border: 1px solid #063852 !important;
    }
    .radio>span {
        border: 1px solid #063852;
    }
    .checkbox>span {
        border: 1px solid #063852;
    }
    .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single{
        border: 1px solid #063852 !important;
    }
    .card-header {
        border-bottom: 1px solid #063852;
    }
    .card-footer {
        border-top: 1px solid #063852;
    }
    .symbol.symbol-100 .symbol-label {
        width: 130px;
        height: 130px;
    }

    .aside {
        background-color: #fff;
    }
    .brand {
        background-color: #074F1F;
    }
    .aside-menu {
        background-color: #EBF9CF;
        border-right: 1px solid #E9EAF4;
    }
    .aside-menu .menu-nav {
        background-color: #fff;
        padding-top: 0;
    }
    .aside-menu .menu-nav>.menu-item>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item>.menu-link .menu-text {
        color: #000;
        font-weight: 800;
        font-size: 16px;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item>.menu-link .menu-text {
        color: #000;
        font-weight: 800;
        font-size: 15px
    }
    .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-heading, .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-link {
        background-color: #EBF9CF;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-heading, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-link {
        background-color: #EBF9CF;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-link .menu-text {
        color: #000;
        font-weight: 800;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-link .menu-text {
        color: #000;
    }
    .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading, .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link {
        background-color: #EBF9CF;
    }
    .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-text {
        color: #000;
        font-weight: 800;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link {
        background-color: #EBF9CF;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-text {
        color: #000;
    }
    .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-arrow, .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-arrow {
        color: #000;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-heading .menu-arrow, .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-link .menu-arrow {
        color: #000;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav>.menu-item.menu-item-open>.menu-link .menu-icon.svg-icon svg g [fill] {
        fill: #6E3CBC;
    }
    .brand .btn .svg-icon svg g [fill] {
        fill: #fff;
    }
    .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-icon, .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-icon {
        color: #6E3CBC;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-heading .menu-bullet.menu-bullet-dot>span, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-active>.menu-link .menu-bullet.menu-bullet-dot>span {
        background-color: #6E3CBC;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-bullet.menu-bullet-dot>span, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-bullet.menu-bullet-dot>span {
        background-color: #6E3CBC;
    }
    .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav>.menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-icon.svg-icon svg g [fill] {
        fill: #6E3CBC;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-heading, .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-link {
        background-color: #EBF9CF;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-link .menu-text {
        color: #000;
        font-weight: 800;
        font-size: 16px;
    }
    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-link .menu-icon.svg-icon svg g [fill] {
        fill: #6E3CBC;
    }

    .header {
        background-color: #074F1F;
    }
    li.menu-item.menu-item-open.menu-item-here.menu-item-submenu.menu-item-rel.menu-item-open.menu-item-here.menu-item-active a {
        color: #fff;
    }
    span.text-dark-50.font-weight-bolder.font-size-base.d-none.d-md-inline.mr-3 {
        color: #fff !important;
    }
    .header-fixed.subheader-fixed .subheader {
        height: 45px;
        background-color: #EBF9CF;
    }
    .btn.btn-clean.focus:not(.btn-text), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled) {
        background-color: #6E3CBC;
    }
    .aside-menu .menu-nav>.menu-item>.menu-submenu .menu-subnav>.menu-item>.menu-link {
        padding-left: 60px;
    }

    label.checkbox, .service_item_list, .service_additional_item_list {
        margin: 0px 0 6px 0 !important;
    }

    .card.card-custom>.card-header .card-title, .card.card-custom>.card-header .card-title .card-label {
        font-weight: 700;
    }
    form#kt_form_1 label {
        font-weight: 700;
    }
    .alert-text.form_header span {
        font-weight: 800 !important;
    }
    #kt_aside_menu {
        background: #EBF9CF !important;
    }
    #kt_aside_menu_wrapper {
        width: 280px;
    }
    #kt_content{
        margin-left: 15px;
    }
    .alert-text.service_item_price {
        font-weight: 700;
    }
    .alert-text.select_service_list {
        font-weight: 700;
    }
    .alert-text.select_service_item_list{
        font-weight: 700;
    }
    .alert-text.select_service_price_list{
        font-weight: 700;
    }
    .alert-text.service_additional_item_price {
        font-weight: 700;
    }
    .alert-text span.font-weight-bold.text-center {
        font-weight: 700 !important;
    }
    
    a.dash-click-card span {
        color: #fff;
    }
    input:focus-visible {
        border: none;
    }

    .breadcrumb li:first-child a {
        color: green !important;
    }
    .breadcrumb li:nth-child(2) a {
        color: red !important;
    }

    .hidden {
        display: none !important;
    }

    .checkbox-list .service_item_list .checkbox {
        margin-bottom: 12px !important;
    }
    .checkbox-list .service_additional_item_list .checkbox {
        margin-bottom: 12px !important;
    }

    .application-card table tr td {
        font-size: 1.1rem !important;
    }

    .form-group {
        margin-bottom: 15px;
    }

    a.swal2-confirm.swal2-styled {
        padding: 0;
    }

    .select2-container {
        width: 100% !important;
    }

    .bbs-loader-wrapper{
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 1000;
        background: #000;
        opacity: 0.9;
    }

    
    /*Loader 1- Spinning */
    #loader-1 #loader{
        position: relative;
        left: 45%;
        top: 45%;
        height: 200px;
        width: 200px;
        /* margin: -10vw 0 0 -10vw; */
        background-image: url(assets/media/logos/logo2.png);
        z-index: 2;
        background-size: 100% 100%;
        z-index: 2;
        -webkit-animation: spin 2s linear infinite;
        -moz-animation: spin 2s linear infinite;
        -o-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    /* #loader-1 #loader:before{
        content: "";
        position: absolute;
        top:2%;
        bottom: 2%;
        left: 2%;
        right: 2%; 
        border: 3px solid transparent;
        z-index: 2;
        border-top-color: #db213a;
        border-radius: 50%;
        -webkit-animation: spin 3s linear infinite;
        -moz-animation: spin 3s linear infinite;
        -o-animation: spin 3s linear infinite;
        animation: spin 3s linear infinite;

    }

    #loader-1 #loader:after{
        content: "";
        position: absolute;
        top:5%;
        bottom: 5%;
        left: 5%;
        right: 5%; 
        border: 3px solid transparent;
        border-top-color: #dec52d;
        z-index: 2;
        border-radius: 50%;
        -webkit-animation: spin 1.5s linear infinite;
        -moz-animation: spin 1.5s linear infinite;
        -o-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;

    } */

    /*Keyframes for spin animation */

    @-webkit-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }

        50% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(180deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }


    @-moz-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }

        50% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(180deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

    @-o-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }

        50% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(180deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

    @keyframes  spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }

        50% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(180deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }


    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-heading, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-link {
        background-color: #EBF9CF !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-heading .menu-text, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-link .menu-text {
        color: #000 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-icon, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-icon {
        color: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-arrow, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-arrow {
        color: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover>.menu-link .menu-icon.svg-icon svg g [fill] {
        fill: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-heading .menu-icon, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-link .menu-icon {
        color: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-link .menu-icon.svg-icon svg g [fill] {
        fill: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-heading .menu-arrow, .aside-menu .menu-nav>.menu-item .menu-submenu .menu-item.menu-item-open>.menu-link .menu-arrow {
        color: #494b74 !important;
    }
    .aside-menu .menu-nav>.menu-item>.menu-submenu .menu-subnav>.menu-item>.menu-submenu .menu-subnav>.menu-item>.menu-link {
        padding-left: 80px;
    }

    .form-control-custom-file {
    width: 100%;
    padding: 10px;
    border: .5px solid #b3afaf;
    border-radius: 3px;
}
    
</style>

      <!--end::Layout Themes-->
      <style>
         @media  print {
            #noprintbtn {
               display: none;
            }
         }
         /* body{
            font-family: 'Nikosh',sans-serif !important;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f8fafc;
         } */
         th{
            font-size: 14px !important;
         }
      </style>


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