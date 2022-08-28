<!--begin::Toggle-->
<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
        <span class="svg-icon svg-icon-xl svg-icon-primary">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="pulse-ring"></span>

        @php
            // get this users unread notification count
            $current_user_id = Auth::user()->id;
            $unread = $newNotifications->where('notifiable_id', $current_user_id)->where('read_at', NULL)->get();
            $count = count($unread);
        @endphp

        @if ($count > 0)
            <span style="color:red; font-weight: bold; margin-bottom: 25px;">{{$count}}</span>
        @endif
        
        

    </div>
</div>
<!--end::Toggle-->
<!--begin::Dropdown-->
<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg ">

    <!--begin::Tabpane-->
    <div class="tab-pane">
        <!--begin::Nav-->
        <div class="navi navi-hover scroll my-4" data-scroll="true">

            @if (count($unread) > 0)
                
                {{-- Get all New notifications --}}
                @foreach ($unread as $ur)

                    @php
                        $result = (array) json_decode($ur->data);
                    @endphp

                    <a href="{{route('gotoNotification', $ur->id)}}" class="navi-item goNotification" style="background: #ebf9cf">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-notification text-primary"></i>
                            </div>
                            <div class="navi-text">
                                
                                <div class="font-weight-bold">
                                    {{$result['data']}}

                                    <form action="#" method="post" style="float: right" class="markAsRead">
                                        @csrf
                                        <input name="notification_id" type="hidden" value="{{$ur->id}}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="X" onclick="notificationMarkAsRead()">
                                    </form>

                                </div>
                                <div class="text-muted">{{ date('d M, Y h:i a', strtotime($ur->created_at)) }}</div>
                            </div>
                        </div>
                    </a>

                @endforeach
            @endif

            @php
                // get all Old notification for this user
                $oldNotifis = $oldNotifications->where('notifiable_id', $current_user_id)->where('read_at', '!=', NULL)->get();
            @endphp

            @if (count($oldNotifis) > 0)
                

                @foreach ($oldNotifis as $noti)

                    @php
                    $result = (array) json_decode($noti->data);
                    @endphp

                    <a href="{{route('gotoNotification', $noti->id)}}" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-notification text-primary"></i>
                            </div>
                            <div class="navi-text">
                                
                                <div class="font-weight-bold">{{$result['data']}}</div>
                                <div class="text-muted">{{ date('d M, Y h:i a', strtotime($noti->created_at)) }}</div>
                            </div>
                        </div>
                    </a>	
                @endforeach
            @endif

            @if ((count($unread) < 1) && (count($oldNotifis) < 1))
                <a href="#" class="navi-item">
                    <div class="navi-link">
                        <div class="navi-icon mr-2">
                            <i class="flaticon2-notification text-primary"></i>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">No new notification found</div>
                        </div>
                    </div>
                </a>
            @endif
                
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Tabpane-->
            
</div>
<!--end::Dropdown-->