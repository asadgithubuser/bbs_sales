<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    
    return "Clean";
    // return what you want
});
Route::get('/link-storage', function() {
    $exitCode = Artisan::call('storage:link');
    
    return "Linked";
    // return what you want
});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('search/ajax/{type}', ['uses' => 'Backend\Admin\AdminSearchContoller@ajaxSearch'])->name('searchAjax');
Route::post('search-live-ajax', ['uses' => 'Backend\Admin\AdminSearchContoller@searchAjax2'])->name('searchAjax2');

Route::get('/all-bbs-ebook', 'Frontend\FrontendController@allDataForFreeBook')->name('allDataForFreeBook');

Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('/csv-import', function(){
    return view('csv-import');
});
Route::post('/import-data-csv', 'Frontend\FrontendController@importCSVtoDB')->name('import-data-csv');

Route::get('/notice/{id}', 'Frontend\FrontendController@noticeDetails')->name('notice');
Route::get('/citizen-login', 'Frontend\FrontendController@citizenLogin')->name('citizenLogin');
Route::get('/bbs/office/login', 'Frontend\FrontendController@officeLogin')->name('officeLogin');
Route::get('/service/{service_id}', 'Frontend\FrontendController@service')->name('service');
Route::get('/search-items', 'Frontend\FrontendController@search')->name('search');

Route::get('/free-publication-data', 'Frontend\FrontendController@freePublicationData')->name('freePublicationData');
// E-Payment Gateway
Route::post('/bbs/response-ekpay-ipn-tax', 'Frontend\FrontendController@responseEkpayIpnTax')->name('responseEkpayIpnTax');
// END E-Payment Gateway

// Application Purchase
Route::get('/application/create', ['uses' => 'Backend\Admin\ApplicationController@create'])->name('application.create');
Route::get('/application/publicationApp', ['uses' => 'Backend\Admin\ApplicationController@publicationApp'])->name('application.publicationApp');
Route::post('/application/store', ['uses' => 'Backend\Admin\ApplicationController@store'])->name('application.store');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['AuthGates'], 'prefix' => '/bbs', 'as' => 'admin.'], function() {

    /* Admin Dashboard Route */
    Route::get('/', ['uses' => 'Backend\IndexController@adminDashboard'])->name('index');

    /* Admin search Route */
    Route::get('table-data/ajax/{type}', ['uses' => 'Backend\Admin\AdminSearchContoller@searchAjaxTableList'])->name('searchAjaxTableList');
    Route::get('search/ajax/{type}', ['uses' => 'Backend\Admin\AdminSearchContoller@ajaxSearch'])->name('searchAjax');
    Route::get('search/ajax', ['uses' => 'Backend\Admin\AdminSearchContoller@searchAjaxApprovedList'])->name('searchAjaxApprovedList');
    Route::post('/search_location', ['uses' => 'Backend\Admin\AdminSearchContoller@search_location'])->name('search_location');
    Route::post('/table-item-search', ['uses' => 'Backend\Admin\AdminSearchContoller@allTableDataListSearch'])->name('allTableDataListSearch');

    /* Manage Applications  */
    Route::group(['prefix' => '/application', 'as' => 'application.'], function() {
        Route::get('/createPublication', ['uses' => 'Backend\Admin\ApplicationController@publicationAppAdmin'])->name('publicationAppAdmin');
        Route::get('/index', ['uses' => 'Backend\Admin\ApplicationController@index'])->name('index');
        Route::get('/show/{application_id}', ['uses' => 'Backend\Admin\ApplicationController@show'])->name('show');
        Route::get('/create', ['uses' => 'Backend\Admin\ApplicationController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ApplicationController@store'])->name('store');
        Route::get('/edit/{application}', ['uses' => 'Backend\Admin\ApplicationController@edit'])->name('edit');
        Route::post('/update/{application}', ['uses' => 'Backend\Admin\ApplicationController@update'])->name('update');
        Route::post('/destroy/{application}', ['uses'=> 'Backend\Admin\ApplicationController@destroy'])->name('destroy');

        Route::post('/discount/{application}', ['uses'=> 'Backend\Admin\ApplicationController@discount'])->name('discount');

        Route::get('/assessment/{application}', ['uses' => 'Backend\Admin\ApplicationController@assessment'])->name('assessment');
        Route::post('/forward/{application_id}', ['uses' => 'Backend\Admin\ApplicationController@forward'])->name('forwardApplication');
        Route::get('/cancel/{application_id}', ['uses' => 'Backend\Admin\ApplicationController@cancel'])->name('cancel');
        Route::get('/approve/{application_id}', ['uses' => 'Backend\Admin\ApplicationController@approve'])->name('approve');

        Route::get('/pending', ['uses' => 'Backend\Admin\ApplicationController@pending'])->name('pending');
        Route::get('/processing', ['uses' => 'Backend\Admin\ApplicationController@processing'])->name('processing');
        Route::get('/approved', ['uses' => 'Backend\Admin\ApplicationController@approved'])->name('approved');
        Route::get('/canceled', ['uses' => 'Backend\Admin\ApplicationController@canceled'])->name('canceled');

        Route::post('/saveCart', ['uses' => 'Backend\Admin\ApplicationController@saveCart'])->name('saveCart');
        Route::post('/saveCartOnchange', ['uses' => 'Backend\Admin\ApplicationController@saveCartOnchange'])->name('saveCartOnchange');
        Route::get('/clearCart/{service_cart?}', ['uses' => 'Backend\Admin\ApplicationController@clearCart'])->name('clearCart');

        Route::get('/manual-pay/{application}', ['uses' => 'Backend\Admin\ApplicationController@manualPay'])->name('manualPay');

        // E-Payment Gateway
        Route::get('/e-pay/{application}', ['uses' => 'Backend\Admin\ApplicationController@ePay'])->name('ePay');
        Route::get('/response-ekpay-success', ['uses' => 'Backend\Admin\ApplicationController@responseEkpaySuccess'])->name('responseEkpaySuccess');
        Route::get('/response-ekpay-cancel', ['uses' => 'Backend\Admin\ApplicationController@responseEkpayCancel'])->name('responseEkpayCancel');
        // End E-Payment Gateway

        Route::get('/download-chalan/{application}', ['uses' => 'Backend\Admin\ApplicationController@downloadChalan'])->name('downloadChalan');
        Route::get('/payment-approve/{application}', ['uses' => 'Backend\Admin\ApplicationController@paymentApprove'])->name('paymentApprove');

        Route::get('/download/{application_id}', ['uses' => 'Backend\Admin\ApplicationController@downloadlinks'])->name('itemsDownload');
        Route::post('/downloadItem/{link}', ['uses' => 'Backend\Admin\ApplicationController@downloadItem'])->name('downloadItem');
        Route::get('/invoice/{application}/{type}',['uses'=>'Backend\Admin\ApplicationController@invoice'])->name('invoice');
        Route::get('/certificatePreview',['uses'=>'Backend\Admin\ApplicationController@certificatePreview'])->name('certificatePreview');
        Route::post('/changeCertificate/{certificate}',['uses'=>'Backend\Admin\ApplicationController@changeCertificate'])->name('changeCertificate');

        Route::post('/token/{application}',['uses'=>'Backend\Admin\ApplicationController@courierToken'])->name('token');
        Route::post('/delivery/{application}',['uses'=>'Backend\Admin\ApplicationController@productDelivery'])->name('delivery');

    });
    
    /* Manage Payment Routes */
    Route::group(['prefix' => '/payment', 'as' => 'payment.'], function() { 
        Route::post('/store/{application}', ['uses' => 'Backend\Admin\PaymentController@store'])->name('store');
        Route::get('/dollar-convert-in-taka', ['uses' => 'Backend\Admin\PaymentController@dollarConvertPage'])->name('dollarValueConvertInTaka');
        Route::post('/dollar-value-store', ['uses' => 'Backend\Admin\PaymentController@convertedDollarValueStore'])->name('convertedDollarValueStore');
        Route::post('/ajaz-get-amount', ['uses' => 'Backend\Admin\PaymentController@ajaxGetTotalAmount'])->name('ajaxGetTotalAmount');
    });

    /* Manage Service Routes */
    Route::group(['prefix' => '/service', 'as' => 'service.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ServiceController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ServiceController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ServiceController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ServiceController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ServiceController@edit'])->name('edit');
        Route::patch('/update/{service}', ['uses' => 'Backend\Admin\ServiceController@update'])->name('update');
        Route::get('/delete/{service}', ['uses' => 'Backend\Admin\ServiceController@statusChange'])->name('delete');
    });

    /* Manage Service Item Routes */
    Route::group(['prefix' => '/serviceItem', 'as' => 'serviceItem.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ServiceItemController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ServiceItemController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ServiceItemController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ServiceItemController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ServiceItemController@edit'])->name('edit');
        Route::patch('/update/{serviceItem}', ['uses' => 'Backend\Admin\ServiceItemController@update'])->name('update');
        Route::get('/delete/{serviceItem}', ['uses' => 'Backend\Admin\ServiceItemController@statusChange'])->name('delete');
        Route::get('/remove/{id}', ['uses' => 'Backend\Admin\ServiceItemController@destroy'])->name('remove');
    });

    /* Manage Service Additional Item Routes */
    Route::group(['prefix' => '/serviceItemAdditional', 'as' => 'serviceItemAdditional.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@edit'])->name('edit');
        Route::patch('/update/{serviceItemAdditional}', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@update'])->name('update');
        Route::get('/delete/{serviceItemAdditional}', ['uses' => 'Backend\Admin\ServiceItemAdditionalController@statusChange'])->name('delete');
    });

    /* Manage Service Item Price Routes */
    Route::group(['prefix' => '/serviceItemPrice', 'as' => 'serviceItemPrice.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ServiceItemPriceController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ServiceItemPriceController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ServiceItemPriceController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ServiceItemPriceController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ServiceItemPriceController@edit'])->name('edit');
        Route::patch('/update/{serviceItemPrice}', ['uses' => 'Backend\Admin\ServiceItemPriceController@update'])->name('update');
        Route::get('/delete/{serviceItemPrice}', ['uses' => 'Backend\Admin\ServiceItemPriceController@statusChange'])->name('delete');
    });

    /* Manage Datatype Routes */
    Route::group(['prefix' => '/datatype', 'as' => 'datatype.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\DatatypeController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\DatatypeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\DatatypeController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\DatatypeController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\DatatypeController@edit'])->name('edit');
        Route::patch('/update/{datatype}', ['uses' => 'Backend\Admin\DatatypeController@update'])->name('update');
        Route::get('/delete/{datatype}', ['uses' => 'Backend\Admin\DatatypeController@statusChange'])->name('delete');
    });

    /* Manage Office Routes */
    Route::group(['prefix' => '/office', 'as' => 'office.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\OfficeController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\OfficeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\OfficeController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\OfficeController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\OfficeController@edit'])->name('edit');
        Route::patch('/update/{office}', ['uses' => 'Backend\Admin\OfficeController@update'])->name('update');
        Route::get('/delete/{office}', ['uses' => 'Backend\Admin\OfficeController@statusChange'])->name('delete');
    });

    /* Manage Receiving Mode Routes */
    Route::group(['prefix' => '/receiving-mode', 'as' => 'receivingMode.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ReceivingModeController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ReceivingModeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ReceivingModeController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ReceivingModeController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ReceivingModeController@edit'])->name('edit');
        Route::patch('/update/{receivingMode}', ['uses' => 'Backend\Admin\ReceivingModeController@update'])->name('update');
        Route::get('/delete/{receivingMode}', ['uses' => 'Backend\Admin\ReceivingModeController@statusChange'])->name('delete');
    });

    /* Manage User Routes */
    Route::group(['prefix' => '/user', 'as' => 'user.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\UserController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\UserController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\UserController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\UserController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\UserController@edit'])->name('edit');
        Route::patch('/update/{user}', ['uses' => 'Backend\Admin\UserController@update'])->name('update');
        Route::get('/block/{user}', ['uses' => 'Backend\Admin\UserController@block'])->name('block');
        Route::get('/delete/{user}', ['uses' => 'Backend\Admin\UserController@destroy'])->name('delete');

        Route::get('/systemUserList', ['uses' => 'Backend\Admin\UserController@systemUserList'])->name('systemUserList');
        Route::get('/publicUserList', ['uses' => 'Backend\Admin\UserController@publicUserList'])->name('publicUserList');
        Route::get('/subscribers', ['uses' => 'Backend\Admin\UserController@subscribers'])->name('subscribers');
        Route::get('/editProfile/{username}/', ['uses' => 'Backend\Admin\UserController@editProfile'])->name('editProfile');
        Route::patch('/updateProfile/{user}', ['uses' => 'Backend\Admin\UserController@updateProfile'])->name('updateProfile');
        Route::patch('/updatePassword/{user}', ['uses' => 'Backend\Admin\UserController@updatePassword'])->name('updatePassword');
        Route::get('/edit-password/{username}/', ['uses' => 'Backend\Admin\UserController@editPassword'])->name('editPassword');
        
    });
    
    /* Manage Roles Routes */    
        Route::group(['prefix' => '/role', 'as' => 'role.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\RoleController@index'])->name('index');
        Route::post('/create', ['uses' => 'Backend\Admin\RoleController@create'])->name('create');
        Route::post('/update/{id}', ['uses' => 'Backend\Admin\RoleController@update'])->name('update');
        Route::get('/status/change/{id}', ['uses' => 'Backend\Admin\RoleController@statusChange'])->name('statusChange');
    });

    /* Manage Permission Routes */    
    Route::group(['prefix' => '/permission', 'as' => 'permission.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\PermissionController@index'])->name('index');
        Route::post('/create', ['uses' => 'Backend\Admin\PermissionController@create'])->name('create');
        Route::post('/update/{id}', ['uses' => 'Backend\Admin\PermissionController@update'])->name('update');

    });

    /* Manage RolePermission */
    Route::group(['prefix' => '/role-permission', 'as' => 'rolePermission.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\RolePermissionController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\RolePermissionController@create'])->name('create');
        Route::get('/edit/{rolePermission}', ['uses' => 'Backend\Admin\RolePermissionController@edit'])->name('edit');
        Route::get('/select/new/role', [ 'uses' => 'Backend\Admin\RolePermissionController@selectNewRole' ])->name('selectNewRole');
        Route::post('/store', ['uses' => 'Backend\Admin\RolePermissionController@store'])->name('store');
        Route::post('/update/{rolePermission}', ['uses' => 'Backend\Admin\RolePermissionController@update'])->name('update');
        
    });

    /* Manage Department */
    Route::group(['prefix' => '/department', 'as' => 'department.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\DepartmentController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\DepartmentController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\DepartmentController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\DepartmentController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\DepartmentController@edit'])->name('edit');
        Route::patch('/update/{department}', ['uses' => 'Backend\Admin\DepartmentController@update'])->name('update');
        Route::get('/delete/{department}', ['uses' => 'Backend\Admin\DepartmentController@statusChange'])->name('delete');
    });
    
    /* Manage Notice */
    Route::group(['prefix' => '/notice', 'as' => 'notice.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\NoticeController@index'])->name('index');
        Route::get('/create',['uses' => 'Backend\Admin\NoticeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\NoticeController@store'])->name('store');
        Route::get('/edit/{notice}',['uses' => 'Backend\Admin\NoticeController@edit'])->name('edit');
        Route::post('/update/{notice}', ['uses' => 'Backend\Admin\NoticeController@update'])->name('update');
        Route::post('/destroy/{notice}',['uses'=> 'Backend\Admin\NoticeController@destroy'])->name('destroy');
        Route::get('/show/{notice}',['uses'=> 'Backend\Admin\NoticeController@show'])->name('show');

    });

    /* Manage Application Purpose */
    Route::group(['prefix' => '/application-purpose', 'as' => 'purpose.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ApplicationPurposeController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ApplicationPurposeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ApplicationPurposeController@store'])->name('store');
        Route::get('/edit/{purpose}',['uses' => 'Backend\Admin\ApplicationPurposeController@edit'])->name('edit');
        Route::post('/update/{purpose}',['uses' => 'Backend\Admin\ApplicationPurposeController@update'])->name('update');
        Route::post('/destroy/{purpose}',['uses'=> 'Backend\Admin\ApplicationPurposeController@destroy'])->name('destroy');
    });

    /* Manage Application Forwarding */
    Route::group(['prefix' => '/application-forwarding', 'as' => 'applicationForwarding.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ApplicationForwardController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ApplicationForwardController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ApplicationForwardController@store'])->name('store');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ApplicationForwardController@edit'])->name('edit');
        Route::post('/update/{id}', ['uses' => 'Backend\Admin\ApplicationForwardController@update'])->name('update');
    });

    /* Manage Designation */
    Route::group(['prefix' => '/designation', 'as' => 'designation.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\DesignationController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\DesignationController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\DesignationController@store'])->name('store');
        Route::get('/edit/{designation}',['uses' => 'Backend\Admin\DesignationController@edit'])->name('edit');
        Route::post('/update/{designation}',['uses' => 'Backend\Admin\DesignationController@update'])->name('update');
        Route::post('/destroy/{designation}',['uses'=> 'Backend\Admin\DesignationController@destroy'])->name('destroy');

    });

    /* Manage Requisition */
    Route::group(['prefix' => '/requisition', 'as' => 'requisition.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\RequisitionController@index'])->name('index');
        Route::get('/pending', ['uses' => 'Backend\Admin\RequisitionController@pending'])->name('pending');
        Route::get('/approved', ['uses' => 'Backend\Admin\RequisitionController@approved'])->name('approved');
        Route::get('/declined', ['uses' => 'Backend\Admin\RequisitionController@declined'])->name('declined');
        Route::get('/delivered', ['uses' => 'Backend\Admin\RequisitionController@delivered'])->name('delivered');

        Route::get('/show/{id}', ['uses' => 'Backend\Admin\RequisitionController@show'])->name('show');
        Route::get('/create', ['uses' => 'Backend\Admin\RequisitionController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\RequisitionController@store'])->name('store');

        Route::get('/approve/{requisition}', ['uses' => 'Backend\Admin\RequisitionController@approve'])->name('approve');
        Route::get('/deliver/{requisition}', ['uses' => 'Backend\Admin\RequisitionController@deliver'])->name('deliver');
        Route::post('/decline/{requisition}', ['uses' => 'Backend\Admin\RequisitionController@decline'])->name('decline');
    });

    /* Manage faq */
    Route::group(['prefix' => '/faq', 'as' => 'faq.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\FaqController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\FaqController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\FaqController@store'])->name('store');
        Route::get('/edit/{faq}',['uses' => 'Backend\Admin\FaqController@edit'])->name('edit');
        Route::post('/update/{faq}',['uses' => 'Backend\Admin\FaqController@update'])->name('update');
        Route::post('/destroy/{faq}',['uses'=> 'Backend\Admin\FaqController@destroy'])->name('destroy');

    });

    /* Manage setting */
    Route::group(['prefix' => '/setting', 'as' => 'setting.'], function() {

        // template setting
        Route::get('/index', ['uses' => 'Backend\Admin\SettingController@templateSetting'])->name('templateSetting');
        Route::get('/showtemp/{template}', ['uses' => 'Backend\Admin\SettingController@showTemp'])->name('showTemp');
        Route::get('/create-template',['uses' => 'Backend\Admin\SettingController@createTemplate'])->name('createTemplate');
        Route::post('/store-template',['uses' => 'Backend\Admin\SettingController@storeTemplate'])->name('storeTemplate');
        Route::get('/edit-template/{template}',['uses' => 'Backend\Admin\SettingController@editTemplate'])->name('editTemplate');
        Route::post('/update-template/{template}',['uses' => 'Backend\Admin\SettingController@updateTemplate'])->name('updateTemplate');        
        Route::post('/destroy/{template}',['uses'=> 'Backend\Admin\SettingController@destroy'])->name('destroy');
        
        // sms setting
        Route::get('/sms-template-index', ['uses' => 'Backend\Admin\SettingController@smsTemplateSetting'])->name('smsTemplateSetting');
        Route::get('/create-sms-email-template',['uses' => 'Backend\Admin\SettingController@createSMSTemplate'])->name('createSMSTemplate');
        Route::get('/edit-sms-email-template/{template}',['uses' => 'Backend\Admin\SettingController@editSmsTemplate'])->name('editSmsTemplate');
        Route::post('/store-sms-email-template',['uses' => 'Backend\Admin\SettingController@storeSmsTemplate'])->name('storeSmsTemplate');
        Route::post('/update-sms-email-template/{template}',['uses' => 'Backend\Admin\SettingController@updateSmsTemplate'])->name('updateSmsTemplate');        
        Route::post('/smsDestroy/{template}',['uses'=> 'Backend\Admin\SettingController@smsDestroy'])->name('smsDestroy');   
        
        // level setting
        Route::post('/create-level',['uses' => 'Backend\Admin\SettingController@createLevel'])->name('createLevel');       
        Route::get('/level-index',['uses' => 'Backend\Admin\SettingController@levelSetting'])->name('levelSetting');       
        Route::get('/edit-level/{level}',['uses' => 'Backend\Admin\SettingController@editLevelSetting'])->name('editLevelSetting');       
        Route::post('/update-level/{level}',['uses' => 'Backend\Admin\SettingController@updateLevel'])->name('updateLevel');
        
        // Assessment template
        Route::get('/assessment-templates', ['uses' => 'Backend\Admin\SettingController@assessmentTemplate'])->name('assessmentTemplate');
        Route::get('/add-assessment-templates', ['uses' => 'Backend\Admin\SettingController@addAssessmentTemplate'])->name('addAssessmentTemplate');
        Route::post('/store-assessment-templates', ['uses' => 'Backend\Admin\SettingController@storeAssessmentTemplate'])->name('storeAssessmentTemplate');
        Route::get('/assessment-edit/{id}', ['uses' => 'Backend\Admin\SettingController@editAssessmentTemplate'])->name('editAssessmentTemplate');
        Route::post('/update-assessment-template/{id}', ['uses' => 'Backend\Admin\SettingController@updateAssessmentTemplate'])->name('updateAssessmentTemplate');
        Route::post('/delete-assessment-template/{id}', ['uses' => 'Backend\Admin\SettingController@deleteAssessmentTemplate'])->name('deleteAssessmentTemplate');

    });

    // Manage Sales Center
    Route::group(['prefix' => '/sales-center', 'as' => 'salesCenter.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\SalesCenterController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\SalesCenterController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SalesCenterController@store'])->name('store');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\SalesCenterController@edit'])->name('edit');
        Route::post('/update', ['uses' => 'Backend\Admin\SalesCenterController@update'])->name('update');
    });

    /* Manage Storage */
    Route::group(['prefix' => '/storage', 'as' => 'storage.'], function() {
        
        Route::get('/index', ['uses' => 'Backend\Admin\StorageController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\StorageController@create'])->name('create');
        Route::get('/edit/{serviceInventory}', ['uses' => 'Backend\Admin\StorageController@edit'])->name('edit');
        Route::post('/store', ['uses' => 'Backend\Admin\StorageController@store'])->name('store');
        Route::post('/update/{item}', ['uses' => 'Backend\Admin\StorageController@update'])->name('update');
        Route::get('/barcode/{id}', ['uses' => 'Backend\Admin\StorageController@barcode'])->name('barcode');
        Route::get('/delete/{id}', ['uses' => 'Backend\Admin\StorageController@delete'])->name('delete');
        Route::post('/updateInventory/{item}', ['uses' => 'Backend\Admin\StorageController@updateInventory'])->name('updateInventory');        
        Route::get('service_id/{category}/get-subcat',['uses' =>'Backend\Admin\StorageController@getSubCategoryByCategory'])->name('getSubCategoryByCategory');
        Route::get('service_item_id/{category}/get-barcode',['uses' =>'Backend\Admin\StorageController@getBarcodeByCategory'])->name('getBarcodeByCategory');
    });

    /* Manage POS */
    Route::group(['prefix' => '/pos', 'as' => 'pos.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\PosController@index'])->name('index');
        Route::get('/add-to-cart/{item}', ['uses' => 'Backend\Admin\PosController@store'])->name('store');
        Route::get('/update-cart/{item}/{quantity}', ['uses' => 'Backend\Admin\PosController@update'])->name('update');
        Route::get('/delete-from-cart/{id}', ['uses' => 'Backend\Admin\PosController@delete'])->name('delete');
        Route::get('/all-sales', ['uses' => 'Backend\Admin\PosController@allSales'])->name('allSales');
        Route::get('/paid-price/{order}/{type?}', ['uses' => 'Backend\Admin\PosController@paidPrice'])->name('paidPrice');
        Route::post('/discount/{order}',['uses' => 'Backend\Admin\PosController@discount'])->name('discount');
        Route::get('/invoice/{order}', ['uses' => 'Backend\Admin\PosController@invoice'])->name('invoice');
        Route::post('/submit-order', ['uses' => 'Backend\Admin\PosController@submit'])->name('submit');
        Route::post('/new-customer', ['uses' => 'Backend\Admin\PosController@createCustomer'])->name('createCustomer');
        Route::post('/saveInventoryItem', ['uses' => 'Backend\Admin\PosController@saveInventoryItem'])->name('saveInventoryItem');
        
    });

    /* Manage Report */
    Route::group(['prefix' => '/report', 'as' => 'report.'], function() {
        Route::get('/online-sales', ['uses' => 'Backend\Admin\ReportController@onlineSales'])->name('onlineSales');
        Route::post('/online-sales/filter', ['uses' => 'Backend\Admin\ReportController@onlineSalesFilter'])->name('onlineSalesFilter');

        Route::get('/publication-sales', ['uses' => 'Backend\Admin\ReportController@publicationSales'])->name('publicationSales');
        Route::post('/publication-sales/filter', ['uses' => 'Backend\Admin\ReportController@publicationSalesFilter'])->name('publicationSalesFilter');

        Route::get('/complementary', ['uses' => 'Backend\Admin\ReportController@complementary'])->name('complementary');
        Route::post('/complementary/filter', ['uses' => 'Backend\Admin\ReportController@complementaryFilter'])->name('complementaryFilter');

        Route::get('/digital-data', ['uses' => 'Backend\Admin\ReportController@digitalData'])->name('digitalData');
        // Route::get('/digital-data-preview', ['uses' => 'Backend\Admin\ReportController@digitalDataPreview'])->name('digitalDataPreview');
        Route::post('/data-sales/reportByDate', ['uses' => 'Backend\Admin\ReportController@allDownloadFilter'])->name('allDownloadFilter');
        Route::get('/sold-copies', ['uses' => 'Backend\Admin\ReportController@SoldCopies'])->name('SoldCopies');
        Route::get('/sold-copy-preview', ['uses' => 'Backend\Admin\ReportController@soldCopyPreview'])->name('soldCopyPreview');
        Route::get('/complementary-copies', ['uses' => 'Backend\Admin\ReportController@ComplementaryCopies'])->name('ComplementaryCopies');
        Route::get('/complementary-copy-preview', ['uses' => 'Backend\Admin\ReportController@ComplementaryCopyPreview'])->name('ComplementaryCopyPreview');
    });

    /* Manage Trainer */
    Route::group(['prefix' => '/trainer', 'as' => 'trainer.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\TrainerController@index'])->name('index');
        Route::get('/add', ['uses' => 'Backend\Admin\TrainerController@addTrainer'])->name('add');
        Route::post('/store/{type}', ['uses' => 'Backend\Admin\TrainerController@store'])->name('store');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\TrainerController@edit'])->name('edit');
        Route::post('/update/{id}', ['uses' => 'Backend\Admin\TrainerController@update'])->name('update');
        Route::post('change-status/{id}', ['uses' => 'Backend\Admin\TrainerController@changeStatus'])->name('changeStatus');
    });

    /* Manage Fiscal Year */
    Route::group(['prefix' => '/fiscal', 'as' => 'fiscal.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\FiscalYearController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\FiscalYearController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\FiscalYearController@store'])->name('store');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\FiscalYearController@edit'])->name('edit');
        Route::patch('/update/{fiscal}', ['uses' => 'Backend\Admin\FiscalYearController@update'])->name('update');
    });

    /* Manage Courses */
    Route::group(['prefix' => '/course', 'as' => 'course.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\TrainingCourseController@index'])->name('index');
        Route::get('/edit/{course_id}/{type}', ['uses' => 'Backend\Admin\TrainingCourseController@edit'])->name('edit');
        Route::get('/create', ['uses' => 'Backend\Admin\TrainingCourseController@create'])->name('create');
        Route::post('/update', ['uses' => 'Backend\Admin\TrainingCourseController@update'])->name('update');
        Route::post('/store', ['uses' => 'Backend\Admin\TrainingCourseController@store'])->name('store');
        Route::get('/update/{course}/{type?}', ['uses' => 'Backend\Admin\TrainingCourseController@courseUpdate'])->name('courseUpdate');
        Route::post('/addCourseDuration',['uses' => 'Backend\Admin\TrainingCourseController@addCourseDuration'])->name('addCourseDurationToCourse');
        Route::post('/addCourseCurriculam/{course}', ['uses' => 'Backend\Admin\TrainingCourseController@addCourseCurriculam'])->name('addCourseCurriculam');
        
        // course duration edit
        Route::get('/edit-course-duration/{courseDuration}',['uses'=>'Backend\Admin\TrainingCourseController@editCourseDuration'])->name('editCourseDuration');
        Route::get('/add-schedule-and-curriculam',['uses'=>'Backend\Admin\TrainingCourseController@addScheduleAndCurriculam'])->name('addScheduleAndCurriculam');
        Route::get('/delete-course-duration/{courseDuration}',['uses'=>'Backend\Admin\TrainingCourseController@deleteCourseDuration'])->name('deleteCourseDuration');
        Route::post('/update-course-duration/{courseDuration}',['uses' => 'Backend\Admin\TrainingCourseController@updateCourseDuration'])->name('updateCourseDuration');

        // Course curriculam edit & delete
        Route::get('/edit-course-curriculam/{courseCurriculam}', ['uses' => 'Backend\Admin\TrainingCourseController@editCourseCurriculam'])->name('editCourseCurriculam');
        Route::post('/update-course-curriculam/{courseCurriculam}', ['uses' => 'Backend\Admin\TrainingCourseController@updateCourseCurriculam'])->name('updateCourseCurriculam');
        Route::get('/delete-course-curriculam/{courseCurriculam}', ['uses' => 'Backend\Admin\TrainingCourseController@deleteCourseCurriculam'])->name('deleteCourseCurriculam');

        // Submit course
        Route::get('/submit-course/{course}', ['uses' => 'Backend\Admin\TrainingCourseController@submitCourse'])->name('submitCourse');
        // Clear course
        Route::get('/clear-course/{course_id}', ['uses' => 'Backend\Admin\TrainingCourseController@clearCourse'])->name('clearCourse');

        // Show course details
        Route::get('/show/{id}/{type}', ['uses' => 'Backend\Admin\TrainingCourseController@show'])->name('show');

        Route::post('/forward/course/{type}', ['uses' => 'Backend\Admin\TrainingCourseController@allModifiedApproval'])->name('allModifiedApproval');
 

        Route::post('/send-for-approval', ['uses' => 'Backend\Admin\TrainingCourseController@sendForApproval'])->name('sendForApproval');
 
        // modify course list
        Route::get('/request-for-changes', ['uses'=>'Backend\Admin\TrainingCourseController@allModify'])->name('allModify');
 
        // create training course list
        Route::get('/create-trainee-list/{id}',['uses' => 'Backend\Admin\TrainingCourseController@createTraineeList'])->name('createTraineeList');
        // create training course list
        Route::get('/edit-trainee-list/{id}/{type2}',['uses' => 'Backend\Admin\TrainingCourseController@editTraineeList'])->name('editTraineeList');
        Route::post('/update-trainee-list/{type2}',['uses' => 'Backend\Admin\TrainingCourseController@updateTraineeList'])->name('updateTraineeList');

        Route::post('/store-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@storeTraineeList'])->name('storeTraineeList');


        // forward training course list
        Route::post('/forward-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@forwardTraineeList'])->name('forwardTraineeList');

        // create training course list
        Route::post('/claim-for-modify-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@claimTraineeListForChange'])->name('claimTraineeListForChange');

        // trainee list approved
        Route::post('/trainee-approved',['uses' => 'Backend\Admin\TrainingCourseController@trainneApproved'])->name('trainneApproved');

        // all course list
        Route::get('/all-training-list',['uses' => 'Backend\Admin\TrainingCourseController@allTrainingList'])->name('allTrainingList');
        // all trainee list
        Route::get('/all-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@allTraineeList'])->name('allTraineeList');
        // pending trainee list
        Route::get('/claim-modify-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@claimModifyTraineeList'])->name('claimModifyTraineeList');
        // pending trainee list
        Route::get('/approved-trainee-list',['uses' => 'Backend\Admin\TrainingCourseController@approvedTraineeList'])->name('approvedTraineeList');
        // pending trainee list
        Route::post('/store-trainee-comment',['uses' => 'Backend\Admin\TrainingCourseController@storeTraineeModifyComment'])->name('storeTraineeModifyComment');
        // pending trainee list
        Route::post('/trainee-modify',['uses' => 'Backend\Admin\TrainingCourseController@trainneModifyUpdate'])->name('trainneModifyUpdate');
        // pending trainee list
        Route::post('/trainee-approve-cco',['uses' => 'Backend\Admin\TrainingCourseController@trainneApproveForCco'])->name('trainneApproveForCco');
        // pending trainee list
        Route::post('/trainee-approved-for-waiting',['uses' => 'Backend\Admin\TrainingCourseController@trainneApprovedForWaiting'])->name('trainneApprovedForWaiting');
        // pending trainee list
        Route::post('/trainee-approved-final-list',['uses' => 'Backend\Admin\TrainingCourseController@traineeApprovedForFinalList'])->name('traineeApprovedForFinalList');
        // pending trainee list
        Route::get('/add-trainee-from-outside',['uses' => 'Backend\Admin\TrainingCourseController@addTraineeFromOuteSide'])->name('addTraineeFromOuteSide');
        // pending trainee list
        Route::get('/edit-final-training-list/{id}',['uses' => 'Backend\Admin\TrainingCourseController@editFinalTrainingList'])->name('editFinalTrainingList');
        // pending trainee list
        Route::get('/add-schedule-and-trainer/{id}',['uses' => 'Backend\Admin\TrainingCourseController@addScheduleAndTrainerToCourse'])->name('addScheduleAndTrainerToCourse');
        // pending trainee list
        Route::post('/update-schedule-info',['uses' => 'Backend\Admin\TrainingCourseController@updateScheduleInfo'])->name('updateScheduleInfo');
        // pending trainee list
        Route::get('/trainee-details/{id}',['uses' => 'Backend\Admin\TrainingCourseController@getWaitingTraineeList'])->name('getWaitingTraineeList');
        // pending trainee list
        Route::post('/course-send-to-approval',['uses' => 'Backend\Admin\TrainingCourseController@finalApprovalRequestToCD'])->name('finalApprovalRequestToCD');
        // pending trainee list
        Route::post('/publish-training-course',['uses' => 'Backend\Admin\TrainingCourseController@publishTrainingCourse'])->name('publishTrainingCourse');

        // Request Sent For Approval

    });

        //certificate generate
    Route::group(['prefix' => '/certificate', 'as' => 'certificate.'], function() {
        Route::get('/create-certificate',['uses' => 'Backend\Admin\CourseCertificateController@createCertificate'])->name('create_certificate');
        Route::post('/create-certificate-info',['uses' => 'Backend\Admin\CourseCertificateController@createCertificateInfo'])->name('info');
        Route::get('/view-certificate',['uses' => 'Backend\Admin\CourseCertificateController@viewCertificate'])->name('view_certificate');
        Route::get('/view-certificate-infos',['uses' => 'Backend\Admin\CourseCertificateController@viewCertificateInfos'])->name('view_certificate_info');
        //delete certificate template
        Route::get('/delete-certificate-info',['uses' => 'Backend\Admin\CourseCertificateController@deleteCertificateInfo'])->name('delete_certificate_info');
        //view certificate by trainee
        Route::get('/view-certificate-by-trainee',['uses' => 'Backend\Admin\CourseCertificateController@viewCertificateByTrainee'])->name('view_certificate_by_trainee');
        // Route::get('/view-certificate-by-trainee',['uses' => 'Backend\Admin\CourseCertificateController@viewsCertificateByTrainee'])->name('views_certificate_by_trainee');

        // template status active / inactive
        Route::get('/certificate-template-active',['uses' => 'Backend\Admin\CourseCertificateController@activeTemplate'])->name('status_active');
        Route::get('/certificate-template-inactive',['uses' => 'Backend\Admin\CourseCertificateController@inactiveTemplate'])->name('status_inactive');

    });



    /* Manage Calendar */
    Route::group(['prefix' => '/calendar', 'as' => 'calender.'], function() {
        Route::get('/course-calender', ['uses' => 'Backend\Admin\CalenderController@courseCalendar'])->name('courseCalendar');
        Route::get('/calender/{status?}', ['uses' => 'Backend\Admin\CalenderController@calender'])->name('calender');
        Route::post('/approve', ['uses' => 'Backend\Admin\CalenderController@approved'])->name('approved');
        Route::post('/claimForChange',['uses' => 'Backend\Admin\CalenderController@claimForChange'])->name('claimForChange');
        Route::post('/approval-form-modify',['uses' => 'Backend\Admin\CalenderController@requestApprovalFromModify'])->name('requestApprovalFromModify');
        Route::post('/send-calender-list',['uses' => 'Backend\Admin\CalenderController@sendCalenderList'])->name('sendCalenderList');
        Route::get('/dowload-calender',['uses' => 'Backend\Admin\CalenderController@dowloadCalendercy'])->name('dowloadCalendercy');
        
    });

    /* Manage Calendar */
    Route::group(['prefix' => '/trainee', 'as' => 'trainee.'], function() {
      
        Route::get('/course/{type}', ['uses' => 'Backend\Admin\TraineeController@courseList'])->name('courseList');
        Route::get('/course/details/{id}', ['uses' => 'Backend\Admin\TraineeController@traineeDetailsShow'])->name('traineeDetailsShow');
        Route::get('/download-evaluation-form/{course_id}/{type}', ['uses' => 'Backend\Admin\TraineeController@downloadEvaluationForm'])->name('downloadEvaluationForm');
        Route::post('/submit-evaluation-form', ['uses' => 'Backend\Admin\TraineeController@submitEvaluationFormTrainee'])->name('submitEvaluationFormTrainee');
        Route::get('/download-submited-form/{user_id}/{course_id}', ['uses' => 'Backend\Admin\TraineeController@downloadSubmitedEForm'])->name('downloadSubmitedEForm');

        // pending trainee list
        Route::post('/submit-trainee-attendance',['uses' => 'Backend\Admin\TraineeController@takeTraineeAttendance'])->name('takeTraineeAttendance');
        
        // pending trainee list
        Route::post('/upload-material/{type}',['uses' => 'Backend\Admin\TraineeController@uploadcourseMaterials'])->name('uploadcourseMaterials');
        
        
        // pending trainee list
        Route::get('/download-trainee-certificate',['uses' => 'Backend\Admin\CourseCertificateController@viewCertificateByTrainee'])->name('viewCertificateByTrainee');
        
        // pending trainee list
        Route::get('/publish-certificate/{course_id}',['uses' => 'Backend\Admin\TraineeController@publishCertificateForTrainee'])->name('publishCertificateForTrainee');
        
        // pending trainee list
        Route::get('/certificate', function(){
            return view('backend.admin.trainee.partials.certificate_pdf');
        });
        
        // pending trainee list
        Route::get('/view-trainee-list/{id}',['uses' => 'Backend\Admin\TraineeController@viewTraineeList'])->name('viewTraineeList');
        
        // pending trainee list
        Route::get('/download-metarials/{id}',['uses' => 'Backend\Admin\TraineeController@downloadCourseMaterials'])->name('downloadCourseMaterials');
        
        Route::post('/trainee-move-to-waiting-list',['uses' => 'Backend\Admin\TraineeController@trainneMoveToWaitingList'])->name('trainneMoveToWaitingList');

        
    });





    /* Agriculture (Daggucchho) Routes */

    /* Manage Upazila Routes */
    Route::group(['prefix' => '/upazila', 'as' => 'upazila.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\UpazilaController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\UpazilaController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\UpazilaController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\UpazilaController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\UpazilaController@edit'])->name('edit');
        Route::patch('/update/{upazila}', ['uses' => 'Backend\Admin\UpazilaController@update'])->name('update');
        Route::get('/delete/{upazila}', ['uses' => 'Backend\Admin\UpazilaController@statusChange'])->name('delete');
    });

    /* Manage Union Routes */
    Route::group(['prefix' => '/union', 'as' => 'union.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\UnionController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\UnionController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\UnionController@store'])->name('store');
        Route::get('/show/{union}', ['uses' => 'Backend\Admin\UnionController@show'])->name('show');
        Route::get('/edit/{union}', ['uses' => 'Backend\Admin\UnionController@edit'])->name('edit');
        Route::post('/update/{union}', ['uses' => 'Backend\Admin\UnionController@update'])->name('update');
        Route::get('/delete/{union}', ['uses' => 'Backend\Admin\UnionController@statusChange'])->name('delete');

    });

    /* Manage Mouza Routes */
    Route::group(['prefix' => '/mouza', 'as' => 'mouza.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\MouzaController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\MouzaController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\MouzaController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\MouzaController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\MouzaController@edit'])->name('edit');
        Route::patch('/update/{mouza}', ['uses' => 'Backend\Admin\MouzaController@update'])->name('update');
        Route::get('/delete/{mouza}', ['uses' => 'Backend\Admin\MouzaController@statusChange'])->name('delete');
    });

    /* Manage Village Routes */
    Route::group(['prefix' => '/village', 'as' => 'village.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\VillageController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\VillageController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\VillageController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\VillageController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\VillageController@edit'])->name('edit');
        Route::patch('/update/{village}', ['uses' => 'Backend\Admin\VillageController@update'])->name('update');
        Route::get('/delete/{village}', ['uses' => 'Backend\Admin\VillageController@statusChange'])->name('delete');
    });

    /* Manage EA Routes */
    Route::group(['prefix' => '/ea', 'as' => 'ea.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\EAController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\EAController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\EAController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\EAController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\EAController@edit'])->name('edit');
        Route::patch('/update/{ea}', ['uses' => 'Backend\Admin\EAController@update'])->name('update');
        Route::get('/delete/{ea}', ['uses' => 'Backend\Admin\EAController@statusChange'])->name('delete');
    });

    /* Manage House Hold Routes */
    Route::group(['prefix' => '/household', 'as' => 'household.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\HouseHoldController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\HouseHoldController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\HouseHoldController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\HouseHoldController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\HouseHoldController@edit'])->name('edit');
        Route::patch('/update/{household}', ['uses' => 'Backend\Admin\HouseHoldController@update'])->name('update');
        Route::get('/delete/{household}', ['uses' => 'Backend\Admin\HouseHoldController@statusChange'])->name('delete');
    });

    /* Manage Population Routes */
    Route::group(['prefix' => '/population', 'as' => 'population.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\PopulationController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\PopulationController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\PopulationController@store'])->name('store');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\PopulationController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\PopulationController@edit'])->name('edit');
        Route::patch('/update/{population}', ['uses' => 'Backend\Admin\PopulationController@update'])->name('update');
        Route::get('/delete/{population}', ['uses' => 'Backend\Admin\PopulationController@statusChange'])->name('delete');
    });

    /* Manage Cluster Routes */
    Route::group(['prefix' => '/cluster', 'as' => 'cluster.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\ClusterController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\ClusterController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ClusterController@store'])->name('store');
        // Route::get('/show/{id}', ['uses' => 'Backend\Admin\ClusterController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ClusterController@edit'])->name('edit');
        Route::patch('/update/{cluster}', ['uses' => 'Backend\Admin\ClusterController@update'])->name('update');
        Route::get('/change-status/{cluster}', ['uses' => 'Backend\Admin\ClusterController@changeStatus'])->name('changeStatus');
    });

    Route::group(['prefix' => '/crop-category', 'as' => 'cropCategory.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\CropCategoryController@index'])->name('index');
        Route::get('/create', ['uses' => 'Backend\Admin\CropCategoryController@create'])->name('create');
        Route::get('/delete/{category}', ['uses' => 'Backend\Admin\CropCategoryController@delete'])->name('delete');
        Route::get('/edit/{category}', ['uses' => 'Backend\Admin\CropCategoryController@edit'])->name('edit');
        Route::post('/update/{category}', ['uses' => 'Backend\Admin\CropCategoryController@update'])->name('update');

    });

    Route::group(['prefix' => '/crop', 'as' => 'crop.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\CropController@index'])->name('index');        
        Route::get('/create', ['uses' => 'Backend\Admin\CropController@create'])->name('create');
        Route::get('/delete/{crop}', ['uses' => 'Backend\Admin\CropController@delete'])->name('delete');
        Route::get('/edit/{crop}', ['uses' => 'Backend\Admin\CropController@edit'])->name('edit');
        Route::post('/update/{crop}', ['uses' => 'Backend\Admin\CropController@update'])->name('update');

    });

    Route::group(['prefix' => '/survey', 'as' => 'survey.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\SuveryController@index'])->name('index');        
        Route::get('/create', ['uses' => 'Backend\Admin\SuveryController@create'])->name('create');

        Route::get('/delete/{suvery}', ['uses' => 'Backend\Admin\SuveryController@delete'])->name('delete');
        Route::get('/edit/{suvery}', ['uses' => 'Backend\Admin\SuveryController@edit'])->name('edit');
        Route::post('/update/{suvery}', ['uses' => 'Backend\Admin\SuveryController@update'])->name('update');

    });


    Route::group(['prefix' => '/survey-notification', 'as' => 'surveyNotification.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\SuveryNotificationController@index'])->name('index');        
        Route::get('/create', ['uses' => 'Backend\Admin\SuveryNotificationController@create'])->name('create');
        Route::get('/show/{surveyNotification}', ['uses' => 'Backend\Admin\SuveryNotificationController@show'])->name('show');

        Route::get('/delete/{surveyNotification}', ['uses' => 'Backend\Admin\SuveryNotificationController@delete'])->name('delete');
        Route::get('/edit/{surveyNotification}', ['uses' => 'Backend\Admin\SuveryNotificationController@edit'])->name('edit');
        Route::post('/update/{surveyNotification}', ['uses' => 'Backend\Admin\SuveryNotificationController@update'])->name('update');

    });

    // Agriculture Survey Notification
    Route::group(['prefix' => '/agruculture-survey-notifications', 'as' => 'agriSurveyNoti.'], function() {
        Route::get('index', ['uses' => 'Backend\Admin\AgricultureSurveyNotificationController@index'])->name('index');
        Route::post('date-filter', ['uses' => 'Backend\Admin\AgricultureSurveyNotificationController@dateFilter'])->name('dateFilter');
    });

    Route::group(['prefix' => '/survey-list', 'as' => 'surveyList.'], function() {
        Route::get('index', ['uses' => 'Backend\Admin\AgricultureSurveyListController@index'])->name('index');
    });

    Route::group(['prefix' => '/agriculture-form', 'as' => 'form.'], function() {
        //can use as survey form
        Route::get('/shankalanForm/{id}/{notification?}', ['uses' => 'Backend\Admin\FormController@shankalanForm'])->name('shankalanForm');
        Route::post('/store', ['uses' => 'Backend\Admin\FormController@store'])->name('store');
        Route::get('/EditForm/{id}', ['uses' => 'Backend\Admin\FormController@edit'])->name('edit');
        Route::post('update/{surveyProcessList}',['uses' => 'Backend\Admin\FormController@update'])->name('update');
    });

    // Shangkalan Form 1 Routes
    Route::group(['prefix' => 'farmers-form', 'as' => 'farmersForm.'], function() {
        Route::get('/index', ['uses' => 'Backend\Admin\FarmersFormController@index'])->name('index');
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\FarmersFormController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\FarmersFormController@store'])->name('store');
        Route::post('/submitForForward', ['uses' => 'Backend\Admin\FarmersFormController@submitForForward'])->name('submitForForward');
        Route::get('/details/{id}', ['uses' => 'Backend\Admin\FarmersFormController@detail'])->name('detail');

        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\FarmersFormController@edit'])->name('edit');
        Route::post('/update/{list}', ['uses' => 'Backend\Admin\FarmersFormController@update'])->name('update');
    });

    Route::group(['prefix' => 'processing-list', 'as' => 'processingList.'], function() {
        Route::get('/index/{formId?}', ['uses' => 'Backend\Admin\ProcessingListController@index'])->name('index');
        Route::get('/show/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('show');
        Route::get('/show-upazila/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showUpazila'])->name('showUpazila');
        Route::get('/show-district/{list}/{form?}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrict'])->name('showDistrict');
        Route::get('/show-district-cluster/{list}/{form?}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrictCluster'])->name('showDistrictCluster');
        
        Route::get('/show-all-district/{list}/{form?}', ['uses' => 'Backend\Admin\ProcessingListController@showAllDistrict'])->name('showAllDistrict');
        Route::get('/show-all-cluster/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showCluster'])->name('showCluster');
        
        
        Route::get('/show-all-list-of-farmers/{list}', ['uses' => 'Backend\Admin\ProcessingListController@allListOfFarmers'])->name('allListOfFarmers');
        Route::get('/show-all-list-of-cluster/{list}', ['uses' => 'Backend\Admin\ProcessingListController@allListOfClusters'])->name('allListOfClusters');
        
        Route::get('/forward-to-district/{list}', ['uses' => 'Backend\Admin\ProcessingListController@forwardToDistrict'])->name('forwardToDistrict');
        Route::get('/forward-to-division/{list}', ['uses' => 'Backend\Admin\ProcessingListController@forwardToDivision'])->name('forwardToDivision');
        Route::get('/forward-to-dg/{list}', ['uses' => 'Backend\Admin\ProcessingListController@forwardToDg'])->name('forwardToDg');
        Route::get('/forward-to-approved/{list}', ['uses' => 'Backend\Admin\ProcessingListController@forwardToApprove'])->name('forwardToApprove');
        Route::get('/backward-to-division/{list}', ['uses' => 'Backend\Admin\ProcessingListController@backwardToDivision'])->name('backwardToDivision');
        Route::get('/backward-to-district/{list}', ['uses' => 'Backend\Admin\ProcessingListController@backwardToDistrict'])->name('backwardToDistrict');
        Route::get('/backward-to-upazila/{list}', ['uses' => 'Backend\Admin\ProcessingListController@backwardToUpazila'])->name('backwardToUpazila');
        Route::get('/backward-to-union/{list}', ['uses' => 'Backend\Admin\ProcessingListController@backwardToUnion'])->name('backwardToUnion');

        Route::get('/showUpazilaTofsil3/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil3');
        Route::get('/showUpazilaTofsil4/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil4');
        Route::get('/showUpazilaTofsil6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil6');
        Route::get('/showUpazilaTofsil5/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil5');

        Route::get('/showUpazilaTofsil7/{data}', ['uses' => 'Backend\Admin\ProcessingListController@showUpazilaTofsil7'])->name('showUpazilaTofsil7');
        Route::get('/showDistrictShankalan7/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrictShankalan7'])->name('showDistrictShankalan7');

        Route::get('/showUpazilaTofsil8/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil8');
        
        Route::get('/showUpazilaTofsil11/{list}', ['uses' => 'Backend\Admin\ProcessingListController@show'])->name('showUpazilaTofsil11');
        Route::get('/showDistrictTofsil10/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrictTofsil10'])->name('showDistrictTofsil10');
        Route::get('/showDivisionShankalan7/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDivisionShankalan7'])->name('showDivisionShankalan7');

        //Tofsil 9 report
        Route::get('/showDistrictTofsil9List/{data}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrictTofsil9List'])->name('showDistrictTofsil9List');
        Route::get('/showUpazilaTofsil9List/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showUpazilaTofsil9List'])->name('showUpazilaTofsil9List');
        Route::get('/showUpazilaTofsil9/{data}', ['uses' => 'Backend\Admin\ProcessingListController@showUpazilaTofsil9'])->name('showUpazilaTofsil9');

        // Show district tofsil 11
        Route::get('/showDistrictTofsil11/{list}', ['uses' => 'Backend\Admin\ProcessingListController@districtTofsil11'])->name('showDistrictTofsil11');
        // Show division tofsil 11
        Route::get('/showDivisionTofsil11/{list}', ['uses' => 'Backend\Admin\ProcessingListController@divisionTofsil11'])->name('showDivisionTofsil11');
        
        Route::get('/showDivisionTofsil9/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDivisionTofsil9'])->name('showDivisionTofsil9');
        Route::get('/showDgTofsil9/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDgTofsil9'])->name('showDgTofsil9');

        // Show DG tofsil 11
        Route::get('/showDgTofsil11/{list}', ['uses' => 'Backend\Admin\ProcessingListController@DgTofsil11'])->name('showDgTofsil11');
        Route::get('/showDgShankalan7/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDgShankalan7'])->name('showDgShankalan7');

        // Tofsil-3 comment routes
        Route::post('/commentUpazilaTofsil3/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentUpazilaTofsil3'])->name('commentUpazilaTofsil3');
        Route::post('/commentDistrictTofsil3/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDistrictTofsil3'])->name('commentDistrictTofsil3');
        Route::post('/commentDivisionTofsil3/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDivisionTofsil3'])->name('commentDivisionTofsil3');

        // Tofsil-4 comment routes
        Route::post('/commentUpazilaTofsil4/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentUpazilaTofsil4'])->name('commentUpazilaTofsil4');
        Route::post('/commentDistrictTofsil4/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDistrictTofsil4'])->name('commentDistrictTofsil4');
        Route::post('/commentDivisionTofsil4/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDivisionTofsil4'])->name('commentDivisionTofsil4');

        // Tofsil-6 comment routes
        Route::post('/commentUpazilaTofsil6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentUpazilaTofsil6'])->name('commentUpazilaTofsil6');
        Route::post('/commentDistrictTofsil6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDistrictTofsil6'])->name('commentDistrictTofsil6');
        Route::post('/commentDivisionTofsil6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@commentDivisionTofsil6'])->name('commentDivisionTofsil6');

        // farmers form report at district level
        Route::get('/farmer-report-district-data/{list}/{district_id}', ['uses' =>'Backend\Admin\ProcessingListController@farmerReportDistrict'])->name('farmerReportDistrict');
        // agriculture farmer form repot at thana level
        Route::get('/agriculture-farmer-report-district-data/{list}/{district_id}', ['uses' =>'Backend\Admin\ProcessingListController@agriclutureFarmerReportDistrict'])->name('agriclutureFarmerReportDistrict');

        Route::get('/wages-report-district-datas/{list}/{district_id}', ['uses' =>'Backend\Admin\ProcessingListController@districtReportShankalan8'])->name('districtReportShankalan8');

        Route::get('/wages-report-division-data/{list}/{division_id}', ['uses' =>'Backend\Admin\ProcessingListController@divisionReportShankalan8'])->name('divisionReportShankalan8');

        // all banglades
        Route::get('/wages-report-all-data/{list}', ['uses' =>'Backend\Admin\ProcessingListController@allWagesData'])->name('allWagesData');
        
        Route::get('/wages-report-district-data/{list}/{district_id}', ['uses' =>'Backend\Admin\ProcessingListController@divisionWages'])->name('divisionWages');
        
        Route::get('/farmer-report-district/{list}/{district_id}', ['uses' => 'Backend\Admin\ProcessingListController@farmerReportDivision'])->name('farmerReportDivision');


        Route::get('/farmer-report-division/{list}/{division_id}', ['uses' => 'Backend\Admin\ProcessingListController@farmerReportOk'])->name('farmerReportOk');
        
        Route::get('/upazil-report-temporary-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@upazilaTemporaryData'])->name('upazilaTemporaryData');
        Route::get('/zila-report-temporary-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@zilaTemporaryData'])->name('zilaTemporaryData');
        Route::get('/division-report-temporary-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@divisionTemporaryData'])->name('divisionTemporaryData');
        
        Route::get('/upazil-report-perennial-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@upazilaPerennialData'])->name('upazilaPerennialData');
        Route::get('/zila-report-perennial-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@zilaPerennialCropData'])->name('zilaPerennialCropData');
        Route::get('/division-report-permanent-crop/{list}', ['uses' => 'Backend\Admin\ProcessingListController@divisionPermanentData'])->name('divisionPermanentData');

        Route::get('/showDistrictShonkolon6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDistrictShonkolon6'])->name('showDistrictShonkolon6');
        Route::get('/showDivisionShonkolon6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDivisionShonkolon6'])->name('showDivisionShonkolon6');
        Route::get('/showDGShonkolon6/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showDGShonkolon6'])->name('showDGShonkolon6');
        
        Route::get('/upazila-cluster/{list}',['uses'=> 'Backend\Admin\ProcessingListController@upazilaClusterData'])->name('upazilaClusterData');
        Route::get('/district-cluster/{list}',['uses'=> 'Backend\Admin\ProcessingListController@districtClusterData'])->name('districtClusterData');
        Route::get('/division-cluster/{list}',['uses'=> 'Backend\Admin\ProcessingListController@divisionClusterData'])->name('divisionClusterData');

        Route::get('crop-cutting-details/{list}',['uses'=> 'Backend\Admin\ProcessingListController@upazilaCropCuttingDetails'])->name('upazilaCropCuttingDetails');

        Route::get('upazila-monthly-wage-details/{list}',['uses'=> 'Backend\Admin\ProcessingListController@upazilaMonthlyWageDetails'])->name('upazilaMonthlyWageDetails');

        Route::get('crop-cutting-details-upazila/{list}',['uses'=> 'Backend\Admin\ProcessingListController@upazilaCropCropCuttingData'])->name('upazilaCropCropCuttingData');

        Route::get('crop-cutting-details-division/{list}',['uses'=> 'Backend\Admin\ProcessingListController@divisionCropCuttingData'])->name('divisionCropCuttingData');
        Route::get('report-data/',['uses'=> 'Backend\Admin\ProcessingListController@reportData'])->name('reportData');
        Route::get('tofsil4-report-data/',['uses'=> 'Backend\Admin\ProcessingListController@reportData4'])->name('reportData4');
        Route::get('tofsil2-report-data/{type?}',['uses'=> 'Backend\Admin\ProcessingListController@tofsilReportData2'])->name('tofsilReportData2');
        
        // temporary routes for survey data reports
        Route::get('/tofsil-1-report', ['uses' => 'Backend\Admin\ProcessingListController@tofsil1report']);
        Route::get('/tofsil-3-report', ['uses' => 'Backend\Admin\ProcessingListController@tofsil3report']);
        Route::get('/tofsil-4-report', ['uses' => 'Backend\Admin\ProcessingListController@tofsil4report']);
        Route::get('/tofsil-5', ['uses' => 'Backend\Admin\ProcessingListController@tofsil5']);
        Route::get('/tofsil-7', ['uses' => 'Backend\Admin\ProcessingListController@tofsil7']);
        Route::get('/tofsil-8', ['uses' => 'Backend\Admin\ProcessingListController@tofsil8']);
        Route::get('/tofsil-9', ['uses' => 'Backend\Admin\ProcessingListController@tofsil9']);
        Route::get('/tofsil-10', ['uses' => 'Backend\Admin\ProcessingListController@tofsil10']);
        Route::get('/tofsil-11', ['uses' => 'Backend\Admin\ProcessingListController@tofsil11']);
        Route::get('/tofsil-4-report-sonkolon', ['uses' => 'Backend\Admin\ProcessingListController@tofsil4reportSonkolon']);
        Route::get('/doc-3', ['uses' => 'Backend\Admin\ProcessingListController@doc3']);
        Route::get('/doc-4', ['uses' => 'Backend\Admin\ProcessingListController@doc4']);
        Route::get('/tofsil-6', ['uses' => 'Backend\Admin\ProcessingListController@tofsil6']);
        Route::get('/shonkolon-6', ['uses' => 'Backend\Admin\ProcessingListController@shonkolon6']);
        Route::get('/shonkolon-7', ['uses' => 'Backend\Admin\ProcessingListController@shonkolon7']);
        Route::get('/shonkolon-8', ['uses' => 'Backend\Admin\ProcessingListController@shonkolon8']);
        Route::get('/wheat-crop', ['uses' => 'Backend\Admin\ProcessingListController@wheatCrop']);
        Route::get('/damage-report', ['uses' => 'Backend\Admin\ProcessingListController@damageReport']);

        //edit tofsil2
        Route::get('/edit-tofsil-dae-officer/{list}', ['uses' => 'Backend\Admin\ProcessingListController@daeOfficerTofsil2'])->name('daeOfficerTofsil2');

        Route::get('/show-list-of-farmer/{list}', ['uses' => 'Backend\Admin\ProcessingListController@showListOfFarmer'])->name('showListOfFarmer');

    });
    
    // Tofsil Form-1
    Route::group(['prefix' => 'survey-form-cluster', 'as' => 'clusterForm.'], function() {
        Route::get('/cluster-form/{surveyProListId?}', ['uses' => 'Backend\Admin\ClusterFormController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\ClusterFormController@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\ClusterFormController@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\ClusterFormController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\ClusterFormController@edit'])->name('edit');
        Route::post('/update/{cluster}', ['uses' => 'Backend\Admin\ClusterFormController@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\ClusterFormController@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-2
    Route::group(['prefix' => 'cropCuttingProduction', 'as' => 'cropCuttingProductionForm.'], function() {
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@edit'])->name('edit');
        Route::post('/update/{cropCuttingProductionForm}', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@update'])->name('update');
        Route::post('/storeData/{data}', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@storeData'])->name('storeData');
        Route::post('/submitForForward', ['uses' => 'Backend\Admin\CropCuttingProductionFormController@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-3
    Route::group(['prefix' => 'temporaryCrop', 'as' => 'temporaryCropForm.'], function() {
        Route::get('/temporaryCropForm/{surveyProListId?}', ['uses' => 'Backend\Admin\TemporaryCropFormController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\TemporaryCropFormController@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\TemporaryCropFormController@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\TemporaryCropFormController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\TemporaryCropFormController@edit'])->name('edit');
        Route::post('/update/{temporaryCrop}', ['uses' => 'Backend\Admin\TemporaryCropFormController@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\TemporaryCropFormController@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-4
    Route::group(['prefix' => 'perennialCropForm', 'as' => 'perennialCropForm.'], function() {
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\PerennialCropFormController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\PerennialCropFormController@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\PerennialCropFormController@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\PerennialCropFormController@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\PerennialCropFormController@edit'])->name('edit');
        Route::post('/update/{perennialCrop}', ['uses' => 'Backend\Admin\PerennialCropFormController@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\PerennialCropFormController@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-5
    Route::group(['prefix' => 'potatoCropCuttingProduction', 'as' => 'potatoCropCutting.'], function() {
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@show'])->name('show');
        Route::get('/edit/{potatoData}', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@edit'])->name('edit');
        Route::post('/update/{potatoCropCuttingForm}', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm5Controller@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-6
    Route::group(['prefix' => 'maizeCrop', 'as' => 'surveyTofsilForm3Maize.'], function() {
        Route::get('/form/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@index'])->name('index');
        Route::get('/show/{surveyTofsilForm3MaizeData}', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@show'])->name('show');
        Route::get('/edit/{surveyTofsilForm3MaizeData}', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@edit'])->name('edit');
        Route::post('/update/{surveyTofsilForm3Maize}', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm3MaizeController@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-7
    Route::group(['prefix' => 'surveyTofsilForm7', 'as' => 'surveyTofsilForm7.'], function() {
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@show'])->name('show');
        Route::get('/edit/{surveyTofsilForm7Data}', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@edit'])->name('edit');
        Route::post('/update/{surveyTofsilForm7}', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm7Controller@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-8
    Route::group(['prefix' => 'surveyTofsilForm8', 'as' => 'surveyTofsilForm8.'], function() {
        Route::get('/form/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@show'])->name('show');
        Route::get('/edit/{id}', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@edit'])->name('edit');
        Route::post('/update/{tofsil8}', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@update'])->name('update');
        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm8Controller@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-9
    Route::group(['prefix' => 'surveyTofsilForm9', 'as' => 'surveyTofsilForm9.'], function() {
        Route::get('/create/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@index'])->name('index');
        Route::get('/show/{id}', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@show'])->name('show');
        Route::get('/edit/{surveyTofsilForm9Data}', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@edit'])->name('edit');
        Route::post('/update/{surveyTofsilForm9Data}', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@update'])->name('update');

        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm9Controller@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-10
    Route::group(['prefix' => 'surveyTofsilForm10', 'as' => 'surveyTofsilForm10.'], function() {
        Route::get('/form/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@index'])->name('index');
        Route::get('/show/{surveyTofsilForm10Data}', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@show'])->name('show');
        Route::get('/edit/{surveyTofsilForm10Data}', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@edit'])->name('edit');
        Route::post('/update/{surveyTofsilForm10}', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@update'])->name('update');
        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm10Controller@submitForForward'])->name('submitForForward');
    });

    // Tofsil Form-11
    Route::group(['prefix' => 'surveyTofsilForm11', 'as' => 'surveyTofsilForm11.'], function() {
        Route::get('/form/{surveyProListId?}', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@create'])->name('create');
        Route::post('/store', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@store'])->name('store');
        Route::get('/index', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@index'])->name('index');
        Route::get('/show/{surveyTofsilForm11}', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@show'])->name('show');
        Route::get('/edit/{surveyTofsilForm11}', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@edit'])->name('edit');
        Route::post('/update/{surveyTofsilForm11}', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@update'])->name('update');
        Route::post('/submitForForward', ['uses' => 'Backend\Admin\SurveyTofsilForm11Controller@submitForForward'])->name('submitForForward');
    });
});

/*
|--------------------------------------------------------------------------
| Backend Ajax Routes
|--------------------------------------------------------------------------
*/
// get crop code ajax
Route::post('/getCropCode', ['uses' => 'Backend\DynamicDependentController@getCropCode'])->name('getCropCode');
Route::get('use-land-type/{useLandType}/get-crop', ['uses' => 'Backend\DynamicDependentController@getCrops'])->name('getCrops');

Route::post('/upazilacode', ['uses' => 'Backend\DynamicDependentController@getupazilacode'])->name('upazilacode');
Route::post('/divisioncode', ['uses' => 'Backend\DynamicDependentController@getdivisioncode'])->name('divisioncode');
Route::post('/districtcode', ['uses' => 'Backend\DynamicDependentController@getdistrictcode'])->name('districtcode');
Route::post('/unioncode', ['uses' => 'Backend\DynamicDependentController@getunioncode'])->name('unioncode');

Route::post('/districts', ['uses' => 'Backend\DynamicDependentController@getDistrictsByDivision'])->name('districts');
// survey notification get districts
Route::post('/surveyNotificationGetDistricts', ['uses' => 'Backend\DynamicDependentController@surveyNotificationGetDistricts'])->name('surveyNotificationGetDistricts');

Route::post('/upazilas', ['uses' => 'Backend\DynamicDependentController@getUpazilasByDistrict'])->name('upazilas');
// survey notification get upazilas
Route::post('/surveyNotificationGetUpazilas', ['uses' => 'Backend\DynamicDependentController@surveyNotificationGetUpazilas'])->name('surveyNotificationGetUpazilas');

Route::post('/crops', ['uses' => 'Backend\DynamicDependentController@getCropsByForm'])->name('crops');
Route::post('/unions', ['uses' => 'Backend\DynamicDependentController@getUnionsByUpazila'])->name('unions');
Route::post('/mouzas', ['uses' => 'Backend\DynamicDependentController@getMouzasByUnion'])->name('mouzas');
Route::post('/villages', ['uses' => 'Backend\DynamicDependentController@geVillagesByMouza'])->name('villages');
Route::post('/eas', ['uses' => 'Backend\DynamicDependentController@getEAsByVillage'])->name('eas');
Route::post('/households', ['uses' => 'Backend\DynamicDependentController@getHouseholdsByEA'])->name('households');
Route::post('/populations', ['uses' => 'Backend\DynamicDependentController@getPopulationsByHousehold'])->name('populations');

Route::post('/offices', ['uses' => 'Backend\DynamicDependentController@getOfficesByUpazila'])->name('offices');

Route::post('/departments', ['uses' => 'Backend\DynamicDependentController@getDepartmentsByLevel'])->name('departments');

Route::post('/designations', ['uses' => 'Backend\DynamicDependentController@getDesignationsByOffice'])->name('designations');

Route::post('/reqServiceItems', ['uses' => 'Backend\DynamicDependentController@reqServiceItems'])->name('reqServiceItems');
Route::post('/reqServiceInventoryItems', ['uses' => 'Backend\DynamicDependentController@reqServiceInventoryItems'])->name('reqServiceInventoryItems');
Route::post('/reqComplementaryQuantity', ['uses' => 'Backend\DynamicDependentController@reqComplementaryQuantity'])->name('reqComplementaryQuantity');

Route::post('/serviceItems', ['uses' => 'Backend\DynamicDependentController@getItemsByService'])->name('serviceItems');
Route::post('/serviceItemsGet', ['uses' => 'Backend\DynamicDependentController@getItemsDatatype'])->name('serviceItemsGet');
Route::post('/serviceInventoryItems', ['uses' => 'Backend\DynamicDependentController@getItemsByServiceItem'])->name('serviceInventoryItems');
Route::post('/serviceItemReceiving', ['uses' => 'Backend\DynamicDependentController@getReceivingModeByItem'])->name('serviceItemReceiving');
Route::post('/serviceItemsvalue', ['uses' => 'Backend\DynamicDependentController@getItemsByServiceValue'])->name('serviceItemsvalue');
Route::post('/serviceInventoryItemsvalue', ['uses' => 'Backend\DynamicDependentController@getInventoryItemsByServiceValue'])->name('serviceInventoryItemsvalue');
Route::post('/itemValueRemoved', ['uses' => 'Backend\DynamicDependentController@itemValueRemoved'])->name('itemValueRemoved');
Route::post('/serviceValueRemoved', ['uses' => 'Backend\DynamicDependentController@serviceValueRemoved'])->name('serviceValueRemoved');
Route::post('/serviceItemPrice', ['uses' => 'Backend\DynamicDependentController@getItemPriceByService'])->name('serviceItemPrice');
Route::post('/serviceAdditionalItems', ['uses' => 'Backend\DynamicDependentController@getAdditionalItemsByService'])->name('serviceAdditionalItems');
Route::post('/servicePublicationAdditionalItems', ['uses' => 'Backend\DynamicDependentController@getPublicationAdditionalItemsByService'])->name('servicePublicationAdditionalItems');
Route::post('/service_additionals', ['uses' => 'Backend\DynamicDependentController@getAdditionalsByService'])->name('service_additionals');
Route::post('/serviceAdditionalItemPrice', ['uses' => 'Backend\DynamicDependentController@getAdditionalItemPriceByService'])->name('serviceAdditionalItemPrice');

Route::post('/serviceItemsRemove', ['uses' => 'Backend\DynamicDependentController@getItemsByServiceRemove'])->name('serviceItemsRemove');

Route::post('/cropTypes', ['uses' => 'Backend\DynamicDependentController@getcropTypesByCrop'])->name('cropTypes');

Route::post('/dataSubcategorys', ['uses' => 'Backend\DynamicDependentController@getSubCategoryByCategory'])->name('dataSubcategorys');

Route::post('/crops_by_category', ['uses' => 'Backend\DynamicDependentController@crops_by_category'])->name('crops_by_category');

// Notifications
Route::post('/markAsRead', ['uses' => 'Backend\NotificationController@markAsRead'])->name('markAsRead');
Route::get('/gotoNotification/{notiID}', ['uses' => 'Backend\NotificationController@gotoNotification'])->name('gotoNotification');
Route::get('/gotoAgriNotification/{notiId}', ['uses' => 'Backend\NotificationController@gotoAgriNotification'])->name('gotoAgriNotification');

Auth::routes(['register' => false]);


