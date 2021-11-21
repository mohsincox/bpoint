@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                        <h4 class="text-center"><b>Painter Information</b></h4> 
                    	<h4 class="text-center">Painter Name: <b>{{ $painter->painter_name }}</b></h4> 
                        <h4 class="text-center">Painter Mobile: <b>{{ $painter->painter_phone_number }}</b></h4> 
                        <h4 class="text-center">Address: <b>{{ $painter->painter_address }}</b></h4> 
                        <h4 class="text-center">Total Point: <b>{{ number_format($painter->painter_total_point, 2) }}</b></h4> 
                    	<!-- <div class="box-tools pull-right">
                    		<a href="{{ url('painter/create') }}" class="btn btn-primary btn-flat"> <i class="fa fa-plus"></i> Create Painter</a>
                    	</div> -->
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Depot</th>
                                        <th>Product</th>
                                        <th>SKU Description</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Point</th>
                                        <th class="text-right">Total Point</th>
                                        <th>Dealer</th>
                                        <th>Remarks</th>
                                        <th>DateTime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                    $totalPoint = 0;
                                ?>
                                @foreach($painter->painterDetails as $painter)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        @if(isset($painter->depot))
                                            <td>{{ $painter->depot->name }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if(isset($painter->product))
                                            <td>{{ $painter->product->product_name .' '. $painter->product->packsize .' '. $painter->product->unit }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if(isset($painter->product))
                                            <td>{{ $painter->product->sku_description }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td class="text-right">{{ number_format($painter->product_qty_painter, 2) }}</td>
                                        <td class="text-right">{{ number_format($painter->each_point_painter, 2) }}</td>
                                        <td class="text-right">{{ number_format($painter->sum_point_painter, 2) }}</td>
                                        @if(isset($painter->dealer))
                                            <td>{{ $painter->dealer->dealer_name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $painter->pd_remarks }}</td>
                                        <td>{{ $painter->created_at }}</td>
                                    </tr>
                                    <?php
                                        $totalPoint += $painter->sum_point_painter;
                                    ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="6" class="text-right">Total</th>
                                    <th class="text-right">{{ number_format($totalPoint, 2) }}</th>
                                    <th colspan="3"></th>
                                </tr>
                            </tfoot>
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