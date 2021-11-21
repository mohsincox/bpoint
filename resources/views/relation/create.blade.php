@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">Relation</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
    						
    						<div class="card">
    							<div class="card-header">
    								<h3 class="text-center"><i class="fa fa-pencil"></i> Create Form of <code><b>Relation</b></code> </h3>
    							</div>
    							<div class="card-body">
    						  		
    								{!! Form::open(['url' => 'relation', 'method' => 'post', 'class' => 'form-horizontal']) !!}

<div class="form-group {{ $errors->has('depot_id') ? 'has-error' : ''}}">
    {!! Form::label('depot_id', 'Dipot Name', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('depot_id', $depotList, null, ['class' => 'select2 form-control', 'placeholder' => 'Select Depot']) !!}
        <span class="text-danger">
		    {{ $errors->first('depot_id') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    {!! Form::label('product_id', 'Product', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('product_id', $productList, null, ['class' => 'select2 form-control', 'placeholder' => 'Select Product', 'id' => 'product_id']) !!}
        <span class="text-danger">
		    {{ $errors->first('product_id') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_benefit_point') ? 'has-error' : ''}}">
    {!! Form::label('painter_benefit_point', 'Painter Point', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_benefit_point', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Benefit Point', 'autocomplete' => 'off', 'id' => 'painter_benefit_point', 'readonly' => 'readonly']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_benefit_point') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_benefit_point') ? 'has-error' : ''}}">
    {!! Form::label('dealer_benefit_point', 'Dealer Point', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_benefit_point', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Benefit Point', 'autocomplete' => 'off', 'id' => 'dealer_benefit_point', 'readonly' => 'readonly']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_benefit_point') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('product_quantity') ? 'has-error' : ''}}">
    {!! Form::label('product_quantity', 'Product Quantity', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('product_quantity', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Quantity', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('product_quantity') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_id') ? 'has-error' : ''}}">
    {!! Form::label('painter_id', 'Painter', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('painter_id', $painterList, null, ['class' => 'select2 form-control', 'placeholder' => 'Select Painter']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_id') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_id') ? 'has-error' : ''}}">
    {!! Form::label('dealer_id', 'Dealer', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('dealer_id', $dealerList, null, ['class' => 'select2 form-control', 'placeholder' => 'Select Dealer']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_id') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'required col-3 col-sm-3 control-label']) !!}
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
	
	{!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#relation_create']) !!}
	
	
</div>

<div class="modal modal-info fade" id="relation_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Relation?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Relation</button>
			</div>
		</div>
	</div>
</div>
									{!! Form::close() !!}

    							</div>
    						</div>
    					</div>

                	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection

@section('style')
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection

@section('script')
    <!-- <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#product_id").change(function() {
                var productId = $("#product_id").val();
                var url = '{{ url("/get-point")}}';
                $.get(url+'?product_id='+productId, function (data) {  
                    $('#painter_benefit_point').val(data.painter_benefit_point);
                    $('#dealer_benefit_point').val(data.dealer_benefit_point);
                });
            });
        });        

        $(function () {
            $('.select2').select2();
        });

        // $(document).ready(function () {
        //     $("#ticketForm").submit(function () {
        //         $(".submitBtnTicket").attr("disabled", true);
        //         return true;
        //     });
        // });
    </script>
@endsection