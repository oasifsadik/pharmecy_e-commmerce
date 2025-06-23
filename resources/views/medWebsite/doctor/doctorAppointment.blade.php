@extends('medWebsite.master')

@section('medwebtitle')
    Doctor Appointment
@endsection

@section('medWebContent')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('medWeb') }}/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Doctor Appointment</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li>Doctor Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- APPOINTMENT AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120">
    <div class="container">
        <div class="row">
            <!-- Left Side: Doctor Info -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Doctor Information</h4>
                    <div class="text-center mb-3">
                        <img src="{{ asset($doctor->profile_picture) }}" alt="Doctor Image" class="img-fluid rounded-circle" style="height: 120px; width: 120px; object-fit: cover;">
                    </div>
                    <h5>{{ $doctor->full_name }}</h5>
                    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                    <p><strong>Experience:</strong> {{ $doctor->experience }} years</p>
                    <p><strong>Gender:</strong> {{ $doctor->gender }}</p>
                    <p><strong>Email:</strong> {{ $doctor->email }}</p>
                    <p><strong>Phone:</strong> {{ $doctor->phone }}</p>

                    @if($doctor->clinic_name)
                        <p><strong>Clinic:</strong> {{ $doctor->clinic_name }}</p>
                    @endif

                    @if($doctor->clinic_address)
                        <p><strong>Clinic Address:</strong> {{ $doctor->clinic_address }}</p>
                    @endif

                    <p><strong>Location:</strong> {{ $doctor->city }}, {{ $doctor->state }}, {{ $doctor->country }}</p>

                    <p><strong>Status:</strong>
                        @if($doctor->status === 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($doctor->status === 'Pending')
                            <span class="badge bg-warning">Pending</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Right Side: Booking Form -->
            <div class="col-lg-6">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Book an Appointment</h4>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="patient_name" class="form-label">Patient Name</label>
                                    <input type="text" name="patient_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" name="age" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        

                        

                        <div class="mb-3">
                            <label for="symptoms" class="form-label">Describe Your Problem</label>
                            <textarea name="symptoms" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="report_files" class="form-label">Previous Reports or Prescriptions</label>
                            <input type="file" name="report_files[]" class="form-control" multiple accept=".pdf,.jpg,.jpeg,.png">
                        </div>


                        <div class="mb-3">
                            <label for="appointment_date" class="form-label">Appointment Date</label>
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- APPOINTMENT AREA END -->

@endsection

@section('font-js')
<!-- Custom scripts if needed -->
@endsection
