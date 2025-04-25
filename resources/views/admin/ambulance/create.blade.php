@extends('admin.master')
@section('admintitle')
    Create Ambulance
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
                <h4>Ambulance</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('admin.ambulance') }}" class="btn btn-primary">Back</a>
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

                    <form action="{{ route('admin.ambulance.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Ambulance Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter ambulance name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Contact Number: <span class="tx-danger">*</span></label>
                                    <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="Enter contact number" value="{{ old('contact_number') }}">
                                    @error('contact_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Vehicle Number: <span class="tx-danger">*</span></label>
                                    <input type="text" name="vehicle_number" class="form-control @error('vehicle_number') is-invalid @enderror" placeholder="Enter vehicle number" value="{{ old('vehicle_number') }}">
                                    @error('vehicle_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Driver Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="driver_name" class="form-control @error('driver_name') is-invalid @enderror" placeholder="Enter driver name" value="{{ old('driver_name') }}">
                                    @error('driver_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Driver Contact: <span class="tx-danger">*</span></label>
                                    <input type="text" name="driver_contact" class="form-control @error('driver_contact') is-invalid @enderror" placeholder="Enter driver contact" value="{{ old('driver_contact') }}">
                                    @error('driver_contact')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Location: <span class="tx-danger">*</span></label>
                                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Enter location" value="{{ old('location') }}">
                                    @error('location')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Availability: <span class="tx-danger">*</span></label>
                                    <select name="availability" class="form-control custom-select mb-3 @error('availability') is-invalid @enderror">
                                        <option selected disabled hidden>Select Availability</option>
                                        <option value="Available" {{ old('availability') == 'Available' ? 'selected' : '' }}>Available</option>
                                        <option value="Busy" {{ old('availability') == 'Busy' ? 'selected' : '' }}>Busy</option>
                                        <option value="Inactive" {{ old('availability') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('availability')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price Per KM: <span class="tx-danger">*</span></label>
                                    <input type="text" name="price_per_km" class="form-control @error('price_per_km') is-invalid @enderror" placeholder="Enter price per km" value="{{ old('price_per_km') }}">
                                    @error('price_per_km')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Image:</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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

@endsection
