<!doctype html>
@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">
	<title>{{ get_setting('website_name').' | '.get_setting('site_motto') }}</title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
	<link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
 
	<link rel="stylesheet" href="{{ static_asset('photo_edit/styles.min.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">
	
	
    <style>
        body {
            font-size: 12px;
        }
    </style>
	<script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{{ translate('Nothing selected') }}',
            nothing_found: '{{ translate('Nothing found') }}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
	</script>

</head>
<body class="">
	<div class="aiz-main-wrapper">
		<div id="sloading" class="sloading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
		
	<div class="aiz-main-wrapper">
        @include('backend.inc.admin_sidenav')
		<div class="aiz-content-wrapper">
            @include('backend.inc.admin_nav')
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
                    @yield('content')
				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; {{ get_setting('site_name') }} v{{ get_setting('current_version') }}</p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    @yield('modal')
	
	<pixie-editor></pixie-editor>

	<script src="{{ static_asset('assets/js/vendors.js') }}" ></script>
	<script src="{{ static_asset('assets/js/aiz-core.js') }}" ></script>
 

	<!-- Start Photo Edit -->
	<script src="{{ static_asset('photo_edit/scripts.min.js') }}" ></script>

	<script type="text/javascript">
	  
		var url = window.location.origin+'/public/photo_edit/';
 
		var _current_img_id='';
		var operation='';
        var defaultFormat_='jpeg';
		var defaultQuality_=.9;
		var pixie = new Pixie({
			baseUrl: url,
			
			//watermarkText: 'shoplover.com',
			ui: {
				visible: false, // whether pixie is visible initially
				mode: 'overlay',
			},
			
			tools: {
				export: {
					defaultFormat: defaultFormat_, //png, jpeg or json
					defaultQuality: defaultQuality_, //works with jpeg only, 0 to 1
				},

     		},

			onSave: function(img_data, name) {

				if (confirm("Confirm to save?")) {
					operation='replace';
					if (confirm("Click \"Ok\" for Replace original photo or Click \"Cancel\" for Create New Photo")) {
					operation='replace';
					} else {
						operation='new';
					}
				} else {
					return false;
				}

				$.post('{{ route('store_export') }}',{_token:'{{ csrf_token() }}', img_data:img_data,name:name,_current_img_id:_current_img_id,operation:operation}, function(data){ // document.getElementById('aizuploader_refresh').click(); 
				});

			}			 
		});


		function change_defaultFormat(id) {
			defaultFormat_=$('#'+id).val();
		}
		
		function change_defaultValue(id) {
			defaultQuality_=$('#'+id).val()/100;
		}


		function edit_photo(img,img_id) {
				_current_img_id=img_id;
				operation='new';
				pixie.openEditorWithImage(img);
		}

	</script>
 


    @yield('script')

    <script type="text/javascript">
	    @foreach (session('flash_notification', collect())->toArray() as $message)
	        AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
	    @endforeach


        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-menu a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('{{ route('language.change') }}',{_token:'{{ csrf_token() }}', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }
        function menuSearch(){
			var filter, item;
			filter = $("#menu-search").val().toUpperCase();
			items = $("#main-menu").find("a");
			items = items.filter(function(i,item){
				if($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#'){
					return item;
				}
			});

			if(filter !== ''){
				$("#main-menu").addClass('d-none');
				$("#search-menu").html('')
				if(items.length > 0){
					for (i = 0; i < items.length; i++) {
						const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
						const link = $(items[i]).attr('href');
						 $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
					}
				}else{
					$("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">{{ translate('Nothing Found') }}</span></li>`);
				}
			}else{
				$("#main-menu").removeClass('d-none');
				$("#search-menu").html('')
			}
        }

 

    </script>

</body>
</html>
