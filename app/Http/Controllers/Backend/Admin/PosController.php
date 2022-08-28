<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\ServiceInventory;
use App\Models\InventoryCart;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class PosController extends Controller
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
            menuSubmenu('storage', 'posSystem');
            $users = User::where('id','<>',1)->get();
            if(Auth::user()->role_id == 11)
            {
                $items = ServiceInventory::with('salesCenter')->where('status',1)->where('can_download',0)->where('sales_center_id', Auth::user()->sales_center)->get();
            }else{
                $items = ServiceInventory::with('salesCenter')->where('status',1)->where('can_download',0)->get();
            }
            $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
            $total_price = 0;
            foreach($inventoryItems as $item)
            {
                $total_price +=  $item->price * $item->quantity;
            }
            return view('backend.admin.pos.index',[
                'items' => $items,
                'inventoryItems' =>$inventoryItems,
                'total_price' => $total_price,
                'users' => $users
            ]);
        }

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
    public function store(ServiceInventory $item, Request $request)
    {
        
        $pre_cart = InventoryCart::where('service_inventory_id',$item->id)->where('user_id',Auth::id())->first();
        
        if(!$pre_cart)
        {
            $cart = new InventoryCart;
            $cart->service_inventory_id = $item->id;
            $cart->sales_center_id = $item->sales_center_id;
            $cart->quantity = 1;
            $cart->price = $item->price;
            $cart->user_id = Auth::id();
            $cart->save();
        }
        else
        {
            $pre_cart->quantity = $pre_cart->quantity + 1;
            $inventoryItem = $pre_cart->serviceInventory;
            
            if($inventoryItem->number_of_sale_copies < $pre_cart->quantity)
            {                
                
                $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
                $total_price = 0;
                foreach($inventoryItems as $item)
                {
                    $total_price +=  $item->price * $item->quantity;
                }
                
                $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();
                $message = "Quantity More Than Stock.";
                if($request->ajax())
                {
                    return Response()->json(array(
                        'success' => false,
                        'page' => $page,
                        'message' => $message
                    ));
                }
            }
            else
            {

                $pre_cart->save();
            }
        }
        
        $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach($inventoryItems as $item)
        {
            $total_price +=  $item->price * $item->quantity;
        }
        
        $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();

        if($request->ajax())
        {
            return Response()->json(array(
                'success' => true,
                'page' => $page,
            ));
        } 
    }


    public function saveInventoryItem(Request $request)
    {
        $data = $request->all();

        $q = $data['item_id'];

        $item = ServiceInventory::where(function($query) use ($q) {
            
            $query->where('title', $q);
            $query->orWhere('sub_title', $q);
        })
        ->orWhereHas('serviceItem', function ($qq) use ($q) {
            $qq->where('barcode', $q);
            $qq->where('barcode','<>',null);
            
        })->first();
        
        if ($item != '') {
            $pre_cart = InventoryCart::where('service_inventory_id', $item->id)->where('user_id', Auth::id())->first();
    
            if(!$pre_cart)
            {
                $cart = new InventoryCart;

                $cart->service_inventory_id = $item->id;
                $cart->quantity = 1;
                $cart->price = $item->price;
                $cart->user_id = Auth::id();

                $cart->save();
            }
        }

        $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();

        $total_price = 0;

        foreach($inventoryItems as $inventoryItem)
        {
            $total_price +=  $inventoryItem->price * $inventoryItem->quantity;
        }

        $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();

        if($request->ajax())
        {
            return Response()->json(array(
                'success' => true,
                'page' => $page,
            ));
        } 
    }

    public function delete($id,Request $request)
    {
        
        $cart = InventoryCart::find($id);
        $cart->delete();

        $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach($inventoryItems as $item)
        {
            $total_price +=  $item->price * $item->quantity;
        }
        
        $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();

        if($request->ajax())
        {
            return Response()->json(array(
                'success' => true,
                'page' => $page,
            ));
        } 
    }

    public function allSales()
    {
        $user = Auth::user();

        if (Gate::allows('manage_storage', $user)) 
        {
            menuSubmenu('storage', 'allSales');

            $userSalesCenterId = $user->sales_center;
            // For store keeper
            if($user->role_id == 11)
            {
                // Trying Eloquent query
                $orders = ServiceOrder::with('customer')
                                    ->where('user_id', $user->id)
                                    ->whereRaw("find_in_set(?, sales_center_id)", [$userSalesCenterId])
                                    ->latest()->paginate(25);

            // for all other users
            }else{
                $orders = ServiceOrder::latest()->paginate(25);
            }

            return view('backend.admin.pos.allSales', compact('orders'));

        }
    }

    public function invoice(ServiceOrder $order)
    {
        
        $auth = Auth::user();
        if($auth->role_id ==1)
        {
            $singleorder = $order;
            $total_price = $order->orderItems;
        }
        elseif($auth->role_id ==2)
        {
            $singleorder = $order;
            $total_price = $order->orderItems;
        }
        else
        {
            if($order->user_id == $auth->id)
            {
                $singleorder = $order;
            
                $total_price = $order->orderItems;
            }
            else
            {
                abort(401);
            }
        }

        return view('backend.admin.pos.invoice',[
            'order' => $singleorder,
            'auth'=>$auth
        ]);
    }

    public function paidPrice(ServiceOrder $order, Request $request)
    {
        
        if($request->type == 'paid')
        {
            if($order->payment_status == 'unpaid')
            {
                $order->payment_status = 'paid';
                $order->save();
                return back()->with('success','Payment Successfully Done.');

            }
            else
            {
                return back()->with('error','Someting Went To Wrong.');
            }
        }
        elseif($request->type == 'cancel')
        {
            $serviceOrderItems = ServiceOrderItem::where('order_id',$order->id)->get();
            
            if($order->payment_status == 'unpaid')
            {
                foreach($serviceOrderItems as $item)
                {
                    $inventoryItem = ServiceInventory::where('id',$item->service_inventory_id)->first();
                    $inventoryItem->number_of_sale_copies = $inventoryItem->number_of_sale_copies + $item->quantity;
                    $inventoryItem->save();
                }
                $order->payment_status = 'cancel';
                $order->save();
                return back()->with('info','Order Return Successfully.');
                

            }
            else
            {
                return back()->with('error','Someting Went To Wrong.');
            }
        }
    }

    public function discount(ServiceOrder $order, Request $request)
    {
        // dd($request->all());
        $order->discount_amount = $request->discount;
        $order->final_amount = $request->final_total;
        $order->discount_type = $request->discount_type;
        $order->save();
        
        return back()->with('success','Dicount Successfully Added.');
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
    public function update($item, $quantity, Request $request)
    {             

        $cart = InventoryCart::find($item);
        $inventoryItem = $cart->serviceInventory;
                
        if($inventoryItem->number_of_sale_copies < $quantity)
        {
            
            $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
            $total_price = 0;
            foreach($inventoryItems as $item)
            {
                $total_price +=  $item->price * $item->quantity;
            }
            
            $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();
            $message = "Quantity More Than Stock.";
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'page' => $page,
                    'message' => $message
                ));
            }
        }
        else
        {
            if($quantity > 0)
            {
                $cart->quantity = $quantity;
                $cart->save();
            }
            else
            {
                $cart->quantity = $cart->$quantity;
                $cart->save();
            }

            $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
            $total_price = 0;
            foreach($inventoryItems as $item)
            {
                $total_price +=  $item->price * $item->quantity;
            }
            
            $page = View('backend.admin.pos.ajax.cartTable',['inventoryItems' =>$inventoryItems,'total_price' => $total_price])->render();
            
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => true,
                    'page' => $page,

                ));
            } 
        }

    }

    public function submit(Request $request)
    {
        $inventoryItems = InventoryCart::where('user_id',Auth::id())->get();
        
        if($inventoryItems->count() > 0)
        {
            if($request->cancel == 'cancel')
            {     
                foreach($inventoryItems as $item)
                {
                    $item->delete();
                }
            }
            elseif($request->submit == 'submit')
            {
                
                $total_price = 0;
                $total_quantity = 0;
                $salesCenter = [];
                foreach($inventoryItems as $item)
                {
                    $total_quantity += $item->quantity;                 
                    $total_price += $item->price * $item->quantity;
                    array_push($salesCenter, $item->sales_center_id);
                }
                $columns = implode(",",array_unique($salesCenter));
                

                $order = new ServiceOrder;
                $order->sales_center_id = $columns;
                $order->total_quantity = $total_quantity;
                $order->total_price = $total_price;
                $order->paid_amount = $total_price;
                $order->payment_status = 'unpaid';
                $order->user_id = Auth::id();
                $order->customer_id = $request->customer ? $request->customer : 0;
                
                $order->save(); //1

                foreach($inventoryItems as $item)
                {

                    $serviceOrderItem = new ServiceOrderItem;
                    $serviceOrderItem->order_id = $order->id;
                    $serviceOrderItem->service_inventory_id = $item->service_inventory_id;
                    $serviceOrderItem->sales_center_id = $item->sales_center_id;
                    $serviceOrderItem->price = $item->price;
                    $serviceOrderItem->quantity = $item->quantity;
                    $serviceOrderItem->user_id = Auth::id();
                    $serviceOrderItem->customer_id = $request->customer ? $request->customer : 0;

                    $serviceOrderItem->save(); //2
                
                    $service_inventory = $item->serviceInventory;
                    $service_inventory->number_of_hard_copies = $service_inventory->number_of_hard_copies - $item->quantity;
                    $service_inventory->number_of_sale_copies = $service_inventory->number_of_sale_copies - $item->quantity;
                    $service_inventory->save(); //3
                    
                    $item->delete(); //4

                }
                // return back()->with('success','Item Order Successfully.');
                return redirect()->route('admin.pos.invoice', ['order' => $order->id]);

            }
            return back()->with('success','Remove all item from cart.');
        }
        else
        {
            return back()->with('error','No Item in cart');
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

    public function createCustomer(Request $request)
    {
        // dd($request->all());

        $exist = User::where('email',$request->email)->orWhere('mobile',$request->mobile)->first();
        
        if($exist)
        {
            return back()->with('error','This user already have an account.');
        }
        else
        {
            $user = new User;
            $user->role_id = 9;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->present_address = $request->address;
            $user->status = 1;
            $user->created_by = Auth::user()->id;
            $user->save();

            return back()->with('success','Customer Added Successfully.');

        }
    }
}
