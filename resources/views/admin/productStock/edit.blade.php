@extends('admin.master')
@section('admintitle')
    Create Medicine
@endsection
@section('css')
    <style>
        textarea {
            width: 100%;
        }
        .invalid-feedback {
            display: block;
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
                <h4>Medicine</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="form-layout form-layout-1">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.product.stock.update' , $productStocks->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select id="product_id" name="product_id" class="form-control select2" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}"
                                        data-medicine-type="{{ $product->medicine_type }}"
                                        {{ $productStocks->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>


                        <div class="container mt-4">
                            <!-- Product Quantity Section -->
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <h3 class="text-dark font-weight-bold">Product Quantity</h3>
                                    <p class="text-muted">Please enter the quantity of the product available.</p>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Quantity Or Box Quantity: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('product_quantity') is-invalid @enderror" value="{{ old('product_quantity', $productStocks->product_quantity) }}" type="number" name="product_quantity" placeholder="Enter Product Quantity">
                                        @error('product_quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Inner Packet (Tablet) Fields -->
                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Inner Packet Or (Pata): <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('inner_packet') is-invalid @enderror" value="{{ old('inner_packet', $productStocks->inner_packet) }}" type="number" name="inner_packet" placeholder="Enter Inner Packet Quantity">
                                        @error('inner_packet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Single Units: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('single_unit') is-invalid @enderror" value="{{ old('single_unit', $productStocks->single_unit) }}" type="number" name="single_unit" placeholder="Enter Single Unit Quantity">
                                        @error('single_unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bottle Size Fields -->
                                <div class="col-lg-6 bottle-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Bottle Size: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('bottle_size') is-invalid @enderror" value="{{ old('bottle_size', $productStocks->bottle_size) }}" type="number" name="bottle_size" placeholder="Enter Single Bottle Size">
                                        @error('bottle_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 dynamic-fields tablet-fields bottle-fields" style="display:none;">
                                    <div class="form-group">
                                        <label class="form-control-label">Manufacture Date: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('manufacture_date') is-invalid @enderror" type="date" id="manufacture_date" value="{{ old('manufacture_date', $productStocks->manufacture_date) }}" name="manufacture_date">
                                        @error('manufacture_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 dynamic-fields tablet-fields bottle-fields" style="display:none;">
                                    <div class="form-group">
                                        <label class="form-control-label">Expiry Date: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('expiry_date') is-invalid @enderror" type="date" id="expiry_date" value="{{ old('expiry_date', $productStocks->expiry_date) }}" name="expiry_date">
                                        @error('expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Price Section -->
                                <div class="col-lg-12 mb-4">
                                    <h3 class="text-dark font-weight-bold">Product Price</h3>
                                    <p class="text-muted">Please enter the relevant price details for the product.</p>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Buying Price: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('buying_price') is-invalid @enderror" value="{{ old('buying_price', $productStocks->buying_price) }}" type="number" name="buying_price" placeholder="Enter Buying Price">
                                        @error('buying_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price', $productStocks->selling_price) }}" type="number" name="selling_price" placeholder="Enter Selling Price">
                                        @error('selling_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Inner Packet Price (Tablet) -->
                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Inner Packet Price: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('inner_packet_price') is-invalid @enderror" value="{{ old('inner_packet_price', $productStocks->inner_packet_price) }}" type="number" name="inner_packet_price" placeholder="Enter Inner Packet Price">
                                        @error('inner_packet_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Single Unit Price: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('single_unit_price') is-invalid @enderror" value="{{ old('single_unit_price', $productStocks->single_unit_price) }}" type="number" name="single_unit_price" placeholder="Enter Single Unit Price">
                                        @error('single_unit_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Discount Section -->
                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Discount Type:</label>
                                    <select id="discount-type" class="form-control select2" name="discount_type" data-placeholder="Choose country">
                                        <option label="Select Discount Type"></option>
                                        <option value="TK" {{ old('discount_type') == 'TK' ? 'selected':'' }}>TK</option>
                                        <option value="Percentages" {{ old('discount_type') == 'Percentages' ? 'selected':'' }}>percentages</option>
                                    </select>
                                    @error('discount_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="discount-value-div" class="form-group" style="{{ old('discount_type') ? '' : 'display: none' }}">
                                        <label class="form-control-label">Discount Value: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('discount_value') is-invalid @enderror" type="number" name="discount_value" placeholder="Enter Discount Value" value="{{ old('discount_value') }}">
                                        @error('discount_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- General Fields (Color, Size) -->
                                <div class="col-lg-6 general-fields" style="display:none;">
                                    <div class="form-group">
                                      <label class="form-control-label">Color:</label>
                                      <input class="form-control @error('color') is-invalid @enderror" value="{{ $productStocks->color }}" type="text" id="color" name="color" data-role="tagsinput" placeholder="red,green................">
                                      @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 general-fields" style="display:none;">
                                    <div class="form-group">
                                      <label class="form-control-label">Size:</label>
                                      <input class="form-control @error('size') is-invalid @enderror" value="{{ $productStocks->size }}" type="text" id="size" name="size" data-role="tagsinput" placeholder="S,L,XL................">
                                      @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    </div>
                                </div>

                                <!-- Image Upload Section -->
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-info">Add Product Stock</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
@endsection

@section('js__')
<script>
    $(document).ready(function() {
        // Initialize Select2 on the select element
        $('#product_id').select2({
            theme: 'bootstrap4', // Use bootstrap4 theme
            templateResult: formatProduct, // Custom template for each option
            templateSelection: formatSelection // Custom selection format
        });

        // Function to format the option item (using data-medicine-type)
        function formatProduct(product) {
            if (!product.id) { return product.text; }
            var medicineType = $(product.element).data('medicine-type');
            return $("<span>" + product.text + " <small>(" + medicineType + ")</small></span>");
        }

        // Function to format the selected item
        function formatSelection(product) {
            return product.text; // Display the selected product name
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('#color').tagsinput();
        $('#size').tagsinput();
    });

    document.addEventListener('DOMContentLoaded', function () {
        const discountType = document.getElementById('discount-type');
        const discountValueDiv = document.getElementById('discount-value-div');

        // Toggle discount value input based on discount type selection
        discountType.addEventListener('change', function () {
            if (this.value === 'TK' || this.value === 'Percentages') {
                discountValueDiv.style.display = 'block';
            } else {
                discountValueDiv.style.display = 'none';
            }
        });

        // Toggle product-specific fields based on product selection
        const productSelect = document.getElementById('product_id');
        const productType = productSelect.options[productSelect.selectedIndex]?.dataset.medicineType;

        function toggleProductFields(productType) {
            // Hide all fields initially
            document.querySelectorAll('.tablet-fields, .bottle-fields, .general-fields').forEach((field) => {
                field.style.display = 'none';
            });

            // Show fields based on the selected product type
            if (productType === 'tablet') {
                document.querySelectorAll('.tablet-fields').forEach((field) => {
                    field.style.display = 'block';
                });
            } else if (productType === 'bottle') {
                document.querySelectorAll('.bottle-fields').forEach((field) => {
                    field.style.display = 'block';
                });
            } else if (productType === 'general') {
                document.querySelectorAll('.general-fields').forEach((field) => {
                    field.style.display = 'block';
                });
            }
        }

        // Set fields based on selected product on page load
        toggleProductFields(productType);

        // Add event listener for change event
        productSelect.addEventListener('change', function () {
            toggleProductFields(this.options[this.selectedIndex]?.dataset.medicineType);
        });
    });
</script>

@endsection
