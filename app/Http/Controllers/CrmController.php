<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Option;
use App\Models\District;
use App\Models\Crm;
use App\Models\Product;
use App\Models\Depot;
use App\Models\Dealer;
use App\Models\Painter;

class CrmController extends Controller
{
    public function create(Request $request)
    {
    	$depotList  = Depot::pluck('name', 'id');

    	$products = Product::get(['product_name', 'packsize', 'unit', 'sku_description', 'id']);
		foreach ($products as $item) {
		    $productList[$item->product_name .' '. number_format($item->packsize, 3) .' '. $item->unit .', '. $item->sku_description] = $item->product_name .' '. number_format($item->packsize, 3) .' '. $item->unit .', '. $item->sku_description;
		    // $productList[$item->id] = $item->product_name .' '. number_format($item->packsize, 3) .' '. $item->unit .', '. $item->sku_description;
		}
        
        $callerTypeList  = Option::where('select_id', 3)->where('status', 'Active')->pluck('name', 'name');
        $callRemarksList  = Option::where('select_id', 4)->where('status', 'Active')->pluck('name', 'name');

        $districtList = District::orderBy('name', 'asc')->pluck('name', 'id');
        $phone_number = substr($request->phone_number, -11);
        $phoneNumber = $phone_number;
        $agent = $request->agent;

        $crmLast = Crm::whereIn('phone_number', [substr($request->phone_number, -11), substr($request->phone_number, -10)])->orderBy('id', 'desc')->first();
        $dealer = Dealer::where('dealer_phone_number', substr($request->phone_number, -11))->first();
        $painter = Painter::where('painter_phone_number', substr($request->phone_number, -11))->first();

        return view('crm.create', compact('depotList', 'productList', 'callerTypeList', 'callRemarksList', 'districtList', 'phoneNumber', 'agent', 'crmLast', 'dealer', 'painter'));
    }

    public function store(Request $request)
    {
        $crm = new Crm;
        $crm->phone_number = $request->phone_number;
        $crm->agent = $request->agent;
        $crm->name = $request->name;
        $crm->district_id = $request->district_id;
        $crm->address = $request->address;
        $crm->shop_name = $request->shop_name;
        $crm->depot_id = $request->depot_id;

        if ($request->transaction_date == null) {
            $crm->transaction_date = null;
        } else {
            $crm->transaction_date = $request->transaction_date;
        }
        
        if ($request->product == null) {
            $crm->product = $request->product;
        } else {
            $strProduct = implode(", ",$request->product);
            $crm->product = $strProduct;
        }
        
        $crm->quantity = $request->quantity_blank;
        $crm->caller_type = $request->caller_type;
        $crm->remarks = $request->remarks;
        $crm->camp_in_or_out = $request->camp_in_or_out_blank;
        $crm->call_remarks = $request->call_remarks;
        
        $crm->save(); 

        flash()->success($request->phone_number.' information created successfully');
        
        return redirect()->back();
    }
}
