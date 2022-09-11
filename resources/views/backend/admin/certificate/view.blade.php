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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">View Certificate Template</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Show Certificate</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->



    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Certificate Info</h3>
                        </div>
                        {{--  @if(count($certificates) >0)  --}}
                            <table class="table table-responsive ">
                                <thead class='hr'>
                                  <tr>
                                    <th scope="col">sl.</th>
                                    <th scope="col">Logo 1</th>
                                    <th scope="col">Logo 2</th>
                                    <th scope="col">Heading 1</th>
                                    <th scope="col">Heading 2</th>
                                    <th scope="col">Heading 3</th>
                                    <th scope="col">Heading 4</th>
                                    <th scope="col">Content Text</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Course Director Sign</th>
                                    <th scope="col">Director Sign</th>
                                    <th scope="col">Director General Sign</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($certificates as $certificate)
                                  <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td><img src="{{asset('/'.$certificate->logo_1)}}" height="100px" width="100px"></td>
                                    <td><img src="{{asset('/'.$certificate->logo_2)}}" height="100px" width="100px"></td>
                                    <td>{{$certificate->heading_1}}</td>
                                    <td>{{$certificate->heading_2}}</td>
                                    <td>{{$certificate->heading_3}}</td>
                                    <td>{{$certificate->heading_4}}</td>
                                    <td>{{Str::limit($certificate->content_text,20)}}</td>
                                    <td>{{$certificate->create_date}}</td>
                                    <td><img src="{{asset('/'.$certificate->cd_sign)}}" height="100px" width="100px"></td>
                                    <td><img src="{{asset('/'.$certificate->d_sign)}}" height="100px" width="100px"></td>
                                    <td><img src="{{asset('/'.$certificate->dg_sign)}}" height="100px" width="100px"></td>

                                    <td>{{$certificate->status}}</td>
                                    <td>
                                        <a href="{{route('admin.certificate.view_certificate_info',['id'=>$certificate->id])}}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{route('admin.certificate.delete_certificate_info',['id'=>$certificate->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                        @if($certificate->status==1)
                                        <a href="{{route('admin.certificate.status_inactive',['id'=>$certificate->id])}}" title="Click for inactive" class="btn btn-sm btn-success">Active</a>
                                        @else
                                        <a href="{{route('admin.certificate.status_active',['id'=>$certificate->id])}}" title="Click for active" class="btn btn-sm btn-warning">Inactive</a>
                                        @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
