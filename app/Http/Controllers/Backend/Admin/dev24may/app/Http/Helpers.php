<?php

use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CommissionController;
use App\Models\Currency;
use App\Models\BusinessSetting;
use App\Models\ProductStock;
use App\Models\Address;
use App\Models\CustomerPackage;
use App\Models\Upload;
use App\Models\Translation;
use App\Models\City;
use App\Utility\CategoryUtility;
use App\Models\Wallet;
use App\Models\CombinedOrder;
use App\Models\User;
use App\Models\Addon;
use App\Models\Product;
use App\Models\Shop;
use App\Utility\SendSMSUtility;
use App\Utility\NotificationUtility;
use Illuminate\Support\Facades\DB;
use App\Models\FlashDeal;
use App\Models\FlashDealProduct;


//added new  30 mar
function campaigns_discount_price($product_id,$price)
{
    $flash_deals = FlashDeal::where('status', 1)->orderBy('id', 'desc')->get();
    foreach ($flash_deals as $key => $flash_deal) {
        if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y H:i:s')) >= $flash_deal->start_date && strtotime(date('d-m-Y H:i:s')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product_id)->first() != null) {
            $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product_id)->first();
            if($flash_deal_product->discount_type == 'percent'){
                $price -= ($price*$flash_deal_product->discount)/100;
            }
            elseif($flash_deal_product->discount_type == 'amount'){
                $price -= $flash_deal_product->discount;
            }
            break;
        }
    }
    return $price;
}


//sensSMS function for OTP
if (!function_exists('sendSMS')) {
    function sendSMS($to, $from, $text, $template_id)
    {
        return SendSMSUtility::sendSMS($to, $from, $text, $template_id);
    }
}

//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('areActiveRoutesHome')) {
    function areActiveRoutesHome(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('default_language')) {
    function default_language()
    {
        return env("DEFAULT_LANGUAGE");
    }
}

/**
 * Save JSON File
 * @return Response
 */
if (!function_exists('convert_to_usd')) {
    function convert_to_usd($amount)
    {
        $currency = Currency::find(get_setting('system_default_currency'));
        return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'USD')->first()->exchange_rate;
    }
}

if (!function_exists('convert_to_kes')) {
    function convert_to_kes($amount)
    {
        $currency = Currency::find(get_setting('system_default_currency'));
        return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'KES')->first()->exchange_rate;
    }
}

//filter products based on vendor activation system
if (!function_exists('filter_products')) {
    function filter_products($products)
    {
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            return $products->where('approved', '1')->where('published', '1')->where('auction_product', 0)->orderBy('created_at', 'desc')->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            return $products->where('published', '1')->where('auction_product', 0)->where('added_by', 'admin');
        }
    }
}

//cache products based on category
if (!function_exists('get_cached_products')) {
    function get_cached_products($category_id = null)
    {   
         $products = \App\Models\Product::where('published', 1)->where('approved', '1')->where('auction_product', 0);
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            $products = $products->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            $products = $products->where('added_by', 'admin');
        }

        if ($category_id != null) {
            return Cache::remember('products-category-' . $category_id, 86400, function () use ($category_id, $products) {
                $category_ids = CategoryUtility::children_ids($category_id);
                $category_ids[] = $category_id;
                return $products->whereIn('category_id', $category_ids)->orderBy('top_product', 'DESC')->take(12)->get();
            }); 
        } else {
            return Cache::remember('products', 86400, function () use ($products) {
                return $products->orderBy('top_product', 'DESC')->take(12)->get();
            });
        }
    }
}

if (!function_exists('verified_sellers_id')) {
    function verified_sellers_id()
    {
        return Cache::rememberForever('verified_sellers_id', function () {
            return App\Models\Seller::where('verification_status', 1)->pluck('user_id')->toArray();
        });
    }
}

if (!function_exists('get_system_default_currency')) {
    function get_system_default_currency()
    {
        return Cache::remember('system_default_currency', 86400, function () {
            return Currency::findOrFail(get_setting('system_default_currency'));
        });
    }
}

//converts currency to home default currency
if (!function_exists('convert_price')) {
    function convert_price($price)
    {
        if (Session::has('currency_code') && (Session::get('currency_code') != get_system_default_currency()->code)) {
            $price = floatval($price) / floatval(get_system_default_currency()->exchange_rate);
            $price = floatval($price) * floatval(Session::get('currency_exchange_rate'));
        }
        return $price;
    }
}

//gets currency symbol
if (!function_exists('currency_symbol')) {
    function currency_symbol()
    {
        if (Session::has('currency_symbol')) {
            return Session::get('currency_symbol');
        }
        return get_system_default_currency()->symbol;
    }
}

//formats currency
if (!function_exists('format_price')) {
    function format_price($price)
    {
        if (get_setting('decimal_separator') == 1) {
            $fomated_price = number_format($price, get_setting('no_of_decimals'));
        } else {
            $fomated_price = number_format($price, get_setting('no_of_decimals'), ',', ' ');
        }

        if (get_setting('symbol_format') == 1) {
            return currency_symbol() . $fomated_price;
        } else if (get_setting('symbol_format') == 3) {
            return currency_symbol() . ' ' . $fomated_price;
        } else if (get_setting('symbol_format') == 4) {
            return $fomated_price . ' ' . currency_symbol();
        }
        return $fomated_price . currency_symbol();
    }
}

//formats price to home default price with convertion
if (!function_exists('single_price')) {
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}

if (! function_exists('discount_in_percentage')) {
    function discount_in_percentage($product)
    {
        try {
            $base = home_base_price($product, false);
            $reduced = home_discounted_base_price($product, false);
            $discount = $base - $reduced;
            $dp = ($discount * 100) / $base;
            return round($dp);
        } catch (Exception $e) {

        }
        return 0;
    }
}

//Shows Price on page based on low to high
if (!function_exists('home_price')) {
    function home_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Price on page based on low to high with discount
if (!function_exists('home_discounted_price')) {
    function home_discounted_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

		/*is campaign discount applicable start*/
		$id=$product->id;
		$lowest_price_new=campaigns_discount_price($id,$lowest_price);
		$highest_price_new=campaigns_discount_price($id,$highest_price);
		/*is campaign discount applicable end*/

				
				
		 if($lowest_price==$lowest_price_new){//no change no campaign root discount applicable
		/*Product root discount start*/
				$discount_applicable = false;

				if ($product->discount_start_date == null) {
					$discount_applicable = true;
				} elseif (
					strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
					strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
				) {
					$discount_applicable = true;
				}

				if ($discount_applicable) {
					if ($product->discount_type == 'percent') {
						$lowest_price -= ($lowest_price * $product->discount) / 100;
						$highest_price -= ($highest_price * $product->discount) / 100;
					} elseif ($product->discount_type == 'amount') {
						$lowest_price -= $product->discount;
						$highest_price -= $product->discount;
					}
				}
		/*Product root discount end*/
		}else{
            $lowest_price=$lowest_price_new;
            $highest_price=$highest_price_new;
        }
		
		

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Base Price
if (!function_exists('home_base_price_by_stock_id')) {
    function home_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $price = $product_stock->price;
        $tax = 0;

        foreach ($product_stock->product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return format_price(convert_price($price));
    }
}
if (!function_exists('home_base_price')) {
    function home_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price_by_stock_id')) {
    function home_discounted_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $product = $product_stock->product;
        $price = $product_stock->price;
        $tax = 0;


		/*is campaign discount applicable start*/
		$id=$product->id;
		$lowest_price_new=campaigns_discount_price($id,$price);
		/*is campaign discount applicable end*/
				
		 if($price==$lowest_price_new){//no change no campaign root discount applicable
		/*Product root discount start*/
        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }
		/*Product root discount end*/
		}else{
            $price=$lowest_price_new;
        }


        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return format_price(convert_price($price));
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price')) {
    function home_discounted_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;


		/*is campaign discount applicable start*/
		$id=$product->id;
		$lowest_price_new=campaigns_discount_price($id,$price);
		/*is campaign discount applicable end*/
 
				
		 if($price==$lowest_price_new){//no change no campaign root discount applicable
		/*Product root discount start*/


        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }
		/*Product root discount end*/
		}else{
            $price=$lowest_price_new;
        }


 
        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

if (!function_exists('renderStarRating')) {
    function renderStarRating($rating, $maxRating = 5)
    {
        $fullStar = "<i class = 'las la-star active'></i>";
        $halfStar = "<i class = 'las la-star half'></i>";
        $emptyStar = "<i class = 'las la-star'></i>";
        $rating = $rating <= $maxRating ? $rating : $maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating) - $fullStarCount;
        $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

        $html = str_repeat($fullStar, $fullStarCount);
        $html .= str_repeat($halfStar, $halfStarCount);
        $html .= str_repeat($emptyStar, $emptyStarCount);
        echo $html;
    }
}

function translate($key, $lang = null)
{
    if($lang == null){
        $lang = App::getLocale();
    }

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));

    $translations_default = Cache::rememberForever('translations-'.env('DEFAULT_LANGUAGE', 'en'), function () {
        return Translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
    });

    if(!isset($translations_default[$lang_key])){
        $translation_def = new Translation;
        $translation_def->lang = env('DEFAULT_LANGUAGE', 'en');
        $translation_def->lang_key = $lang_key;
        $translation_def->lang_value = $key;
        $translation_def->save();
        Cache::forget('translations-'.env('DEFAULT_LANGUAGE', 'en'));
    }

    $translation_locale = Cache::rememberForever('translations-'.$lang, function () use ($lang) {
        return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
    });

    //Check for session lang
    if(isset($translation_locale[$lang_key])){
        return $translation_locale[$lang_key];
    }
    elseif(isset($translations_default[$lang_key])){
        return $translations_default[$lang_key];
    }
    else{
        return $key;
    }
}

function remove_invalid_charcaters($str)
{
    $str = str_ireplace(array("\\"), '', $str);
    return str_ireplace(array('"'), '\"', $str);
}

function getShippingCost($carts, $index)
{
    $admin_products = array();
    $seller_products = array();

    $cartItem = $carts[$index];
    $product = Product::find($cartItem['product_id']);

    if ($product->digital == 1) {
        return 0;
    }


    //selected city
    $shipping_info_city_id=Session::get('shipping_info_city_id');    

	
    $shipping_type=$product->shipping_type;
    $shipping_cost=$product->shipping_cost;
	$seller=$product->user_id;
	$collect_weight=0;



	$address_id=$cartItem['address_id'];
    $all_address = \App\Models\Address::find($address_id);

    //DB::insert('insert into 1test (value,value2,value3) values (?,?,?)', [$shipping_type,$shipping_cost,$seller]);
	
    if($shipping_type=='flat_rate'){
        return ($shipping_cost*$cartItem['quantity']);
    }elseif($shipping_type=='free'){
        return (0);
    }
	
    elseif($shipping_type=='weight_based'){  
          $already_used=Session::get('already_used');



		  if($already_used){
		      DB::insert('insert into 1test (value) values (?)', [implode(" ",$already_used['seller'])]);	  
			  if (in_array($seller.'2', $already_used['seller']))
			  {
			  //"Match found"
					return 0; 
			  }else{

                    $temp=Session::push('already_used.seller',$seller.'2'); //make used
                    
                        foreach ($carts as $key => $cartItem){
                            
                            $product = \App\Models\Product::find($cartItem['product_id']);
                            if($product->user_id==$seller){
                                $shipping_type=$product->shipping_type;
                                if($shipping_type=='weight_based'){
                                    $ind=$product->shipping_cost;
                                    $qty=$cartItem['quantity'];
                                    $res=$ind*$qty;
                                    $collect_weight=$collect_weight+$res;
                                }
                            }
                        } 
                    
                    $shipping_cost_cal=app('App\Http\Controllers\ShippingController')->get_shipping_cost_weight_based($collect_weight,$all_address->city_id);
                    return $shipping_cost_cal;
              }		 
		  } 


		  
		  else
		  {   
                    $temp=Session::push('already_used.seller',$seller.'2'); //make used
                    
                        foreach ($carts as $key => $cartItem){
                            
                            $product = \App\Models\Product::find($cartItem['product_id']);
                            if($product->user_id==$seller){
                                $shipping_type=$product->shipping_type;
                                if($shipping_type=='weight_based'){
                                    $ind=$product->shipping_cost;
                                    $qty=$cartItem['quantity'];
                                    $res=$ind*$qty;
                                    $collect_weight=$collect_weight+$res;
                                }
                            }
                        } 
                    
                    $shipping_cost_cal=app('App\Http\Controllers\ShippingController')->get_shipping_cost_weight_based($collect_weight,$all_address->city_id);
                    return $shipping_cost_cal;
		  }




	}elseif($shipping_type=='category_wise'){
        $shipping_cost_cal=app('App\Http\Controllers\ShippingController')->get_shipping_cost_category_wise($shipping_cost,$all_address->city_id);
        //start special shipping
        $check_special_category=app('App\Http\Controllers\ShippingController')->check_category_special($shipping_cost,$shipping_cost_cal);

        if($check_special_category>0){
            $have_special_category=app('App\Http\Controllers\ShippingController')->get_shipping_cost_category_special($carts,$seller,$shipping_cost,$shipping_cost_cal);
            if($have_special_category=='-0'){return 0;}
            if($have_special_category>0){return $have_special_category;}
            if($have_special_category=='-1'){return 0;}
        }
        //end special shipping
        $qty=$cartItem['quantity'];
        if($qty>1){
            $qty=$qty-1;
            $inc=100;

            //have cost_increment conditions?
            return $inc=app('App\Http\Controllers\ShippingController')->get_inc_cost_category_wise($shipping_cost_cal,$shipping_cost,$qty);

        }else{
            return ($shipping_cost_cal*$qty);
        }

    }	
    
    
    

	
    /*
    foreach ($carts as $key => $cartItem) {
        $product = Product::find($cartItem['product_id']);
        if ($product->added_by == 'admin') {
            array_push($admin_products, $cartItem['product_id']);
        } else {
            $product_ids = array();
            if (isset($seller_products[$product->user_id])) {
                $product_ids = $seller_products[$product->user_id];
            }
            array_push($product_ids, $cartItem['product_id']);
            $seller_products[$product->user_id] = $product_ids;
        }
    }
	
    if (get_setting('shipping_type') == 'flat_rate') {
        return get_setting('flat_rate_shipping_cost') / count($carts);
    }
    elseif (get_setting('shipping_type') == 'seller_wise_shipping') {
        if ($product->added_by == 'admin') {
            return get_setting('shipping_cost_admin') / count($admin_products);
        } else {
            return Shop::where('user_id', $product->user_id)->first()->shipping_cost / count($seller_products[$product->user_id]);
        }
    }
    elseif (get_setting('shipping_type') == 'area_wise_shipping') {
        $shipping_info = Address::where('id', $carts[0]['address_id'])->first();
        $city = City::where('id', $shipping_info->city_id)->first();
        if ($city != null) {
            if ($product->added_by == 'admin') {
                return $city->cost / count($admin_products);
            } else {
                return $city->cost / count($seller_products[$product->user_id]);
            }
        }
        return 0;
    }
    else {
        if($product->is_quantity_multiplied && get_setting('shipping_type') == 'product_wise_shipping') {
            return  $product->shipping_cost * $cartItem['quantity'];
        }
        return $product->shipping_cost;
    }*/
}

function timezones()
{
    return Timezones::timezonesToArray();
}

if (!function_exists('app_timezone')) {
    function app_timezone()
    {
        return config('app.timezone');
    }
}

if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url('/public/'.$path);
        } else {
            return app('url')->asset('public/' . $path, $secure);
        }
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}


// if (!function_exists('isHttps')) {
//     function isHttps()
//     {
//         return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
//     }
// }

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}


if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/public/';
        } else {
            return getBaseURL() . 'public/';
        }
    }
}


if (!function_exists('isUnique')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function isUnique($email)
    {
        $user = \App\Models\User::where('email', $email)->first();

        if ($user == null) {
            return '1'; // $user = null means we did not get any match with the email provided by the user inside the database
        } else {
            return '0';
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}

function hex2rgba($color, $opacity = false)
{
    return Colorcodeconverter::convertHexToRgba($color, $opacity);
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isSeller')) {
    function isSeller()
    {
        if (Auth::check() && Auth::user()->user_type == 'seller') {
            return true;
        }
        return false;
    }
}

if (!function_exists('isCustomer')) {
    function isCustomer()
    {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            return true;
        }
        return false;
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

// duplicates m$ excel's ceiling function
if (!function_exists('ceiling')) {
    function ceiling($number, $significance = 1)
    {
        return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
    }
}

if (!function_exists('get_images')) {
    function get_images($given_ids, $with_trashed = false)
    {
        if (is_array($given_ids)) {
            $ids = $given_ids;
        } elseif ($given_ids == null) {
            $ids = [];
        } else {
            $ids = explode(",", $given_ids);
        }


        return $with_trashed
            ? Upload::withTrashed()->whereIn('id', $ids)->get()
            : Upload::whereIn('id', $ids)->get();
    }
}

//for api
if (!function_exists('get_images_path')) {
    function get_images_path($given_ids, $with_trashed = false)
    {
        $paths = [];
        $images = get_images($given_ids, $with_trashed);
        if (!$images->isEmpty()) {
            foreach ($images as $image) {
                $paths[] = !is_null($image) ? $image->file_name : "";
            }
        }

        return $paths;
    }
}

//for api
if (!function_exists('checkout_done')) {
    function checkout_done($combined_order_id, $payment)
    {
        $combined_order = CombinedOrder::find($combined_order_id);

        foreach ($combined_order->orders as $key => $order) {
            $order->payment_status = 'paid';
            $order->payment_details = $payment;
            $order->save();

            try {
                NotificationUtility::sendOrderPlacedNotification($order);
                calculateCommissionAffilationClubPoint($order);
            } catch (\Exception $e) {
               
            }
        }
    }
}

//for api
if (!function_exists('wallet_payment_done')) {
    function wallet_payment_done($user_id, $amount, $payment_method, $payment_details)
    {
        $user = \App\Models\User::find($user_id);
        $user->balance = $user->balance + $amount;
        $user->save();

        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->amount = $amount;
        $wallet->payment_method = $payment_method;
        $wallet->payment_details = $payment_details;
        $wallet->save();
    }
}

if (!function_exists('purchase_payment_done')) {
    function purchase_payment_done($user_id, $package_id)
    {
        $user = User::findOrFail($user_id);
        $user->customer_package_id = $package_id;
        $customer_package = CustomerPackage::findOrFail($package_id);
        $user->remaining_uploads += $customer_package->product_upload;
        $user->save();

        return 'success';
    }
}

//Commission Calculation
if (!function_exists('calculateCommissionAffilationClubPoint')) {
    function calculateCommissionAffilationClubPoint($order)
    {
        (new CommissionController)->calculateCommission($order);

        if (addon_is_activated('affiliate_system')) {
            (new AffiliateController)->processAffiliatePoints($order);
        }

        if (addon_is_activated('club_point')) {
            if ($order->user != null) {
                (new ClubPointController)->processClubPoints($order);
            }
        }

        $order->commission_calculated = 1;
        $order->save();
    }
}

// Addon Activation Check
if (!function_exists('addon_is_activated')) {
    function addon_is_activated($identifier, $default = null)
    {
        $addons = Cache::remember('addons', 86400, function () {
            return Addon::all();
        });

        $activation = $addons->where('unique_identifier', $identifier)->where('activated', 1)->first();
        return $activation == null ? false : true;
    }
}

if (!function_exists('user')) {
    function user()
    {
        if(Auth::check()){$c_user=Auth::user()->id;} else{$c_user='';}
        return $c_user;
    }
}


/* Start Jan 18 2022 */
function string_validate($custom_pattern,$type,$string)
{
    if($type=='alphabet'){
        return preg_match_all('/^[a-zA-Z\s]+$/', $string);
    }elseif($type=='number'){
        return preg_match_all('/^[0-9]*$/', $string);
    }else{
        if($custom_pattern !=''){
            return preg_match_all($custom_pattern, $string);
        }else{return preg_match_all("/^[A-Za-z0-9\s]+$/", $string);}
    }
}


function user_by_id($user_id)
{
    $users =  DB::table('users')
        ->where('id', '=', $user_id)
        ->first();
    return ($users);
}

function error($msg)
{
    flash(translate('Error! '.$msg))->error();
}
function success($msg)
{
    flash(translate('Success! '.$msg))->error();
}

function friendlytime($time){
    return $time->format('d M, Y');
}
/* End Jan 18 2022 */
 
 
if (!function_exists('photovalidation')) {
    function photovalidation($ids, $section,$id)
    {   
          

        //image configuration
        $product_gallary_image_maxsize=100*1024; //byte
        $product_gallary_image_dimension='600*600'; //width*height

        $product_thumbnail_mage_maxsize=25*1024; //byte
        $product_thumbnail_mage_dimension='300*300'; //width*height
        

        $error=0;
        foreach(explode(',',$ids) as $gal_pro){

            $this_size=DB::table('uploads')->where('id', '=',$gal_pro)->first();
            $image = getimagesize(my_asset($this_size->file_name)); $width = $image[0];  $height = $image[1]; 

			$pre_gal='';
          if($section=='product_gallary_images'){
                if($id!=''){
                    $pre_gal = DB::table('products')->where('id', $id)->first()->photos;
                }
                
                if (in_array($gal_pro, explode(',',$pre_gal) )) {
                    //existing product
                }else{
                      if($this_size->file_size > $product_gallary_image_maxsize){  $error ++;  }   
                      if($width==explode('*',$product_gallary_image_dimension)[0] && $height==explode('*',$product_gallary_image_dimension)[1]){}else{ $error ++;}
                }
                
                
           }
			$pre_gal='';
           if($section=='product_thumbnail_mage'){
                if($id!=''){
                    $pre_gal = DB::table('products')->where('id', $id)->first()->thumbnail_img;
                }
                
                if (in_array($gal_pro, explode(',',$pre_gal) )) {
                    //existing product
                }else{
                    if($this_size->file_size > $product_thumbnail_mage_maxsize){  $error ++;  }   
                    if($width==explode('*',$product_thumbnail_mage_dimension)[0] && $height==explode('*',$product_thumbnail_mage_dimension)[1]){}else{ $error ++;}
                }
               // DB::insert('insert into 1test (value) values (?)', [$pre_gal]);
           } 
         }       

         if($error>0){ return 0; }else{ return 1; }
    }
}




function is_flashdeal_product($product_id)
{
    $id=$product_id;
    $flashdeals = \App\Models\FlashDeal::where('status', 1)->get();
    $inFlashDeal = false;
    foreach ($flashdeals as $flashdeal) {
        if ($flashdeal != null && $flashdeal->status == 1 && strtotime(date('d-m-Y H:i:s')) >= $flashdeal->start_date && strtotime(date('d-m-Y H:i:s')) <= $flashdeal->end_date && \App\Models\FlashDealProduct::where('flash_deal_id', $flashdeal->id)->where('product_id', $id)->first() != null) {
            $flashdeal_product = \App\Models\FlashDealProduct::where('flash_deal_id', $flashdeal->id)->where('product_id', $id)->first();

            $inFlashDeal = true;
            return $flashdeal;
            break;
        }
    }
}


//return file uploaded via uploader
if (!function_exists('api_photolink_builder')) {
    function api_photolink_builder($string)
    {
		$str='';
		$arr=explode(',',$string);
		foreach($arr as $arr_){
			if($str==''){
				$str=uploaded_asset($arr_);
			} else{
				$str=$str.','.uploaded_asset($arr_);
			}
		}
		
		return $str;
		
    }
}


function update_history($table_name,$type,$id,$data,$buffer_size){
	$last_buffer_index=-1;
	$previous_activity_after=array();
	
	if($type=='create'){
		DB::insert('insert into '.$table_name.' (update_history) values (?)', [$data]);
	}else{
		$current = DB::table($table_name)->where('id',"=",$id)->first();
		//$current=Product::where('id',"=", $id)->first();
		$data_string='';
		foreach(explode(',',$data) as $data_each){
			$data_string=$data_string.','.$data_each.'='.$current->$data_each;
		}
		
		
		//get previous update_history
		$previous_activity=$current->update_history;

		if($previous_activity){
			$previous_activity_after=json_decode($previous_activity);    
			if(count($previous_activity_after)>=$buffer_size){
				$removed = array_shift($previous_activity_after);
			}			
			$last_buffer_index=explode(',', end($previous_activity_after),)[0];
		}
  
		$data_string=($last_buffer_index+1).','.substr($data_string, 1).',user='.user();
	    array_push($previous_activity_after,$data_string);	
		
		
		
		DB::table($table_name)
              ->where('id', $id)
              ->update(['update_history' => $previous_activity_after]);
	}
	//return $previous_activity_after;
}



function test($dd){
	DB::insert('insert into 1test (value) values (?)', [$dd]);
}