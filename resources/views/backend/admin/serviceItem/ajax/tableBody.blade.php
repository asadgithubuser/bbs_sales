<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>#</th>
            {{-- <th class="text-left">পরিষেবা দফার নাম (বাংলা)</th> --}}
            <th class="text-left">পরিষেবা দফার নাম (ইংরেজি)</th>
            <th class="text-left">পরিষেবার নাম</th>
            <th>মূল্য বিডিটি (ব্যক্তিগত/শিক্ষার্থী)</th>
            <th>মূল্য বিডিটি (সংগঠন)</th>
            <th>মূল্য ইউএসডি (ব্যক্তিগত/শিক্ষার্থী)</th>
            <th>মূল্য ইউএসডি (সংগঠন)</th>
            <th class="text-left">তথ্য বিভাগ</th>
            {{-- <th class="text-left">তথ্যের উপশ্রেণি</th> --}}
            {{-- <th>পরিষেবা দফার পদক্রম</th> --}}
            <th>স্ট্যাটাস</th>
            <th>পদক্ষেপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($serviceItems->count() > 0)
            @php
                $i = (($serviceItems->currentPage() - 1) * $serviceItems->perPage() + 1);
            @endphp
            @foreach ($serviceItems as $serviceItem)
            <tr>
                <td>{{$i}}</td>
                {{-- <td align="left">{{ $serviceItem->item_name_bn }}</td> --}}
                <td align="left">{{ ucfirst($serviceItem->item_name_en) }}</td>
                <td align="left">{{ $serviceItem->service ? $serviceItem->service->name_en : '' }}</td>
                <td>
                    @if ($serviceItem->price_bdt_personal)
                        
                    {{ $serviceItem->price_bdt_personal ? (number_format((float)$serviceItem->price_bdt_personal, 2, '.', '')). ' TK' : 'N/A' }} 
                    @else 
                        @if ($serviceItem->service_item_type == 1) {{-- survey --}}
                            
                            @php
                                $priceData = App\Models\ServiceItemPrice::where('price_type',1)->where('usage_type',2)->orWhere('usage_type',3)->first();
                            @endphp
                        @elseif($serviceItem->service_item_type == 2){{-- Census --}}
                            @php
                                $priceData = App\Models\ServiceItemPrice::where('price_type',2)->where('usage_type',2)->orWhere('usage_type',3)->first();
                            @endphp
                        @endif
                        {{ $priceData->price }} TK
                    @endif
                </td>
                <td>
                    {{-- {{ $serviceItem->price_bdt_org ? (number_format((float)$serviceItem->price_bdt_org, 2, '.', '')). ' TK' : 'N/A' }} --}}
                    @if ($serviceItem->price_bdt_org)
                        {{ $serviceItem->price_bdt_org ? (number_format((float)$serviceItem->price_bdt_org, 2, '.', '')). ' TK' : 'N/A' }}   
                    @else 
                            @if ($serviceItem->service_item_type == 1) {{-- survey --}}
                                    
                            @php
                                $priceData = App\Models\ServiceItemPrice::where('price_type',1)->where('usage_type',1)->orWhere('usage_type',3)->first();
                            @endphp
                            @elseif($serviceItem->service_item_type == 2){{-- Census --}}
                                @php
                                    $priceData = App\Models\ServiceItemPrice::where('price_type',2)->where('usage_type',1)->orWhere('usage_type',3)->first();
                                @endphp
                            @endif
                            {{ $priceData->price }}    TK          
                    @endif
                </td>
                <td>
                    @if ($serviceItem->price_usd_personal)
                        
                        {{ $serviceItem->price_usd_personal ? (number_format((float)$serviceItem->price_usd_personal, 2, '.', '')). ' USD' : 'N/A' }}
                    @else
                        @if ($serviceItem->service_item_type == 1) {{-- survey --}}
                                
                        @php
                            $priceData = App\Models\ServiceItemPrice::where('price_type',1)->where('usage_type',2)->orWhere('usage_type',3)->first();
                        @endphp
                        @elseif($serviceItem->service_item_type == 2){{-- Census --}}
                            @php
                                $priceData = App\Models\ServiceItemPrice::where('price_type',2)->where('usage_type',2)->orWhere('usage_type',3)->first();
                            @endphp
                        @endif
                        {{ $priceData->price }} USD
                    @endif
                </td>
                <td>
                    @if ($serviceItem->price_usd_org)
                        
                        {{ $serviceItem->price_usd_org ? (number_format((float)$serviceItem->price_usd_org, 2, '.', '')). ' USD' : 'N/A' }}
                    @else
                        @if ($serviceItem->service_item_type == 1) {{-- survey --}}
                                        
                        @php
                            $priceData = App\Models\ServiceItemPrice::where('price_type',1)->where('usage_type',1)->orWhere('usage_type',3)->first();
                        @endphp
                        @elseif($serviceItem->service_item_type == 2){{-- Census --}}
                            @php
                                $priceData = App\Models\ServiceItemPrice::where('price_type',2)->where('usage_type',1)->orWhere('usage_type',3)->first();
                            @endphp
                        @endif
                        {{ $priceData->price }} USD
                    @endif
                </td>

                @if ($serviceItem->service_item_type == 1)
                    <td align="left">জরিপ</td>
                @elseif ($serviceItem->service_item_type == 2)
                    <td align="left">জনগণনা</td>
                @else
                    <td>কোনোটিই নয়</td>
                @endif
                
                {{-- <td align="left">{{ $serviceItem->data_subcategory ? $serviceItem->data_subcategory->name_en : 'N/A' }}</td> --}}
                
                {{-- <td>{{$serviceItem->ordering}}</td> --}}

                <td>
                    @if ($serviceItem->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                    @endif
                </td>
                
                <td>
                    @can('view_service_item')
                    <a href="{{route('admin.serviceItem.show', $serviceItem->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_service_item')
                    <a href="{{route('admin.serviceItem.edit', $serviceItem->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_service_item')
                        @if ($serviceItem->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $serviceItem->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($serviceItem->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $serviceItem->id }}">
                                <i class="la la-check"></i>
                            </button>
                        @endif
                    @endcan
                    
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.serviceItem.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Status Changed Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush