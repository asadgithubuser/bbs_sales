@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Staffs')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('staffs.create') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add New Staffs')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Staffs')}}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{translate('Email')}}</th>
                    <th data-breakpoints="lg">{{translate('Phone')}}</th>
                    <th data-breakpoints="lg">{{translate('Role')}}</th>
                    <th width="10%">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $key => $staff)
                    @if($staff->user != null)
                        <tr>
                            <td>{{ ($key+1) + ($staffs->currentPage() - 1)*$staffs->perPage() }}</td>
                            <td>{{$staff->user->name}}</td>
                            <td>{{$staff->user->email}}</td>
                            <td>{{$staff->user->phone}}</td>
                            <td>
								@if ($staff->role != null)
									{{ $staff->role->getTranslation('name') }}
								@endif
							</td>
                            <td class="text-right">
							

					<?php $org_data=$staff->user->update_history; 
					
					if(!empty($org_data)){ 
								$dta='<table class="table table-sm">
								  <thead>
									<tr>
									  <th>ID</th>
									  <th>Type:Time</th>
									  <th>Device</th>
									</tr>
								  </thead>  
								  <tbody>';
								 $arr_hitory=json_decode($staff->user->update_history);	
								 $arr_hitory=array_reverse($arr_hitory);
								 foreach($arr_hitory as $each_act){
									$dta=$dta.'<tr>';
										foreach(explode(',',$each_act) as $each_ind){
										$arr_each_ind=explode('=',$each_ind); 
										   $dta=$dta.'<td>';
											 
												 if(empty($arr_each_ind['1'])){ $dta=$dta.$arr_each_ind['0']; } 
												 elseif($arr_each_ind['0']=='last_login'){$dta=$dta.'<x style="color:green">Login:<br></x>'.$arr_each_ind['1'];   }
												 elseif($arr_each_ind['0']=='last_logout'){ $dta=$dta.'<x style="color:blue">Logout:<br></x>'.$arr_each_ind['1']; }
												 elseif($arr_each_ind['0']=='device'){ $dta=$dta.str_replace('~!',',',$arr_each_ind['1']); } 
												 else{$dta=$dta.' ';}

										   $dta=$dta.'</td>';
										}
									$dta=$dta.'</tr>';
								}
								 
									
								  $dta=$dta.'</tbody>
								</table>';								
							  }	 ?>

							  
							
									@if($staff->user->update_history)<span title="Preview" onclick=" 
									
									change_preview('{{preg_replace('/\s\s+/', ' ', $dta)}}','{{$staff->user->name}} ')
									
									 " class="btn btn-soft-success btn-icon btn-circle btn-sm" >  <i class="las la-eye"></i></span> @endif

		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('staffs.edit', encrypt($staff->id))}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
									
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('staffs.destroy', $staff->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $staffs->appends(request()->input())->links() }}
        </div>
    </div>
</div>
        <div class="col-md-12 p-0 m-0" style=" position: fixed;z-index: 9999;bottom: 0;background: white;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;max-width: 33.8%;right: 1.3%;border: 1px solid #141423;border-radius: 5px;" id="preview">
		
		</div>




@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">

 	function close_box() {
		$("#preview").html('');
	}

	function change_preview(data,name) {
		$("#preview").html('<div style="padding:20px !important;max-height: 400px !important;overflow-y: scroll;"><span class="text-center">'+name+'</span><span onclick="close_box()" class="text-right" style="color:red;font-size: 16px;border: 1px solid gray;border-radius: 50%;width: 25px;padding-right: 5px;padding-left: 5px;cursor: pointer;position: absolute;right: 22px;"> X </span>'+data+'</div>');
	}
	
</script>
@endsection