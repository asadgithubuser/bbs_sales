<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ServiceItem;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Payment;
use Session;

class FrontendController extends Controller
{
    // Method for index page
    public function index()
    {
        $notices = Notice::orderBy('id', 'desc')
                           ->where('status', 1)
                           ->limit(5)
                           ->get();

        $services = Service::where('status',true)->get();

        return view('frontend.index', compact('notices', 'services'));
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

}
