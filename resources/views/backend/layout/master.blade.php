@if(isset($allcourseCountStatus))
    @include('backend.layout.header', ['allcourseCountStatus' => $allcourseCountStatus])
@else
    @include('backend.layout.header', ['allcourseCountStatus' => null])
@endif
    @yield('content')
    
@include('backend.layout.footer')