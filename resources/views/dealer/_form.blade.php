@if(isset($dealer))
    {!! Form::model($dealer, ['url' => "dealer/$dealer->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'dealer', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group {{ $errors->has('dealer_name') ? 'has-error' : ''}}">
    {!! Form::label('dealer_name', 'Dealer Name', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Name', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_name') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_phone_number') ? 'has-error' : ''}}">
    {!! Form::label('dealer_phone_number', 'Dealer Mobile', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_phone_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Phone Number', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_phone_number') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_address') ? 'has-error' : ''}}">
    {!! Form::label('dealer_address', 'Dealer Address', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_address', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Address', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_address') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('dealer_club_class') ? 'has-error' : ''}}">
    {!! Form::label('dealer_club_class', 'Dealer Club', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('dealer_club_class', $dealerClubList, null, ['class' => 'form-control', 'placeholder' => 'Select Club Classification']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_club_class') }}
	    </span>
    </div>
</div>

@if(isset($dealer))
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

<div class="form-group {{ $errors->has('dealer_remarks') ? 'has-error' : ''}}">
    {!! Form::label('dealer_remarks', 'Dealer Remarks', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('dealer_remarks', null, ['class' => 'form-control', 'placeholder' => 'Enter Dealer Remarks', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('dealer_remarks') }}
	    </span>
    </div>
</div>

<div class="box-footer">
	<!-- <button type="button" class="btn btn-default">Cancel</button> -->
	<a href="{{ url('/dealer') }}" class="btn btn-default">Cancel</a>
	@if(isset($dealer))
	    {!! Form::button('Submit', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#dealer_update']) !!}
	@else
	    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#dealer_create']) !!}
	@endif
	
</div>

<div class="modal modal-info fade" id="dealer_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Dealer?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Dealer</button>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="dealer_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Update Dealer?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Update Dealer</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}