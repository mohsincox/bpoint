<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$products = Product::get();
    	return view('product.index', compact('products'));
    }

    public function create()
    {
    	return view('product.create');
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'product_name' => 'required',
            'sku_code' => 'required|unique:products',
            'sku_description' => 'required|unique:products',
	    	'packsize' => 'required|numeric',
	    	'unit' => 'required',
	    	'painter_benefit_point' => 'required|numeric',
	    	'dealer_benefit_point' => 'required|numeric',
	    ];

	    $messages = [
            'product_name.required' => 'The Product Name field is required.',
            'packsize.required' => 'The Packsize field is required.',
            'unit.required' => 'The Unit field is required.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

      //   $productExist = Product::where('product_name', $request->product_name)->where('packsize', $request->packsize)->first();
      //   if($productExist) {
      //   	flash()->error('Product '.$productExist->product_name.' and SKU '.$productExist->packsize.' already exists.');
    		// return redirect()->back()->withInput();
      //   }

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->sku_code = $request->sku_code;
        $product->sku_description = $request->sku_description;
        $product->packsize = $request->packsize;
        $product->unit = $request->unit;
        $product->painter_benefit_point = $request->painter_benefit_point;
        $product->dealer_benefit_point = $request->dealer_benefit_point;
        $product->remarks = $request->remarks;
        $product->created_by = Auth::id();
        $product->save();

        flash()->success($product->product_name.' Product Name Created Successfully');
    	return redirect('product');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	
    	return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
    	$product = Product::find($id);
    	$input = Input::all();
	    $rules = [
	    	'product_name' => 'required',
            'sku_code' => 'required|unique:products,sku_code,'.$product->id,
            'sku_description' => 'required|unique:products,sku_description,'.$product->id,
	    	'packsize' => 'required|numeric',
	    	'unit' => 'required',
	    	'painter_benefit_point' => 'required|numeric',
	    	'dealer_benefit_point' => 'required|numeric',
	    ];

	    $messages = [
            'product_name.required' => 'The Product Name field is required.',
            'packsize.required' => 'The Packsize field is required.',
            'unit.required' => 'The Unit field is required.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

      //   $productExist = Product::where('product_name', $request->product_name)->where('packsize', $request->packsize)->where('id', '<>', $product->id)->first();
      //   if($productExist) {
      //   	flash()->error('Product '.$productExist->product_name.' and Packsize '.$productExist->packsize.' already exists.');
    		// return redirect()->back()->withInput();
      //   }

        $product->product_name = $request->product_name;
        $product->sku_code = $request->sku_code;
        $product->sku_description = $request->sku_description;
        $product->packsize = $request->packsize;
        $product->unit = $request->unit;
        $product->painter_benefit_point = $request->painter_benefit_point;
        $product->dealer_benefit_point = $request->dealer_benefit_point;
        $product->status = $request->status;
        $product->remarks = $request->remarks;
        $product->updated_by = Auth::id();
        $product->save();

        flash()->success($product->product_name.' Product Name Updated Successfully');
    	return redirect('product');
    }
}
