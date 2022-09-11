<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\ServiceItem;
use App\Models\ServiceItemLocation;
use App\Models\ServiceItemAdditional;
use App\Models\Service;
use App\Models\Department;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Village;
use App\Models\EA;
use App\Models\HouseHold;
use App\Models\Population;
use App\Models\Datatype;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('services', 'allServiceItems');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('all_service_items', $user)) 
            {
                $serviceItems = ServiceItem::with('service', 'data_subcategory')->latest()->paginate(25);

                return view('backend.admin.serviceItem.index', compact('serviceItems'));
            }
            else
            {
                abort(403);
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
        menuSubmenu('services', 'addServiceItem');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('add_service_item', $user)) 
            {
                $services = Service::where('id', '!=', 2)->where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();
                $unions = Union::where('status',true)->get();
                $mouzas = Mouza::where('status',true)->get();
                $villages = Village::where('status',true)->get();
                $eas = EA::where('status',true)->get();
                $households = HouseHold::where('status',true)->get();
                $unions = Union::where('status',true)->get();
                $datatypes = Datatype::where('status', 1)->get();

                return view('backend.admin.serviceItem.create', compact('services', 'divisions', 'districts', 'upazilas', 'unions', 'departments', 'datatypes'));
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'service_id'            => 'required',
            // 'data_type'             => 'required',
            // 'service_item_type'     => 'required',
            // 'data_subcategory_id'   => 'required',
            // 'department_id'         => 'required',
            // 'year'                  => 'required',
            // 'item_name_bn'          => 'required|max:255',
            'item_name_en'          => 'required|max:255',
            // 'price_bdt_personal'    => 'required|numeric',
            // 'price_bdt_org'         => 'required|numeric',
            // 'price_usd_personal'    => 'required|numeric',
            // 'price_usd_org'         => 'required|numeric',
            // 'ordering'              => 'required',
        ]);

        $serviceItem = new ServiceItem;
        
        $serviceItem->service_id            = $request->service_id;

        if ($request->service_additional_id) {
            $serviceItem->service_additional_id = implode(',', $request->service_additional_id);
        }
        
        $serviceItem->service_item_type     = $request->service_item_type;
        $serviceItem->data_subcategory_id   = $request->data_subcategory_id;
        $serviceItem->department_id         = $request->department_id;
        $serviceItem->year                  = $request->year;
        $serviceItem->data_type             = $request->data_type;
        $serviceItem->item_name_bn          = $request->item_name_bn;
        $serviceItem->item_name_en          = $request->item_name_en;

        $serviceItem->price_bdt_personal    = $request->price_bdt_personal;
        $serviceItem->price_bdt_org         = $request->price_bdt_org;
        $serviceItem->price_usd_personal    = $request->price_usd_personal;
        $serviceItem->price_usd_org         = $request->price_usd_org;
        $serviceItem->description           = $request->description;
        $serviceItem->ordering              = $request->ordering;
        $serviceItem->file_type             = $request->file_type;
        $serviceItem->status                = 1;
        $serviceItem->created_by            = Auth::id();

        $division_id    = $request->input('division_id', []);
        $district_id    = $request->input('district_id', []);
        $upazila_id     = $request->input('upazila_id', []);
        $union_id       = $request->input('union_id', []);
        $mouza_id       = $request->input('mouza_id', []);
        $village_id     = $request->input('village_id', []);
        $ea_id          = $request->input('ea_id', []);
        $household_id   = $request->input('household_id', []);
        $population_id  = $request->input('population_id', []);

        $serviceItem->save();
        
        $serviceItem->barcode = 'bbs'.sprintf('%08d', $serviceItem->id);

        $serviceItem->save();

        if($request->hasFile('data_file'))
        {
            $cp = $request->file('data_file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $serviceItem->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('service/item/'.$randomFileName, File::get($cp));

            $serviceItem->attachment = $randomFileName;
            $serviceItem->save();
      	} 

        if($request->hasFile('sample_attachment'))
        {
            $cp = $request->file('sample_attachment');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $serviceItem->id.'sample'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('service/item/'.$randomFileName, File::get($cp));

            $serviceItem->sample_attachment = $randomFileName;
            $serviceItem->save();
      	} 

        $results = [];

        foreach ($division_id as $index => $unit) {

            $results[] = [
                    "service_item_id"   => $serviceItem->id,
                    "division_id"       => $division_id[$index],
                    "district_id"       => $district_id[$index],
                    "upazila_id"        => $upazila_id[$index],
                    "union_id"          => $union_id[$index],
                    "mouza_id"          => $mouza_id[$index],
                    "village_id"        => $village_id[$index],
                    "ea_id"             => $ea_id[$index],
                    "household_id"      => $household_id[$index],
                    "population_id"     => $population_id[$index],
                    "created_at"        => now(),
                    "updated_at"        => now(),
                ];
            
        }

        ServiceItemLocation::insert($results);

        return redirect()->route('admin.serviceItem.index')->with('success', 'Service Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('view_service_item', $user)) 
            {
                $additionals = [];
                $serviceItemAdditionals = [];
                $serviceItem = ServiceItem::with('service', 'user', 'user_update')
                                            ->where('id', $id)
                                            ->first();

                $serviceItemLocations = ServiceItemLocation::where('service_item_id', $id)->get();

                if ($serviceItem->service_additional_id) {
                    $additionals = explode(',', $serviceItem->service_additional_id);

                    $serviceItemAdditionals = ServiceItemAdditional::whereIn('id', $additionals)->get();
                }

                return view('backend.admin.serviceItem.show', compact('serviceItem', 'serviceItemLocations', 'serviceItemAdditionals'));
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('edit_service_item', $user)) 
            {
                $additionals = [];
                $serviceItemAdditionals = [];

                $services = Service::where('id', '!=', 2)->where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
    
                $serviceItem = ServiceItem::where('id', $id)->first();

                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();
                $unions = Union::where('status',true)->get();
                
                $mouzas = Mouza::where('status',true)->get();
                $villages = Village::where('status',true)->get();
                $eas = EA::where('status',true)->get();
                $households = HouseHold::where('status',true)->get();
                $serviceItemLocations = ServiceItemLocation::where('service_item_id',$id)->get(); 
                $datatypes = Datatype::where('service_item_type', $serviceItem->service_item_type)->get();
                
                if($serviceItemLocations->count() == 0)
                {
                    $value = 'null';
                }
                else
                {
                    $value = 'yes';
                }

                if ($serviceItem->service_additional_id) {
                    $additionals = explode(',', $serviceItem->service_additional_id);

                    $serviceItemAdditionals = ServiceItemAdditional::where('service_id', $serviceItem->service_id)->get();
                }

                return view('backend.admin.serviceItem.edit', compact('value', 'mouzas', 'villages', 'eas', 'households','serviceItem', 'services', 'divisions', 'districts', 'upazilas', 'unions', 'serviceItemLocations', 'serviceItemAdditionals', 'departments', 'additionals', 'datatypes'));
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceItem $serviceItem)
    {
        // dd($request->all());
        $request->validate([
            'service_id'            => 'required',
            // 'data_type'             => 'required',
            // 'service_item_type'     => 'required',
            // 'data_subcategory_id'   => 'required',
            // 'department_id'         => 'required',
            // 'year'                  => 'required',
            // 'item_name_bn'          => 'required|max:255',
            'item_name_en'          => 'required|max:255',
            // 'price_bdt_personal'    => 'required|numeric',
            // 'price_bdt_org'         => 'required|numeric',
            // 'price_usd_personal'    => 'required|numeric',
            // 'price_usd_org'         => 'required|numeric',
            // 'ordering'              => 'required',
        ]);

        if ($request->service_additional_id) {
            $serviceItem->service_additional_id = implode(',', $request->service_additional_id);
        }
        
        $serviceItem->service_id            = $request->service_id;
        $serviceItem->data_type             = $request->data_type;
        $serviceItem->service_item_type     = $request->service_item_type;
        $serviceItem->data_subcategory_id   = $request->data_subcategory_id;
        $serviceItem->department_id         = $request->department_id;
        $serviceItem->year                  = $request->year;
        $serviceItem->item_name_bn          = $request->item_name_bn;
        $serviceItem->item_name_en          = $request->item_name_en;
        $serviceItem->price_bdt_personal    = $request->price_bdt_personal;
        $serviceItem->price_bdt_org         = $request->price_bdt_org;
        $serviceItem->price_usd_personal    = $request->price_usd_personal;
        $serviceItem->price_usd_org         = $request->price_usd_org;
        $serviceItem->description           = $request->description;
        $serviceItem->file_type             = $request->file_type;
        $serviceItem->ordering              = $request->ordering;
        $serviceItem->status                = $request->status;
        $serviceItem->updated_by            = Auth::id();
        
        $serviceItem->save();

        if($request->hasFile('data_file'))
        {
            $cp = $request->file('data_file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $serviceItem->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('service/item/'.$randomFileName, File::get($cp));

            if($serviceItem->attachment)
            {
                $f = 'service/item/'.$serviceItem->attachment;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $serviceItem->attachment = $randomFileName;
            $serviceItem->save();
      	} 

        if($request->hasFile('sample_attachment'))
        {
            $cp = $request->file('sample_attachment');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $serviceItem->id.'sample'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('service/item/'.$randomFileName, File::get($cp));

            if($serviceItem->sample_attachment)
            {
                $f = 'service/item/'.$serviceItem->sample_attachment;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $serviceItem->sample_attachment = $randomFileName;
            $serviceItem->save();
      	} 

        $datas = ServiceItemLocation::where('service_item_id', $serviceItem->id)->get();

        if($datas)
        {

            foreach($datas as $data)
            {
                $data->delete();
            }
        }
        
        $division_id    = $request->input('division_id', []);
        $district_id    = $request->input('district_id', []);
        $upazila_id     = $request->input('upazila_id', []);
        $union_id       = $request->input('union_id', []);
        $mouza_id       = $request->input('mouza_id', []);
        $village_id     = $request->input('village_id', []);
        $ea_id          = $request->input('ea_id', []);
        $household_id   = $request->input('household_id', []);
        $population_id  = $request->input('population_id', []);

        $results = [];
        
        foreach ($division_id as $index => $unit) {
            // dd($unit);
            $results[] = [
                    "service_item_id"   => $serviceItem->id,
                    "division_id"       => $division_id[$index],
                    "district_id"       => $district_id[$index],
                    "upazila_id"        => $upazila_id[$index],
                    "union_id"          => $union_id[$index],
                    "mouza_id"          => $mouza_id[$index],
                    "village_id"        => $village_id[$index],
                    "ea_id"             => $ea_id[$index],
                    "household_id"      => $household_id[$index],
                    "population_id"     => $population_id[$index],
                    "created_at"        => now(),
                    "updated_at"        => now(),
                ];
            
                
        }

        ServiceItemLocation::insert($results);

        return redirect()->route('admin.serviceItem.index')->with('success', 'Service Item Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(ServiceItem $serviceItem)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('delete_service_item', $user)) 
            {
                if ($serviceItem->status == 0) {
                    $serviceItem->status       = 1;
                    $serviceItem->updated_by   = Auth::id();
                }
                else if ($serviceItem->status == 1) {
                    $serviceItem->status       = 0;
                    $serviceItem->updated_by   = Auth::id();
                }
        
                $serviceItem->save();
        
                return redirect()->route('admin.serviceItem.index')->with('success', 'Service Item Status Changed Successfully.');
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
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
        ServiceItemLocation::where('id', $id)->delete();

        return redirect()->back();
    }
}
