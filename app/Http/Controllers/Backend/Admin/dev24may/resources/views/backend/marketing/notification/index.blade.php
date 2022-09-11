@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col-md-12">
    			<h1 class="h3">{{translate('All Notifications')}}</h1>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <form class="" id="sort_notifications" action="{{ route('notification.filter') }}"  method="GET">
                    <div class="card-header row gutters-5">
                        <div class="col text-center text-md-left">
                            <h5 class="mb-md-0 h6">{{ translate('Notifications') }}</h5>
                        </div>
                        <div class="col-md-4">
                            <input required type="text" class="form-control" id="sort_notification" name="sort_notification" @isset($sort_notification) value="{{ $sort_notification }}" @endisset placeholder="{{ translate('Type notification name/title & Enter') }}">
                        </div>
                        <div class="col-md-4">
                   
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">{{ translate('Filter') }}</button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th data-breakpoints="lg">#</th>
                                <th>{{translate('Title')}}</th>
								<th>{{translate('Name')}}</th>
                                <th class="d-none">{{translate('Text')}}</th>
                                <th>{{translate('Sent')}}</th>
                                <th>{{translate('Image')}}</th>
                                <th>{{translate('Link')}}</th>
                                <th>{{translate('Status')}}</th>
								<th data-breakpoints="lg" class="text-right">{{translate('Created')}}</th>
                                <th data-breakpoints="lg" class="text-right">{{translate('Options')}}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $key => $notification)
                                <tr>
                                    <td>{{ ($key+1) + ($notifications->currentPage() - 1)*$notifications->perPage() }}</td>
                                    
                                    <td>{{ $notification->title }}</td>
									<td>{{ $notification->name }}</td>
                                    <td class="d-none">{{ $notification->text }}</td>
                                    <td>{{ $notification->counts }}</td>
                                    <td>@if($notification->image){!!'<a target="_blank" href="'.$notification->image.'">view</a>' !!}@endif</td>
                                    <td>@if($notification->link){!!'<a target="_blank" href="'.$notification->link.'">visit</a>' !!}@endif</td>
                                    <td> 
									@if($notification->status==0)
										<span class="text-warning">{{translate('Draft')}}</span>
									@else	
										<span class="text-success">{{translate('Completed')}}</span>
									@endif
									</td>
                   
									<td class=" text-right">{{ $notification->created_at }}  @php if(!empty($notification->created_by)){echo 'by '.user_by_id($notification->created_by)->name; } @endphp </td>
                                    <td class="text-right">
										
										@if($notification->status==0)
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('notification.destroy', $notification->id)}}" title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
										@endif   

										
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('notification.edit_promos', ['id'=>$notification->id, 'lang'=>env('DEFAULT_LANGUAGE')]) }}" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
										
									    <span title="Preview" onclick="change_preview('{{$notification->title}}','{{$notification->text}}','{{$notification->image}}','1')" class="btn btn-soft-success btn-icon btn-circle btn-sm" >  <i class="las la-eye"></i></span> 
	

                                    </td>
									
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $notifications->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
		
		
        <div class="col-md-5">
		
        <div class="col-md-12 p-0 m-0" style="position: fixed;z-index: 9999;bottom: 0;background: white;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;max-width: 33.8%;right: 1.3%;border: 1px solid #141423;border-radius: 5px;" id="preview">
		
		</div>
		
        <div class="col-md-12 p-0 m-0">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="mb-0 h6">{{ translate('Send Cloud Notification') }}</h5>
    			</div>
    			<div class="card-body">
    				<form action="{{ route('notification.store_promos') }}" method="POST">
    					@csrf
						
						
    					<div class="form-group mb-3">
    						<label for="title">{{translate('Notification title')}} <span class="text-danger">*</span></label>
    						<input id="_title" onkeyup="change_preview(this.value,'','','0')"  value="{{$edited_notifications->title??''}}" type="text" placeholder="{{translate('Title')}}" name="title" class="form-control" required>
    						<input value="{{$edited_notifications->id??''}}" type="text" name="notifi_id" class="form-control d-none"  >
    					</div>						
    					<div class="form-group mb-3">
    						<label  for="text">{{translate('Notification text')}} <span class="text-danger">*</span></label>
							<textarea id="_text"   onkeyup="change_preview('',this.value,'','0')" placeholder="{{translate('Text')}}" name="text" class="form-control" name="content" required="">{{$edited_notifications->text??''}}</textarea>	 
    					</div>	
    				
    					<div class="form-group mb-3">
    						<label for="title">{{translate('Notification Type')}}</label>
							
							<span>
							<div  style="display: inline" class="form-check ml-5 ">
							  <input  onclick="change_type('Notify & visible to all user\'s Promos menu')" class="form-check-input cursor-pointer" checked value="Promos" type="radio" name="noti_type" id="flexRadioDefault2" >
							  <label class="form-check-label cursor-pointer" for="flexRadioDefault2">
								Promos  
							  </label>
							</div>
							<div onclick="change_type('Notify & visible to applicable user\'s Notification menu')" style="display: inline" class="form-check ml-5 ">
							  <input class="form-check-input cursor-pointer" value="Default" type="radio" name="noti_type" id="flexRadioDefault1" >
							  <label class="form-check-label cursor-pointer" for="flexRadioDefault1">
								Default Notification 
							  </label>
							</div>
							
			
							</span><br>
							<i><span id="hints" class="pl-5 text-secondary">Notify & visible to all user's Promos menu</span></i>
							
    					</div>
						
						
					    <hr>	
						
    					<div class="form-group mb-3">
    						<label for="name">{{translate('Send to Specific users')}}</label>
							 <label class="aiz-switch aiz-switch-success mb-0">
							  <input  onclick="user_target_change(this.value)" name="user_select"  value="specific" type="checkbox" >
							  <span class="slider round  ml-3"></span>
							</label>    						 
    					</div>		
						
 
					
						<div class="form-group mb-3" id="specific" style="display:none">
    						<label for="text">{{translate('Target User')}}</label>
						      <select name="users[]"  class="form-control aiz-selectpicker" multiple   data-placeholder="{{ translate('Choose Users') }}" data-live-search="true" data-selected-text-format="count">
							   @php $users = DB::table('users')->get();
								   foreach ($users as $users_each){
									   if($users_each->phone) { $u_phone='/'.$users_each->phone; } else {$u_phone='';  }
										echo '<option value="'.$users_each->id.'<!-separated-!>'.$users_each->device_token.'">'.$users_each->name.$u_phone.'</option>'; 
								   }
							   @endphp
                              </select>
    					</div>	




 
	    				<div class="form-group mb-3">
    						<label for="text">{{translate('Link')}} (optional)</label>
							<input value="{{$edited_notifications->link??''}}" type="text" placeholder="{{translate('Link')}}" name="link" class="form-control" >
    					</div>						
						
    					<div class="form-group mb-3">
    						<label for="image">{{translate('Notification image')}} (optional)</label>
    						<input id="_image"  onkeyup="change_preview('','',this.value,'0')"  value="{{$edited_notifications->image??''}}"  type="text" placeholder="{{translate('https://')}}" name="image" class="form-control"  >
    					</div>						
    					<div class="form-group mb-3">
    						<label for="name">{{translate('Notification name')}}  (optional)</label>
    						<input value="{{$edited_notifications->name??''}}"  type="text" placeholder="{{translate('Name')}}" name="name" class="form-control"  >
    					</div>				

    					<div class="form-group mb-3">
    						<label for="name">{{translate('Save as Draft')}}</label>
							 <label class="aiz-switch aiz-switch-success mb-0">
							  <input name="status"  value="0" type="checkbox" >
							  <span class="slider round  ml-3"></span>
							</label>    						 
    					</div>		

				
						<div class="form-group mb-1 ">
							<button style=" float:right" type="submit" class="btn btn-success ">Submit</button>
    					</div>			 
    				</form>
    			</div>
    		</div>
    	</div>
    	</div>
		
		
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
<script type="text/javascript">
     function user_target_change(val) {
        $("#"+val).fadeToggle();
    }
	function change_type(val) {
		$("#hints").html(val);
	}	
	
	function change_preview(title,body,img,view) {
	
	if(title==''){title=$("#_title").val(); }
	if(body==''){body=$("#_text").html();    }else{if(view=='0'){$("#_text").html(body);}}
	if(img==''){img=$("#_image").val(); }
	
	var str='';
	if(img==''){
		str='';
	}else{
		str=' <img style="     width: 30%;  margin-left: 35%; " class="card-img-top" src="'+img+'" alt="Card image cap">';
	}
	
	$("#preview").html( '  <div class="card-header"> Preview </div><div class="card" style="width: 100%;"> <div class="card-body"> <h5 class="card-title">'+title+'</h5> <p class="card-text">'+body+'</p></div>'+str+'</div>');
	
	}
	
</script>
@endsection
