@extends('backend.layout.master')
<style>
    @media print {
        #buttons {
            display: none;
        }

    }
    
</style>
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="container-fluid">
            <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            
                            <img class="display-4 font-weight-boldest mb-10 mr-10" height="100%" width="15%" src="{{ asset('assets/media/logos/logo2.png') }}" alt="">
                            
                            
                            <span class="pt-10" style="font-size: 15px;">
                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
                                <br>
                                বাংলাদেশ পরিসংখ্যান ব্যুরো
                                <br>
                                মিরপুর, ঢাকা - ১২১৬
                                <br>
                                বাংলাদেশ ।
                            </span>
                        </div>
                        <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <span> <span style="font-weight: bold">Report Name:</span> Complementary Copy Report </span>
                            <span>Date: {{date('d-M-Y')}}</span>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                
                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-separate table-head-custom table-checkable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Total Stock</th>
                                        <th>Given</th>
                                        <th>Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        @php
                                            $i = 1;
                                        @endphp
                                        @php
                                            
                                            $totalStock = $item->number_of_complimentary_copies;
                                            $totalGiven = 0;
                                            $remainingStock = 0;

                                            foreach ($item->requisitionItems as $value)
                                            {
                                                $totalGiven += $value->quantity;
                                            }

                                            $totalStock = $item->number_of_complimentary_copies + $totalGiven;
                                            $remainingStock = $totalStock - $totalGiven;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$totalStock == null ? 0 : $totalStock}}</td>
                                            <td>{{$totalGiven == null ? 0 : $totalGiven}}</td>
                                            <td>{{$remainingStock == null ? 0 : $remainingStock}}</td>
                                        </tr>
                                    @php
                                        $i++;
                                    @endphp
                            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$items->links()}}
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="buttons">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between float-right">
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
        </div>
    </div>

@endsection