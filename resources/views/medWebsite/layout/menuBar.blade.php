@php
    use App\Models\Category;
    $categories = Category::all();
@endphp

<div class="container">
    <div class="row">
        <div class="col-lg-3 align-self-center">
            <!-- CATEGORY-MENU-LIST START -->
            <div class="ltn__category-menu-wrap ltn__category-dropdown-hide ltn__category-menu-with-header-menu">
                <div class="ltn__category-menu-title">
                    <h2 class="section-bg-1--- ltn__secondary-bg text-color-white">categories</h2>
                </div>
                <div class="ltn__category-menu-toggle">
                    <ul>
                        @foreach ($categories as $category)
                        <li class="ltn__category-menu-item">
                            <a href="{{ route('shop.category', ['id' => $category->id]) }}"><i class="icon-shopping-bags"></i>{{ $category->category_name ?? '' }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END CATEGORY-MENU-LIST -->
        </div>
        <div class="col-lg-8">
            <div class="col--- header-menu-column justify-content-center---">
                <div class="header-menu header-menu-2 text-start">
                    <nav>
                        <div class="ltn__main-menu">
                            <ul>
                                <li class="menu-icon"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="menu-icon"><a href="{{ route('shops') }}">Shop</a>
                                <li class="menu-icon"><a href="{{ route('doctors') }}">Doctor</a>

                                </li>

                                </li>
                                <li class="menu-icon"><a href="{{ route('lab.test.services') }}">Lab Test</a>
                                </li>
                                <li class="menu-icon"><a href="{{ route('ambulance.services') }}">Ambulance</a>
                                <li class="menu-icon"><a href="{{ route('prescription') }}">Prescription</a>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

        </div>
        <div class="col-lg-1 align-self-center d-none d-xl-block">
            <div class="header-contact-info text-end">
                <a class="font-weight-6 ltn__primary-color" href="tel:+123456789"><span class="ltn__secondary-color"><i class="icon-call font-weight-7"></i></span></a>
            </div>
        </div>
    </div>
</div>
