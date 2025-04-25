@extends('admin.master')

@section('admintitle')
    Edit Lab Test
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
                <h4>Edit Lab Test</h4>
                <p class="mg-b-0">Modify existing Lab Test details.</p>
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

                    <form action="{{ route('admin.lab.test.update', $labTest->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mg-b-25">
                            {{-- Lab Test Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Lab Test Name" value="{{ old('name', $labTest->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Test Code --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Test Code: <span class="tx-danger">*</span></label>
                                    <input type="text" name="test_code" class="form-control @error('test_code') is-invalid @enderror" placeholder="Enter Test Code" value="{{ old('test_code', $labTest->test_code) }}">
                                    @error('test_code')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Lab Test Price" value="{{ old('price', $labTest->price) }}">
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
                                    @if($labTest->image)
                                        <img src="{{ asset($labTest->image) }}" alt="Lab Test Image" width="100" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control custom-select mb-3 @error('status') is-invalid @enderror">
                                        <option value="Active" {{ old('status', $labTest->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="In-Active" {{ old('status', $labTest->status) == 'In-Active' ? 'selected' : '' }}>In-Active</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hospital Fields --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Name:</label>
                                    <input type="text" name="hospital_name" class="form-control" value="{{ old('hospital_name', $labTest->hospital_name) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Division:</label>
                                    <input type="text" name="hospital_division" class="form-control" value="{{ old('hospital_division', $labTest->hospital_division) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">District:</label>
                                    <input type="text" name="hospital_district" class="form-control" value="{{ old('hospital_district', $labTest->hospital_district) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Upazila:</label>
                                    <input type="text" name="hospital_upazila" class="form-control" value="{{ old('hospital_upazila', $labTest->hospital_upazila) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Union:</label>
                                    <input type="text" name="hospital_union" class="form-control" value="{{ old('hospital_union', $labTest->hospital_union) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Ward:</label>
                                    <input type="text" name="hospital_ward" class="form-control" value="{{ old('hospital_ward', $labTest->hospital_ward) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Hospital Address:</label>
                                    <input type="text" name="hospital_address" class="form-control" value="{{ old('hospital_address', $labTest->hospital_address) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Postal Code:</label>
                                    <input type="text" name="hospital_post_code" class="form-control" value="{{ old('hospital_post_code', $labTest->hospital_post_code) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone:</label>
                                    <input type="text" name="hospital_phone" class="form-control" value="{{ old('hospital_phone', $labTest->hospital_phone) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email:</label>
                                    <input type="email" name="hospital_email" class="form-control" value="{{ old('hospital_email', $labTest->hospital_email) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Website:</label>
                                    <input type="text" name="hospital_website" class="form-control" value="{{ old('hospital_website', $labTest->hospital_website) }}">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description:</label>
                                    <textarea id="summernote" name="description">{{ old('description', $labTest->description) }}</textarea>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-layout-footer col-md-12">
                                <button type="submit" class="btn btn-info">Update Lab Test</button>
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
                $('#summernote').summernote('code', {!! json_encode(old('description', $labTest->description)) !!});
            }
        }
    })
</script>
@endsection
