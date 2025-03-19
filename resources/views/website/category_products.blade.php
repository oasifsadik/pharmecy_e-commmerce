@extends('website.master')

@section('fontCss')
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

    .sidebar-link:hover {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    .sidebar-link.active {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    /* Product Styling */
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-card {
        flex: 1 1 calc(33.333% - 20px);
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .product-card h4 {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    .product-card p {
        font-size: 14px;
        color: #555;
    }

    .product-card .price {
        font-size: 16px;
        color: #175CFF;
        font-weight: bold;
    }

    .product-card .btn {
        margin-top: 10px;
    }
</style>
@endsection

@section('webContent')
<header>
    <!-- Begin Header Top Area -->
    @include('website.layout.topHeader')
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    @include('website.layout.middleHeader')
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    @include('website.layout.menuBar')
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<div class="container mt-5 p-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('category.products', $category->id) }}" class="sidebar-link {{ Request::is('category/'.$category->id) ? 'active':'' }}">{{ $category->category_name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h3 class="profile-title">{{ $category->category_name }} Products</h3>
            <div class="product-grid">
                @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="{{ $product->product_name }}">
                    <h4>{{ $product->product_name }}</h4>
                    <p class="price">${{ $product->selling_price }}</p>
                    <a href="{{ route('singleProduct', $product->id) }}" class="btn btn-primary">View Product</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('website.layout.footer')
<!-- Footer Area End Here -->

<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                       <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="images/product/large-size/1.jpg" alt="product image">
                                </div>
                                <!-- Additional Product Images -->
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Today is a good day Framed poster</h2>
                                <span class="product-details-ref">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">$57.98</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</span>
                                    </p>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity">
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="#"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
