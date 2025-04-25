<div class="container">
    <div class="row">
        <div class="col">
            <div class="site-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('medWeb/img/logo/logo1.png') }}" style="width: 74%" alt="Logo"></a>
            </div>
        </div>
        <div class="col header-contact-serarch-column d-none d-xl-block">
            <div class="header-contact-search">
                <!-- header-feature-item -->
                <div class="header-feature-item d-none">
                    <div class="header-feature-icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="header-feature-info">
                        <h6>Phone</h6>
                        <p><a href="tel:0123456789">+0123-456-789</a></p>
                    </div>
                </div>
                <!-- header-search-2 -->
                <div class="header-search-2">
                    <form action="{{ route('shops') }}" method="GET" style="margin-bottom: 20px;">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search here..." />
                        <button type="submit">
                            <span><i class="icon-search"></i></span>
                        </button>
                    </form>

                    {{-- <form id="#123" method="get"  action="#">
                        <input type="text" name="search" value="" placeholder="Search here..."/>
                        <button type="submit">
                            <span><i class="icon-search"></i></span>
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <!-- header-options -->
            <div class="ltn__header-options">
                <ul>
                    <li class="d-none">
                        <!-- ltn__currency-menu -->
                        <div class="ltn__drop-menu ltn__currency-menu">
                            <ul>
                                <li><a href="#" class="dropdown-toggle"><span class="active-currency">USD</span></a>
                                    <ul>
                                        <li><a href="login.html">USD - US Dollar</a></li>
                                        <li><a href="wishlist.html">CAD - Canada Dollar</a></li>
                                        <li><a href="register.html">EUR - Euro</a></li>
                                        <li><a href="account.html">GBP - British Pound</a></li>
                                        <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                        <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                        <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                        <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="d-none--- ">
                        <!-- header-search-1 -->
                        <div class="header-search-wrap d-block d-xl-none">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search  for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
                                <form id="#" method="get"  action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..."/>
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="d-none---">
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                                    <ul>
                                        @auth
                                            <li><a href="{{ route('user.profile', auth()->user()->id) }}">My Account</a></li>
                                            <li><a href="">Wishlist</a></li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                                                        Logout
                                                    </button>
                                                </form>
                                            </li>
                                        @else
                                            <li><a href="{{ route('login') }}">Sign in</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @endauth
                                    </ul>

                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <!-- mini-cart 2 -->
                        <div class="mini-cart-icon mini-cart-icon-2">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                <span class="mini-cart-icon">
                                    <i class="icon-shopping-cart"></i>
                                    <sup>{{ Cart::content()->count() }}</sup>
                                </span>
                                <h6><span>Your Cart</span> <span class="ltn__secondary-color">{{ Cart::subtotal() }}</span></h6>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
