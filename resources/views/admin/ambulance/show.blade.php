@extends('admin.master')
@section('admintitle')
Product Show
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
            <h4>Show Product</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('admin.ambulance') }}" class="btn btn-primary">Back</a>
        </div>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper">
                <table id="" class="table display responsive nowrap">
                    <thead>
                        <tr class="table-hover">
                            <th>Name</th>
                            <th>:</th>
                            <th>{{ $ambulance->name }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Contact Number</th>
                            <th>:</th>
                            <th>{{ $ambulance->contact_number }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Vehicle Number</th>
                            <th>:</th>
                            <th>{{ $ambulance->vehicle_number }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Driver Name</th>
                            <th>:</th>
                            <th>{{ $ambulance->driver_name }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Driver Contact</th>
                            <th>:</th>
                            <th>{{ $ambulance->driver_contact }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Location</th>
                            <th>:</th>
                            <th>{{ $ambulance->location }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Availability</th>
                            <th>:</th>
                            <th>
                                <span class="badge
                                    @if($ambulance->availability == 'Available') bg-success
                                    @elseif($ambulance->availability == 'Busy') bg-warning
                                    @else bg-secondary @endif">
                                    {{ $ambulance->availability }}
                                </span>
                            </th>
                        </tr>
                        <tr class="table-hover">
                            <th>Price per KM</th>
                            <th>:</th>
                            <th>৳{{ number_format($ambulance->price_per_km, 2) }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Status</th>
                            <th>:</th>
                            <th>
                                <span class="badge {{ $ambulance->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $ambulance->status }}
                                </span>
                            </th>
                        </tr>
                        <tr class="table-hover">
                            <th>Image</th>
                            <th>:</th>
                            <th>
                                @if($ambulance->image && file_exists(public_path($ambulance->image)))
                                    <img src="{{ asset($ambulance->image) }}" width="120" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </th>
                        </tr>
                    </thead>
                </table>
            </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
    </div>
    @include('admin.layout.footer')
</div>

@endsection
