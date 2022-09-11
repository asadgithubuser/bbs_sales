<table class="table table-separate table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">ভূমিকার নাম (বাংলা)</th>
            <th class="text-left">ভূমিকার নাম (ইংরেজি)</th>
            <th class="text-left">প্রদর্শনের নাম</th>
            <th>স্ট্যাটাস</th>
            <th>আদেশ</th>
            <th class="text-left">প্রস্তুতকারক  </th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @php                
            $i = (($roles->currentPage() - 1) * $roles->perPage() + 1); 
        @endphp
        @foreach ($roles as $role)
        <tr>
            <td>{{$i}}</td>
            <td align="left">{{$role->name_bn}}</td>
            <td align="left">{{ucfirst($role->name_en)}}</td>
            <td align="left">{{ucfirst($role->display_name)}}</td>
            <td>
                {{$role->status == 1 ? "Active" : 'Inactive'}}
            </td>
            <td>{{$role->ordering}}</td>
            <td align="left">{{$role->user ? ucfirst($role->user->username) : ''}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    @can('edit_role')
                    
                    <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#edit_role{{$role->id}}">                                                         
                        <i class="la la-edit text-warning"></i>
                    </button>
                    @endcan
                    @can('delete_role')

                        <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#disable_role{{$role->id}}">                                                         
                            <i class="la la-times text-danger"></i>
                        </button>
                    @endcan
                    
                </div>
            </td>
        </tr>
        <!--begin::Role Edit Modal-->    
            <div id="edit_role{{$role->id}}" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="min-height: 350px;">
                        <div class="modal-header py-5">
                            <h5 class="modal-title">ভূমিকা সংশোধন করুন
                            <span class="d-block text-muted font-size-sm"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form class="form" action="{{route('admin.role.update',$role->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">ভূমিকার নাম (বাংলা)<span style="color: red;">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" required class="form-control {{ $errors->has('role_name_bn') ? ' is-invalid' : '' }}" value="{{ $role->name_bn}}" name="role_name_bn" placeholder="ভূমিকার নাম লিখুন (বাংলা)" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">প্রদর্শনের নাম<span style="color: red;">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" required class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}" value="{{ $role->display_name}}" name="display_name" placeholder="প্রদর্শনের নাম লিখুন" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">ভূমিকার নাম (ইংরেজি)<span style="color: red;">*</span> </label>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" required class="form-control {{ $errors->has('role_name_en') ? ' is-invalid' : '' }}" name="role_name_en" value="{{ $role->name_en}}" placeholder="ভূমিকার নাম লিখুন (ইংরেজি))" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 offset-lg-4">
                                            <button class="btn btn-bg-success btn-block" style="color: aliceblue">হালনাগাদ করুন</button>
                                        </label>
                                    </div>                           
                                </form>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        <!--end::Role Modal-->

        <!--begin::Role disable Modal-->    
        <div id="disable_role{{$role->id}}" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header py-5">
                        <h5 class="modal-title">ভূমিকা নিষ্ক্রিয় করুন
                        <span class="d-block text-muted font-size-sm"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" action="{{route('admin.role.statusChange',$role->id)}}" method="get">
                            @csrf
                            <div class="container">
                                আপনি কি এই ভূমিকা নিষ্ক্রিয় করতে চান?
                            </div>                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-danger" type="submit">নিষ্ক্রিয় করুন</button>
                        </form>
                        <button type="button" class=" btn btn-sm btn-success" data-dismiss="modal" aria-label="Close">
                            বাতিল করুন
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Role disable Modal-->
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
</table>