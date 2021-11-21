@if(isset($product))
    {!! Form::model($product, ['url' => "product/$product->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'product', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    {!! Form::label('product_name', 'Product Name', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('product_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('product_name') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('sku_code') ? 'has-error' : ''}}">
    {!! Form::label('sku_code', 'SKU Code', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('sku_code', null, ['class' => 'form-control', 'placeholder' => 'Enter SKU Code', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('sku_code') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('sku_description') ? 'has-error' : ''}}">
    {!! Form::label('sku_description', 'SKU Description', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('sku_description', null, ['class' => 'form-control', 'placeholder' => 'Enter SKU Description', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('sku_description') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('packsize') ? 'has-error' : ''}}">
    {!! Form::label('packsize', 'Packsize', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('packsize', null, ['class' => 'form-control', 'placeholder' => 'Enter Packsize', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('packsize') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('unit') ? 'has-error' : ''}}">
    {!! Form::label('unit', 'Unit', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('unit', ['LTR' => 'LTR', 'KG' => 'KG'], null, ['class' => 'form-control', 'placeholder' => 'Select Unit']) !!}
        <span class="text-danger">
		    {{ $errors->first('unit') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_benefit_point') ? 'has-error' : ''}}">
    {!! Form::label('painter_benefit_point', 'Painter Point', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_benefit_point', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Benefit Point', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_benefit_point') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_benefit_point') ? 'has-error' : ''}}">
    {!! Form::label('dealer_benefit_point', 'Dealer Point', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_benefit_point', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Benefit Point', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_benefit_point') }}
	    </span>
    </div>
</div>

@if(isset($product))
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        <span class="text-danger">
		    {{ $errors->first('status') }}
	    </span>
    </div>
</div>
@endif

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('remarks', null, ['class' => 'form-control', 'placeholder' => 'Enter Remarks', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('remarks') }}
	    </span>
    </div>
</div>

<div class="box-footer">
	<!-- <button type="button" class="btn btn-default">Cancel</button> -->
	<a href="{{ url('/product') }}" class="btn btn-default">Cancel</a>
	@if(isset($product))
	    {!! Form::button('Submit', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_update']) !!}
	@else
	    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_create']) !!}
	@endif
	
</div>

<div class="modal modal-info fade" id="product_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Product?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Product</button>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="product_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Update Product?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Update Product</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}