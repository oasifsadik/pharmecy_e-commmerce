@extends('admin.master')
@section('admintitle')
Product Stock Show
@endsection
@section('css')
    <style>
        .image-container {
    position: relative;
    display: inline-block;
    margin: 5px;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .image-overlay {
    opacity: 1;
}

.edit-btn, .delete-btn {
    /* background-color: rgba(255, 255, 255, 0.8); */
    border: none;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
}

.edit-btn:hover, .delete-btn:hover {
    /* background-color: white; */
}

    </style>
@endsection
@section('dashboardContent')
@include('admin.layout.slidebar')
@include('admin.layout.navbar')
@include('admin.layout.rightbar')
<div class="br-mainpanel">
    <div class="br-pagetitle d-flex justify-content-between align-items-center">
        <i class="icon ion-ios-folder-outline"></i>
        <div>
            <h4>Show Product Stock</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper">
                <table id="" class="table display responsive nowrap">
                        <tr class="table-hover">
                            <th>Product Name</th>
                            <th>:</th>
                            <td>{{ $productStocks->product->product_name ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Product Quantity</th>
                            <th>:</th>
                            <td>{{ $productStocks->product_quantity }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Inner Packet</th>
                            <th>:</th>
                            <td>{{ $productStocks->inner_packet ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Single Unit</th>
                            <th>:</th>
                            <td>{{ $productStocks->single_unit ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Bottle Size</th>
                            <th>:</th>
                            <td>{{ $productStocks->bottle_size ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Manufacture Date</th>
                            <th>:</th>
                            <td>{{ $productStocks->manufacture_date ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Expiry Date</th>
                            <th>:</th>
                            <td>{{ $productStocks->expiry_date ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Buying Price</th>
                            <th>:</th>
                            <td>{{ number_format($productStocks->buying_price, 2) }} TK</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Selling Price</th>
                            <th>:</th>
                            <td>{{ number_format($productStocks->selling_price, 2) }} TK</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Inner Packet Price</th>
                            <th>:</th>
                            <td>{{ $productStocks->inner_packet_price ? number_format($productStocks->inner_packet_price, 2) . ' TK' : 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Single Unit Price</th>
                            <th>:</th>
                            <td>{{ $productStocks->single_unit_price ? number_format($productStocks->single_unit_price, 2) . ' TK' : 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Discount Type</th>
                            <th>:</th>
                            <td>{{ $productStocks->discount_type ?? 'No Discount' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Discount Value</th>
                            <th>:</th>
                            <td>
                                @if($productStocks->discount_value)
                                    @if($productStocks->discount_type == 'Percentages')
                                        {{ $productStocks->discount_value }}%
                                    @else
                                        {{ number_format($productStocks->discount_value, 2) }} TK
                                    @endif
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr class="table-hover">
                            <th>Color</th>
                            <th>:</th>
                            <td>{{ $productStocks->color ?? 'N/A' }}</td>
                        </tr>
                        <tr class="table-hover">
                            <th>Size</th>
                            <th>:</th>
                            <td>{{ $productStocks->size ?? 'N/A' }}</td>
                        </tr>
                </table>
            </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
    </div>
    @include('admin.layout.footer')
</div>

@endsection
