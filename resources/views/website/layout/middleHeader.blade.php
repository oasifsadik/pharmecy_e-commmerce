<div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
    <div class="container">
        <div class="row">
            <!-- Begin Header Logo Area -->
            <div class="col-lg-3">
                <div class="logo pb-sm-30 pb-xs-30">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('fontend/images/ban2.png') }}"  height="80px" alt="">
                    </a>
                </div>
            </div>
            <!-- Header Logo Area End Here -->
            <!-- Begin Header Middle Right Area -->
            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                <!-- Begin Header Middle Searchbox Area -->
                <form action="#" class="hm-searchbox">
                    <select class="nice-select select-search-category">
                        <option value="0">All</option>
                        <option value="10">Laptops</option>
                        <option value="17">- -  Prime Video</option>
                        <option value="20">- - - -  All Videos</option>
                        <option value="21">- - - -  Blouses</option>
                        <option value="22">- - - -  Evening Dresses</option>
                        <option value="23">- - - -  Summer Dresses</option>
                        <option value="24">- - - -  T-shirts</option>
                        <option value="25">- - - -  Rent or Buy</option>
                        <option value="26">- - - -  Your Watchlist</option>
                        <option value="27">- - - -  Watch Anywhere</option>
                        <option value="28">- - - -  Getting Started</option>
                        <option value="18">- - - -  Computers</option>
                        <option value="29">- - - -  More to Explore</option>
                        <option value="30">- - - -  TV &amp; Video</option>
                        <option value="31">- - - -  Audio &amp; Theater</option>
                        <option value="32">- - - -  Camera, Photo </option>
                        <option value="33">- - - -  Cell Phones</option>
                        <option value="34">- - - -  Headphones</option>
                        <option value="35">- - - -  Video Games</option>
                        <option value="36">- - - -  Wireless Speakers</option>
                        <option value="19">- - - -  Electronics</option>
                        <option value="37">- - - -  Amazon Home</option>
                        <option value="38">- - - -  Kitchen &amp; Dining</option>
                        <option value="39">- - - -  Furniture</option>
                        <option value="40">- - - -  Bed &amp; Bath</option>
                        <option value="41">- - - -  Appliances</option>
                        <option value="11">TV &amp; Audio</option>
                        <option value="42">- -  Chamcham</option>
                        <option value="45">- - - -  Office</option>
                        <option value="47">- - - -  Gaming</option>
                        <option value="48">- - - -  Chromebook</option>
                        <option value="49">- - - -  Refurbished</option>
                        <option value="50">- - - -  Touchscreen</option>
                        <option value="51">- - - -  Ultrabooks</option>
                        <option value="52">- - - -  Blouses</option>
                        <option value="43">- -  Sanai</option>
                        <option value="53">- - - -  Hard Drives</option>
                        <option value="54">- - - -  Graphic Cards</option>
                        <option value="55">- - - -  Processors (CPU)</option>
                        <option value="56">- - - -  Memory</option>
                        <option value="57">- - - -  Motherboards</option>
                        <option value="58">- - - -  Fans &amp; Cooling</option>
                        <option value="59">- - - -  CD/DVD Drives</option>
                        <option value="44">- -  Meito</option>
                        <option value="60">- - - -  Sound Cards</option>
                        <option value="61">- - - -  Cases &amp; Towers</option>
                        <option value="62">- - - -  Casual Dresses</option>
                        <option value="63">- - - -  Evening Dresses</option>
                        <option value="64">- - - -  T-shirts</option>
                        <option value="65">- - - -  Tops</option>
                        <option value="12">Smartphone</option>
                        <option value="66">- -  Camera Accessories</option>
                        <option value="68">- - - -  Octa Core</option>
                        <option value="69">- - - -  Quad Core</option>
                        <option value="70">- - - -  Dual Core</option>
                        <option value="71">- - - -  7.0 Screen</option>
                        <option value="72">- - - -  9.0 Screen</option>
                        <option value="73">- - - -  Bags &amp; Cases</option>
                        <option value="67">- -  XailStation</option>
                        <option value="74">- - - -  Batteries</option>
                        <option value="75">- - - -  Microphones</option>
                        <option value="76">- - - -  Stabilizers</option>
                        <option value="77">- - - -  Video Tapes</option>
                        <option value="78">- - - -  Memory Card Readers</option>
                        <option value="79">- - - -  Tripods</option>
                        <option value="13">Cameras</option>
                        <option value="14">headphone</option>
                        <option value="15">Smartwatch</option>
                        <option value="16">Accessories</option>
                    </select>
                    <input type="text" placeholder="Enter your search key ...">
                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <!-- Header Middle Searchbox Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="header-middle-right">
                    <ul class="hm-menu">
                        <!-- Begin Header Middle Wishlist Area -->
                        <li class="hm-wishlist">
                            <a href="wishlist.html">
                                <span class="cart-item-count wishlist-item-count">0</span>
                                <i class="fa fa-heart-o"></i>
                            </a>
                        </li>
                        <!-- Header Middle Wishlist Area End Here -->
                        <!-- Begin Header Mini Cart Area -->
                        <li class="hm-minicart">
                            <div class="hm-minicart-trigger">
                                <span class="item-icon"></span>
                                <span class="item-text">৳
                                    {{ Cart::priceTotal() }}
                                    <span class="cart-item-count">{{ Cart::count();}}</span>
                                </span>
                            </div>
                            <span></span>
                            <div class="minicart">
                                <ul class="minicart-product-list">
                                    @php
                                        $cartProducts = Cart::content();
                                    @endphp
                                    @foreach ($cartProducts as $item)
                                    <li>
                                        <a href="" class="minicart-product-image">
                                            <img src="{{ asset('storage/' . $item->options->thumbnail) }}" alt="cart products">
                                        </a>
                                        <div class="minicart-product-details">
                                            <h6><a href="">{{ $item->name }}</a></h6>
                                            <span>{{ number_format((float) $item->price * (float) $item->qty, 2) }} x {{ $item->qty }}</span>
                                        </div>
                                        <a href="{{ route('cart.remove', $item->rowId) }}" class="close" title="Remove">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <p class="minicart-total">SUBTOTAL: <span>{{ number_format((float) Cart::subtotal(), 2) }}</span></p>
                                <div class="minicart-button">
                                    <a href="{{ route('cart.products') }}" class="li-button li-button-fullwidth li-button-dark">
                                        <span>{{ __('View Full Cart') }}</span>
                                    </a>
                                    <a href="" class="li-button li-button-fullwidth">
                                        <span>{{ __('Checkout') }}</span>
                                    </a>
                                </div>
                            </div>


                        </li>
                        <!-- Header Mini Cart Area End Here -->
                    </ul>
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
            <!-- Header Middle Right Area End Here -->
        </div>
    </div>
</div>
