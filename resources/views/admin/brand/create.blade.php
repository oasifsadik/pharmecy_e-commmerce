@extends('admin.master')
@section('admintitle')
    Brand Create
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
                <h4>Brand</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('brand.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="form-layout form-layout-1">
                    <form action="{{ route('brand.store') }}" method="POST">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('brand_name') is-invalid @enderror" type="text" name="brand_name" placeholder="Enter Brand Name" value="{{ old('brand_name') }}">
                                    @error('brand_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Brand Description</label>
                                    <textarea name="brand_description" rows="5" placeholder="Enter Your Brand Description" class="form-control @error('brand_description') is-invalid @enderror">{{ old('brand_description') }}</textarea>
                                    @error('brand_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-layout-footer col-md-8">
                                <button class="btn btn-info">Submit Form</button>
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
    $(document).ready(function () {
        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });
    });
</script>
@endsection
