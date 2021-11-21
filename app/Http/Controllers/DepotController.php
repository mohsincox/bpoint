<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Depot;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class DepotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$depots = Depot::get();
    	return view('depot.index', compact('depots'));
    }

    public function create()
    {
    	return view('depot.create');
    }

    public function store(Request $request)
    {
        //return $request->all();
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:depots',
	    	'berger_depot_id' => 'required|numeric|unique:depots',
	    ];
	    $messages = [
            'name.required' => 'The Depot Name field is required.',
            'name.unique' => 'The Depot Name already exist.',
            'berger_depot_id.required' => 'The Depot ID field is required.',
            'berger_depot_id.unique' => 'The Depot ID already exist.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $depot = new Depot;
        $depot->name = $request->name;
        $depot->berger_depot_id = $request->berger_depot_id;
        $depot->remarks = $request->remarks;
        $depot->created_by = Auth::id();
        $depot->save();
        flash()->success($depot->name.' Depot Name created successfully');
    	return redirect('depot');
    }

    public function edit($id)
    {
    	$depot = Depot::find($id);
    	return view('depot.edit', compact('depot'));
    }
    
    public function update(Request $request, $id)
    {
    	$depot = Depot::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:depots,name,'.$depot->id,
	    	'berger_depot_id' => 'required|numeric|unique:depots,berger_depot_id,'.$depot->id,
	    	'status' => 'required',
	    ];
	    $messages = [
            'name.required' => 'The Depot Name field is required.',
            'name.unique' => 'The Depot Name already exist.',
            'berger_depot_id.required' => 'The Depot ID field is required.',
            'berger_depot_id.unique' => 'The Depot ID already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $depot->name = $request->name;
        $depot->berger_depot_id = $request->berger_depot_id;
        $depot->remarks = $request->remarks;
        $depot->status = $request->status;
        $depot->updated_by = Auth::id();
        $depot->save();
        flash()->success($depot->name.' Depot Name updated successfully');
    	return redirect('depot');
    }
}
