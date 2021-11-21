<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Dealer;
use App\Models\Option;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$dealers = Dealer::get();
    	return view('dealer.index', compact('dealers'));
    }

    public function create()
    {
    	$dealerClubList  = Option::where('select_id', 2)->where('status', 'Active')->pluck('name', 'name');

    	return view('dealer.create', compact('dealerClubList'));
    }

    public function store(Request $request)
    {
        //return $request->all();
    	$input = Input::all();
	    $rules = [
	    	'dealer_name' => 'required',
	    	'dealer_phone_number' => 'required|numeric|digits_between:11,11|unique:dealers',
	    ];
	    $messages = [
      
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $dealer = new Dealer;
        $dealer->dealer_name = $request->dealer_name;
        $dealer->dealer_phone_number = $request->dealer_phone_number;
        $dealer->dealer_address = $request->dealer_address;
        $dealer->dealer_club_class = $request->dealer_club_class;
        $dealer->dealer_remarks = $request->dealer_remarks;
        $dealer->created_by = Auth::id();
        $dealer->save();
        flash()->success($dealer->dealer_name.' dealer created successfully');
    	return redirect('dealer');
    }

    public function edit($id)
    {
    	$dealer = Dealer::find($id);
    	$dealerClubList  = Option::where('select_id', 2)->where('status', 'Active')->pluck('name', 'name');

    	return view('dealer.edit', compact('dealer', 'dealerClubList'));
    }
    
    public function update(Request $request, $id)
    {
    	// return $request->all();
    	$dealer = Dealer::find($id);
    	$input = Input::all();
	    $rules = [
	    	'dealer_name' => 'required',
	    	'dealer_phone_number' => 'required|numeric|digits_between:11,11|unique:dealers,dealer_phone_number,'.$dealer->id,
	    	'status' => 'required',
	    ];
	    $messages = [
           
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $dealer->dealer_name = $request->dealer_name;
        $dealer->dealer_phone_number = $request->dealer_phone_number;
        $dealer->dealer_address = $request->dealer_address;
        $dealer->dealer_club_class = $request->dealer_club_class;
        $dealer->dealer_remarks = $request->dealer_remarks;
        $dealer->status = $request->status;
        $dealer->updated_by = Auth::id();
        $dealer->save();
        flash()->success($dealer->dealer_name.' dealer updated successfully');
    	return redirect('dealer');
    }

    public function details(Request $request, $id)
    {
        $dealer = Dealer::with('dealerDetails')->find($id);

        return view('dealer.details', compact('dealer'));
    }
}
