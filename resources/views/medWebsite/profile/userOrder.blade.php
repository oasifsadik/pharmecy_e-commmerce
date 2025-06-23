@extends('medWebsite.master')

@section('medwebtitle')
    Home
@endsection
@section('mw-css')
<style>
    /* Sidebar Styling */
    .sidebar {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .list-group-item {
        border: none;
        padding: 10px 0;
    }

    .sidebar-link {
        display: block;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    /* Hover effect */
    .sidebar-link:hover {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    /* Active state */
    .sidebar-link.active {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    .list-group-item:not(:last-child) {
        margin-bottom: 10px;
    }

    /* Profile Styling */
    .profile-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .profile-title {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .profile-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .profile-item {
        flex: 1 1 48%;
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-item h5 {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }

    .profile-item p {
        font-size: 14px;
        color: #555;
    }
</style>
@endsection
@section('medWebContent')
<div class="container mt-5 p-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar">
                <h3 class="sidebar-title">User Menu</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('user.profile', auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.profile') ? 'active' : '' }}">Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.order', auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.order') ? 'active' : '' }}">Orders</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.order.deliver', auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.order.deliver', auth()->user()->id) ? 'active':'' }}">Deliver Order</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="orders-container">
                <h3 class="orders-title">Your Orders</h3>

                @if($userOrders->isEmpty())
                    <p>No orders found.</p>
                @else
                    @foreach($userOrders as $order)
                        <div class="order-item">
                            <h5>Order #{{ $order->id }}</h5>
                            <p>Status: {{ $order->status }}</p>
                            <p>Total Amount: ${{ $order->total_price }}</p>
                            <p>Order Date: {{ $order->created_at->format('d M, Y') }}</p>
                        </div>
                    @endforeach

                    <!-- Pagination Links -->
                    <div class="pagination-links">
                        {{ $userOrders->links() }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
