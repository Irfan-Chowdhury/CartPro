<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Country;
use App\Models\CurrencyRate;
use App\Models\SettingBankTransfer;
use App\Models\SettingCashOnDelivery;
use App\Models\SettingCheckMoneyOrder;
use App\Models\SettingCurrency;
use App\Models\SettingCustomCssJss;
use App\Models\SettingFacebook;
use App\Models\SettingFlatRate;
use App\Models\SettingFreeShipping;
use App\Models\SettingGeneral;
use App\Models\SettingGoogle;
use App\Models\SettingLocalPickup;
use App\Models\SettingMail;
use App\Models\SettingNewsletter;
use App\Models\SettingPaypal;
use App\Models\SettingPaytm;
use App\Models\SettingSms;
use App\Models\SettingStore;
use App\Models\SettingStrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Empty_;
use App\Traits\ENVFilePutContent;

class SettingController extends Controller
{
    use ENVFilePutContent;
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {
        $zones_array = array();
		$timestamp   = time();

        foreach (timezone_identifiers_list() as $key => $zone){
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }

        $countries = Country::all();

        $setting_general = SettingGeneral::latest()->first();
        if (!empty($setting_general)) {
            $selected_countries = array();
            $selected_countries = explode(",",$setting_general->supported_countries);
        }else{
            $setting_general = [];
            $selected_countries = [];
        }


        $setting_store = SettingStore::latest()->first();
        if (empty($setting_store)) {
            $setting_store = [];
        }

        //Currency
        $currencies = Currency::all();

        $setting_currency = SettingCurrency::latest()->first();

        if (!empty($setting_currency)) {
            $selected_currencies = array();
            $selected_currencies= explode(",",$setting_currency->supported_currency);
        }else{
            $setting_currency = [];
            $selected_currencies= [];
        }

        $setting_sms = SettingSms::latest()->first();
        if (empty($setting_sms)) {
            $setting_sms = [];
        }

        $setting_mail = SettingMail::latest()->first();
        if (empty($setting_mail)) {
            $setting_mail = [];
        }

        $setting_newsletter = SettingNewsletter::latest()->first();
        if (empty($setting_newsletter)) {
            $setting_newsletter = [];
        }

        $setting_custom_css_js = SettingCustomCssJss::latest()->first();
        if (empty($setting_custom_css_js)) {
            $setting_custom_css_js = [];
        }

        $setting_facebook = SettingFacebook::latest()->first();
        if (empty($setting_facebook)) {
            $setting_facebook = [];
        }

        $setting_google = SettingGoogle::latest()->first();
        if (empty($setting_google)) {
            $setting_google = [];
        }

        $setting_free_shipping = SettingFreeShipping::latest()->first();
        $setting_local_pickup  = SettingLocalPickup::latest()->first();
        $setting_flat_rate  = SettingFlatRate::latest()->first();
        $setting_paypal  = SettingPaypal::latest()->first();
        $setting_strip  = SettingStrip::latest()->first();
        $setting_paytm  = SettingPaytm::latest()->first();
        $setting_cash_on_delivery  = SettingCashOnDelivery::latest()->first();
        $setting_bank_transfer  = SettingBankTransfer::latest()->first();
        $setting_check_money_order  = SettingCheckMoneyOrder::latest()->first();


        // return 'ok';


        return view('admin.pages.setting.index',compact('countries','currencies','zones_array','setting_general','selected_countries','setting_store','selected_currencies',
                    'setting_currency','setting_sms','setting_mail','setting_newsletter','setting_custom_css_js','setting_facebook','setting_google',
                    'setting_free_shipping','setting_local_pickup','setting_flat_rate','setting_paypal','setting_strip','setting_paytm',
                    'setting_cash_on_delivery','setting_bank_transfer','setting_check_money_order'));
    }

    public function generalStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('supported_countries','default_country','default_timezone','customer_role'),[
            'supported_countries' => 'required',
            'default_country'     => 'required',
            'default_timezone'    => 'required',
            'customer_role'       => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        $data = [];
        $data['supported_countries'] = implode(",", $request->supported_countries);
        $data['default_country']     = $request->default_country;
        $data['default_timezone']    = $request->default_timezone;
        $data['customer_role']       = $request->customer_role;
        $data['number_format_type']  = $request->number_format_type;
        $data['reviews_and_ratings'] = $request->reviews_and_ratings;
        $data['auto_approve_reviews']= $request->auto_approve_reviews;
        $data['cookie_bar']          = $request->cookie_bar;

        $setting_general = SettingGeneral::latest()->first();

        if (empty($setting_general)) {
            SettingGeneral::create($data);
        }else {
            SettingGeneral::whereId($setting_general->id)->update($data);
        }

        $path = '.env';
        $searchArray = array('FORMAT_NUMBER=' . env('FORMAT_NUMBER'));
		$replaceArray= array('FORMAT_NUMBER=' . $request->number_format_type);
		file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));

        return response()->json(['success' => __('Data Added successfully.')]);
    }

    public function storeStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('store_name','store_email','store_phone'),[
            'store_name' => 'required',
            'store_email'=> 'required',
            'store_phone'=> 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $data = [];
        $data['store_name']    = $request->store_name;
        $data['store_tagline'] = $request->store_tagline;
        $data['store_email'] = $request->store_email;
        $data['store_phone']   = $request->store_phone;
        $data['store_address_1'] = $request->store_address_1;
        $data['store_address_2'] = $request->store_address_2;
        $data['store_city']    = $request->store_city;
        $data['store_country'] = $request->store_country;
        $data['store_state']   = $request->store_state;
        $data['store_zip']     = $request->store_zip;
        $data['hide_store_phone'] = $request->hide_store_phone;
        $data['hide_store_email'] = $request->hide_store_email;


        $setting_store = SettingStore::latest()->first();

        if (empty($setting_store)) {
            SettingStore::create($data);
        }else {
            SettingStore::whereId($setting_store->id)->update($data);
        }
        return response()->json(['success' => __('Data Added successfully.')]);
    }

    public function currencyStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('default_currency','currency_format','default_currency_code'),[
                'default_currency' => 'required', //Symbol
                'default_currency_code' => 'required',
                'currency_format'=> 'required',
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors' => $validator->errors()->all()]);
            }


            if ($request->exchange_rate_service=="fixer" && $request->fixer_access_key==NULL) {
                return response()->json(['error_exchange_rate_service' => "Please Input Fixer Access Key"]);
            }
            elseif ($request->exchange_rate_service=="forge" && $request->forge_api_key==NULL) {
                return response()->json(['error_exchange_rate_service' => "Please Input Forge Api Key"]);
            }
            elseif ($request->exchange_rate_service=="currency_data_feed" && $request->currency_data_feed_key==NULL) {
                return response()->json(['error_exchange_rate_service' => "Please Input Currency Data Feed Key"]);
            }


            $data = [];
            $data['supported_currency'] = implode(",", $request->supported_currencies);
            $data['default_currency_code']    = $request->default_currency_code;
            $data['default_currency']    = $request->default_currency;
            $data['currency_format'] = $request->currency_format;
            $data['exchange_rate_service'] = $request->exchange_rate_service;
            $data['fixer_access_key']   = $request->fixer_access_key;
            $data['forge_api_key'] = $request->forge_api_key;
            $data['currency_data_feed_key'] = $request->currency_data_feed_key;
            $data['auto_refresh']    = $request->auto_refresh;

            $setting_currency = SettingCurrency::latest()->first();

            if (empty($setting_currency)) {
                SettingCurrency::create($data);
            }else {
                SettingCurrency::whereId($setting_currency->id)->update($data);
            }

            DB::table('currency_rates')->delete();
            for ($i=0; $i <count($request->supported_currencies) ; $i++) {
                $data = Currency::where('currency_name',$request->supported_currencies[$i])->select('currency_code')->first();

                $currency_rate = new CurrencyRate();
                $currency_rate->currency_name = $request->supported_currencies[$i];
                $currency_rate->currency_code = $data->currency_code;
                $currency_rate->save();
            }

            //Default Currency
            $this->dataWriteInENVFile('DEFAULT_CURRENCY_CODE',$request->default_currency_code);
            $this->dataWriteInENVFile('DEFAULT_CURRENCY_SYMBOL',$request->default_currency);
            $this->dataWriteInENVFile('CURRENCY_FORMAT',$request->currency_format);

            // $path = '.env';
            // if ($request->default_currency) {
            //     $searchArray = array('DEFAULT_CURRENCY_SYMBOL=' . env('DEFAULT_CURRENCY_SYMBOL'));
            //     $replaceArray= array('DEFAULT_CURRENCY_SYMBOL=' . $request->default_currency);
            //     file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));
            // }
            // //Currency Format
            // if ($request->currency_format) {
            //     $searchArray = array('CURRENCY_FORMAT=' . env('CURRENCY_FORMAT'));
            //     $replaceArray= array('CURRENCY_FORMAT=' . $request->currency_format);
            //     file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));
            // }


            return response()->json(['success' => __('Data added Successfully')]);
        }
    }

    public function smsStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('sms_from'),[
            'sms_from' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->sms_service=="vonage" && $request->api_key==NULL && $request->api_secret==NULL) {
            return response()->json(['error_sms_service' => "The API Key and API Secret Fields are required"]);
        }
        else if ($request->sms_service=="vonage" && $request->api_key==NULL) {
            return response()->json(['error_sms_service' => "The API Key Field is required"]);
        }
        elseif ($request->sms_service=="vonage" && $request->api_secret==NULL) {
            return response()->json(['error_sms_service' => "The API Secret Field is required"]);
        }
        if ($request->sms_service=="twilio" && $request->account_sid==NULL && $request->auth_token==NULL) {
            return response()->json(['error_sms_service' => "The Account SID and Auth Token fields are required"]);
        }
        else if ($request->sms_service=="twilio" && $request->account_sid==NULL) {
            return response()->json(['error_sms_service' => "The Account SID Field is required"]);
        }
        elseif ($request->sms_service=="twilio" && $request->auth_token==NULL) {
            return response()->json(['error_sms_service' => "The Auth Token field is required"]);
        }


        $data = [];
        $data['sms_from']    = $request->sms_from;
        $data['sms_service'] = $request->sms_service;
        $data['api_key']     = $request->api_key;
        $data['api_secret']  = $request->api_secret;
        $data['account_sid'] = $request->account_sid;
        $data['auth_token']  = $request->auth_token;
        $data['welcome_sms'] = $request->welcome_sms;
        $data['new_order_sms_to_admin'] = $request->new_order_sms_to_admin;
        $data['new_order_sms_to_customer'] = $request->new_order_sms_to_customer;
        $data['sms_order_status'] = $request->sms_order_status;


        $setting_sms = SettingSms::latest()->first();

        if (empty($setting_sms)) {
            SettingSms::create($data);
        }else {
            SettingSms::whereId($setting_sms->id)->update($data);
        }
        return response()->json(['success' => __('Data Added successfully.')]);
    }

    public function mailStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $data['mail_address']  = $request->mail_address;
            $data['mail_name']     = $request->mail_name;
            $data['mail_host']     = $request->mail_host;
            $data['mail_port']     = $request->mail_port;
            $data['mail_username'] = $request->mail_username;
            if ($request->mail_password) {
                $data['mail_password']  = Hash::make($request->mail_password);
            }
            $data['mail_encryption']= $request->mail_encryption;
            $data['welcome_email'] = $request->welcome_email;
            $data['new_order_to_admin'] = $request->new_order_to_admin;
            $data['invoice_mail']  = $request->invoice_mail;
            $data['mail_order_status'] = $request->mail_order_status;


            $setting_mail = SettingMail::latest()->first();

            if (empty($setting_mail)) {
                SettingMail::create($data);
            }else {
                SettingMail::whereId($setting_mail->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function newsletterStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $data['newsletter']        = $request->newsletter;
            $data['mailchimp_api_key'] = $request->mailchimp_api_key;
            $data['mailchimp_list_id'] = $request->mailchimp_list_id;

            $setting_newsletter = SettingNewsletter::latest()->first();

            if (empty($setting_newsletter)) {
                SettingNewsletter::create($data);
            }else {
                SettingNewsletter::whereId($setting_newsletter->id)->update($data);
            }

            //Default Currency
            $this->dataWriteInENVFile('MAILCHIMP_APIKEY',$request->mailchimp_api_key);
            $this->dataWriteInENVFile('MAILCHIMP_LIST_ID',$request->mailchimp_list_id);


            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function customCssJsStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $data['header'] = $request->header;
            $data['footer'] = $request->footer;

            $setting_custom_css_js = SettingCustomCssJss::latest()->first();

            if (empty($setting_custom_css_js)) {
                SettingCustomCssJss::create($data);
            }else {
                SettingCustomCssJss::whereId($setting_custom_css_js->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function facebookStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('app_id','app_secret'),[
            'app_id' => 'required',
            'app_secret' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {
            $data = [];
            $data['status'] = $request->status;
            $data['app_id'] = $request->app_id;
            $data['app_secret'] = $request->app_secret;

            $setting_facebook = SettingFacebook::latest()->first();

            if (empty($setting_facebook)) {
                SettingFacebook::create($data);
            }else {
                SettingFacebook::whereId($setting_facebook->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function googleStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('client_id','client_secret'),[
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {
            $data = [];
            $data['status'] = $request->status;
            $data['client_id'] = $request->client_id;
            $data['client_secret'] = $request->client_secret;

            $setting_google = SettingGoogle::latest()->first();

            if (empty($setting_google)) {
                SettingGoogle::create($data);
            }else {
                SettingGoogle::whereId($setting_google->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }


    public function freeShippingStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('label'),[
            'label' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {
            $data = [];
            $data['shipping_status'] = $request->shipping_status;
            $data['label'] = $request->label;
            $data['minimum_amount'] = $request->minimum_amount;

            $setting_free_shipping = SettingFreeShipping::latest()->first();

            if (empty($setting_free_shipping)) {
                SettingFreeShipping::create($data);
            }else {
                SettingFreeShipping::whereId($setting_free_shipping->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function localPickupStoreOrUpdate(Request $request)
    {
        $validator = Validator::make($request->only('label','cost'),[
            'label' => 'required',
            'cost' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {
            $data = [];
            $data['pickup_status'] = $request->pickup_status;
            $data['label'] = $request->label;
            $data['cost'] = $request->cost;

            $setting_local_pickup = SettingLocalPickup::latest()->first();

            if (empty($setting_local_pickup)) {
                SettingLocalPickup::create($data);
            }else {
                SettingLocalPickup::whereId($setting_local_pickup->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function flatRateStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','cost'),[
                'label' => 'required',
                'cost' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            if ($request->ajax()) {
                $data = [];
                $data['flat_status'] = $request->flat_status;
                $data['label'] = $request->label;
                $data['cost'] = $request->cost;

                $setting_flat_rate = SettingFlatRate::latest()->first();

                if (empty($setting_flat_rate)) {
                    SettingFlatRate::create($data);
                }else {
                    SettingFlatRate::whereId($setting_flat_rate->id)->update($data);
                }
                return response()->json(['success' => __('Data Added successfully.')]);
            }
        }
    }

    public function paypalStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','client_id','secret'),[
                'label' => 'required',
                'description' => 'required',
                'client_id' => 'required',
                'secret' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['sandbox'] = $request->sandbox;
            $data['client_id'] = $request->client_id;
            $data['secret'] = $request->secret;

            $setting_paypal = SettingPaypal::latest()->first();

            // $path = '.env';
            // $searchArray = array('PAYPAL_SANDBOX_CLIENT_ID=' . env('PAYPAL_SANDBOX_CLIENT_ID'));
            // $replaceArray= array('PAYPAL_SANDBOX_CLIENT_ID=' . $request->client_id);
            // file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));

            $this->dataWriteInENVFile('PAYPAL_SANDBOX_CLIENT_ID',$request->client_id);
            $this->dataWriteInENVFile('PAYPAL_SANDBOX_CLIENT_SECRET',$request->secret);


            if (empty($setting_paypal)) {
                SettingPaypal::create($data);
            }else {
                SettingPaypal::whereId($setting_paypal->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }


    public function stripStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','publishable_key','secret_key'),[
                'label' => 'required',
                'description' => 'required',
                'publishable_key' => 'required',
                'secret_key' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['publishable_key'] = $request->publishable_key;
            $data['secret_key'] = $request->secret_key;

            $setting_strip = SettingStrip::latest()->first();

            if (empty($setting_strip)) {
                SettingStrip::create($data);
            }else {
                SettingStrip::whereId($setting_strip->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function paytmStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','merchant_id','merchant_key'),[
                'label' => 'required',
                'description' => 'required',
                'merchant_id' => 'required',
                'merchant_key' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['sandbox'] = $request->sandbox;
            $data['merchant_id'] = $request->merchant_id;
            $data['merchant_key'] = $request->merchant_key;

            $setting_paytm = SettingPaytm::latest()->first();

            if (empty($setting_paytm)) {
                SettingPaytm::create($data);
            }else {
                SettingPaytm::whereId($setting_paytm->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function cashonDeliveryStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description'),[
                'label' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;

            $setting_cash_on_delivery = SettingCashOnDelivery::latest()->first();

            if (empty($setting_cash_on_delivery)) {
                SettingCashOnDelivery::create($data);
            }else {
                SettingCashOnDelivery::whereId($setting_cash_on_delivery->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function bankTransferStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','instruction'),[
                'label' => 'required',
                'description' => 'required',
                'instruction' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['instruction'] = $request->instruction;

            $setting_bank_transfer = SettingBankTransfer::latest()->first();

            if (empty($setting_bank_transfer)) {
                SettingBankTransfer::create($data);
            }else {
                SettingBankTransfer::whereId($setting_bank_transfer->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function cehckMoneyOrderStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','instruction'),[
                'label' => 'required',
                'description' => 'required',
                'instruction' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['instruction'] = $request->instruction;

            $setting_check_money_order = SettingCheckMoneyOrder::latest()->first();

            if (empty($setting_check_money_order)) {
                SettingCheckMoneyOrder::create($data);
            }else {
                SettingCheckMoneyOrder::whereId($setting_check_money_order->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }


    public function emptyDatabase()
	{
		DB::statement("SET foreign_key_checks=0");
		$tables = DB::select('SHOW TABLES');
		$str = 'Tables_in_' . env('DB_DATABASE');
		foreach ($tables as $table) {
			// if($table->$str != 'countries' && $table->$str != 'model_has_roles' && $table->$str != 'role_users' && $table->$str != 'general_settings'  && $table->$str != 'migrations' && $table->$str != 'password_resets' && $table->$str != 'permissions' &&  $table->$str != 'roles' && $table->$str != 'role_has_permissions' && $table->$str != 'users') {
			if($table->$str != 'colors' && $table->$str != 'countries' && $table->$str != 'model_has_roles' && $table->$str != 'currencies'  && $table->$str != 'migrations' && $table->$str != 'languages' && $table->$str != 'permissions' &&  $table->$str != 'roles' && $table->$str != 'role_has_permissions' && $table->$str != 'users' && $table->$str != 'settings' && $table->$str != 'setting_translations' && $table->$str != 'storefront_images') {
				DB::table($table->$str)->truncate();
			}
		}

		DB::statement("SET foreign_key_checks=1");

		return redirect()->back()->with('empty_message', 'Database cleared successfully');
	}


}

// https://github.com/antonioribeiro/countries
// https://dev.to/kingsconsult/how-to-get-the-entire-country-list-in-laravel-8-downwards-ahb
// https://github.com/DougSisk/laravel-country-state
