@extends('admin.master')
@section('admintitle')
    Create Lab Test
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
                <h4>Lab Test</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('admin.lab.test') }}" class="btn btn-primary">Back</a>
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

                    <form action="{{ route('admin.lab.test.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            {{-- Lab Test Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Lab Test Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Lab Test Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Test Code --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Test Code: <span class="tx-danger">*</span></label>
                                    <input type="text" name="test_code" class="form-control @error('test_code') is-invalid @enderror" placeholder="Enter Test Code" value="{{ old('test_code') }}">
                                    @error('test_code')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Lab Test Price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Image:</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control custom-select mb-3 @error('status') is-invalid @enderror">
                                        <option selected disabled hidden>Select Status</option>
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="In-Active" {{ old('status') == 'In-Active' ? 'selected' : '' }}>In-Active</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="hospital_name" class="form-control @error('hospital_name') is-invalid @enderror" placeholder="Enter Hospital Name" value="{{ old('hospital_name') }}">
                                    @error('hospital_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Division --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Division: <span class="tx-danger">*</span></label>
                                    <input type="text" name="hospital_division" class="form-control @error('hospital_division') is-invalid @enderror" placeholder="Enter Division Name" value="{{ old('hospital_division') }}">
                                    @error('hospital_division')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital District --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital District: <span class="tx-danger">*</span></label>
                                    <input type="text" name="hospital_district" class="form-control @error('hospital_district') is-invalid @enderror" placeholder="Enter District Name" value="{{ old('hospital_district') }}">
                                    @error('hospital_district')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Upazila --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Upazila: <span class="tx-danger">*</span></label>
                                    <input type="text" name="hospital_upazila" class="form-control @error('hospital_upazila') is-invalid @enderror" placeholder="Enter Upazila Name" value="{{ old('hospital_upazila') }}">
                                    @error('hospital_upazila')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Union --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Union:</label>
                                    <input type="text" name="hospital_union" class="form-control @error('hospital_union') is-invalid @enderror" placeholder="Enter Union Name" value="{{ old('hospital_union') }}">
                                    @error('hospital_union')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Ward --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Ward:</label>
                                    <input type="text" name="hospital_ward" class="form-control @error('hospital_ward') is-invalid @enderror" placeholder="Enter Ward Number/Name" value="{{ old('hospital_ward') }}">
                                    @error('hospital_ward')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Address --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Address: <span class="tx-danger">*</span></label>
                                    <input type="text" name="hospital_address" class="form-control @error('hospital_address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('hospital_address') }}">
                                    @error('hospital_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Post Code --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Postal Code:</label>
                                    <input type="text" name="hospital_post_code" class="form-control @error('hospital_post_code') is-invalid @enderror" placeholder="Enter Postal Code" value="{{ old('hospital_post_code') }}">
                                    @error('hospital_post_code')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Phone --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Phone:</label>
                                    <input type="text" name="hospital_phone" class="form-control @error('hospital_phone') is-invalid @enderror" placeholder="Enter Phone Number" value="{{ old('hospital_phone') }}">
                                    @error('hospital_phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Email:</label>
                                    <input type="email" name="hospital_email" class="form-control @error('hospital_email') is-invalid @enderror" placeholder="Enter Email Address" value="{{ old('hospital_email') }}">
                                    @error('hospital_email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Website --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Website:</label>
                                    <input type="text" name="hospital_website" class="form-control @error('hospital_website') is-invalid @enderror" placeholder="Enter Website URL" value="{{ old('hospital_website') }}">
                                    @error('hospital_website')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description:</label>
                                    <textarea id="summernote" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="form-layout-footer col-md-12">
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


@endsection
