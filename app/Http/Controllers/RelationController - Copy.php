<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Depot;
use App\Models\Product;
use App\Models\Painter;
use App\Models\PainterDetail;
use App\Models\Dealer;
use App\Models\DealerDetail;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class RelationController extends Controller
{
    public function create()
    {
    	$depotList  = Depot::pluck('name', 'id');

    	$products = Product::get(['product_name', 'packsize', 'unit', 'sku_description', 'id']);
		foreach ($products as $item) {
		    $productList[$item->id] = $item->product_name .' '. number_format($item->packsize, 3) .' '. $item->unit .', '. $item->sku_description;
		}

		$painters = Painter::get(['painter_phone_number', 'painter_name', 'id']);
		foreach ($painters as $item) {
		    $painterList[$item->id] = $item->painter_phone_number .' '. $item->painter_name;
		}

    	$painters = Dealer::get(['dealer_phone_number', 'dealer_name', 'id']);
		foreach ($painters as $item) {
		    $dealerList[$item->id] = $item->dealer_phone_number .' '. $item->dealer_name;
		}

    	return view('relation.create', compact('depotList', 'productList', 'painterList', 'dealerList'));
    }

    public function getPoint(Request $request)
    {
    	$product = Product::find($request->product_id);

        return response()->json($product);
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'depot_id' => 'required',
	    	'product_id' => 'required',
	    	'painter_benefit_point' => 'required|numeric',
	    	'dealer_benefit_point' => 'required|numeric',
	    	'product_quantity' => 'required|numeric',
	    	'painter_id' => 'required',
	    	'dealer_id' => 'required',
	    	'remarks' => 'required',
	    ];

	    $messages = [
            'depot_id.required' => 'The Depot Name field is required.',
            'product_id.required' => 'The Product Name field is required.',
            'painter_id.required' => 'The Painter Name field is required.',
            'dealer_id.required' => 'The Dealer Name field is required.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $painterDetail = new PainterDetail;
        $painterDetail->depot_id = $request->depot_id;
        $painterDetail->painter_id = $request->painter_id;
        $painterDetail->dealer_id = $request->dealer_id;
        $painterDetail->product_id = $request->product_id;
        $painterDetail->product_qty_painter = $request->product_quantity;
        $painterDetail->each_point_painter = $request->painter_benefit_point;
        $painterDetail->sum_point_painter = $request->painter_benefit_point * $request->product_quantity;
        $painterDetail->pd_remarks = $request->remarks;
        $painterDetail->created_by = Auth::id();
        $painterDetail->save();

        // echo $painterDetail->sum_point_painter;

        $painter = Painter::find($request->painter_id);

        $painterPreviousPoint = $painter->painter_total_point;

        $painter->painter_total_point = $painterPreviousPoint + $painterDetail->sum_point_painter;

        $painter->save();

        // echo $painter->painter_total_point;


        $dealerDetail = new DealerDetail;
        $dealerDetail->depot_id = $request->depot_id;
        $dealerDetail->dealer_id = $request->dealer_id;
        $dealerDetail->painter_id = $request->painter_id;
        $dealerDetail->product_id = $request->product_id;
        $dealerDetail->product_qty_dealer = $request->product_quantity;
        $dealerDetail->each_point_dealer = $request->dealer_benefit_point;
        $dealerDetail->sum_point_dealer = $request->dealer_benefit_point * $request->product_quantity;
        $dealerDetail->dd_remarks = $request->remarks;
        $dealerDetail->created_by = Auth::id();
        $dealerDetail->save();

        // echo $dealerDetail->sum_point_dealer;

        $dealer = Dealer::find($request->dealer_id);

        $dealerPreviousPoint = $dealer->dealer_total_point;

        $dealer->dealer_total_point = $dealerPreviousPoint + $dealerDetail->sum_point_dealer;

        $dealer->save();

        // echo $dealer->dealer_total_point;


        flash()->success(' Painter & Dealer Information Inserted Successfully');
    	return redirect('/');

    }
}
