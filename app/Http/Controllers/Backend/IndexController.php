<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;

/* included models */
use App\Models\Application;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Countrie;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\CourseTrainingList;
use App\Models\Mouza;
use App\Models\Department;
use App\Models\Office;
use App\Models\ApplicationPurpose;
use App\Models\ServiceItem;
use App\Models\ServiceItemAdditional;
use App\Models\ReceivingMode;
use App\Models\Role;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ApplicationService;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{

    public function adminDashboard()
    {
        menuSubmenu('dashboard', 'dashboard');

        if (Auth::user()->role_id == 10) {
            $countrys = Countrie::get();
            $divisions = Division::where('status', 1)->get();
            $districts = District::where('status', 1)->get();
            $upazilas = Upazila::where('status', 1)->get();
            $unions = Union::where('status', 1)->get();
            $mouzas = Mouza::where('status', 1)->get();
            $purposes = ApplicationPurpose::where('status', 1)->get();
            $departments = Department::where('status', 1)->get();
            $services = Service::where('id', '!=', 2)->where('status', 1)->get();
            $serviceItems = ServiceItem::where('status', 1)->get();
            $serviceItemAdditionals = ServiceItemAdditional::where('status', 1)->get();
            $receivingModes = ReceivingMode::where('status', 1)->get();


            return view('backend.serviceRecipient.application.create', compact('countrys', 'divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'purposes', 'services', 'serviceItems', 'serviceItemAdditionals', 'receivingModes', 'departments'));
        } else {

            $applications = Application::get()->count();
            
            $submittedApplications = Application::where('status', 1)
                                                ->get()
                                                ->count();
            $receivedApplications = Application::where('status', 2)
                                                ->get()
                                                ->count();
            $processedApplications = Application::where('status', 3)
                                                ->get()
                                                ->count();
            $approvedApplications = Application::where('status', 4)
                                                ->where('is_approved', 1)
                                                ->get()
                                                ->count();
            $rejectedApplications = Application::where('status', 4)
                                                ->where('is_approved', 0)
                                                ->get()
                                                ->count();

            $subscribers = Subscriber::get()->count();
            $registeredUsers = User::where('role_id', 10)
                                    ->get()
                                    ->count();
            $systemUsers = User::where('role_id', '!=', 1)
                                ->where('role_id', '!=', 2)
                                ->where('role_id', '!=', 10)
                                ->get()
                                ->count();

            $offices = Office::where('status', 1)->get()->count();

            $roles = Role::where('status', 1)->get()->count();

            $services = Service::where('status', 1)->get()->count();

            $userApplications = Application::where('sr_user_id', Auth::id())
                                            ->get()
                                            ->count();
            $userSubmittedApplications = Application::where('sr_user_id', Auth::id())
                                                    ->where('status', 1)
                                                    ->get()
                                                    ->count();
            $userReceivedApplications = Application::where('sr_user_id', Auth::id())
                                                    ->where('status', 2)
                                                    ->get()
                                                    ->count();
            $userProcessedApplications = Application::where('sr_user_id', Auth::id())
                                                    ->where('status', 3)
                                                    ->get()
                                                    ->count();
            $userApprovedApplications = Application::where('sr_user_id', Auth::id())
                                                    ->where('is_approved', 1)
                                                    ->where('status', 4)
                                                    ->get()
                                                    ->count();
            $userRejectedApplications = Application::where('sr_user_id', Auth::id())
                                                    ->where('is_approved', 0)
                                                    ->where('status', 5)
                                                    ->get()
                                                    ->count();

            $receiverRoleApplications = Application::where('current_receiver_role_id', Auth::user()->role_id)
                                                    ->get()
                                                    ->count();

            $totalOnlineMoney = Application::sum('total_price');

            if (Auth::user()->role_id == 11) {
                
                $totalSaleMoney = ServiceOrder::whereYear('created_at', date('Y'))
                                                ->whereMonth('created_at', date('m'))
                                                ->where('user_id', Auth::id())
                                                ->where('payment_status','paid')
                                                ->sum('paid_amount');
                                                
            } else {
                

                $totalSaleMoney = ServiceOrder::whereYear('created_at', date('Y'))
                                                ->whereMonth('created_at', date('m'))
                                                ->where('payment_status','paid')
                                                ->sum('paid_amount');
            }
            
            $finalTotalMoney = $totalOnlineMoney + $totalSaleMoney;

            $citizenServedData = ApplicationService::where('service_id', 1)
                                                    ->distinct('application_id', 'service_id')
                                                    ->get('application_id')
                                                    ->count();
            $citizenServedPublication = ApplicationService::where('service_id', 2)
                                                            ->distinct('application_id', 'service_id')
                                                            ->get('application_id')
                                                            ->count();
            $citizenServedCertificate = ApplicationService::where('service_id', 3)
                                                            ->distinct('application_id', 'service_id')
                                                            ->get('application_id')
                                                            ->count();


            $training_course_ids = array();
            $trainingLists = CourseTrainingList::where('status', 1)->get();
            foreach($trainingLists as $trainingList){
                if(in_array(Auth::user()->department_id, json_decode($trainingList->department_id))){
                    array_push($training_course_ids, $trainingList->id);
                }
            }
            $trainingCourseList = CourseTrainingList::whereIn('id', $training_course_ids)->get();
    
            $allcourseCountStatus = 0;
            foreach($trainingCourseList as $tcl){
                if(isset($tcl->course) && !$tcl->course->courseListDetails){
                    $allcourseCountStatus ++;
                }
            }

            return view('backend.index', compact('applications', 'submittedApplications', 'receivedApplications', 'processedApplications', 'approvedApplications', 'rejectedApplications', 'subscribers', 'registeredUsers', 'offices', 'systemUsers', 'roles', 'services', 'userApplications', 'userSubmittedApplications', 'userReceivedApplications', 'userProcessedApplications', 'userApprovedApplications', 'userRejectedApplications', 'receiverRoleApplications', 'totalOnlineMoney', 'totalSaleMoney', 'finalTotalMoney', 'citizenServedData', 'citizenServedPublication', 'allcourseCountStatus', 'citizenServedCertificate'));
        }
        
    }
}
