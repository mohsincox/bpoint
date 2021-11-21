<!DOCTYPE html>
<html>
<head>
	<title>MYOL</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
   
	<style type="text/css">
		.box-header {
		    padding: 0px;
		}
		.box-body {
			padding: 0px;
		}
		.box-header .box-title {
			display: block;
		}
		.box-title {
			text-align: center;
		}

		.input-group-addon {
		    min-width:200px;
		    /*min-width:220px;*/
		    /*text-align:left;*/
		}
		.alert {
            padding: 2px; 
            margin-bottom: 5px;
        }

        .greenG {
        	background-color: #28a745; color: #FFFFFF;
        }
        .blue {
        	background-color: #007bff; color: #FFFFFF;
        	/*background-color: #59a3ef; color: #FFFFFF;*/
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 10px;
            color: #fff;
        }

	</style>
</head>
<body>
	<div class="container">

	    <div class="container">
	        <div class="col-sm-8 col-sm-offset-2">
	            @include('flash::message')
	        </div>
	    </div>

		<div class="box box-success">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Berger Point CRM <small>Phone Number:</small><code>{{ $phoneNumber }}</code> <small>Agent:</small> <code>{{ $agent }}</code></h3> 
	    	</div>
	    	<div class="box-body">
	    		{!! Form::model($crmLast, ['url' => 'crm', 'method' => 'post']) !!}

				{{-- {!! Form::open(['url' => 'crm', 'method' => 'post', 'class' => '']) !!} --}}

				<input type="hidden" name="phone_number" value="{{ $phoneNumber }}" class="form-control">
				<input type="hidden" name="agent" value="{{ $agent }}" class="form-control">

				<div class="row">
		    		<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Customer Name</span>
			      			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Name', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Address</span>
			      			{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">District</span>
			      			{!! Form::select('district_id', $districtList, null, ['class' => 'form-control select2', 'placeholder' => 'Select District', 'id' => 'district_id']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Shop Name</span>
			      			{!! Form::text('shop_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Shop Name', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Depot</span>
			      			{!! Form::select('depot_id', $depotList, null, ['class' => 'form-control select2', 'placeholder' => 'Select Depot']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Transaction Date</span>
			      			{!! Form::text('transaction_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'autocomplete' => 'off', 'id' => 'transaction_date']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
		    		<div class="col-sm-12">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Product Model</span>
			      			{!! Form::select('product[]', $productList, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
			    		</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Quantity</span>
			      			{!! Form::text('quantity_blank', null, ['class' => 'form-control', 'placeholder' => 'Enter Quantity', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
		    		<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Caller Type</span>
			      			{!! Form::select('caller_type', $callerTypeList, null, ['class' => 'form-control', 'placeholder' => 'Select Caller Type']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Conversation Details</span>
			      			{!! Form::text('remarks', null, ['class' => 'form-control', 'placeholder' => 'Enter Remarks', 'autocomplete' => 'off']) !!}
			    		</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Call Type <span style="color: red; font-size: 18px;">*</span></span>
			      			{!! Form::select('camp_in_or_out_blank', ['InboundCall' => 'InboundCall', 'OutboundCall' => 'OutboundCall'], null, ['class' => 'form-control', 'placeholder' => 'Select InboundCall or OutboundCall', 'required' => 'required']) !!}
			    		</div>
					</div>
					<div class="col-sm-6">
			    		<div class="input-group" style="margin-top: 5px;">
			      			<span class="input-group-addon" style="background-color: #39ABE4; color: #FFFFFF;">Call Remarks</span>
			      			{!! Form::select('call_remarks', $callRemarksList, null, ['class' => 'form-control', 'placeholder' => 'Select Call Remarks']) !!}
			    		</div>
					</div>
				</div>

				{!! Form::button('Submit', ['class' => 'btn btn-primary btn-block btn-xs btn-flat', 'data-toggle' => 'modal', 'data-target' => '#crm_create', 'style' => 'margin-top: 10px;']) !!}

				<div class="modal modal-info fade" id="crm_create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Confirmation Message</h4>
                            </div>
                            <div class="modal-body">
                                <h3>Want to Store CRM Information?</h3>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-outline btn-block">Submit CRM Information</button>
                            </div>
                        </div>
                    </div>
                </div>

				{!! Form::close() !!}
	    	</div>

	    	<div class="box-body">
	    		<div class="row">
					<div class="col-sm-12">
						@if(isset($dealer))
							<h3 class="text-center">Dealer Information</h3>
							<p class="text-center">Total Point: <b>{{ number_format($dealer->dealer_total_point, 2) }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name: <b>{{ $dealer->dealer_name }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile: <b>{{ $dealer->dealer_phone_number }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='{{ url("/dealer/$dealer->id/details") }}' target="_blank" class="btn btn-success">Details</a></p>
						@endif
						@if(isset($painter))
							<h3 class="text-center">Painter Information</h3>
							<p class="text-center">Total Point: <b>{{ number_format($painter->painter_total_point, 2) }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name: <b>{{ $painter->painter_name }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile: <b>{{ $painter->painter_phone_number }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='{{ url("/painter/$painter->id/details") }}' target="_blank" class="btn btn-success">Details</a></p>
						@endif
					</div>
		    		
				</div>
	    	</div>

	    </div>
	        	
	    
	</div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script> -->
	<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>

	

	<script type="text/javascript">
		$('#transaction_date').datepicker({
            format:'yyyy-mm-dd',
            autoclose: true
        });

        

		$(function () {
            $('.select2').select2();
        });

	</script>
</body>
</html>