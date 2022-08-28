@extends('backend.layout.master')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Create Courses Calender</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Create Courses Calender</a>
                            </li>
                            
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>

        <!--begin::body-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                @include('alerts.alerts')

                <div class="row">
                    <div class="col-lg-4">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Add Courses To Calender </h3>
                            </div>
                            <form action="{{ route('admin.calender.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label for="">Fiscal Years</label>
                                        <select name="year" id="site" class="form-control">
                                            <option selected>Select Fiscal Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th><input type="checkbox" name="all-checked"
                                                            id="all-checked"> All
                                                    </th>
                                                    <th>Course Title</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courses as $course)
                                                    
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            
                                                            <input type="checkbox" value="{{ $course->id }}" name="items[]" class="checkboxPrimary3">
                                                        </td>
                                                        <td>{{ ucfirst($course->title) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-block btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                
                                                <th>Course Title</th>
                                                <th>Fiscal Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($coursesWithFiscalyear->count() > 0)
                                                
                                                @foreach ($coursesWithFiscalyear as $course)
                                                    
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        
                                                        <td>{{ ucfirst($course->title) }}</td>
                                                        <td>{{ $course->courseYear ? $course->courseYear->name :'' }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.calender.remove',$course) }}"
                                                                onclick="return confirm('Do you want to remove this course from fiscal year?')"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else 
                                            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>

                                            @endif
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stackScript')
<script>
    $(document).ready(function() {
        $('#all-checked').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $('.checkboxPrimary3').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkboxPrimary3').each(function() {
                    this.checked = false;
                });
            }
        });
    });
</script>
@endpush