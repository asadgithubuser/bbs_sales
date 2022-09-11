<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Response;
use Auth;
use Session;
use Validator;

/* included models */
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\TrainingCourseCurriculumn;
use App\Models\Mouza;
use App\Models\Village;
use App\Models\TrainingCourse;
use App\Models\EA;
use App\Models\HouseHold;
use App\Models\TrainingCourseDuration;
use App\Models\Population;
use App\Models\Designation;
use App\Models\Office;
use App\Models\ServiceItem;
use App\Models\ServiceItemAdditional;
use App\Models\ServiceItemLocation;
use App\Models\ServiceInventory;
use App\Models\ServiceCart;
use App\Models\ServiceCartItem;
use App\Models\ReceivingMode;
use App\Models\Department;
use App\Models\CropType;
use App\Models\Crop;
use App\Models\Datatype;
use App\Models\ServiceItemPrice;

use Illuminate\Support\Arr;

class DynamicDependentController extends Controller
{
    public function getAdditionalsByService(Request $request){

        $data = $request->all();

        $serviceItemAdditonals = ServiceItemAdditional::where('service_id', $data['service_id'])
                                                        ->select('id', 'item_name_en')
                                                        ->get();

        return Response::json($serviceItemAdditonals);
    }

    public function getunioncode(Request $request){

        $data = $request->all();

        $union = Union::where('id', $data['union_id'])
                        ->select('id', 'name_en', 'union_bbs_code', 'nunion_bbs_code')
                        ->first();

        return Response::json($union);
    }

    public function getupazilacode(Request $request){

        $data = $request->all();

        $upazila = Upazila::where('id', $data['upazila_id'])
                            ->select('id', 'name_en', 'upazila_bbs_code')
                            ->first();

        return Response::json($upazila);
    }

    public function getdivisioncode(Request $request){

        $data = $request->all();

        $division = Division::where('id', $data['division_id'])
                            ->select('id', 'name_en', 'division_bbs_code')
                            ->first();

        return Response::json($division);
    }

    public function getdistrictcode(Request $request){

        $data = $request->all();

        $district = District::where('id', $data['district_id'])
                            ->select('id', 'name_en', 'district_bbs_code')
                            ->first();

        return Response::json($district);
    }

    public function getCropsByForm(Request $request){

        $data = $request->all();

        $formId = $data['form_id'];

        $crops = Crop::whereRaw("find_in_set($formId, form_id)")
                        ->where('status',1)->where('is_published',1)
                        ->select('id', 'name_en')
                        ->get();

        return Response::json($crops);
    }

    public function getcropTypesByCrop(Request $request){

        $data = $request->all();

        $cropTypes = CropType::where('crop_id', $data['crop_id'])
                                ->select('id', 'crop_type_en', 'crop_type_bn')
                                ->get();

        return Response::json($cropTypes);
    }

    public function getSubCategoryByCategory(Request $request){

        $data = $request->all();

        $dataSubcategorys = Datatype::where('service_item_type', $data['service_item_type'])
                                    ->select('id', 'name_en', 'name_bn')
                                    ->get();

        return Response::json($dataSubcategorys);
    }

    public function crops_by_category(Request $request){

        $data = $request->all();

        // $dataSubcategorys = Datatype::where('service_item_type', $data['service_item_type'])
        //                             ->select('id', 'name_en', 'name_bn')
        //                             ->get();

        // return Response::json($dataSubcategorys);
    }

    public function getDistrictsByDivision(Request $request){

        $data = $request->all();

        $districts = District::where('division_id', $data['division_id'])
                                ->select('id', 'name_en')
                                ->get();

        return Response::json($districts);
    }

    // Get crop code
    public function getCropCode(Request $request)
    {
        $data = $request->all();
        $cropCode = Crop::where('id', $data['crop_id'])
                            ->select('code')->first();
        return Response::json($cropCode);
    }

    // Survey notification get districts
    public function surveyNotificationGetDistricts(Request $request){

        $data = $request->all();

        $districts = District::whereIn('division_id', $data['division_id'])
                                ->select('id', 'name_en')
                                ->get();

        return Response::json($districts);
    }

    public function getUpazilasByDistrict(Request $request){

        $data = $request->all();

        $upazilas = Upazila::where('district_id', $data['district_id'])
                            ->select('id', 'name_en')
                            ->get();

        return Response::json($upazilas);
    }

    // survey notification get upazilas
    public function surveyNotificationGetUpazilas(Request $request){

        $data = $request->all();

        $upazilas = Upazila::whereIn('district_id', $data['district_id'])
                            ->select('id', 'name_en')
                            ->get();

        return Response::json($upazilas);
    }

    public function getUnionsByUpazila(Request $request){

        $data = $request->all();

        $unions = Union::where('upazila_id', $data['upazila_id'])
                                ->select('id', 'name_en')
                                ->get();

        return Response::json($unions);
    }

    public function getMouzasByUnion(Request $request){

        $data = $request->all();

        $mouzas = Mouza::where('union_id', $data['union_id'])
                        ->select('id', 'name_en')
                        ->get();

        return Response::json($mouzas);
    }

    public function geVillagesByMouza(Request $request){

        $data = $request->all();

        $villages = Village::where('mouza_id', $data['mouza_id'])
                            ->select('id', 'name_en')
                            ->get();

        return Response::json($villages);
    }

    public function getEAsByVillage(Request $request){

        $data = $request->all();

        $eas = EA::where('village_id', $data['village_id'])
                            ->select('id', 'name_en')
                            ->get();

        return Response::json($eas);
    }

    public function getHouseholdsByEA(Request $request){

        $data = $request->all();

        $households = HouseHold::where('ea_id', $data['ea_id'])
                                ->select('id', 'name_en')
                                ->get();

        return Response::json($households);
    }

    public function getPopulationsByHousehold(Request $request){

        $data = $request->all();

        $populations = Population::where('household_id', $data['household_id'])
                                    ->select('id', 'name_en')
                                    ->get();

        return Response::json($populations);
    }

    public function getDesignationsByOffice(Request $request){

        $data = $request->all();

        $designations = Designation::where('office_id', $data['office_id'])
                            ->select('id', 'name_en')
                            ->get();

        return Response::json($designations);
    }

    public function getOfficesByUpazila(Request $request)
    {
        $data = $request->all();

        $offices = Office::where('upazila_id', $data['upazila_id'])
                            ->select('id', 'title_en')
                            ->get();
        return Response::json($offices);
    }

    public function getDepartmentsByLevel(Request $request)
    {
        $data = $request->all();

        $departments = Department::where('level_id', $data['level_id'])
                                    ->select('id', 'name_en')
                                    ->get();
                                    
        return Response::json($departments);
    }

    public function reqServiceItems(Request $request){

        $data = $request->all();

        $service_items = ServiceItem::where('service_id', $data['service_id'])
                                    ->select('id', 'item_name_en')
                                    ->get();

        return Response::json($service_items);
    }

    public function reqServiceInventoryItems(Request $request){

        $data = $request->all();

        $service_inventory_items = ServiceInventory::where('service_item_id', $data['service_item_id'])
                                                    ->select('id', 'title')
                                                    ->get();

        return Response::json($service_inventory_items);
    }

    public function reqComplementaryQuantity(Request $request){

        $data = $request->all();

        $service_inventory_item = ServiceInventory::where('id', $data['service_inventory_item_id'])
                                                    ->select('id', 'number_of_complimentary_copies')
                                                    ->first();

        return Response::json($service_inventory_item);
    }

    public function getItemsDatatype(Request $request){
        // dd(1);
        $data = $request->all();

        $service_item_type      = $data['service_item_type'];
        $data_subcategory_id    = $data['data_subcategory_id'];

        if($service_item_type == null)
        {
            $data_subcategory_id = null;
        }

        $serviceItemList = '';

        if ($service_item_type == null && $data_subcategory_id == null) {
            $serviceItems = ServiceItem::where('service_id', 2)->where('status', 1)->get();
            // dd($serviceItems);
        } else {
            $serviceItems = ServiceItem::when($service_item_type, function($query) use ($service_item_type){
                                            $query->where('service_item_type', $service_item_type);
                                        })
                                        ->when($data_subcategory_id, function($query) use ($data_subcategory_id){
                                            $query->where('data_subcategory_id', $data_subcategory_id);
                                        })
                                        ->get();
        }

        foreach ($serviceItems as $serviceItem) {
            $serviceItemList .= '<label class="checkbox" style="margin: 0 auto 1rem auto;">
                                    <input type="checkbox" name="service_item_id[]" class="serviceItem_id" onChange="serviceInventoryItem('.$serviceItem->id.')" value="'.$serviceItem->id.'" id="service_item_id'.$serviceItem->id.'">
                                    <span></span>
                                    '.$serviceItem->item_name_en.'
                                </label>';
        }
        
        return Response::json($serviceItemList);
    }

    public function getItemsByService(Request $request)
    {
        $data = $request->all();

        $division_id            = $data['division_id'];
        $district_id            = $data['district_id'];
        $upazila_id             = $data['upazila_id'];
        $union_id               = $data['union_id'];
        $mouza_id               = $data['mouza_id'];
        $service_item_type      = $data['service_item_type'];
        $data_subcategory_id    = $data['data_subcategory_id'];
        $department_id          = $data['department_id'];
        $year                   = $data['year'];

        $service_id = explode(',', $data['service_id']);
 
        $serviceItemList ='';

        foreach($service_id as $item){

            if ($service_item_type == '' && $data_subcategory_id == '') {
                $serviceItems = ServiceItem::where('service_items.service_id', $item)->get();
            } else {
                $serviceItems = ServiceItem::where('service_items.service_id', $item)
                                                    ->when($service_item_type, function($query) use ($service_item_type){
                                                        $query->where('service_items.service_item_type', $service_item_type);
                                                    })
                                                    ->when($data_subcategory_id, function($query) use ($data_subcategory_id){
                                                        $query->where('service_items.data_subcategory_id', $data_subcategory_id);
                                                    })
                                                    ->get();
            }

            $serviceItemList .=  '<div class="s_item_list'.$item.' mb-3"><select class="form-control select22 service_item_select" onChange="itemSelect(this)" name="service_item_selected[]" multiple>';

            foreach ($serviceItems as $serviceItem) {
                $serviceItemList .= '<option value="'.$serviceItem->id.'" class=" items'.$item.' itemdata'.$serviceItem->id.'" >'. $serviceItem->item_name_en.'</option>';
            }

            $serviceItemList .= "</select></div>";
        }
        
        return Response::json($serviceItemList);
       
    }

    public function getItemsByServiceItem(Request $request)
    {
       
        $data = $request->all();

        $service_item_type      = $data['service_item_type'];
        $data_subcategory_id    = $data['data_subcategory_id'];

        $service_id = explode(',', $data['service_id']);
 
        $serviceItemList ='';

        foreach($service_id as $item){

            $serviceItems = ServiceInventory::where('service_item_id', $item)->where('number_of_sale_copies', '>', 0)->get();

            $serviceItemList .=  '<div class="s_item_list'.$item.' mb-3"><select class="form-control select22 service_item_select" onChange="inventoryItemSelect(this)" name="service_inventory_item_id[]" multiple required>';

            foreach ($serviceItems as $serviceItem) {
                $serviceItemList .= '<option value="'.$serviceItem->id.'" class=" items'.$item.' itemdata'.$serviceItem->id.'" >'. $serviceItem->title.'</option>';
            }

            $serviceItemList .= "</select></div>";
        }
        
        return Response::json($serviceItemList);
       
    }

    public function getItemPriceByService(Request $request)
    {
        $data = $request->all();
        
        $serviceItems = ServiceItem::where('service_id', $data['service_id'])
                                    ->select('id', 'item_name_en', 'price_bdt_personal', 'price_bdt_org', 'price_usd_personal', 'price_usd_org')
                                    ->get();
        
        $totalItem = 0;
        
        $serviceItemList = '';
        
        if ($data['usage_type'] == '1') {
            if ($data['country_id'] == 19) {
                foreach ($serviceItems as $serviceItem) {
                    $totalItem += $serviceItem->price_bdt_org;
                    $serviceItemList .= '<span class="text-right price'.$data["service_id"].'" style="display: block;margin-bottom: 12px;">'.number_format((float)$serviceItem->price_bdt_org, 2, '.', '').' BDT</span><span class="d-none totalItem price'.$data["service_id"].'">'.number_format((float)$totalItem, 2, '.', '').'</span>';
                }
            } else {
                foreach ($serviceItems as $serviceItem) {
                    $totalItem += $serviceItem->price_usd_org;
                    $serviceItemList .= '<span class="text-right price'.$data["service_id"].'" style="display: block;margin-bottom: 12px;">'.number_format((float)$serviceItem->price_usd_org, 2, '.', '').' USD</span><span class="d-none totalItem price'.$data["service_id"].'">'.number_format((float)$totalItem, 2, '.', '').'</span>';
                }
            }
        } else if ($data['usage_type'] == '2') {
            if ($data['country_id'] == 19) {
                foreach ($serviceItems as $serviceItem) {
                    $totalItem += $serviceItem->price_bdt_personal;
                    $serviceItemList .= '<span class="text-right price'.$data["service_id"].'" style="display: block;margin-bottom: 12px;">'.number_format((float)$serviceItem->price_bdt_personal, 2, '.', '').' BDT</span><span class="d-none totalItem price'.$data["service_id"].'">'.number_format((float)$totalItem, 2, '.', '').'</span>';
                }
            } else {
                foreach ($serviceItems as $serviceItem) {
                    $totalItem += $serviceItem->price_usd_personal;
                    $serviceItemList .= '<span class="text-right price'.$data["service_id"].'" style="display: block;margin-bottom: 12px;">'.number_format((float)$serviceItem->price_usd_personal, 2, '.', '').' USD</span><span class="d-none totalItem price'.$data["service_id"].'">'.number_format((float)$totalItem, 2, '.', '').'</span>';
                }
            }
        } else {
            $serviceItemList .= '<span class="text-right" style="display: block;margin-bottom: 12px;"> Select Usage Type</span>';
        }

        if ($serviceItems->count() > 0)
        {
            return Response::json($serviceItemList);
        } else {
            $serviceItemList = [];
            return Response::json($serviceItemList);
        }
    }

    public function getAdditionalItemsByService(Request $request)
    {
        // dd($request->selectedItems);
        $data = $request->all();
        
        $serviceItemList = array();

        $additionals = [];
        $serviceItemAdditionals = [];

        if(!empty($data['selectedItems'])) {
            $selectedItems = explode(",", $data['selectedItems']);
        } else {
            $selectedItems = array();
        }

        $result = array(); 

        foreach ($data['service_ids'] as $key => $value) { 
            if (is_array($value)) { 
                $result = array_merge($result, $value); 
            } 
            else { 
                $result[$key] = $value; 
            } 
        } 
        
        $finalItems = array_unique(array_merge($selectedItems, $result));

        $serviceItemList = '';

        foreach ($finalItems as $key => $item) {
            $data['service_id'] = $item;

            $serviceItemData = ServiceItem::where('id', $data['service_id'])->first();

            if ($serviceItemData->service_additional_id) {
                $additionals = explode(',', $serviceItemData->service_additional_id);

                $serviceItemAdditionals = ServiceItemAdditional::whereIn('id', $additionals)->get();
            } else {
                $serviceItemAdditionals = [];
            }

            foreach ($serviceItemAdditionals as $serviceItemAdditional) {
                $serviceItemList .= '<label class="checkbox additems'.$data["service_id"].' remove_select'.$data["service_id"].'"> 
                                        <input type="hidden" id="test" class="service_additional_item_id" value="'.$serviceItemAdditional->id.'">'. $serviceItemAdditional->item_name_en
                                    .'</label>';
            }

        }

        return Response::json($serviceItemList);
    }

    public function getPublicationAdditionalItemsByService(Request $request)
    {
        $data = $request->all();

        $serviceItemData = ServiceItem::where('id', $data['service_id'])->first();

        $serviceItemList = '';

        if ($serviceItemData->service_additional_id) {
            $additionals = explode(',', $serviceItemData->service_additional_id);

            $serviceItemAdditionals = ServiceItemAdditional::whereIn('id', $additionals)->get();
        } else {
            $serviceItemAdditionals = [];
        }

        foreach ($serviceItemAdditionals as $serviceItemAdditional) {
            $serviceItemList .= '<label class="checkbox additems'.$data["service_id"].' remove_select'.$data["service_id"].'"> 
                                    <input type="hidden" id="test" class="service_additional_item_id" value="'.$serviceItemAdditional->id.'">'. $serviceItemAdditional->item_name_en
                                .'</label>';
        }
        
        return Response::json($serviceItemList);
    }

    // public function getAdditionalItemPriceByService(Request $request)
    // {
    //     $data = $request->all();
        
    //     $serviceItemList = array();

    //     if(!empty($data['selectedItems'])) {
    //         $selectedItems = explode(",", $data['selectedItems']);
    //     } else {
    //         $selectedItems = array();
    //     }

    //     $result = array(); 

    //     foreach ($data['service_ids'] as $key => $value) { 
    //         if (is_array($value)) { 
    //             $result = array_merge($result, $value); 
    //         } 
    //         else { 
    //             $result[$key] = $value; 
    //         } 
    //     } 
        
    //     $finalItems = array_unique(array_merge($selectedItems, $result));

    //     foreach ($finalItems as $key => $item) {
    //         $data['service_id'] = $item;

    //         $serviceItems = ServiceItemAdditional::where('service_item_id', $data['service_id'])
    //                         ->select('id', 'item_name_en', 'price')
    //                         ->get();

    //         $totalItem = 0;

    //         $serviceItemList = '';

    //         foreach ($serviceItems as $serviceItem) {
    //             $totalItem += $serviceItem->price;

    //             $addPrice = '';

    //             if ($totalItem != 0) {
    //                 $addPrice = number_format((float)$serviceItem->price, 2, '.', '');
    //             } else {
    //                 $addPrice = 'Free';
    //             }

    //             $serviceItemList .= '<span class="text-right addprice'.$data["service_id"].'" style="display: block;margin-bottom: 12px;">'.$addPrice.'</span><span class="d-none totalItem addprice'.$data["service_id"].'">'.number_format((float)$totalItem, 2, '.', '').'</span>';
    //         }
    //     }

    //     return Response::json($serviceItemList);
    // }

    public function getItemsByServiceRemove(Request $request)
    {
        $data = $request->all();

        $serviceItems = ServiceItem::where('service_id', $data['service_id'])
                        ->select('id', 'item_name_en')
                        ->get();

        foreach ($data as $item) {
            foreach ($serviceItems as $serviceItem) {
                $serviceItemList = '<label class="checkbox"></label>';
            }
        }

        return Response::json($serviceItemList);
    }

    public function getReceivingModeByItem(Request $request)
    {
        $service_item_ids = $request->service_item_id;

        if ($service_item_ids == '') {
            $serviceItems = array();
            $input1 = '';
            $input2 = '';
        } else {
            $serviceItems = ServiceItem::whereIn('id', $service_item_ids)
                                    ->select('id', 'item_name_en', 'data_type', 'price_bdt_personal', 'price_bdt_org', 'price_usd_personal', 'price_usd_org')
                                    ->groupBy('data_type')
                                    ->get();

        $input1 = '';
        $input2 = '';

        foreach ($serviceItems as $serviceItem) {
            if ($serviceItem->data_type == 1) {

                $receivingModes = ReceivingMode::where('id', 1)
                                                ->orWhere('id', 2)
                                                ->get();
    
    
                foreach ($receivingModes as $receivingMode) {
                    $input1 .= '<label class="col-form-label radio"> <input type="radio" name="receiving_mode_hardcopy" id="receiving_mode_hardcopy" onchange="receiving_mode('.$receivingMode->id.')" class="dataChange receiving_mode_type'.$receivingMode->id.'" value="'.$receivingMode->id.'">
                    <span></span>'.$receivingMode->name_en.' ('.$receivingMode->description.')</label>';
                    }
        
                } 
        
                if ($serviceItem->data_type == 2) {
        
                    $receivingModes = ReceivingMode::where('id', 3)
                                                    ->orWhere('id', 4)
                                                    ->get();
        
        
                    foreach ($receivingModes as $receivingMode) {
                        $input2 .= '<label class="col-form-label radio"> <input type="radio" name="receiving_mode_softcopy" id="receiving_mode_softcopy" class="dataChange" value="'.$receivingMode->id.'">
                        <span></span>'.$receivingMode->name_en.' ('.$receivingMode->description.')</label>';
                    }
        
                }
            }
        }
        


        $serviceItemList[] = $input1;
        $serviceItemList[] = $input2;

        return Response::json($serviceItemList);
    }

    public function getItemsByServiceValue(Request $request)
    {
        $data = $request->all();
        
        $serviceItemList = array();

        if(!empty($data['selectedItems'])) {
            $selectedItems = explode(",", $data['selectedItems']);
        } else {
            $selectedItems = array();
        }

        $result = array(); 

        foreach ($data['service_ids'] as $key => $value) { 
            if (is_array($value)) { 
                $result = array_merge($result, $value); 
            } 
            else { 
                $result[$key] = $value; 
            } 
        } 
        
        $finalItems = array_unique(array_merge($selectedItems, $result));

        // dd(array_unique($finalItems));

        foreach ($finalItems as $key => $item) {
            $data['service_id'] = $item;

            $serviceItem = ServiceItem::where('id', $data['service_id'])->first();
            $serviceInventoryItem = ServiceInventory::where('id', $data['service_id'])->first();

            $serviceItemPrice = ServiceItemPrice::get();
                        
            $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'">'. $serviceItem->service->name_en.'</div>';
            
            $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'">'. $serviceItem->item_name_en.'<input type="hidden" class="selected_serviceItem" value="'.$serviceItem->id.'" name="service_item_id[]"/></div>';

            if ($serviceItem->service_id == 1) {
                if ($data['usage_type'] == 1) {
                    if ($serviceItem->service_item_type == 1) {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[1]->price.'">'. $serviceItemPrice[1]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    } else {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[0]->price.'">'. $serviceItemPrice[0]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    }
                } else if ($data['usage_type'] == 2) {
                    if ($serviceItem->service_item_type == 1) {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[1]->price.'">'. $serviceItemPrice[5]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    } else {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[0]->price.'">'. $serviceItemPrice[4]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    }
                } else if ($data['usage_type'] == 3) {
                    if ($data['country_id'] == 19) {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[2]->price.'">'. $serviceItemPrice[2]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    } else {
                        $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItemPrice[3]->price.'">'. $serviceItemPrice[3]->price.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    }
                } else {
                    $serviceItemList[] = '<span class="text-right" style="display: block;margin-bottom: 12px;"> Select Usage Type</span>';
                }
            }
            else if ($serviceItem->service_id == 2) {
                $serviceItemList[] = '<div class="remove_select'.$serviceInventoryItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceInventoryItem->service_id.'"><input type="hidden" class="total" value="'.$serviceInventoryItem->price.'">'. $serviceInventoryItem->price.'.00 BDT <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceInventoryItem->id.')">X</a></div>';
            } else {
                if ($data['usage_type'] == 1) {
                    // if ($data['country_id'] == 19) {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_bdt_org.'">'. $serviceItem->price_bdt_org.'.00 BDT <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // } else {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_org.'">'. $serviceItem->price_usd_org.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // }
                    $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_org.'">'. $serviceItem->price_usd_org.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                } else if ($data['usage_type'] == 2) {
                    // if ($data['country_id'] == 19) {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_bdt_personal.'">'. $serviceItem->price_bdt_personal.'.00 BDT <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // } else {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_personal.'">'. $serviceItem->price_usd_personal.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // }
                    $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_personal.'">'. $serviceItem->price_usd_personal.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                } else if ($data['usage_type'] == 3) {
                    // if ($data['country_id'] == 19) {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_bdt_personal.'">'. $serviceItem->price_bdt_personal.'.00 BDT <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // } else {
                    //     $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_personal.'">'. $serviceItem->price_usd_personal.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                    // }
                    $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price_usd_personal.'">'. $serviceItem->price_usd_personal.'.00 USD <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
                } else {
                    $serviceItemList[] = '<span class="text-right" style="display: block;margin-bottom: 12px;"> Select Usage Type</span>';
                }
            }

            $service_item_id = $data['service_id'];

            $service_cart = ServiceCart::where('sr_user_id', Auth::id())->first();

            if($service_cart != null)
            {
                $service_cart_items = ServiceCartItem::where('service_cart_id', $service_cart->id)
                                                        ->where('service_item_id', $service_item_id)
                                                        ->get();
                $service_cart_items->each->delete();

                $service_cart_item = new ServiceCartItem;
            
                $service_cart_item->service_cart_id       = $service_cart->id;
                $service_cart_item->service_id            = $serviceItem->service_id;
                $service_cart_item->service_item_id       = $service_item_id;

                if ($data['usage_type'] == 1) {
                    if ($data['country_id'] == 19) {
                        $service_cart_item->service_item_price    = $serviceItem->price_bdt_org;
                    } else {
                        $service_cart_item->service_item_price    = $serviceItem->price_usd_org;
                    }
                } else if ($data['usage_type'] == 2) {
                    if ($data['country_id'] == 19) {
                        $service_cart_item->service_item_price    = $serviceItem->price_bdt_personal;
                    } else {
                        $service_cart_item->service_item_price    = $serviceItem->price_usd_personal;
                    }
                }

                $service_cart_item->save();
            }
        }

        // dd($serviceItemList);
        
        return Response::json($serviceItemList);
        
    }

    public function getInventoryItemsByServiceValue(Request $request)
    {
        $data = $request->all();
        
        $serviceItemList = array();

        if(!empty($data['selectedItems'])) {
            $selectedItems = explode(",", $data['selectedItems']);
        } else {
            $selectedItems = array();
        }

        $result = array(); 

        foreach ($data['service_ids'] as $key => $value) { 
            if (is_array($value)) { 
                $result = array_merge($result, $value); 
            } 
            else { 
                $result[$key] = $value; 
            } 
        } 
        
        $finalItems = array_unique(array_merge($selectedItems, $result));

        // dd(array_unique($finalItems));

        foreach ($finalItems as $key => $item) {

            $data['service_id'] = $item;

            $serviceItem = ServiceInventory::where('id', $data['service_id'])->first();
                        
            $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_item_id.'">'. $serviceItem->serviceItem->item_name_en.'</div>';
            
            $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_item_id.'">'. $serviceItem->title.'<input type="hidden" class="selected_serviceItem" value="'.$serviceItem->id.'"/></div>';

            $serviceItemList[] = '<div class="remove_select'.$serviceItem->id.' text-right selectitems'.$data["service_id"].' selectservice'.$serviceItem->service_id.'"><input type="hidden" class="total" value="'.$serviceItem->price.'">'. $serviceItem->price.'.00 BDT <a class="btn-sm btn-danger text-white" style="cursor: pointer" onclick="remove_select('.$serviceItem->id.')">X</a></div>';
        }
        
        return Response::json($serviceItemList);
        
    }

    public function itemValueRemoved(Request $request) {
        $data = $request->all();

        $service_cart_item = ServiceCartItem::where('service_item_id', $data['service_item_id'])->first();
        $service_cart_item->delete(); 
    }

    public function serviceValueRemoved(Request $request) {
        $data = $request->all();

        $service_cart_items = ServiceCartItem::where('service_id', $data['service_id'])->get();
        $service_cart_items->each->delete(); 
    }


    public function getDataBySelectedCourse(Request $request) {
        $course = TrainingCourse::find($request->id);
        
        $cd_list = TrainingCourseDuration::where('course_id', $request->id)->get();

        return Response::json([
            'course_list' => $cd_list,
            'course' => $course,
            'trainer' => $course->trainer->name,
            'fiscal_yr' => $course->courseYear->name,
            'cd_name' => $course->courseDirector->first_name.' '.$course->courseDirector->middle_name.' '.$course->courseDirector->last_name,
            'coo_name' => $course->courseCoordinator->first_name.' '.$course->courseCoordinator->middle_name.' '.$course->courseCoordinator->last_name
        ]);
    }


    // not working here 
    public function addCourseDurationandShow(Request $request) {
        $data = $request->formData;

        $tcd = TrainingCourseDuration::where('course_id', $request->course_id)->latest()->first();
        
        if($tcd != null){
            $batchNo = $tcd->batch_no;
        }else{
            $batchNo = 0;
        }

        $courseDuration = new TrainingCourseDuration;
        $courseDuration->course_id = $request->course_id;
        $courseDuration->batch_no = $batchNo + 1;
        $courseDuration->month = $data[4]['value'];
        $courseDuration->duration = $data[1]['value'];
        $courseDuration->trainee_type = $data[5]['value'];
        $courseDuration->course_hour = $data[0]['value'];
        $courseDuration->total_trainees = $data[2]['value'];
        $courseDuration->training_type = $data[6]['value'];
        $courseDuration->total_trainer_allowance = $data[3]['value'];
        $courseDuration->total_trainee_allowance = $data[7]['value'];
        $courseDuration->status = 1;
        $courseDuration->created_by = Auth::user()->id;
        $courseDuration->save();


        $cd_list = TrainingCourseDuration::where('course_id', $request->course_id)->get();

        return Response::json($cd_list);
        
       
    }


    public function addCourseCurriculam(Request $request) {
        // $data = array();
       $data = $request->formData;
        
        $courseDuration = new TrainingCourseCurriculumn;
        $courseDuration->course_id = $request->course_id;
        $courseDuration->module_no = $data[0]['value'];
        $courseDuration->subject_code = $data[1]['value'];
        $courseDuration->subject_title = $data[2]['value'];
        $courseDuration->created_by = Auth::user()->id;
        $courseDuration->updated_by = null;
        $courseDuration->save();


        $cc_list = TrainingCourseCurriculumn::where('course_id', $request->course_id)->get();

        return Response::json($cc_list);
        
       
    }







}