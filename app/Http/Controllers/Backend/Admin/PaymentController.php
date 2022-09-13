<?php

namespace App\Http\Controllers\Backend\Admin;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Payment;
use App\Models\ServiceItemPrice;
use App\Models\DollarConvertTaka;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Auth;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Application $application, Request $request)
    {
            $dollarConvertToTaka = DollarConvertTaka::where('status', 'active')->first()->dollar_value;
        if($request->type == 1)
        {

            $validation = Validator::make($request->all(),
            [                 
                'bank_name' => ['required','min:3','string'],
                'bank_account' => ['required','min:3','string'],
                'chalan_scr' => ['required'],
                'chalan_scr' => ['max:5120'],
            ]);
        }
        elseif($request->type == 2)
        {
           
            $validation = Validator::make($request->all(),
            [
                'method' => ['required'],
                'bank_name1' => ['required'],
                'mobile_bank_scr' => ['required'],
                'mobile_bank_scr' => ['max:5120'],

            ]);
        }

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }
      
        $pay = new Payment;
        $pay->division_id = $application->division_id;
        $pay->district_id = $application->district_id;
        $pay->upazila_id = $application->upazila_id;
        $pay->office_id = $application->office_id;
        $pay->application_id = $application->id;
        $pay->sr_user_id = $application->sr_user_id;
        $pay->nid = $application->user ? $application->user->nid_no : '';
        $pay->dob = $application->user ? $application->user->dob : '';
        $pay->amount = $application->total_price * $dollarConvertToTaka;
        $pay->fees = $application->total_price;
        
        $pay->pg_id = null;
        $pay->is_app = false;
        $pay->challan_no = null;
        $pay->request_time = date('Y-m-d');
        
        $pay->save();

        if($request->type == 1) // bank payment
        {            
            $pay->bank_name = $request->bank_name;
            $pay->account_number = $request->bank_account;
            $pay->submission_date = $request->submission_date;
            $pay->pay_type = 'off_bank';
            $pay->transaction_id = null;
            if($request->hasFile('chalan_scr'))
            {
                $cp = $request->file('chalan_scr');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = $pay->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

                Storage::disk('public')->put('payments/'.$randomFileName, File::get($cp));

                $pay->document_img = $randomFileName;
                $pay->save();
            } 
        }
        elseif($request->type == 2) // mobile bank payment
        {
            $pay->bank_name = $request->bank_name1;
            $pay->pay_type = 'off_mobile_bank';
            $pay->mobile_bank = $request->method1;
            $pay->transaction_id = $request->mobile_bank_trxt_id;
            if($request->hasFile('mobile_bank_scr'))
            {
                $cp = $request->file('mobile_bank_scr');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = $pay->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

                Storage::disk('public')->put('payments/'.$randomFileName, File::get($cp));

                $pay->document_img = $randomFileName;
                $pay->save();
            } 
        }


        
        return redirect()->route('admin.application.index')->with('success','Payment Successfully Done. Please wait for approve.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dollarConvertPage()
    { 

        menuSubmenu('dollar_value_in_taka', 'dollar_convert_in_taka_list');

        $convertedDollarLists = DollarConvertTaka::latest('created_at')->paginate(15);

        return view('backend.admin.dollarConvertInTaka.index', compact('convertedDollarLists'));
        
    }
    public function convertedDollarValueStore(Request $request)
    { 
        DollarConvertTaka::latest('created_at')->update([
            'status' => 0
        ]);
        DollarConvertTaka::create([
            'user_id' => Auth::user()->id,
            'dollar_value' => $request->dollarValue,
            'status' => 'active',
        ]);



        return back()->with('success', 'Dollar Value Stored Successfully.');
        
    }
    public function ajaxGetTotalAmount(Request $request)
    { 
        $dollar_value = DollarConvertTaka::where('status', 'active')->first()->dollar_value;

        $total_price = Application::where('id',$request->id)->first()->total_price;

        return $dollar_value * $total_price;
        
    }
}