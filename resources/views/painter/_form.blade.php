@if(isset($painter))
    {!! Form::model($painter, ['url' => "painter/$painter->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'painter', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group {{ $errors->has('painter_name') ? 'has-error' : ''}}">
    {!! Form::label('painter_name', 'Painter Name', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Name', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_name') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_phone_number') ? 'has-error' : ''}}">
    {!! Form::label('painter_phone_number', 'Painter Mobile', ['class' => 'required col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_phone_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Phone Number', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_phone_number') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_address') ? 'has-error' : ''}}">
    {!! Form::label('painter_address', 'Painter Address', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_address', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Address', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_address') }}
	    </span>
    </div>
</div>

<div class="form-group {{ $errors->has('painter_club_class') ? 'has-error' : ''}}">
    {!! Form::label('painter_club_class', 'Painter Club', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::select('painter_club_class', $painterClubList, null, ['class' => 'form-control', 'placeholder' => 'Select Club Classification']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_club_class') }}
	    </span>
    </div>
</div>

@if(isset($painter))
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

<div class="form-group {{ $errors->has('painter_remarks') ? 'has-error' : ''}}">
    {!! Form::label('painter_remarks', 'Painter Remarks', ['class' => 'col-3 col-sm-3 control-label']) !!}
    <div class="col-xs-9 col-sm-9">
        {!! Form::text('painter_remarks', null, ['class' => 'form-control', 'placeholder' => 'Enter Painter Remarks', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
		    {{ $errors->first('painter_remarks') }}
	    </span>
    </div>
</div>

<div class="box-footer">
	<!-- <button type="button" class="btn btn-default">Cancel</button> -->
	<a href="{{ url('/painter') }}" class="btn btn-default">Cancel</a>
	@if(isset($painter))
	    {!! Form::button('Submit', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#painter_update']) !!}
	@else
	    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#painter_create']) !!}
	@endif
	
</div>

<div class="modal modal-info fade" id="painter_create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Create Painter?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Create Painter</button>
			</div>
		</div>
	</div>
</div>


<div class="modal modal-warning fade" id="painter_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Confirmation Message</h4>
			</div>
			<div class="modal-body">
				<h3>Want to Update Painter?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline">Update Painter</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}