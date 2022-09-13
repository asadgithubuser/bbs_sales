<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceItem;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Payment;
use App\Imports\CommodityImport;
use App\Models\ServiceInventory;
use Session;
use Excel;

class FrontendController extends Controller
{
    // Method for index page
    public function index()
    {

        // set_time_limit(360);


// ============== sql data trasfer from ServiceItem to ServiceInventory table ================


        // $count = 0;
        // $serviceItems = ServiceItem::get();
        // foreach($serviceItems as $serviceItem){


        //     if($serviceItem->service_item_type == 1){
        //         $service_item_type = 'Survey Data';
        //     }else if($serviceItem->service_item_type == 2){
        //         $service_item_type = 'Census Data';
        //     }


        //     //generate downloadable_link;
        //     // $downloadable_link = 

        //     $cerviceInventory = new ServiceInventory;
        //     $cerviceInventory->sales_center_id                 = $serviceItem->department_id;
        //     $cerviceInventory->service_id                      = $serviceItem->service_id;
        //     $cerviceInventory->service_item_id                 = $serviceItem->id;
        //     $cerviceInventory->title                           = $serviceItem->item_name_en;
        //     $cerviceInventory->sub_title                       = $serviceItem->description;
        //     $cerviceInventory->data_source                     = $service_item_type;
        //     $cerviceInventory->service_type                    = $service_item_type;
        //     $cerviceInventory->attach_file                     = $serviceItem->attachment;
        //     $cerviceInventory->survey_date                     = null;
        //     $cerviceInventory->publish_date                    = $serviceItem->year;
        //     $cerviceInventory->downloadable_link               = $serviceItem->item_name_en;
        //     $cerviceInventory->number_of_hard_copies           = 0;
        //     $cerviceInventory->number_of_complimentary_copies  = 0;
        //     $cerviceInventory->number_of_sale_copies           = 0;
        //     $cerviceInventory->store_room                      = 0;
        //     $cerviceInventory->cover_file                      = $serviceItem->item_name_en;
        //     $cerviceInventory->shelf_no                        = 0;
        //     $cerviceInventory->rack_no                         = 0;
        //     $cerviceInventory->price                           = $serviceItem->price_bdt_org;
        //     $cerviceInventory->price_dollor                    = $serviceItem->price_usd_org;
        //     $cerviceInventory->status                          = 1;
        //     $cerviceInventory->can_download                    = 1;
        //     $cerviceInventory->created_by                      = $serviceItem->created_by;
        //     $cerviceInventory->updated_by                      = $serviceItem->updated_by;
        //     $cerviceInventory->save();

        //     $count ++;
        // }

        // return $count." items inserted successfully."; 


        // exit();

 

// Population and Housing Census 2011

  
        $notices = Notice::orderBy('id', 'desc')
                           ->where('status', 1)
                           ->limit(5)
                           ->get();

        $services = Service::where('status',true)->get();

        return view('frontend.index', compact('notices', 'services'));
    }

    public function importCSVtoDB(Request $request)
    {
         
$count = 0;

        $file = $request->file('csv_file');

        if($file != null){
            $excel_rows = Excel::toArray(new CommodityImport, $file);

            foreach($excel_rows[0] as $index => $row){

                $items = new ServiceInventory;
                $items->sales_center_id = $row[0];
                $items->service_id = 2;
                $items->service_item_id = null;
                $items->title = $row[4];
                $items->sub_title = $row[5];
                $items->data_source = null;
                $items->service_type = 'Publication Data';
                $items->attach_file = null;
                $items->survey_date = $row[7];
                $items->publish_date = $row[8];
                $items->downloadable_link = 0;
                $items->number_of_hard_copies = 0;
                $items->number_of_complimentary_copies = 0;
                $items->number_of_sale_copies = 0;
                $items->store_room = 0;
                $items->shelf_no = 0;
                $items->rack_no = 0;
                $items->price = $row[16];
                $items->price_dollor = $row[17];
                $items->status = 1;
                $items->can_download = 0;
                $items->created_by = 1;
                $items->updated_by = null;
                $items->save();

$count ++;

            }
        }


        return $count." items inserted successfully."; 
        


    }

    public function allDataForFreeBook(Request $request)
    {
        $books = ServiceInventory::where('id',$request->e_book)->get();
        $flag = 1;

        return view('frontend.freePublicationData',[
            'serviceInventories' => $books,
            'flag'=>$flag
        ]);
    }

    public function noticeDetails($id)
    {
        $notice = Notice::where('id', $id)->first();
        return view('frontend.noticeDetails', compact('notice'));
        
    }

    // Show Citizen Login Page
    public function citizenLogin(Request $request)
    {
        $session_msg = $request->session();

        if(isset($request->success) && ($request->success != 1)){
            return redirect()->route('citizenLogin')->with('error', 'User Already Exist! Login and Apply for Service.');
        } else {
            return view('frontend.citizenLogin', compact('session_msg'));
        }

    }

    // Show Office Login Page
    public function officeLogin()
    {

        return view('frontend.officeLogin');
    }

    public function freePublicationData()
    {
        $datas = ServiceInventory::where('can_download',1)->get();

        $flag = 0;
        return view('frontend.freePublicationData',[
            'serviceInventories' => $datas,
            'flag'=>$flag
        ]);
    }

    // Show census publication page
    public function service($id)
    {
        $serviceItems = ServiceItem::where('service_id', $id)->where('status', 1)->get();
        $service = Service::find($id);
        
        return view('frontend.service', compact('serviceItems','service'));
    }

    public function responseEkpayIpnTax(Request $request)
    {
        $infos = $request->all();
        $msg_code       = $infos['msg_code'];
        $request_id     = $infos['trnx_info']['mer_trnx_id'];
        $trnx_id        = $infos['trnx_info']['trnx_id'];
        $trnx_amt       = $infos['trnx_info']['trnx_amt'];
        $pi_trnx_id     = $infos['trnx_info']['pi_trnx_id'];
        if($msg_code == 1020){

            $Payment = Payment::where('id',$request_id)->first();
            $Payment->transaction_id = $trnx_id;
            $Payment->save();
        }
    }

    public function search(Request $request)
    {
        $search_item = $request->search_item;

        $serviceItems = ServiceItem::where(function($query) use($search_item){
            $query->where('item_name_en', 'like', '%'.$search_item.'%')
                  ->orWhere('item_name_bn', 'like', '%'.$search_item.'%');
        })
        ->where(function($queryy){
            $queryy->where('service_id', 1)
                    ->orWhere('service_id', 3);
        })
        ->paginate(10);

        return view('frontend.search', compact('search_item', 'serviceItems'));
    }

}
