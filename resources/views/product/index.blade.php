@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h3 class="box-title">Product List</h3> 
                    	<div class="box-tools pull-right">
                    		<a href="{{ url('product/create') }}" class="btn btn-primary btn-flat"> <i class="fa fa-plus"></i> Create Product</a>
                    	</div>
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th class="text-right">Packsize</th>
                                        <th>Unit</th>
                                        <th>SKU Code</th>
                                        <th>SKU Description</th>
                                        <th class="text-right">Painter Point</th>
                                        <th class="text-right">Dealer Point</th>
                                        <!-- <th>Status</th> -->
                                        <th>Remarks</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td class="text-right">{{ number_format($product->packsize, 3) }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ $product->sku_code }}</td>
                                        <td>{{ $product->sku_description }}</td>
                                        <td class="text-right">{{ number_format($product->painter_benefit_point, 2) }}</td>
                                        <td class="text-right">{{ number_format($product->dealer_benefit_point, 2) }}</td>
                                        <!-- <td>{{ $product->status }}</td> -->
                                        <td>{{ $product->remarks }}</td>
                                        <td>{!! Html::link("product/$product->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td>
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