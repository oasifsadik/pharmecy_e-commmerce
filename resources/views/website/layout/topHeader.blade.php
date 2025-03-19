<div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Telephone Enquiry:</span><a href="#">01705825277</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>@if (Auth::check())
                                            <div class="ht-setting-trigger"><span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></div>
                                        @else
                                        <div class="ht-setting-trigger"><span>Setting</span></div>
                                        @endif

                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    @if (Auth::check())
                                                    <li><a href="{{ route('user.profile', auth()->user()->id) }}">My Account</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    @endif



                                                    @if (Auth::check())
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <a href="{{ route('login') }}">Sign In</a>

                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        {{-- <li>
                                            <span class="currency-selector-wrapper">Currency :</span>
                                            <div class="ht-currency-trigger"><span>TK $</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li class="active"><a href="#">USD $</a></li>
                                                </ul>
                                            </div>
                                        </li> --}}
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        {{-- <li>
                                            <span class="language-selector-wrapper">Language :</span>
                                            <div class="ht-language-trigger"><span>English</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                                    <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                                </ul>
                                            </div>
                                        </li> --}}
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
