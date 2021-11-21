@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h4 class="text-center"><b>Dealer Information</b></h4> 
                        <h4 class="text-center">Dealer Name: <b>{{ $dealer->dealer_name }}</b></h4> 
                        <h4 class="text-center">Dealer Mobile: <b>{{ $dealer->dealer_phone_number }}</b></h4> 
                        <h4 class="text-center">Address: <b>{{ $dealer->dealer_address }}</b></h4> 
                        <h4 class="text-center">Total Point: <b>{{ number_format($dealer->dealer_total_point, 2) }}</b></h4>
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
                                        <th>Painter</th>
                                        <th>Remarks</th>
                                        <th>DateTime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                    $totalPoint = 0;
                                ?>
                                @foreach($dealer->dealerDetails as $dealer)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        @if(isset($dealer->depot))
                                            <td>{{ $dealer->depot->name }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if(isset($dealer->product))
                                            <td>{{ $dealer->product->product_name .' '. $dealer->product->packsize .' '. $dealer->product->unit }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if(isset($dealer->product))
                                            <td>{{ $dealer->product->sku_description }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td class="text-right">{{ number_format($dealer->product_qty_dealer, 2) }}</td>
                                        <td class="text-right">{{ number_format($dealer->each_point_dealer, 2) }}</td>
                                        <td class="text-right">{{ number_format($dealer->sum_point_dealer, 2) }}</td>
                                        @if(isset($dealer->painter))
                                            <td>{{ $dealer->painter->painter_name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $dealer->dd_remarks }}</td>
                                        <td>{{ $dealer->created_at }}</td>
                                    </tr>
                                    <?php
                                        $totalPoint += $dealer->sum_point_dealer;
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