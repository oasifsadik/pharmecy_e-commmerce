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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mg-b-25">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control custom-select mb-3" name="cat_id" id="cat_id">
                                        <option  selected disabled hidden>Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Medicine Type: <span class="tx-danger">*</span></label>
                                        <select class="form-control custom-select mb-3" name="medicine_type" id="medicine_type">
                                            <option selected disabled hidden>Medicine Type</option>
                                            <option value="tablet" {{ old('medicine_type') == 'tablet' ? 'selected' : '' }}>Tablet</option>
                                            <option value="bottle" {{ old('medicine_type') == 'bottle' ? 'selected' : '' }}>Bottle</option>
                                            <option value="general" {{ old('medicine_type') == 'general' ? 'selected' : '' }}>General</option>
                                        </select>
                                        @error('medicine_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                                      <select class="form-control custom-select mb-3" name="brand_id" id="brand_id">
                                          <option  selected disabled hidden>Select Brand</option>
                                          @foreach ($brands as $brand)
                                              <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                  {{ $brand->brand_name }}
                                              </option>
                                          @endforeach
                                      </select>
                                      @error('brand_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                  </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                      <input class="form-control @error('product_name') is-invalid @enderror" type="text" value="{{ old('product_name') }}" id="product_name" name="product_name" placeholder="Enter Product Name">
                                      @error('product_name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 dynamic-fields tablet-fields bottle-fields" style="display:none;">

                                    <div class="form-group">
                                      <label class="form-control-label">Generic Name: <span class="tx-danger">*</span></label>
                                      <input class="form-control @error('generic_name') is-invalid @enderror" type="text" value="{{ old('generic_name') }}" id="generic_name" name="generic_name" placeholder="Enter Product Generic Name">
                                      @error('generic_name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">product slug: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_slug') is-invalid @enderror" type="text" id="product_slug" value="{{ old('product_slug') }}" name="product_slug" placeholder="Product Slug" readonly>
                                    @error('product_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6 dynamic-fields tablet-fields bottle-fields" style="display:none;">
                                    <div class="form-group">
                                        <label class="form-control-label">Manufacture Date: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('manufacture_date') is-invalid @enderror" type="date" id="manufacture_date" value="{{ old('manufacture_date') }}" name="manufacture_date">
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
                                        <input class="form-control @error('expiry_date') is-invalid @enderror" type="date" id="expiry_date" value="{{ old('expiry_date') }}" name="expiry_date">
                                        @error('expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 dynamic-fields tablet-fields bottle-fields" style="display:none;">
                                  <div class="form-group">
                                    <label class="form-control-label">Batch Number: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('batch_number') is-invalid @enderror" type="text" id="batch_number" value="{{ old('batch_number') }}" name="batch_number">
                                    @error('batch_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Action:</label>
                                        <select id="action-type" class="form-control select2 @error('action') is-invalid @enderror" name="action" data-placeholder="Choose action type">
                                            <option label="Select Action Type"></option>
                                            <option value="Active" {{ old('action') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('action') == 'In-Active' ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                        @error('action')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 dynamic-fields tablet-fields bottle-fields" style="display:none;">
                                  <div class="form-group">
                                    <label class="form-control-label">Side Effects: <span class="tx-danger">*</span></label>
                                    <textarea name="side_effects" id="" cols="30" rows="5" class="form-control @error('side_effects') is-invalid @enderror">{{ old('side_effects') }}</textarea>
                                    {{-- <textarea class="form-control @error('side_effects') is-invalid @enderror" type="text" id="side_effects" value="{{ old('side_effects') }}" name="side_effects"> --}}
                                    @error('side_effects')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <h3 class="text-dark font-weight-bold">Product Quantity</h3>
                                    <p class="text-muted">Please enter the quantity of the product available.</p>
                                </div>

                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Product Quantity Or Box Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_quantity') is-invalid @enderror" value="{{ old('product_quantity') }}" type="number" name="product_quantity" placeholder="Enter Product Quantity">
                                    @error('product_quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Inner Packet Or (Pata): <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('inner_packet') is-invalid @enderror" value="{{ old('inner_packet') }}" type="number" name="inner_packet" placeholder="Enter Inner Packet Quantity">
                                        @error('inner_packet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 tablet-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Single Units : <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('single_unit') is-invalid @enderror" value="{{ old('single_unit') }}" type="number" name="single_unit" placeholder="Enter Single Unit Quantity">
                                        @error('single_unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 bottle-fields" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control-label">Bottle Size : <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('bottle_size') is-invalid @enderror" value="{{ old('bottle_size') }}" type="number" name="bottle_size" placeholder="Enter Single Bottle Size">
                                        @error('bottle_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <h3 class="text-dark font-weight-bold">Product Price</h3>
                                    <p class="text-muted">Please enter the relevant price details for the product.</p>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Buying Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('buying_price') is-invalid @enderror" value="{{ old('buying_price') }}" type="number" name="buying_price" placeholder="Enter Buying price">
                                    @error('buying_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Sellinig Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price') }}" type="number" name="selling_price" placeholder="Enter Buying price">
                                    @error('selling_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6 tablet-fields" style="display: none">
                                  <div class="form-group">
                                    <label class="form-control-label">Inner Packet Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('inner_packet_price') is-invalid @enderror" value="{{ old('inner_packet_price') }}" type="number" name="inner_packet_price" placeholder="Enter Inner Packet Price">
                                    @error('inner_packet_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6 tablet-fields" style="display: none">
                                  <div class="form-group">
                                    <label class="form-control-label">Single Unit Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('single_unit_price') is-invalid @enderror" value="{{ old('single_unit_price') }}" type="number" name="single_unit_price" placeholder="Enter Single Unit Price">
                                    @error('single_unit_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
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
                                <div class="col-lg-6 general-fields" style="display:none;">
                                    <div class="form-group">
                                      <label class="form-control-label">Color:</label>
                                      <input class="form-control @error('color') is-invalid @enderror" type="text" id="color" name="color" data-role="tagsinput" placeholder="red,green................">
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
                                      <input class="form-control @error('size') is-invalid @enderror" type="text" id="size" name="size" data-role="tagsinput" placeholder="S,L,XL................">
                                      @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Images:</label>
                                        <input class="form-control @error('images') is-invalid @enderror" type="file" name="images[]" id="formFileMultiple" multiple accept="image/*">

                                        @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Thumbnail:</label>
                                        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" id="formFileMultiple">

                                        @error('thumbnail')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Description:</label>
                                        <textarea id="summernote" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            <div class="form-layout-footer col-md-8">
                                <button type="submit" class="btn btn-info">Submit Form</button>
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
    document.getElementById('product_name').addEventListener('input', function() {
        var nameValue = this.value;
        var slugValue = nameValue.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('product_slug').value = slugValue;
    });

    document.getElementById('discount-type').addEventListener('change', function() {
        var discountValueDiv = document.getElementById('discount-value-div');
        if(this.value === 'TK' || this.value === 'Percentages'){
            discountValueDiv.style.display = 'block';
        }else{
            discountValueDiv.style.display = 'none';
        }
    });

    $(document).ready(function() {
        $('#color').tagsinput();
    });
    $(document).ready(function() {
        $('#size').tagsinput();
    });

    $('#summernote').summernote({
        height: 150,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen',] ]
        ],
        callbacks: {
                onInit: function() {
                    // Set the old value when the editor is initialized
                    $('#summernote').summernote('code', {!! json_encode(old('description')) !!});
                }
            }
        })



</script>
<script>
    $(document).ready(function() {
        $('#medicine_type').change(function() {
            var selectedValue = $(this).val();

            // First hide all dynamic fields
            $('.tablet-fields, .bottle-fields, .general-fields').hide();  // Hide tablet and bottle fields

            // Show the relevant fields based on the selected value
            if (selectedValue == 'tablet') {
                $('.tablet-fields').show();  // Show only tablet fields
            } else if (selectedValue == 'medical_accessories') {
                $('#accessory-fields').show();  // Show accessory fields
            } else if (selectedValue == 'bottle') {
                $('.bottle-fields').show();  // Show only bottle fields
            } else if (selectedValue == 'general') {
                $('.general-fields').show();  // Show general fields
            }
        });
    });
</script>


@endsection
