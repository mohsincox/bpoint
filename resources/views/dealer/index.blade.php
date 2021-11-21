@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h3 class="box-title">Dealer List</h3> 
                    	<div class="box-tools pull-right">
                    		<a href="{{ url('dealer/create') }}" class="btn btn-primary btn-flat"> <i class="fa fa-plus"></i> Create Dealer</a>
                    	</div>
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Dealer Name</th>
                                        <th>Mobile</th>
                                        <th class="text-right">Total Point</th>
                                        <th>Address</th>
                                        <th>Club Class</th>
                                        <!-- <th>Status</th> -->
                                        <th>Remarks</th>
                                        <th>Details</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($dealers as $dealer)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $dealer->dealer_name }}</td>
                                        <td>{{ $dealer->dealer_phone_number }}</td>
                                        <td class="text-right">{{ number_format($dealer->dealer_total_point, 2) }}</td>
                                        <td>{{ $dealer->dealer_address }}</td>
                                        <td>{{ $dealer->dealer_club_class }}</td>
                                        <!-- <td>{{ $dealer->status }}</td> -->
                                        <td>{{ $dealer->dealer_remarks }}</td>
                                        <td>{!! Html::link("dealer/$dealer->id/details",' Details', ['class' => 'fa fa-edit btn btn-primary btn-xs btn-flat']) !!}</td>
                                        <td>{!! Html::link("dealer/$dealer->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection