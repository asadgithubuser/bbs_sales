<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            {{-- <th>#</th> --}}
            <th>আবেদনের আইডি</th>
            <th class="text-left">আবেদনকারীর নাম</th>
            <th class="text-left">ব্যবহারের ধরন</th>
            {{-- <th>অফিসের অনুরোধ</th> --}}
            {{-- <th class="text-left">উদ্দেশ্য</th> --}}
            {{-- <th>গ্রহণের ধরন</th> --}}
            <th class="text-left">প্রেরক</th>
            <th class="text-left">গ্রাহক</th>
            <th class="text-left">আবেদনের তারিখ</th>
            <th>বর্তমান অবস্থা</th>
            <th>লেনদেনের অবস্থা</th>
            <th>পেমেন্ট অনুমোদিত অবস্থা</th>
            <th>অবস্থা</th>
            <th>কার্যকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($applications->count() > 0)
            @php
                $i = ($applications->currentPage() - 1) * $applications->perPage() + 1;
            @endphp
            @foreach ($applications as $application)
            {{-- {{dd($application)}} --}}
                <tr>
                    {{-- <td>{{$loop->index + 1}}</td> --}}
                    <td>{{ $application->application_id }}</td>
                    <td align="left">
                        {{ $application->user ? $application->user->first_name : '' }}
                        {{ $application->user ? $application->user->middle_name : '' }}
                        {{ $application->user ? $application->user->last_name : '' }}
                    </td>
                    <td align="left">
                        @if ($application->usage_type == 1)
                        সংগঠন
                        @elseif($application->usage_type == 2)
                        ব্যক্তিগত
                        @else
                        শিক্ষার্থী
                        @endif
                    </td>
                    {{-- <td>{{$application->office ? $application->office->title_en : ''}}</td> --}}
                    {{-- @if ($application->purpose_id == 100)
                        <td align="left">Others:
                            {{ $application->purpose_specify ? $application->purpose_specify : '' }}</td>
                    @else
                        <td align="left">
                            {{ $application->applicationPurpose ? $application->applicationPurpose->name_en : '' }}
                        </td>
                    @endif --}}
                    {{-- <td>{{$application->receivingMode ? $application->receivingMode->name_en : ''}}</td> --}}
                    <td align="left">{{ $application->senderRole ? $application->senderRole->name_en : '' }}</td>
                    <td align="left">{{ $application->receiverRole ? $application->receiverRole->name_en : '' }}</td>
                    <td align="left">{{ date('d-M-Y h:i:s A', $application->created_at->timestamp) }}</td>
                    <td>
                        <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 20px 10px;">{{$application->receiverRole ? $application->receiverRole->name_en : ''}}</span>
                    </td>
                    <td>

                        {{-- @if ($application->payment)
                            @if ($application->payments->is_app == 1)

                                <span class="label label-lg font-weight-bold label-light-success label-inline"
                                    style="font-size: 15px; padding: 17px;">Paid</span>
                            @elseif($application->payments->is_app == 0)
                                <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                    style="font-size: 15px; padding: 17px;">Unpaid</span>
                            @endif
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                style="font-size: 15px; padding: 17px;">Unpaid</span>

                        @endif --}}

                        @if ($application->payment)
                            <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 17px;">পরিশোধিত</span>
                        @else 
                            <span class="label label-lg font-weight-bold label-light-danger label-inline" style="font-size: 15px; padding: 17px;">অপরিশোধিত</span>
                        @endif
                    </td>
                    <td>

                        @if ($application->payment and $application->is_paid == 0)
                            <span class="label label-lg font-weight-bold label-light-warning label-inline"
                                style="font-size: 15px; padding: 17px;">অনুমোদন নয়</span>
                        @elseif($application->payment and $application->is_paid == 2)
                            <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                style="font-size: 15px; padding: 17px;">বাতিল</span>
                        @elseif($application->payment and $application->is_paid == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline"
                                style="font-size: 15px; padding: 17px;">অনুমোদিত</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-info label-inline"
                                style="font-size: 15px; padding: 17px;">মুলতবি</span>

                        @endif
                    </td>
                    
                    <td>
                        @if ($application->status == 1)
                            <span class="label label-lg font-weight-bold label-warning label-inline"
                                style="font-size: 15px; padding: 17px; color: black;">মুলতবি</span>
                        @elseif ($application->status == 2)
                            <span class="label label-lg font-weight-bold label-light-success label-inline"
                                style="font-size: 15px; padding: 17px;">গৃহীত</span>
                        @elseif ($application->status == 3)
                            <span class="label label-lg font-weight-bold label-light-primary label-inline"
                                style="font-size: 15px; padding: 17px;">প্রক্রিয়াধীন</span>
                        @elseif ($application->status == 4)
                            <span class="label label-lg font-weight-bold label-light-success label-inline"
                                style="font-size: 15px; padding: 17px;">অনুমোদিত</span>
                        @elseif ($application->status == 5)
                            <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                style="font-size: 15px; padding: 17px;">বাতিল</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                style="font-size: 15px; padding: 17px;">অজানা</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-xs">

                            <a class="btn btn-primary btn-xs">বিকল্প</a>

                            <div class="btn-group " role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </button>
                                <div class="dropdown-menu p-3" aria-labelledby="btnGroupDrop1">
                                    @can('application_detail')
                                        <a href="{{ route('admin.application.show', $application->id) }}"
                                            class="dropdown-item   btn  btn-warning btn-sm" title="details">
                                            বিস্তারিত
                                        </a>
                                    @endcan
                                    @if ($application->status == 4)
                                        @if ($application->payment)

                                            @if (Auth::user()->role_id == 10) 

                                                @if ($application->payments->is_app == true)
                                                    <a href="{{ route('admin.application.itemsDownload', $application->id) }}"
                                                        class="btn btn-sm mt-1 w3-gray  dropdown-item">সেবা পাওয়া</a>
                                                    <a href="{{ route('admin.application.invoice', $application) }}"
                                                        class="btn  btn-info btn-sm mt-1 dropdown-item  " title="paid">
                                                        চালান
                                                    </a>
                                                    
                                                @elseif($application->payments->is_app == false)
                                                    <button data-toggle="modal"
                                                        data-target="#payment{{ $application->id }}"
                                                        class="btn btn-sm mt-1 btn-info dropdown-item  " title="pay">
                                                        প্রদান করুন 
                                                    </button>
                                                @endif

                                            @endif
                                            @if (Auth::user()->role_id != 10)
                                                <button data-toggle="modal"
                                                    data-target="#paymentDetail{{ $application->id }}"
                                                    class="btn  btn-info btn-sm mt-1 dropdown-item  " title="paid">
                                                        পেমেন্ট বিস্তারিত
                                                </button>
                                                @if ($application->is_paid == 0)

                                                    <a href="{{ route('admin.application.paymentApprove', ['application' => $application, 'type' => 'approve']) }}"
                                                        class="btn btn-sm mt-1 w3-green dropdown-item  "
                                                        title="approve">
                                                        পেমেন্ট অনুমোদন
                                                    </a>
                                                    <a href="{{ route('admin.application.paymentApprove', ['application' => $application, 'type' => 'cancel']) }}"
                                                        class="btn  btn-sm mt-1 w3-red dropdown-item  " title="approve">
                                                        বাতিল করুন
                                                    </a>
                                                @endif
                                            @endif
                                        @else
                                            <button data-toggle="modal" data-target="#payment{{ $application->id }}"
                                                class="btn btn-sm mt-1 btn-info dropdown-item  " title="pay">
                                                প্রদান করুন 
                                            </button>
                                        @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @php
                    $i++;
                @endphp
                <!--begin::Role Modal-->
                <div id="payment{{ $application->id }}" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="min-height: 350px;">
                            <div class="modal-header py-5">
                                <h5 class="modal-title">পেমেন্টের ধরন নির্বাচন করুন 
                                    <span class="d-block text-muted font-size-sm"></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <a href="{{ route('admin.application.ePay', $application) }}"
                                            class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue"
                                            style="box-shadow: 4px 6px 1px #c3c3c3;">

                                            <i class="la-3x w3-text-black"> <b>ই-পেমেন্ট</b></i>

                                        </a>
                                        <div class="col-md-1"></div>

                                        <a href="{{ route('admin.application.manualPay', $application) }}"
                                            class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue"
                                            style="box-shadow: 4px 6px 1px #c3c3c3;">
                                            <i class="la-3x w3-text-black"> <b>সরাসরি</b></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Role Modal-->

                <div id="paymentDetail{{ $application->id }}" class="modal fade" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="min-height: 350px;">
                            <div class="modal-header py-5">
                                <h5 class="modal-title">পেমেন্টের বিবরণ
                                    <span class="d-block text-muted font-size-sm"></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-12">

                                            @if ($pay = $application->payment)

                                                @if ($pay->pg_id == '')

                                                    <iframe
                                                        src="{{ asset('storage/payments/' . $pay->document_img) }}"
                                                        alt="" width="100%" height="600"></iframe>
                                                @else
                                                ই-পেমেন্ট দ্বারা পরিশোধ করা হয়েছে
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <tr class="odd">
                <td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td>
            </tr>
        @endif
    </tbody>
</table>
