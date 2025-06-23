@extends('admin.master')

@section('admintitle')
    Order Details
@endsection

@section('dashboardContent')
    @include('admin.layout.slidebar')
    @include('admin.layout.navbar')
    @include('admin.layout.rightbar')

    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-photos-outline"></i>
            <div>
                <h4>Order Details</h4>
                <p class="mg-b-0">Detailed view of the order.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                {{-- 🧾 Order Information --}}
                <h6 class="br-section-label">Order Information</h6>
                <p class="br-section-text">Details of the selected order.</p>

                @if($orderDetails->items->count())
                    {{-- 🛒 Product Order --}}
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table mg-b-0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Thumbnail</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails->items as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>
                                            @if($item->product && $item->product->thumbnail)
                                                <img src="{{ asset('storage/' . $item->product->thumbnail) }}" height="80px" alt="{{ $item->product_name }}">
                                            @else
                                                <img src="{{ asset('images/no-image.png') }}" height="80px" alt="No Image">
                                            @endif
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                    <td>${{ $orderDetails->total_price }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @else
                    {{-- 📄 Prescription Order Only --}}
                    <div class="mt-4">
                        <h6>Prescription Information</h6>
                        @php $prescription = $orderDetails->prescribMedicine->first(); @endphp

                        @if($prescription)
                            <p><strong>Type:</strong> {{ ucfirst($prescription->type) }}</p>
                            <p><strong>Phone:</strong> {{ $prescription->phone }}</p>
                            <p><strong>Medicine Duration:</strong> {{ $prescription->medicine_duration }} days</p>
                            <p><strong>Reminder:</strong> {{ $prescription->reminder ? 'Yes' : 'No' }}</p>

                            @if($prescription->type === 'upload')
                                <p><strong>Prescription File:</strong></p>
                                <a href="{{ asset('storage/' . $prescription->file) }}" target="_blank">View Prescription</a>
                                @elseif($prescription->type === 'manual')
                                    @php
                                        $medicines = is_array($prescription->medicines)
                                            ? $prescription->medicines
                                            : json_decode($prescription->medicines, true);
                                    @endphp

                                @if(is_array($medicines))
                                    <table class="table table-bordered mt-2">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Morning</th>
                                                <th>Afternoon</th>
                                                <th>Night</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($medicines as $med)
                                                    @php
                                                        // Get doses for morning, afternoon, and night (default to 0 if not provided)
                                                        $morning = (int)($med['doses']['morning'] ?? 0);
                                                        $afternoon = (int)($med['doses']['afternoon'] ?? 0);
                                                        $night = (int)($med['doses']['night'] ?? 0);
                                                        
                                                        // Calculate total doses for this medicine per day
                                                        $dailyTotal = $morning + $afternoon + $night;

                                                        // Calculate the total doses required for the entire duration of the prescription
                                                        $totalDoses = $dailyTotal * $prescription->medicine_duration;
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $med['name'] }}<br>
                                                            <small class=" text-danger"><strong class="text-dark">Total Doses for {{ $prescription->medicine_duration }} days:</strong> {{ $totalDoses }}</small>
                                                        </td>
                                                        <td>{{ $morning }}</td>
                                                        <td>{{ $afternoon }}</td>
                                                        <td>{{ $night }}</td>
                                                    </tr>
                                                @endforeach


                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-danger">Invalid medicine format.</p>
                                @endif

                                @endif
                            @else
                            <p class="text-danger">No prescription data found.</p>
                        @endif
                    </div>
                @endif

                {{-- 👤 Customer Information --}}
                <div class="mt-4">
                    <h6>Customer Details</h6>
                    <p><strong>Name:</strong> {{ $orderDetails->first_name }} {{ $orderDetails->last_name }}</p>
                    <p><strong>City:</strong> {{ $orderDetails->city }}</p>
                    <p><strong>State:</strong> {{ $orderDetails->state_county }}</p>
                    <p><strong>Post Code:</strong> {{ $orderDetails->postcode }}</p>
                    <p><strong>Address:</strong> {{ $orderDetails->address }}</p>
                    <p><strong>Street Address:</strong> {{ $orderDetails->street_address }}</p>
                    <p><strong>Phone:</strong> {{ $orderDetails->phone }}</p>
                </div>

                {{-- ✅ Confirm Button --}}
                <div class="mt-4">
                    <form action="{{ route('admin.order.confirm', $orderDetails->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Confirm Order</button>
                    </form>
                </div>

            </div>
        </div>

        @include('admin.layout.footer')
    </div>
@endsection
