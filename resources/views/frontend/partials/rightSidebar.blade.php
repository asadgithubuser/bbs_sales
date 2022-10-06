<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
      
   <div class="log-in-form2 bg-default px-0">
   
      {{-- If logged in user won't see this routes --}}
      @if (!Auth::user())
         <div class="list-group">
            <a href="{{route('citizenLogin')}}" class="list-group-item list-group-item-action  active" style="background-color: #FF0000;border-color: #FF0000;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px;"></i> Citizen Login
            </a>
         </div>

         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{route('officeLogin')}}" class="list-group-item list-group-item-action  active" style="background-color: #FF0000;border-color: #FF0000;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Office Login
            </a>
         </div>
         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{route('userRegistration')}}" class="list-group-item list-group-item-action  active" style="background-color: #FF0000;border-color: #FF0000;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Registration
            </a>
         </div>
         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{ route('application.create') }}" class="list-group-item list-group-item-action  active" style="background-color: #5bba5b;border-color: #5bba5b;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Apply for Micro Data Service / Registration
            </a>
         </div>

         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{ route('application.publicationApp') }}" class="list-group-item list-group-item-action  active" style="background-color: #5bba5b;border-color: #5bba5b;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Apply for Publication Service / Registration
            </a>
         </div>
         
      @elseif(Auth::user())

         <div class="list-group">
            <a href="{{ route('application.create') }}" class="list-group-item list-group-item-action  active" style="background-color: #5bba5b;border-color: #5bba5b;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Apply for Micro Data Service / Registration
            </a>
         </div>

         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{ route('application.publicationApp') }}" class="list-group-item list-group-item-action  active" style="background-color: #5bba5b;border-color: #5bba5b;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Apply for Publication Service / Registration
            </a>
         </div>

         <div class="py-1"></div>

         <div class="list-group">
            <a href="{{route('admin.index')}}" class="list-group-item list-group-item-action  active" style="background-color: #FF0000;border-color: #FF0000;">
               <i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px"></i> Dashboard
            </a>
         </div>
      @endif
      
       
      <div class="py-2"></div>
      
      <div class="list-group">
         <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBangladesh-Bureau-of-Statistics-BBS-775784832493254%2F&tabs&width=300&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=499253463784988" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>

   </div>

    

   <div class="py-2"></div>

    <div class="log-in-form2 bg-default px-0">
       <div class="list-group" style="font-size:14px;">
       <a href="#" class="list-group-item list-group-item-action active"><strong>Important Links</strong></a>
       <a href="#" class="list-group-item list-group-item-action list-group-item-success" target="_blank">Government Organization</a>
       <a href="#" class="list-group-item list-group-item-action list-group-item-success" target="_blank">International Statistical Office</a>
       <a href="#" class="list-group-item list-group-item-action list-group-item-success" target="_blank">Development Partner/Research Organization</a>
       <a href="#" class="list-group-item list-group-item-action list-group-item-success" target="_blank">Statistics and Informatics Division</a>
       <a href="#" class="list-group-item list-group-item-action list-group-item-success" target="_blank">Other Links</a>
       
       </div>
    </div>

    <div class="py-2"></div>

    <div class="log-in-form2 bg-default px-0">
       <div class="list-group">
             <a href="#" class="list-group-item list-group-item-action  active">Contact Us</a>
       </div>
    </div>
 </div>
 </div> <!-- main row -->
 </div>