@extends('medWebsite.master')

@section('medwebtitle')
Lab Test Booking
@endsection

@section('medWebContent')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image"  data-bs-bg="{{ asset('medWeb') }}/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Ambulances Booking</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Lab Test</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container my-4">
                    <div class="row">
                        <!-- Left Side: Ambulance Info -->
                        <div class="col-lg-6 mb-4">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ asset($labtest->image) }}" alt="{{ $labtest->name }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px;">
                                </a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info mt-3 p-3 border rounded shadow-sm">
                                {{-- Lab Test Details --}}
                                <h2 class="product-title">{{ $labtest->name }}</h2>

                                <p><strong>Test Code:</strong> {{ $labtest->test_code }}</p>
                                <p><strong>Description:</strong> {{ $labtest->description }}</p>

                                {{-- Price --}}
                                <p><strong>Price:</strong>
                                    <span class="badge bg-primary">৳ {{ number_format($labtest->price, 2) }}</span>
                                </p>

                                {{-- Hospital Information --}}
                                <hr>
                                <h5 class="mt-3">Hospital Information</h5>

                                <p><strong>Name:</strong> {{ $labtest->hospital_name }}</p>
                                <p><strong>Division:</strong> {{ $labtest->hospital_division }}</p>
                                <p><strong>District:</strong> {{ $labtest->hospital_district }}</p>
                                <p><strong>Upazila:</strong> {{ $labtest->hospital_upazila }}</p>

                                @if($labtest->hospital_union)
                                    <p><strong>Union:</strong> {{ $labtest->hospital_union }}</p>
                                @endif

                                @if($labtest->hospital_ward)
                                    <p><strong>Ward:</strong> {{ $labtest->hospital_ward }}</p>
                                @endif

                                <p><strong>Address:</strong> {{ $labtest->hospital_address }}</p>

                                @if($labtest->hospital_post_code)
                                    <p><strong>Post Code:</strong> {{ $labtest->hospital_post_code }}</p>
                                @endif

                                @if($labtest->hospital_phone)
                                    <p><strong>Phone:</strong> {{ $labtest->hospital_phone }}</p>
                                @endif

                                @if($labtest->hospital_email)
                                    <p><strong>Email:</strong>
                                        <a href="mailto:{{ $labtest->hospital_email }}">{{ $labtest->hospital_email }}</a>
                                    </p>
                                @endif

                                @if($labtest->hospital_website)
                                    <p><strong>Website:</strong>
                                        <a href="{{ $labtest->hospital_website }}" target="_blank">{{ $labtest->hospital_website }}</a>
                                    </p>
                                @endif

                                {{-- Status --}}
                                <p><strong>Status:</strong>
                                    @if($labtest->status == 'Active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">In-Active</span>
                                    @endif
                                </p>
                            </div>

                        </div>

                        <!-- Right Side: Booking Form -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm p-4">
                                <h4 class="mb-3">Book This Ambulance</h4>
                                <form id="booking-form" action="{{ url('/pay') }}" method="POST">

                                    @csrf
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                    <input type="hidden" name="lab_test_id" value="{{ $labtest->id }}">
                                    <input type="hidden" name="total_amount" value="{{ $labtest->price }}">

                                    <div class="mb-3">
                                        <label for="patient_name" class="form-label">Patient Name</label>
                                        <input type="text" class="form-control" name="patient_name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="contact_number" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contact_number" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>

                                    <div class="mb-3">
                                        <label for="test_date" class="form-label">Preferred Test Date</label>
                                        <input type="date" class="form-control" name="test_date" required>
                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->
@endsection

@section('font-js')

@endsection
