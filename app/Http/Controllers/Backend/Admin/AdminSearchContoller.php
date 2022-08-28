<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Models\Faq;
use App\Models\Role;
use App\Models\Service;
use App\Models\Permission;
use App\Models\Designation;
use App\Models\ServiceItem;
use App\Models\Notice;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Application;
use App\Models\Level;
use App\Models\Office;
use App\Models\ServiceItemAdditional;
use App\Models\RolePermission;
use App\Models\TemplateSetting;
use App\Models\ReceivingMode;
use App\Models\SmsEmailTemplate;
use App\Models\ServiceInventory;
use App\Models\InventoryCart;
use App\Models\Requisition;
use App\Models\TrainingCourse;
use App\Models\CropCategory;
use App\Models\Crop;
use App\Models\ApplicationPurpose as Purpose;
use App\Models\Upazila;
use App\Models\Division;
use App\Models\District;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Village;
use App\Models\EA;
use App\Models\HouseHold;
use App\Models\Population;
use App\Models\SurveyNotification;
use App\Models\ApplicationServiceItemDownload;
use App\Models\SurveyForm;
use App\Models\SalesCenter;
use App\Models\ServiceOrder;
use App\Models\AgricultureSurveyNotification;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessList;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSearchContoller extends Controller
{
    public function search_location(Request $request)
    {
        $data = $request->all();
        
        $division   = $data['division'];
        $district   = $data['district'];
        $upazila    = $data['upazila'];
        $union      = $data['union'];
        $mouza      = $data['mouza'];
        $type       = $data['type'];

        // applications ajax search module
        if($type == "applications")
        {
            if ($division != '' && $district == '' && $upazila == '' && $union == '' && $mouza == '') {
                $applications = Application::where(function($query) use ($division) {
                    $query->where('division_id', $division);
                })->latest()->paginate(100);
            }
            else if ($division != '' && $district != '' && $upazila == '' && $union == '' && $mouza == '') {
                $applications = Application::where(function($query) use ($division, $district) {
                    $query->where('division_id', $division);
                    $query->where('district_id', $district);
                })->latest()->paginate(100);
            }
            else if ($division != '' && $district != '' && $upazila != '' && $union == '' && $mouza == '') {
                $applications = Application::where(function($query) use ($division, $district, $upazila) {
                    $query->where('division_id', $division);
                    $query->where('district_id', $district);
                    $query->where('upazila_id', $upazila);
                })->latest()->paginate(100);
            }
            else if ($division != '' && $district != '' && $upazila != '' && $union != '' && $mouza == '') {
                $applications = Application::where(function($query) use ($division, $district, $upazila, $union) {
                    $query->where('division_id', $division);
                    $query->where('district_id', $district);
                    $query->where('upazila_id', $upazila);
                    $query->where('union_id', $union);
                })->latest()->paginate(100);
            }
            else if ($division != '' && $district != '' && $upazila != '' && $union != '' && $mouza != '') {
                $applications = Application::where(function($query) use ($division, $district, $upazila, $union, $mouza) {
                    $query->where('division_id', $division);
                    $query->where('district_id', $district);
                    $query->where('upazila_id', $upazila);
                    $query->where('union_id', $union);
                    $query->where('mouza_id', $mouza);
                })->latest()->paginate(100);
            }

            $page = View('backend.serviceRecipient.application.ajax.tableBody',['applications' =>$applications])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }
    }

    public function ajaxSearch(Request $request, $type)
    {     
        $q = $request->q;
        
        if($type == "cropwiseData")
        {
            
            $user = Auth::user();
            $lists = SurveyProcessList::where(function($query) use ($q,$user) {
                                $query->where('division_id',$user->division_id);
                                $query->orWhere('district_id',$user->district_id);
                                $query->orWhere('upazila_id',$user->upazila_id);
                                $query->orWhere('status',2);

                            })->WhereHas('cropCuttingForms', function($qq) use($q) {
                                $qq->where('crop_id', $q);
                             
                        })->latest()->paginate(100);  
        
            $page = View('backend.admin.survey.ajax.upazilaClustertableBody',['lists' =>$lists, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }
        // Upazila ajax search module
        if($type == "upazila")
        {
            $upazilas = Upazila::where('name_en', 'like', "%{$q}%")
                        ->orWhere('upazila_bbs_code', 'like', "%{$q}%")
                        ->paginate(25);    

            $page = view('backend.admin.upazila.ajax.tableBody',['upazilas' =>$upazilas, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // Union ajax search module
        if($type == "union")
        {
            $unions = Union::where('name_en', 'like', "%{$q}%")
                    ->orWhere('union_bbs_code', 'like', "%{$q}%")
                    ->paginate(25);
                
            $page = view('backend.admin.union.ajax.tableBody', ['unions' => $unions, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // Mouza ajax search
        if($type == "mouza")
        {
            $mouzas = Mouza::where('name_en', 'like', "%{$q}%")
                    ->orWhere('mouza_bbs_code', 'like', "%{$q}%")
                    ->with('division', 'district', 'upazila', 'union')
                    ->paginate(25);

            $page = view('backend.admin.mouza.ajax.tableBody', ['mouzas' => $mouzas, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }


        // fiscalYear ajax search module
        if($type == "fiscalYear")
        {
            $courses = TrainingCourse::where('is_published',true)->where('fiscal_year_id',$q)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);
            $page = View('backend.admin.trainingCourse.ajax.tableBody',['courses' =>$courses, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        // searchUser ajax search module
        if($type == 'searchUser')
        {
            $users = User::where('email', 'like', '%'.$request->q.'%')
            ->orWhere('username', 'like', '%'.$request->q.'%')
            ->orWhere('mobile', 'like', '%'.$request->q.'%')
            ->select(['id','mobile', 'email','username'])->take(30)->get();
            
            if($users->count())
            {
                if ($request->ajax())
                {
                    return $users;
                }
            }
            else
            {
                if ($request->ajax())
                {
                    return $users;
                }
            }
        }

        // faq ajax search module
        if($type == 'faq')
        {
            $faqs = Faq::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('question', 'like', "%{$q}%");
                $query->orWhere('answer', 'like', "%{$q}%");
                $query->orWhere('created_at', 'like', "%{$q}%");

            })->latest()->paginate(100);
    
            $page = View('backend.admin.faq.ajax.tableBody',['faqs' =>$faqs, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //designation ajax search module
        if($type == 'designation')
        {
            $designations = Designation::where(function($query) use ($q) {
                    $query->where('id', 'like', "%{$q}%");
                    $query->orWhere('level', 'like', "%{$q}%");
                    $query->orWhere('name_en', 'like', "%{$q}%");
                    $query->orWhere('name_bn', 'like', "%{$q}%");
                    $query->orWhere('description', 'like', "%{$q}%");
                    $query->orWhere('ordering', 'like', "%{$q}%");
                
                })->orWhereHas('office',function($qq) use($q){
                    $qq->where('title_bn','like', "%{$q}%");
                    $qq->orWhere('title_en','like', "%{$q}%");
                })->latest()->paginate(100);
                
            
            $page = View('backend.admin.designation.ajax.tableBody',['designations' =>$designations, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }
        
        //application purpose ajax search module
        if($type == "application")
        {
            $applicationPurposes = Purpose::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                $query->orWhere('ordering', 'like', "%{$q}%");
            
            })->latest()->paginate(100);
            
        
            $page = View('backend.admin.applicationPurpose.ajax.tableBody',['applicationPurposes' =>$applicationPurposes, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        if($type == "applications")
        {
            $applications = Application::where(function($query) use ($q) {
                
                $query->where('application_id', 'like', "%{$q}%");
                $query->orWhere('organization_name', 'like', "%{$q}%");
                $query->orWhere('personal_institute', 'like', "%{$q}%");
            
            })->orWhereHas('user', function($qq) use($q) {
                $qq->where('first_name', 'like', "%{$q}%");
                $qq->orWhere('middle_name', 'like', "%{$q}%");
                $qq->orWhere('last_name', 'like', "%{$q}%");          
                $qq->orWhere('mobile', 'like', "%{$q}%");          
                $qq->orWhere('email', 'like', "%{$q}%");          
                $qq->orWhere('role_id', $q); 
            })->latest()->paginate(100);

            $page = View('backend.serviceRecipient.application.ajax.tableBody',['applications' =>$applications, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }

        }

        // user applications ajax search module
        if($type == "user_applications")
        {
            $applications = Application::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('application_id', 'like', "%{$q}%");
                $query->orWhere('organization_name', 'like', "%{$q}%");
                $query->orWhere('personal_institute', 'like', "%{$q}%");
                
            })->latest()->paginate(100);

            $page = View('backend.serviceRecipient.application.ajax.tableBody',['applications' =>$applications, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //receiving mode ajax search module
        if($type == "receivingMode")
        {
            $receivingModes = ReceivingMode::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                
            })->latest()->paginate(100);
        
            $page = View('backend.admin.receivingMode.ajax.tableBody',['receivingModes' => $receivingModes, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //service ajax search module
        if($type == "service")
        {
            $services = Service::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                $query->orWhere('ordering', 'like', "%{$q}%");
                
            })->latest()->paginate(100);
            
        
            $page = View('backend.admin.service.ajax.tableBody',['services' =>$services, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //serviceItem ajax search module
        if($type == "serviceItem")
        {
            $serviceItems = ServiceItem::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('item_name_en', 'like', "%{$q}%");
                $query->orWhere('item_name_bn', 'like', "%{$q}%");
                $query->orWhere('price', 'like', "%{$q}%");
                $query->orWhere('ordering', 'like', "%{$q}%");
                
            })->latest()->paginate(100);
            
        
            $page = View('backend.admin.serviceItem.ajax.tableBody',['serviceItems' =>$serviceItems, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //role ajax search module
        if($type =="role")
        {
            $roles = Role::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                $query->orWhere('ordering', 'like', "%{$q}%");            
                
            })->latest()->paginate(100);
            
        
            $page = View('backend.admin.role.ajax.tableBody',['roles' =>$roles, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //permission ajax search module
        if($type=="permission")
        {
            $permissions = Permission::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");          
                
            })->latest()->paginate(100);
        
            $page = View('backend.admin.permission.ajax.tableBody',['permissions' =>$permissions, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        // Office ajax search module
        if($type == 'office')
        {
            $offices = Office::where(function($query) use ($q) {
                $query->where('level', 'like', "%{$q}%");
                $query->orWhere('office_code', 'like', "%{$q}%");
                $query->orWhere('title_bn', 'like', "%{$q}%");
                $query->orWhere('title_en', 'like', "%{$q}%");
                $query->orWhere('address', 'like', "%{$q}%");
                $query->orWhere('phone', 'like', "%{$q}%");
                $query->orWhere('email', 'like', "%{$q}%");
            })->latest()->paginate(25);

            $page = view('backend.admin.office.ajax.tableBody', ['offices' => $offices, 'q' => $q])->render();

            if ($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // AdditionalServiceItems ajax search module
        if ($type == 'additionalItem')
        {
            $serviceItemAdditionals = ServiceItemAdditional::where(function($query) use ($q) {
                $query->where('service_id', 'like', "%{$q}%");
                $query->orWhere('item_name_en', 'like', "%{$q}%");
                $query->orWhere('item_name_bn', 'like', "%{$q}%");
                $query->orWhere('price', 'like', "%{$q}%");
                $query->orWhere('ordering', 'like', "%{$q}%");
            })->latest()->paginate(100);

            $page = view('backend.admin.serviceItemAdditional.ajax.tableBody', ['serviceItemAdditionals' => $serviceItemAdditionals, 'q' => $q])->render();

            if ($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // Role Permissions ajax search module
        if ($type == 'rolePerms')
        {
            $rolePerms = RolePermission::whereHas('user', function ($qq) use ($q) {
                $qq->where('username', 'like', '%'.$q.'%');
            })->orWhereHas('role', function ($qq) use ($q) {
                $qq->where('name_en', 'like', '%'.$q.'%');
                $qq->orWhere('name_bn', 'like', '%'.$q.'%');
            })->distinct('user_id')->get('user_id');
            

            $page = view('backend.admin.rolePermission.ajax.tableBody', ['rolePerms' => $rolePerms, 'q' => $q])->render();

            if ($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // Notice ajax search module
        if($type == 'notice')
        {
            $notices = Notice::where(function($query) use ($q) {
                $query->where('id', 'like', "%{$q}%");
                $query->orWhere('title', 'like', "%{$q}%");
                $query->orWhere('detail', 'like', "%{$q}%");
                $query->orWhere('created_at', 'like', "%{$q}%");
            })->latest()->paginate(100);
            
            $page = view('backend.admin.notice.ajax.tableBody', ['notices' =>$notices, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //template Setting ajax search module
        if($type == 'tempSetting')
        {
            $templates = TemplateSetting::where(function($query) use ($q) {
                
                $query->where('header', 'like', "%{$q}%");
                $query->orWhere('footer', 'like', "%{$q}%");
                $query->orWhere('body', 'like', "%{$q}%");
            })->orWhereHas('service', function ($qq) use ($q) {
                $qq->where('name_en', 'like', '%'.$q.'%');
                $qq->orWhere('name_bn', 'like', '%'.$q.'%');
            })->get();
            
            $page = view('backend.admin.setting.ajax.tableBody', ['templates' =>$templates, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //sms Template ajax search module
        if($type == "smsTemplate")
        {
            $templates = SmsEmailTemplate::where(function($query) use ($q) {
                
                $query->where('title', 'like', "%{$q}%");
                $query->orWhere('details', 'like', "%{$q}%");
                $query->orWhere('subject', 'like', "%{$q}%");
            })->get();
            
            $page = view('backend.admin.setting.ajax.tableBodySms', ['templates' =>$templates, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //user input ajax search module
        if($type=="user")
        {
            $users = User::where(function($query) use ($q) {
                $query->where('first_name', 'like', "%{$q}%");
                $query->orWhere('middle_name', 'like', "%{$q}%");
                $query->orWhere('last_name', 'like', "%{$q}%");
                $query->orWhere('username', 'like', "%{$q}%");          
                $query->orWhere('mobile', 'like', "%{$q}%");          
                $query->orWhere('email', 'like', "%{$q}%");          
                $query->orWhere('role_id', $q);       
                   
            })->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //user select role ajax search module
        if($type=="userRole")
        {
            $users = User::where('role_id', $q)->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //user select office ajax search module
        if($type=="userOffice")
        {
            $users = User::where('office_id', $q)->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //user select designation ajax search module
        if($type=="userDesignation")
        {
            $users = User::where('designation_id', $q)->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }


        //systemUser input ajax search module
        if($type=="systemUser")
        {
            $users = User::where(function($query) use ($q) {
                $query->where([
                            'role_id', '<>', 10,
                            'first_name', 'like', "%{$q}%"
                        ]);
                })->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //publicUser input ajax search module
        if($type=="publicUser")
        {
            $users = User::where(function($query) use ($q) {
                $query->where([
                            'role_id', 10,
                            'first_name', 'like', "%{$q}%"
                        ]);
                })->latest()->paginate(100);
        
            $page = View('backend.admin.user.ajax.tableBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //subscribers input ajax search module
        if($type == "subscribers")
        {
            $users = Subscriber::where(function($query) use ($q) {
                $query->where('username', 'like', "%{$q}%");
                $query->orWhere('email', 'like', "%{$q}%");
                $query->orWhere('phone', 'like', "%{$q}%");
            })->latest()->paginate(100);
            
            $page = View('backend.admin.user.ajax.subscriberBody',['users' =>$users, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //level input ajax search module
        if($type == "level")
        {
            $levels = Level::where(function($query) use ($q) {
                $query->where('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");                     
                   
                
            })->latest()->paginate(100);
        
            $page = View('backend.admin.setting.ajax.tableBodyLevel',['levels' =>$levels, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            } 
        }

        //posItemSearch input ajax search module
        if($type=="posItemSearch")
        {
            $items = ServiceInventory::where('can_download',0)->where(function($query) use ($q) {
                
                                            $query->where('title', 'like', "%{$q}%");
                                            $query->orWhere('sub_title', 'like', "%{$q}%");
                                        })
                                        ->orWhereHas('serviceItem', function ($qq) use ($q) {
                                            $qq->where('barcode', 'like', '%'.$q.'%');
                
                                        })->get();

                                        
            $page = View('backend.admin.pos.ajax.productTable',['items' =>$items, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            } 

        }

        //requisition ajax search module
        if($type=="requisition")
        {
            $requisitions = Requisition::where(function($query) use ($q) {
                $query->where('name', 'like', "%{$q}%");
                $query->orWhere('organization_name', 'like', "%{$q}%");
                $query->orWhere('requisition_number', 'like', "%{$q}%");         
                $query->orWhere('phone', 'like', "%{$q}%");          
                   
                
            })->latest()->paginate(100);
        
            $page = View('backend.admin.requisition.ajax.tableBody',['requisitions' =>$requisitions, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type=="cropCategory")
        {          

            $categories = CropCategory::where(function($query) use ($q) {
                $query->where('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
            })->latest()->paginate(100);
            
            $page = View('backend.admin.agriculture.category.ajax.tableBody',['categories' =>$categories, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            } 
        }
        

        if($type=="inventoryItem")
        {
            $items = ServiceInventory::where(function($query) use ($q) {
                        $query->where('title', 'like', "%{$q}%");
                        $query->orWhere('sub_title', 'like', "%{$q}%");
                    })->latest()->paginate(100);

            // dd($items);                         
            $page = View('backend.admin.storage.ajax.tableBody',['items' =>$items, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            } 

        }

        if($type=="crops")
        {          

            $crops = Crop::where(function($query) use ($q) {
                $query->where('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                $query->orWhere('code', 'like', "%{$q}%");
            })->latest()->paginate(100);
            
            $page = View('backend.admin.agriculture.crop.ajax.tableBody',['crops' =>$crops, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            } 
        }


        if($type=="surveyNotification")
        {
            $surveyNoti = SurveyNotification::where(function($query) use ($q) {
                $query->where('start_date_of_collection', 'like', "%{$q}%");
                $query->orWhere('end_date_of_collection', 'like', "%{$q}%");
            })->orWhereHas('crop', function ($qq) use ($q) {
                $qq->where('name_en', 'like', '%'.$q.'%');
                $qq->orWhere('name_bn', 'like', '%'.$q.'%');
            })->orWhereHas('surveyForm', function ($qq) use ($q) {
                $qq->where('template_name', 'like', '%'.$q.'%');
                $qq->orWhere('display_name', 'like', '%'.$q.'%');
            })->latest()->paginate(100);
            

            $page = View('backend.admin.agriculture.surveyNotification.ajax.tableBody',['surveyNoti' =>$surveyNoti, 'q'=>$q])->render();
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }
        if($type == "surveyForm")
        {
            $surveyForms = SurveyForm::where('is_published', 1)
                        ->where(function($query) use($q) {
                            $query->where('template_name', 'like', "%{$q}%");
                            $query->orWhere('display_name', 'like', "%{$q}%");
                            $query->orWhere('table_name', 'like', "%{$q}%");
                        })->latest()->paginate(25);
            
            $page = view('backend.admin.agriculture.survey.ajax.tableBody', ['surveyForms' => $surveyForms, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // search sales center
        if($type == "salesCenter")
        {
            $salesCenters = SalesCenter::where(function($query) use($q){
                $query->where('name_en', 'like', "%{$q}%");
            })->latest()->paginate(25);

            $page = view('backend.admin.salesCenter.ajax.tableBody', ['salesCenters' => $salesCenters, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        // Sales center filter
        if($type == "salesCenterFilter")
        {
            $items = ServiceInventory::where(function($query) use($q){
                $query->where('sales_center_id', 'like', "%{$q}%");
            })->latest()->paginate(25);

            $page = view('backend.admin.storage.ajax.tableBody', ['items' => $items, 'q' => $q])->render();


            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type == "reportPosStock")
        {
            if(Auth::user()->role_id == 11)
            {
                $items = ServiceInventory::where('sales_center_id', Auth::user()->sales_center)->where(function($query) use($q) {
                    $query->where('title', 'like', "%{$q}%");
                })->latest()->paginate(25);
            }else{
                $items = ServiceInventory::where(function($query) use($q) {
                    $query->where('title', 'like', "%{$q}%");
                })->latest()->paginate(25);
            }
            
            $page = view('backend.admin.report.ajax.posStockTable', ['items' => $items, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type == "posStockSalesCenterSelect")
        {
            $items = ServiceInventory::where(function($query) use($q) {
                $query->where('sales_center_id', 'like', "%{$q}%");
            })->latest()->paginate(15);

            $page = view('backend.admin.report.ajax.posStockTable', ['items' => $items, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type == "publicationSalesCenterSelect")
        {
            $orders = ServiceOrder::where('payment_status', 'paid')->where(function($query) use($q){
                $query->where('sales_center_id', 'like', "%{$q}%");
            })->latest()->paginate(15);

            $page = view('backend.admin.report.ajax.publicationSalesTable', ['orders' => $orders, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type == "clusterAjax")
        {
            $clusters = Cluster::where(function($query) use($q){
                $query->where('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                $query->orWhere('code', 'like', "%{$q}%");
            })->paginate(15);

            $page = view('backend.admin.cluster.ajax.tableBody', ['clusters' => $clusters, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        if($type == "agriSurveyNoti")
        {
            $notifications = AgricultureSurveyNotification::where('receiver_user_id', Auth::user()->id)
                            ->whereHas('senderUser', function($query) use($q){
                                $query->where('first_name', 'like', "%{$q}%");
                                $query->orWhere('middle_name', 'like', "%{$q}%");
                                $query->orWhere('last_name', 'like', "%{$q}%");
                            })->latest()->paginate(15);

            $page = view('backend.admin.agriculture.agriSurveyNoti.ajax.tableBody', ['notifications' => $notifications, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }
        }

        //village ajax search module
        if($type == "village")
        {
            $villages = Village::where(function($query) use ($q) {
                $query->where('village_code', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                
            })->latest()->paginate(15);
        
            $page = View('backend.admin.village.ajax.tableBody', ['villages' => $villages, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //ea ajax search module
        if($type == "ea")
        {
            $eas = EA::where(function($query) use ($q) {
                $query->where('ea_code', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                
            })->latest()->paginate(15);
        
            $page = View('backend.admin.ea.ajax.tableBody', ['eas' => $eas, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //household ajax shouseholdrch module
        if($type == "household")
        {
            $households = HouseHold::where(function($query) use ($q) {
                $query->where('household_code', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                
            })->latest()->paginate(15);
        
            $page = View('backend.admin.household.ajax.tableBody', ['households' => $households, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        //population ajax spopulationrch module
        if($type == "population")
        {
            $populations = Population::where(function($query) use ($q) {
                $query->where('population_code', 'like', "%{$q}%");
                $query->orWhere('name_en', 'like', "%{$q}%");
                $query->orWhere('name_bn', 'like', "%{$q}%");
                
            })->latest()->paginate(15);
        
            $page = View('backend.admin.population.ajax.tableBody', ['populations' => $populations, 'q'=>$q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }

        // Farmers submitted data ajax module
        if($type == "farmerData")
        {
            $farmersData = SurveyCompilationCollectForm1::where(function($query) use($q) {
                $query->where('farmers_name', 'like', "%{$q}%");
                $query->orWhere('farmers_mobile', 'like', "%{$q}%");
            })->orWhereHas('mouza', function($qq) use($q) {
                $qq->where('name_en', 'like', "%{$q}%");
            })->orWhereHas('cluster', function($qqq) use($q) {
                $qqq->where('name_en', 'like', "%{$q}%");
            })->latest()->paginate(15);

            $page = view('backend.admin.surveyForms.farmersForm.ajax.tableBody', ['farmersData' => $farmersData, 'q' => $q])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,
                ));
            }

        }

        if($type=='book')
        {
            $users = ServiceInventory::where('can_download',1)->get();
            
            if($users->count())
            {
                if ($request->ajax())
                {
                    return $users;
                }
            }
            else
            {
                if ($request->ajax())
                {
                    return $users;
                }
            }
        }

    }
}