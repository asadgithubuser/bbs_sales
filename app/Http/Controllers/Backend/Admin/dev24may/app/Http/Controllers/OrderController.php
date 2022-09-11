<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\OTPVerificationController;
use Illuminate\Http\Request;
use App\Http\Controllers\ClubPointController;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\CommissionHistory;
use App\Models\Color;
use App\Models\OrderDetail;
use App\Models\CouponUsage;
use App\Models\Coupon;
use App\OtpConfiguration;
use App\Models\User;
use App\Models\BusinessSetting;
use App\Models\CombinedOrder;
use App\Models\SmsTemplate;
use Auth;
use Session;
use DB;
use Mail;
use App\Mail\InvoiceEmailManager;
use App\Utility\NotificationUtility;
use CoreComponentRepository;
use App\Utility\SmsUtility;

use App\Models\OrderExport;
use Excel;
	
class OrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            //->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('seller_id', Auth::user()->id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_status != null) {
            $orders = $orders->where('payment_status', $request->payment_status);
            $payment_status = $request->payment_status;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }

        $orders = $orders->paginate(15);

        foreach ($orders as $key => $value) {
            $order = \App\Models\Order::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('frontend.user.seller.orders', compact('orders', 'payment_status', 'delivery_status', 'sort_search'));
    }

    // All Orders
    public function all_orders(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $date = $request->date;
        $sort_search = null;
        $delivery_status = null;
        $sort_mobile = null;
        $user_id = null;

        $orders = Order::orderBy('id', 'desc');
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }


        if ($request->has('search_mobile')) {
            $sort_mobile = $request->search_mobile;
            $orders = $orders->where('shipping_address->phone', 'like', '%' . $sort_mobile . '%');
        }
        if ($request->user_id != null) {
            $orders = $orders->where('seller_id', $request->user_id);
            $user_id = $request->user_id;
        }


        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(50);
        return view('backend.sales.all_orders.index', compact('orders', 'sort_search', 'delivery_status', 'user_id', 'sort_mobile', 'date'));
    }

    public function all_orders_show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order_shipping_address = json_decode($order->shipping_address);
        $delivery_boys = User::where('city', $order_shipping_address->city)
            ->where('user_type', 'delivery_boy')
            ->get();

        return view('backend.sales.all_orders.show', compact('order', 'delivery_boys'));
    }

    // Inhouse Orders
    public function admin_orders(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $date = $request->date;
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        $orders = Order::orderBy('id', 'desc')
                        ->where('seller_id', $admin_user_id);

        if ($request->payment_type != null) {
            $orders = $orders->where('payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.inhouse_orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search', 'admin_user_id', 'date'));
    }

    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order_shipping_address = json_decode($order->shipping_address);
        $delivery_boys = User::where('city', $order_shipping_address->city)
            ->where('user_type', 'delivery_boy')
            ->get();

        $order->viewed = 1;
        $order->save();
        return view('backend.sales.inhouse_orders.show', compact('order', 'delivery_boys'));
    }

    // Seller Orders
    public function seller_orders(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $date = $request->date;
        $seller_id = $request->seller_id;
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        $orders = Order::orderBy('code', 'desc')
            ->where('orders.seller_id', '!=', $admin_user_id);

        if ($request->payment_type != null) {
            $orders = $orders->where('payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        if ($seller_id) {
            $orders = $orders->where('seller_id', $seller_id);
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.seller_orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search', 'admin_user_id', 'seller_id', 'date'));
    }

    public function seller_orders_show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order->viewed = 1;
        $order->save();
        return view('backend.sales.seller_orders.show', compact('order'));
    }


    // Pickup point orders
    public function pickup_point_order_index(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $orders = Order::query();
        if (Auth::user()->user_type == 'staff' && Auth::user()->staff->pick_up_point != null) {
            $orders->where('shipping_type', 'pickup_point')
                    ->where('pickup_point_id', Auth::user()->staff->pick_up_point->id)
                    ->orderBy('code', 'desc');

            if ($request->has('search')) {
                $sort_search = $request->search;
                $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
            }
            if ($date != null) {
                $orders = $orders->whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }

            $orders = $orders->paginate(15);

            return view('backend.sales.pickup_point_orders.index', compact('orders', 'sort_search', 'date'));
        } else {
            $orders->where('shipping_type', 'pickup_point')->orderBy('code', 'desc');

            if ($request->has('search')) {
                $sort_search = $request->search;
                $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
            }
            if ($date != null) {
                $orders = $orders->whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }

            $orders = $orders->paginate(15);

            return view('backend.sales.pickup_point_orders.index', compact('orders', 'sort_search', 'date'));
        }
    }

    public function pickup_point_order_sales_show($id)
    {
        if (Auth::user()->user_type == 'staff') {
            $order = Order::findOrFail(decrypt($id));
            $order_shipping_address = json_decode($order->shipping_address);
            $delivery_boys = User::where('city', $order_shipping_address->city)
                ->where('user_type', 'delivery_boy')
                ->get();

            return view('backend.sales.pickup_point_orders.show', compact('order', 'delivery_boys'));
        } else {
            $order = Order::findOrFail(decrypt($id));
            $order_shipping_address = json_decode($order->shipping_address);
            $delivery_boys = User::where('city', $order_shipping_address->city)
                ->where('user_type', 'delivery_boy')
                ->get();

            return view('backend.sales.pickup_point_orders.show', compact('order', 'delivery_boys'));
        }
    }

    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //special shipping
        $special_category_flag_initialize=Session::put('special_category_flag','re-initialize');


        $carts = Cart::where('user_id', Auth::user()->id)
            ->get();

        if ($carts->isEmpty()) {
            flash(translate('Your cart is empty'))->warning();
            return redirect()->route('home');
        }

        $address = Address::where('id', $carts[0]['address_id'])->first();

        $shippingAddress = [];
        if ($address != null) {
            $shippingAddress['name']        = Auth::user()->name;
            $shippingAddress['email']       = Auth::user()->email;
            $shippingAddress['address']     = $address->address;
            $shippingAddress['country']     = $address->country->name;
            $shippingAddress['state']       = $address->state->name;
            $shippingAddress['city']        = $address->city->name;
            $shippingAddress['postal_code'] = $address->postal_code;
            $shippingAddress['phone']       = $address->phone;
            if ($address->latitude || $address->longitude) {
                $shippingAddress['lat_lang'] = $address->latitude . ',' . $address->longitude;
            }
        }

        $combined_order = new CombinedOrder;
        $combined_order->user_id = Auth::user()->id;
        $combined_order->shipping_address = json_encode($shippingAddress);
        $combined_order->save();

        $seller_products = array();
        foreach ($carts as $cartItem){
            $product_ids = array();
            $product = Product::find($cartItem['product_id']);
            if(isset($seller_products[$product->user_id])){
                $product_ids = $seller_products[$product->user_id];
            }
            array_push($product_ids, $cartItem);
            $seller_products[$product->user_id] = $product_ids;
        }

        foreach ($seller_products as $seller_product) {
            $order = new Order;
            $order->combined_order_id = $combined_order->id;
            $order->user_id = Auth::user()->id;
            $order->shipping_address = $combined_order->shipping_address;
            $order->shipping_type = $carts[0]['shipping_type'];
            if ($carts[0]['shipping_type'] == 'pickup_point') {
                $order->pickup_point_id = $cartItem['pickup_point'];
            }
            $order->payment_type = $request->payment_option;
            $order->delivery_viewed = '0';
            $order->payment_status_viewed = '0';
            $order->code = 'SL'.date('Ymd-His') . rand(10, 99);
            $order->date = strtotime('now');
            $order->save();

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            $coupon_discount = 0;

            //Order Details Storing
            foreach ($seller_product as $cartItem) {
                $product = Product::find($cartItem['product_id']);

                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                $tax += $cartItem['tax'] * $cartItem['quantity'];
                $coupon_discount += $cartItem['discount'];

                $product_variation = $cartItem['variation'];

                $product_stock = $product->stocks->where('variant', $product_variation)->first();
                if ($product->digital != 1 && $cartItem['quantity'] > $product_stock->qty) {
                    flash(translate('The requested quantity is not available for ') . $product->getTranslation('name'))->warning();
                    $order->delete();
                    return redirect()->route('cart')->send();
                } elseif ($product->digital != 1) {
                    $product_stock->qty -= $cartItem['quantity'];
                    $product_stock->save();
                }

                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->shipping_type = $cartItem['shipping_type'];
                $order_detail->product_referral_code = $cartItem['product_referral_code'];
                $order_detail->shipping_cost = $cartItem['shipping_cost'];

                $shipping += $order_detail->shipping_cost;
                //End of storing shipping cost

                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

                $product->num_of_sale += $cartItem['quantity'];
                $product->save();

                $order->seller_id = $product->user_id;

                if ($product->added_by == 'seller' && $product->user->seller != null){
                    $seller = $product->user->seller;
                    $seller->num_of_sale += $cartItem['quantity'];
                    $seller->save();
                }

                if (addon_is_activated('affiliate_system')) {
                    if ($order_detail->product_referral_code) {
                        $referred_by_user = User::where('referral_code', $order_detail->product_referral_code)->first();

                        $affiliateController = new AffiliateController;
                        $affiliateController->processAffiliateStats($referred_by_user->id, 0, $order_detail->quantity, 0, 0);
                    }
                }
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if ($seller_product[0]->coupon_code != null) {
                // if (Session::has('club_point')) {
                //     $order->club_point = Session::get('club_point');
                // }
                $order->coupon_discount = $coupon_discount;
                $order->grand_total -= $coupon_discount;

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Coupon::where('code', $seller_product[0]->coupon_code)->first()->id;
                $coupon_usage->save();
            }

            $combined_order->grand_total += $order->grand_total;

            $order->save();
        }

        $combined_order->save();

        $request->session()->put('combined_order_id', $combined_order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order != null) {
            foreach ($order->orderDetails as $key => $orderDetail) {
                try {

                    $product_stock = ProductStock::where('product_id', $orderDetail->product_id)->where('variant', $orderDetail->variation)->first();
                    if ($product_stock != null) {
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }

                } catch (\Exception $e) {

                }

                $orderDetail->delete();
            }
            $order->delete();
            flash(translate('Order has been deleted successfully'))->success();
        } else {
            flash(translate('Something went wrong'))->error();
        }
        return back();
    }

    public function bulk_order_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $order_id) {
                $this->destroy($order_id);
            }
        }

        return 1;
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->save();
        return view('frontend.user.seller.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_viewed = '0';
        $order->delivery_status = $request->status;

        DB::insert('insert into user_activity (user_id,user_name,order_id,orderID,activity) values (?,?,?,?,?)', [ Auth::user()->id, Auth::user()->name,$order->id,$order->code,$order->delivery_status]);

        $order->save();

        if ($request->status == 'cancelled' && $order->payment_type == 'wallet') {
            $user = User::where('id', $order->user_id)->first();
            $user->balance += $order->grand_total;
            $user->save();
        }

        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();

                if ($request->status == 'cancelled') {
                    $variant = $orderDetail->variation;
                    if ($orderDetail->variation == null) {
                        $variant = '';
                    }

                    $product_stock = ProductStock::where('product_id', $orderDetail->product_id)
                        ->where('variant', $variant)
                        ->first();

                    if ($product_stock != null) {
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }
                }
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {

                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();

                if ($request->status == 'cancelled') {
                    $variant = $orderDetail->variation;
                    if ($orderDetail->variation == null) {
                        $variant = '';
                    }

                    $product_stock = ProductStock::where('product_id', $orderDetail->product_id)
                        ->where('variant', $variant)
                        ->first();

                    if ($product_stock != null) {
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }
                }

                if (addon_is_activated('affiliate_system')) {
                    if (($request->status == 'delivered' || $request->status == 'cancelled') &&
                        $orderDetail->product_referral_code) {

                        $no_of_delivered = 0;
                        $no_of_canceled = 0;

                        if ($request->status == 'delivered') {
                            $no_of_delivered = $orderDetail->quantity;
                        }
                        if ($request->status == 'cancelled') {
                            $no_of_canceled = $orderDetail->quantity;
                        }

                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();

                        $affiliateController = new AffiliateController;
                        $affiliateController->processAffiliateStats($referred_by_user->id, 0, 0, $no_of_delivered, $no_of_canceled);
                    }
                }
            }
        }
        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'delivery_status_change')->first()->status == 1) {
            try {
                SmsUtility::delivery_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->delivery_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }


        if (addon_is_activated('delivery_boy')) {
            if (Auth::user()->user_type == 'delivery_boy') {
                $deliveryBoyController = new DeliveryBoyController;
                $deliveryBoyController->store_delivery_history($order);
            }
        }

        return 1;
    }

   public function update_tracking_code(Request $request) {
        $order = Order::findOrFail($request->order_id);
        $order->tracking_code = $request->tracking_code;
        $order->save();

        return 1;
   }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();
        
        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach ($order->orderDetails as $key => $orderDetail) {
            if ($orderDetail->payment_status != 'paid') {
                $status = 'unpaid';
            }
        }
        $order->payment_status = $status;
        $order->save();


        if ($order->payment_status == 'paid' && $order->commission_calculated == 0) {
            calculateCommissionAffilationClubPoint($order);
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->payment_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }

        DB::insert('insert into user_activity (user_id,user_name,order_id,orderID,activity) values (?,?,?,?,?)', [ Auth::user()->id, Auth::user()->name,$order->id,$order->code,$status]);

        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'payment_status_change')->first()->status == 1) {
            try {
                SmsUtility::payment_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }
        return 1;
    }

    public function assign_delivery_boy(Request $request)
    {
        if (addon_is_activated('delivery_boy')) {

            $order = Order::findOrFail($request->order_id);
            $order->assign_delivery_boy = $request->delivery_boy;
            $order->delivery_history_date = date("Y-m-d H:i:s");
            $order->save();

            $delivery_history = \App\Models\DeliveryHistory::where('order_id', $order->id)
                ->where('delivery_status', $order->delivery_status)
                ->first();

            if (empty($delivery_history)) {
                $delivery_history = new \App\Models\DeliveryHistory;

                $delivery_history->order_id = $order->id;
                $delivery_history->delivery_status = $order->delivery_status;
                $delivery_history->payment_type = $order->payment_type;
            }
            $delivery_history->delivery_boy_id = $request->delivery_boy;

            $delivery_history->save();

            if (env('MAIL_USERNAME') != null && get_setting('delivery_boy_mail_notification') == '1') {
                $array['view'] = 'emails.invoice';
                $array['subject'] = translate('You are assigned to delivery an order. Order code') . ' - ' . $order->code;
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['order'] = $order;

                try {
                    Mail::to($order->delivery_boy->email)->queue(new InvoiceEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'assign_delivery_boy')->first()->status == 1) {
                try {
                    SmsUtility::assign_delivery_boy($order->delivery_boy->phone, $order->code);
                } catch (\Exception $e) {

                }
            }
        }

        return 1;
    }

public function allOrdersExport(Request $request){

	$date = $request->date;

	$orders = DB::table('orders')->orderBy('id', 'desc');
	$orderD = OrderDetail::distinct()
		->select('seller_id')
		->where('seller_id', $request->user_id)
		->get();
	$idsDue = OrderDetail::distinct()
		->select('order_id')
		->where('delivery_status', 'refund')
		->get();
	$shurjoPay_refund = Order::select('id', \DB::raw('SUM(grand_total) as total_val'))
		->whereIn('id', $idsDue)
		->where('payment_type', 'shurjopay_payment')
		->get();
	$bank_refund = Order::select('id', \DB::raw('SUM(grand_total) as total_val'))
		->whereIn('id', $idsDue)
		->where('payment_type', '!=', 'shurjopay_payment')
		->get();


	if ($request->has('search')) {
		$sort_search = $request->search;
		$orders = $orders->where('code', 'like', '%' . $sort_search . '%');
	}
	if ($request->has('search_mobile')) {
		$sort_mobile = $request->search_mobile;
		$orders = $orders->where('shipping_address->phone', 'like', '%' . $sort_mobile . '%');
	}
	if ($request->payment_status != null) {
		$orders = $orders->where('payment_status', $request->payment_status);
		$payment_status = $request->payment_status;
	}
	if ($request->delivery_status != null) {
		$orders = $orders->where('delivery_status', $request->delivery_status);
		$payment_status = $request->delivery_status;
	}
	if ($request->user_id != null) {
		$orders = $orders->where('seller_id', $request->user_id);
		$user_id = $request->user_id;
	}
	if ($request->payment_type != null) {
		$orders = $orders->where('payment_type', $request->payment_type);
		$payment_type = $request->payment_type;
	}

	if ($date != null && $date!='undefined') {
		$to = date('Y-m-d', strtotime(explode(" to ", $date)[0]));
		$form = date('Y-m-d', strtotime(explode(" to ", $date)[1]));

		if ($to == $form) {
			$orders = $orders->whereDate('created_at', $to);
		} else {
			$orders = $orders->whereDate('created_at', '>=', $to)->whereDate('created_at', '<=', $form);
		}
	}
	$orders = $orders->get();

	$ordersAll = array();
	foreach ($orders as $order) {
		$ordersIteam = DB::table('orders')
			->join('order_details', 'order_details.order_id', '=', 'orders.id')
			->join('shops', 'shops.user_id', '=', 'order_details.seller_id')
			->join('products', 'products.id', '=', 'order_details.product_id')
			->join('users as seller', 'seller.id', '=', 'order_details.seller_id')
			->join('categories', 'categories.id', '=', 'products.category_id')
			->where('orders.id', '=', $order->id)
			->select(
				'orders.code as order_id',
				'orders.created_at as orderTime',
				'orders.shipping_address as shipping_address',
				'shops.name as shopName',
				'seller.name as vendorName',
				'order_details.delivery_status as delivery_status',
				'products.name as productName',
				'products.unit_price as unit_price',

				'order_details.quantity as quantity',
				'order_details.price as cpPrice',
				'products.purchase_price as purchase_price',
				'orders.payment_status as payment_status',
				'orders.payment_type as payment_type',
				'orders.payable as payable',
				'orders.due as due',

				'categories.name as categoryName',
				'categories.parent_id as parent_categoryId'
			)->get();
		array_push($ordersAll, $ordersIteam);
	}

	$collection = new \Illuminate\Database\Eloquent\Collection();

	foreach ($ordersAll as $orders){
		foreach ($orders as $orderItem){
			$collection->push((object)
			[
				'Invoice No' => $orderItem->order_id,
				'Order Date'=>date('d/m/Y', strtotime($orderItem->orderTime)),
				'Order Time'=>date('h:i A', strtotime($orderItem->orderTime)),
				'Customer Name'=>json_decode($orderItem->shipping_address)->name,
				'Customer Contact'=>json_decode($orderItem->shipping_address)->phone,
				'Customer Email'=>json_decode($orderItem->shipping_address)->email,
				'Customer Address'=>json_decode($orderItem->shipping_address)->address,
				'Vendor Name'=>$orderItem->vendorName,
				'Shop Name'=>$orderItem->shopName,
				'Order Status'=>$orderItem->delivery_status,
				'Order Items'=>$orderItem->productName,
				'Order Quantity'=>$orderItem->quantity,
				'Consumer Price'=> $orderItem->cpPrice,
				'Total Price'=> $orderItem->cpPrice*$orderItem->quantity,
				'Seller Price'=> $orderItem->purchase_price,
				'Unit Price(MRP)'=> $orderItem->unit_price,
				'Payment Status'=> $orderItem->payment_status,
				'Payment Method'=> $orderItem->payment_type,
				'Paid Amount'=> $orderItem->payable,
				'Due Amount'=> $orderItem->due,
				'Category'=> $orderItem->categoryName,
				'Parent' => DB::table('categories')->where('id', $orderItem->parent_categoryId)->first()->name,
			]);
		}
	}
	return Excel::download(new OrderExport($collection), 'orders.xlsx');
}


    public function defaultOrdersExport(Request $request)
    {
        //export
        $fileName = 'all_orders_export.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('Invoice No', 'Order Date', 'Order Time', 'Customer Name', 'Customer Contact', 'Customer Email Address', 'Customer Address', 'Vendor Name', 'Shop Name', 'Order Status', 'Order Items', 'Order Quantity', 'Consumer Price', 'Total Price', 'Seller Price', 'Unit Price(MRP)', 'Payment Status', 'Payment Method', 'Paid Amount', 'Due Amount', 'Category');

        $orders = DB::table('orders')->orderBy('id', 'desc')->get();
        $ordersAll = array();

            foreach ($orders as $order) {
                $ordersIteam = DB::table('orders')
                    ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                    ->join('shops', 'shops.user_id', '=', 'order_details.seller_id')
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->join('users as seller', 'seller.id', '=', 'order_details.seller_id')
                    ->join('categories', 'categories.id', '=', 'products.subcategory_id')
                    ->where('orders.id', '=', $order->id)
                    ->select(
                        'orders.code as order_id',
                        'orders.created_at as orderTime',
                        'orders.shipping_address as shipping_address',
                        'shops.name as shopName',
                        'seller.name as vendorName',
                        'order_details.delivery_status as delivery_status',
                        'products.name as productName',
                        'products.unit_price as unit_price',
                        'products.category_id as pCatId',
                        'products.subcategory_id as pSubCatId',
                        'order_details.quantity as quantity',
                        'order_details.price as cpPrice',
                        'products.purchase_price as purchase_price',
                        'orders.payment_status as payment_status',
                        'orders.payment_type as payment_type',
                        'orders.payable as payable',
                        'orders.due as due',
                        'categories.id as catId',
                        'categories.level as catLevel',
                        'categories.name as categoryName'
                    )->get();
                array_push($ordersAll, $ordersIteam);
            }
        $callback = function () use ($ordersAll, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($ordersAll as $orders) {
                foreach ($orders as $ordersIteam) {

                    $row['Invoice No'] = $ordersIteam->order_id;
                    $row['Order Date'] = date('d/m/Y', strtotime($ordersIteam->orderTime));
                    $row['Order Time'] = date('h:i A', strtotime($ordersIteam->orderTime));
                    $row['Customer Name'] = json_decode($ordersIteam->shipping_address)->name;
                    $row['Customer Contact'] = json_decode($ordersIteam->shipping_address)->phone;
                    $row['Customer Email Address'] = json_decode($ordersIteam->shipping_address)->email;
                    $row['Customer Address'] = json_decode($ordersIteam->shipping_address)->address;
                    $row['Vendor Name'] = $ordersIteam->vendorName;
                    $row['Shop Name'] = $ordersIteam->shopName;
                    $row['Order Status'] = $ordersIteam->delivery_status;
                    $row['Order Items'] = $ordersIteam->productName;
                    $row['Order Quantity'] = $ordersIteam->quantity;
                    $row['Consumer Price'] = $ordersIteam->cpPrice;
                    $row['Total Price'] = $ordersIteam->cpPrice * $ordersIteam->quantity;
                    $row['Seller Price'] = $ordersIteam->purchase_price;
                    $row['Unit Price(MRP)'] = $ordersIteam->unit_price;
                    $row['Payment Status'] = $ordersIteam->payment_status;
                    $row['Payment Method'] = $ordersIteam->payment_type;
                    $row['Paid Amount'] = $ordersIteam->payable;
                    $row['Due Amount'] = $ordersIteam->due;
                    $row['Category'] = $ordersIteam->categoryName;

                    fputcsv($file, array(
                        $row['Invoice No'],
                        $row['Order Date'],
                        $row['Order Time'],
                        $row['Customer Name'],
                        $row['Customer Contact'],
                        $row['Customer Email Address'],
                        $row['Customer Address'],
                        $row['Vendor Name'],
                        $row['Shop Name'],
                        $row['Order Status'],
                        $row['Order Items'],
                        $row['Order Quantity'],
                        $row['Consumer Price'],
                        $row['Total Price'],
                        $row['Seller Price'],
                        $row['Unit Price(MRP)'],
                        $row['Payment Status'],
                        $row['Payment Method'],
                        $row['Paid Amount'],
                        $row['Due Amount'],
                        $row['Category']
                    ));
                }
            }
            //return json_encode($ordersAll);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }




}
