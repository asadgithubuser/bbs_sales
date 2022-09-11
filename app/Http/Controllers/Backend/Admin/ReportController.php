<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

// included models
use App\Models\ApplicationServiceItemDownload;
use App\Models\ServiceInventory;
use App\Models\RequisitionItem;
use App\Models\ServiceOrderItem;
use App\Models\Application;
use App\Models\Service;
use App\Models\ApplicationService;
use App\Models\ServiceOrder;
use App\Models\Requisition;
use App\Models\SalesCenter;


class ReportController extends Controller
{

    // Online sales report controller
    public function onlineSales()
    {
        menuSubmenu('report', 'onlineSales');

        $services = Service::where('status', 1)->get();

        if(Auth::user()->role_id == 11)
        {
            $applications = ApplicationService::with('application')
                            ->where('service_id', 2)
                            ->groupBy('application_id')
                            ->latest()->paginate(25);
            return view('backend.admin.report.onlineSalesFilter', compact('services', 'applications'));
        }else{
            $applications = Application::with('applicationServices')
                            ->where('is_approved', 1)
                            ->where('is_paid', 1)
                            ->where('status', 4)
                            ->latest()->paginate(25);
            return view('backend.admin.report.onlineSales', compact('services', 'applications'));
        }

    }

    // Online sales filter
    public function onlineSalesFilter(Request $request)
    {
        menuSubmenu('report', 'onlineSales');
        $services = Service::where('status', 1)->get();
        $service_id = $request->service_id;

        // Search module for storekeeper
        if(Auth::user()->role_id == 11)
        {
            // Prepare from date
            if(empty($request->fromDate))
            {
                $from = '1970-01-01 00:00:00'; //date format 'Y-m-d' date('Y-m-d'.' 00:00:00')
            }else{
                $from = $request->fromDate.' 00:00:00';
            }

            // Prepare to date
            if(empty($request->toDate))
            {
                $to = date('Y-m-d'. ' 23:59:59');
            }else{
                $to = $request->toDate.' 23:59:59';
            }

            // Filtering search result
            $applications = ApplicationService::with('application')
                            ->where('service_id', 2)
                            ->where('created_at', '>=', $from)
                            ->where('created_at', '<=', $to)
                            ->groupBy('application_id')
                            ->latest()->paginate(25);
            
            return view('backend.admin.report.onlineSalesFilter', compact('services', 'applications'));
        }else{
            // Prepare from date
            if(empty($request->fromDate))
            {
                $from = '1970-01-01 00:00:00'; //date format 'Y-m-d' date('Y-m-d'.' 00:00:00')
            }else{
                $from = $request->fromDate.' 00:00:00';
            }

            // Prepare to date
            if(empty($request->toDate))
            {
                $to = date('Y-m-d'. ' 23:59:59');
            }else{
                $to = $request->toDate.' 23:59:59';
            }

            if(empty($service_id))
            {
                $applications = ApplicationService::with('application')
                                ->where('created_at', '>=', $from)
                                ->where('created_at', '<=', $to)
                                ->groupBy('application_id')
                                ->latest()->paginate(25);
                                
            }else{
                $applications = ApplicationService::with('application')
                                ->where('service_id', $request->service_id)
                                ->where('created_at', '>=', $from)
                                ->where('created_at', '<=', $to)
                                ->groupBy('application_id')
                                ->latest()->paginate(25);
            }
            return view('backend.admin.report.onlineSalesFilter', compact('services', 'applications'));
        }

    }

    // Publication Sales controller
    public function publicationSales()
    {
        menuSubmenu('report', 'publicationSales');
        $roleId = Auth::user()->role_id;
        $userId = Auth::user()->id;
        $salesCenters = SalesCenter::where('status', 1)->get();

        if($roleId == 11)
        {
            $orders = ServiceOrder::where('user_id',$userId)->where('payment_status', 'paid')->latest()->paginate(15);
        }else{
            $orders = ServiceOrder::where('payment_status', 'paid')->latest()->paginate(15);
        }

        return view('backend.admin.report.publicationSales', compact('orders', 'salesCenters'));
    }

    // Publication Sales Filter controller
    public function publicationSalesFilter(Request $request)
    {
        menuSubmenu('report', 'publicationSales');

        // Prepare from date
        if(empty($request->fromDate))
        {
            $from = '1970-01-01 00:00:00'; //date format 'Y-m-d' date('Y-m-d'.' 00:00:00')
        }else{
            $from = $request->fromDate.' 00:00:00';
        }

        // Prepare to date
        if(empty($request->toDate))
        {
            $to = date('Y-m-d'. ' 23:59:59');
        }else{
            $to = $request->toDate.' 23:59:59';
        }

        $roleId = Auth::user()->role_id;
        $userId = Auth::user()->id;

        if($roleId == 11)
        {
            $orders = ServiceOrder::where('user_id',$userId)
                    ->where('payment_status', 'paid')
                    ->where('created_at', '>=', $from)
                    ->where('created_at', '<=', $to)
                    ->latest()->paginate(25);
            return view('backend.admin.report.publicationSalesFilter', compact('orders'));
        }else{
            $orders = ServiceOrder::where('payment_status', 'paid')
                    ->where('created_at', '>=', $from)
                    ->where('created_at', '<=', $to)
                    ->latest()->paginate(25);
            return view('backend.admin.report.publicationSalesFilter', compact('orders'));
        }

    }

    // Complementary report controller
    public function complementary()
    {
        menuSubmenu('report', 'complementary');
        
        $requisitions = Requisition::with('requisitionItems')->where('status', 3)->latest()->paginate(25);

        return view('backend.admin.report.complementary', compact('requisitions'));
    }

    // Complementary filter controller
    public function complementaryFilter(Request $request)
    {
        menuSubmenu('report', 'complementary');

        // Prepare from date
        if(empty($request->fromDate))
        {
            $from = '1970-01-01 00:00:00'; //date format 'Y-m-d' date('Y-m-d'.' 00:00:00')
        }else{
            $from = $request->fromDate.' 00:00:00';
        }

        // Prepare to date
        if(empty($request->toDate))
        {
            $to = date('Y-m-d'. ' 23:59:59');
        }else{
            $to = $request->toDate.' 23:59:59';
        }

        $requisitions = Requisition::with('requisitionItems')
                        ->where('status', 3)
                        ->where('created_at', '>=', $from)
                        ->where('created_at', '<=', $to)
                        ->latest()->paginate(25);
        
        return view('backend.admin.report.complementaryFilter', compact('requisitions'));

    }

    // Digital data controller
    public function digitalData()
    {
        $user = Auth::user();
        menuSubmenu('report', 'digitalData');

        if (Gate::allows('report', $user))
        {
            $items = ApplicationServiceItemDownload::with('service', 'serviceItem', 'itemDownloadDetail', 'application')
                                                    ->where('total_download', '>', '0')->latest()->paginate(25);
            return view('backend.admin.report.digitalData', compact('items'));
        }
    }

    // Data sale report filter by from date to date
    public function allDownloadFilter(Request $request)
    {
        $form = $request->fromDate.' 00:00:00';
        $to = $request->toDate.' 23:59:59';
        
        $items = ApplicationServiceItemDownload::with('service', 'serviceItem', 'itemDownloadDetail', 'application')
                                                ->where(function($query) use($form, $to){
                                                    $query->where('created_at', '>=', $form);
                                                    $query->where('created_at', '<=', $to);
                                                })->where('total_download', '>', '0')->latest()->paginate(25);
        return view('backend.admin.report.digitalData', compact('items'));
    }
    
    // Physical data controller
    public function SoldCopies()
    {
        $user = Auth::user();
        menuSubmenu('report', 'SoldCopies');

        if (Gate::allows('report', $user))
        {
            $salesCenters = SalesCenter::where('status', 1)->get();

            if($user->role_id == 11)
            {
                $items = ServiceInventory::with('service', 'serviceItem', 'ServiceOrderItem')
                                        ->where('sales_center_id', $user->sales_center)
                                        ->latest()->paginate(25);
            }else{

                $items = ServiceInventory::with('service', 'serviceItem', 'ServiceOrderItem')->latest()->paginate(25);
            }

            return view('backend.admin.report.SoldCopies', compact('items', 'salesCenters'));
        }
        
    }

    public function soldCopyPreview()
    {
        $user = Auth::user();
        menuSubmenu('report', 'SoldCopies');

        if (Gate::allows('report', $user))
        {
            $items = ServiceInventory::with('service', 'serviceItem', 'ServiceOrderItem')->latest()->paginate(25);
            return view('backend.admin.report.soldCopyPreview', compact('items'));
        }
    }

    public function ComplementaryCopies()
    {
        $user = Auth::user();
        menuSubmenu('report', 'ComplementaryCopies');

        if (Gate::allows('report', $user))
        {
            $items = ServiceInventory::latest()->paginate(25);
            return view('backend.admin.report.ComplementaryCopies', compact('items'));
        }
    }

    public function ComplementaryCopyPreview()
    {
        $user = Auth::user();
        menuSubmenu('report', 'ComplementaryCopies');

        if (Gate::allows('report', $user))
        {
            $items = ServiceInventory::latest()->paginate(25);
            return view('backend.admin.report.ComplementaryCopyPreview', compact('items'));
        }
    }

    
}
