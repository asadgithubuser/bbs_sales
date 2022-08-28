<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\ServiceInventory;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\InventoryUpdateHistory;
use App\Models\SalesCenter;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Validator;
class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_storage', $user)) 
        {
            menuSubmenu('storage', 'storeAllItem');
            
            if($user->role_id == 11)
            {
                $items = ServiceInventory::with('salesCenter')->where('sales_center_id', $user->sales_center)->latest()->paginate(25);
                $services = Service::get();
                $serviceItems = ServiceItem::get();
                $salesCenters = SalesCenter::where('status', 1)->get();
                
                return view('backend.admin.storage.index', compact('items', 'services', 'serviceItems', 'salesCenters'));
                
            }else{
                $items = ServiceInventory::with('salesCenter')->latest()->paginate(25);
                $services = Service::get();
                $serviceItems = ServiceItem::get();
                $salesCenters = SalesCenter::where('status', 1)->get();

                return view('backend.admin.storage.index',[
                    'items' => $items,
                    'services' => $services,
                    'serviceItems' => $serviceItems,
                    'salesCenters' => $salesCenters
                ]);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('manage_storage', $user)) 
        {
            menuSubmenu('storage', 'storeAddItem');
            
            $items = ServiceInventory::latest()->paginate(25);
            $services = Service::where('id',2)->first();
            $serviceItems = ServiceItem::where('data_type',1)->where('service_id',2)->get();
            $salesCenters = SalesCenter::where('status', 1)->get();
            // dd($serviceItems);
            return view('backend.admin.storage.create',[
                'items' => $items,
                'services' =>$services,
                'serviceItems' => $serviceItems,
                'salesCenters' => $salesCenters,
            ]);
        }
        else
        {
            abort(403);
        }
    }

    public function getSubCategoryByCategory(Service $category)
    {
        
        $subcat = ServiceItem::where('data_type',1)->where('service_id',$category->id)->get();
        
        return $subcat;
    }

    public function getBarcodeByCategory($category)
    {
        $barcode = ServiceItem::where('data_type',1)->where('id',$category)->get();
        
        return $barcode;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),
        [   
            'service_id' => ['required'],
            'service_item_id' => ['required'],
            'title' => ['required','min:3','string'],
            // 'subtitle' => ['required'],
            'no_of_sale_copies' => ['required'],
            'price' => ['required','integer'],
        ]);

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

        if(!$request->salesCenterId)
        {
            $salesCenterId = Auth::user()->sales_center;
        }else{
            $salesCenterId = $request->salesCenterId;
        }
        
        $items = new ServiceInventory;
        $items->sales_center_id = $salesCenterId;
        $items->service_id = $request->service_id;
        $items->service_item_id = $request->service_item_id;
        $items->title = $request->title;
        $items->sub_title = $request->subtitle;
        $items->data_source = $request->data_source;
        $items->survey_date = $request->survey_date;
        $items->publish_date = $request->publish_date;
        $items->downloadable_link = $request->downloadadble_link;
        $items->number_of_hard_copies = ($request->number_of_complimentary_copies) + ($request->no_of_sale_copies);
        $items->number_of_complimentary_copies = $request->number_of_complimentary_copies;

        $items->number_of_sale_copies = $request->no_of_sale_copies;
        $items->store_room = $request->store_room;
        $items->shelf_no = $request->shelf_no;
        $items->rack_no = $request->rack_no;
        $items->price = $request->price;
        $items->price_dollor = $request->price_dollor;
        $items->status = true;
        $items->can_download = $request->can_download == 'on' ? 1 : 0;
        // dd($request->can_download);
        $items->save();

        if($request->hasFile('attach_file'))
        {
            $cp = $request->file('attach_file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $items->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('pos/ebook/'.$randomFileName, File::get($cp));

            $items->attach_file = $randomFileName;
            $items->save();
      	} 

        if($request->hasFile('cover_file'))
        {
            $cp = $request->file('cover_file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $items->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('pos/ebookcover/'.$randomFileName, File::get($cp));

            $items->cover_file = $randomFileName;
            $items->save();
        } 

        return redirect()->route('admin.storage.index')->with('success','Item Successfully Added.');
       
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
    public function edit(ServiceInventory $serviceInventory)
    {
        $services = Service::get();
        $serviceItems = ServiceItem::get();
        return view('backend.admin.storage.edit',[
            'item' => $serviceInventory,
            'services' => $services,

        ]);
    }


    public function updateInventory(Request $request, ServiceInventory $item)
    {
        $validation = Validator::make($request->all(),
        [               
            // 'number_of_complimentary_copies' => ['required','gt:0'],
            // 'no_of_sale_copies' => ['required','gt:0'],
        ]);

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

        $item->number_of_hard_copies = $item->number_of_hard_copies + ($request->number_of_complimentary_copies) + ($request->no_of_sale_copies);
        $item->number_of_complimentary_copies = $item->number_of_complimentary_copies + $request->number_of_complimentary_copies;
        $item->number_of_sale_copies = $item->number_of_sale_copies + $request->no_of_sale_copies;
        $item->save();

        $history = new InventoryUpdateHistory;

        $history->service_inventory_id = $item->id;
        $history->number_of_hard_copies = ($request->number_of_complimentary_copies) + ($request->no_of_sale_copies);
        $history->number_of_complimentary_copies = $request->number_of_complimentary_copies;
        $history->number_of_sale_copies = $request->no_of_sale_copies;
        $history->added_by = Auth::id();
        $history->save();

        return back()->with('success','Inventory Updated Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceInventory $item)
    {
        $validation = Validator::make($request->all(),
        [   
            'service_id' => ['required'],
            'service_item_id' => ['required'],
            'title' => ['required','min:3','string'],
            'subtitle' => ['required'],
            'no_of_hard_copies' => ['required','gt:0'],
            'no_of_sale_copies' => ['required','gt:0'],
            'price' => ['required','integer','gt:0'],
        ]);

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


        $item->service_id = $request->service_id;
        $item->service_item_id = $request->service_item_id;
        $item->title = $request->title;
        $item->sub_title = $request->subtitle;
        $item->data_source = $request->data_source;
        $item->survey_date = $request->survey_date;
        $item->publish_date = $request->publish_date;
        $item->downloadable_link = $request->downloadadble_link;
        $item->number_of_hard_copies = $request->no_of_hard_copies;
        $item->number_of_complimentary_copies = $request->number_of_complimentary_copies;

        $item->number_of_sale_copies = $request->no_of_sale_copies;
        $item->store_room = $request->store_room;
        $item->shelf_no = $request->shelf_no;
        $item->rack_no = $request->rack_no;
        $item->price = $request->price;
        $item->price_dollor = $request->price_dollor;

        $item->status = true;
        $item->save();

        return redirect()->route('admin.storage.index')->with('success','Item Successfully Updated.');
    }

    // Generate Barcode
    public function barcode($id)
    {
        $item = ServiceInventory::with('serviceItem')
                                ->where('id', $id)
                                ->first();

        return view('backend.admin.storage.barcode', compact('item'));
        
    }

    // status in /active
    public function delete($id)
    {
        $item = ServiceInventory::find($id);
        if($item->status == true)
        {
            $item->status = false;
            $item->save();
            return back()->with('success','Service Inactive Successfully.');
        }
        elseif($item->status == false)
        {
            $item->status = true;
            $item->save();
            return back()->with('success','Service Active Successfully.');;

        }
        
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

}
