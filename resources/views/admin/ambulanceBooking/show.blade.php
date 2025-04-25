@extends('admin.master')

@section('admintitle')
Ambulance Booking Show
@endsection

@section('dashboardContent')
@include('admin.layout.slidebar')
@include('admin.layout.navbar')
@include('admin.layout.rightbar')

<div class="br-mainpanel">
    <div class="br-pagetitle d-flex justify-content-between align-items-center">
        <i class="icon ion-ios-medkit-outline"></i>
        <div>
            <h4>Show Ambulance Booking</h4>
            <p class="mg-b-0">Detailed information about the booking.</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('admin.ambulance.booking.List') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper">
                <table class="table display responsive nowrap">
                    <thead>
                        <tr class="table-hover">
                            <th>ID</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->id }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>User ID</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->user_id }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Ambulance ID</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->ambulance_id }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Contact Number</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->contact_number }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Pickup Location</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->pickup_location }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Drop Location</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->drop_location }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Pickup Time</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->pickup_time }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Distance</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->distance ?? 'N/A' }} km</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Price</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->price ?? 'N/A' }} Tk</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Status</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->status }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Created At</th>
                            <th>:</th>
                            <th>{{ $ambulanceBooking->created_at }}</th>
                        </tr>
                    </thead>
                </table>

                {{-- Confirm Button --}}
                @if ($ambulanceBooking->status === 'Pending')
                    <form action="{{ route('ambulanceBooking.confirm', $ambulanceBooking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success mt-3">Confirm Booking</button>
                    </form>
                @endif

            </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
    </div>
    @include('admin.layout.footer')
</div>

@endsection
