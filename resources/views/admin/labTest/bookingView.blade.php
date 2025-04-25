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
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
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
                            <th>{{ $booking->name }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Test Name</th>
                            <th>:</th>
                            <th>{{ $booking->labTest->name }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Email</th>
                            <th>:</th>
                            <th>{{ $booking->email }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Phone</th>
                            <th>:</th>
                            <th>{{ $booking->phone }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Amount</th>
                            <th>:</th>
                            <th>{{ $booking->amount }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Address</th>
                            <th>:</th>
                            <th>{{ $booking->address }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Test Date</th>
                            <th>:</th>
                            <th>{{ $booking->test_date }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Status</th>
                            <th>:</th>
                            <th>{{ $booking->status }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Transaction ID</th>
                            <th>:</th>
                            <th>{{ $booking->transaction_id }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Currency</th>
                            <th>:</th>
                            <th>{{ $booking->currency }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Created At</th>
                            <th>:</th>
                            <th>{{ $booking->created_at }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th>Updated At</th>
                            <th>:</th>
                            <th>{{ $booking->updated_at }}</th>
                        </tr>
                    </thead>
                </table>

            </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
    </div>
    @include('admin.layout.footer')
</div>

@endsection
