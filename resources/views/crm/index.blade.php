@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h3 class="box-title">CRM List</h3> 
                    	<div class="box-tools pull-right">
                    		<!-- <a href="{{ url('select/create') }}" class="btn btn-primary btn-flat"> <i class="fa fa-plus"></i> Create Select Name</a> -->
                    	</div>
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>CID</th>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>District</th>
                                        <th>Depot</th>
                                        <th>Shop Name</th>
                                        
                                        
                                        <th>Transaction Date</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Caller Type</th>
                                        <th>Remarks</th>
                                        <th>Call Remarks</th>
                                        <th>Agent</th>
                                        <th>Call Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($crms as $crm)
                                    <tr>
                                        <td>{{ $crm->id }}</td>
                                        <td>{{ $crm->phone_number }}</td>
                                        <td>{{ $crm->name }}</td>
                                        <td>{{ $crm->address }}</td>
                                        @if(isset($crm->district->name))
                                            <td>{{ $crm->district->name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if(isset($crm->depot))
                                            <td>{{ $crm->depot->name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $crm->shop_name }}</td>
                                        
                                        
                                        <td>{{ $crm->transaction_date }}</td>
                                        <td>{{ $crm->product }}</td>
                                        <td>{{ $crm->quantity }}</td>
                                        <td>{{ $crm->caller_type }}</td>
                                        <td>{{ $crm->remarks }}</td>
                                        <td>{{ $crm->call_remarks }}</td>
                                        <td>{{ $crm->agent }}</td>
                                        <td>{{ $crm->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $crms->render() !!}
                	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection

@section('style')
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}"> -->
@endsection

@section('script')
    <!-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script> -->
@endsection