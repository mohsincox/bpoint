<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Painter;
use App\Models\Option;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class PainterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$painters = Painter::get();

    	return view('painter.index', compact('painters'));
    }

    public function create()
    {
    	$painterClubList  = Option::where('select_id', 1)->where('status', 'Active')->pluck('name', 'name');

    	return view('painter.create', compact('painterClubList'));
    }

    public function store(Request $request)
    {
        //return $request->all();
    	$input = Input::all();
	    $rules = [
	    	'painter_name' => 'required',
	    	'painter_phone_number' => 'required|numeric|digits_between:11,11|unique:painters',
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

        $painter = new Painter;
        $painter->painter_name = $request->painter_name;
        $painter->painter_phone_number = $request->painter_phone_number;
        $painter->painter_address = $request->painter_address;
        $painter->painter_club_class = $request->painter_club_class;
        $painter->painter_remarks = $request->painter_remarks;
        $painter->created_by = Auth::id();
        $painter->save();
        
        flash()->success($painter->painter_name.' painter created successfully');
    	return redirect('painter');
    }

    public function edit($id)
    {
    	$painter = Painter::find($id);
    	$painterClubList  = Option::where('select_id', 1)->where('status', 'Active')->pluck('name', 'name');

    	return view('painter.edit', compact('painter', 'painterClubList'));
    }
    
    public function update(Request $request, $id)
    {
    	$painter = Painter::find($id);
    	$input = Input::all();
	    $rules = [
	    	'painter_name' => 'required',
	    	'painter_phone_number' => 'required|numeric|digits_between:11,11|unique:painters,painter_phone_number,'.$painter->id,
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

        $painter->painter_name = $request->painter_name;
        $painter->painter_phone_number = $request->painter_phone_number;
        $painter->painter_address = $request->painter_address;
        $painter->painter_club_class = $request->painter_club_class;
        $painter->painter_remarks = $request->painter_remarks;
        $painter->status = $request->status;
        $painter->updated_by = Auth::id();
        $painter->save();

        flash()->success($painter->painter_name.' painter updated successfully');
    	return redirect('painter');
    }

    public function details(Request $request, $id)
    {
        $painter = Painter::with('painterDetails')->find($id);

        return view('painter.details', compact('painter'));
    }
}
