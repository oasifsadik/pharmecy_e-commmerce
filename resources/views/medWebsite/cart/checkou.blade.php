@extends('medWebsite.master')

@section('medwebtitle')
    Cart
@endsection

@section('medWebContent')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Checkout</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="ltn__checkout-area mb-105">
    <div class="container">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
        <div class="row">

                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">

                            <h4 class="title-2">Billing Details</h4>
                            <div class="ltn__checkout-single-content-info">

                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="Enter Your First Name....." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Enter Your Last Name......." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input placeholder="Enter Your Email......." type="email" value="{{ $user->email }}" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter Your Phone Number...." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="company_name" value="{{ $user->company_name }}" placeholder="Enter Your Company Name......">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="ltn__phone" placeholder="Company address (optional)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Country</h6>
                                            <div class="input-item">
                                                <select name="country" class="nice-select">
                                                    <option>Select Country</option>
                                                    <option>Australia</option>
                                                    <option>Canada</option>
                                                    <option>China</option>
                                                    <option>Morocco</option>
                                                    <option>Saudi Arabia</option>
                                                    <option>United Kingdom (UK)</option>
                                                    <option>United States (US)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <h6>Address</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input placeholder="Street address" value="{{ $user->address }}" name="address" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input placeholder="Apartment, suite, unit etc. (optional)" value="{{ $user->street_address }}" name="street_address" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Town / City</h6>
                                            <div class="input-item">
                                                <input type="text" name="city" value="{{ $user->city }}" placeholder="Enter Your City Name....." required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>State </h6>
                                            <div class="input-item">
                                                <input placeholder="Enter Your State / County....." type="text" value="{{ $user->state_county }}" name="state_county" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Zip</h6>
                                            <div class="input-item">
                                                <input placeholder="Enter Your Postcode / Zip....." type="text" value="{{ $user->postcode }}" name="postcode" required>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Payment Method</h4>
                        <div id="checkout_accordion_1">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="online_payment" id="online_payment">
                                            <label for="online_payment">Online Payment</label>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="cod" id="cod" checked="checked" >
                                            <label for="cod">Cash on Delivery</label>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div id="payment-instructions">
                                <p>Please select a payment method to see instructions.</p>
                            </div>
                        </div>
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                    </div>
                </div>

            <div class="col-lg-6">
                <div class="shoping-cart-total mt-50">
                    <h4 class="title-2">Cart Totals</h4>
                    <table class="table">
                        <tbody>
                            @foreach ($cartProducts as $item)
                                <tr>
                                    <td >{{ $item->name }}<strong > × {{ $item->qty }}</strong></td>
                                    <td><span>{{ number_format($item->qty * $item->price, 2) }}</span></td>
                                </tr>
                                @endforeach
                            <tr>
                                <td><strong>Order Total</strong></td>
                                <td><strong>৳{{ Cart::subtotal() }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- WISHLIST AREA START -->

<!-- CALL TO ACTION START (call-to-action-6) -->
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="img/1.jpg--">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                    <div class="coll-to-info text-color-white">
                        <h1>Buy medical disposable face mask <br> to protect your loved ones</h1>
                    </div>
                    <div class="btn-wrapper">
                        <a class="btn btn-effect-3 btn-white" href="shop.html">Explore Products <i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CALL TO ACTION END -->
@endsection
@section('font-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const onlinePaymentRadio = document.getElementById('online_payment');
        const codRadio = document.getElementById('cod');
        const paymentInstructions = document.getElementById('payment-instructions');
        const orderTotalElement = document.querySelector('.order-total .amount');
        const cartSubtotalElement = document.querySelector('.cart-subtotal .amount');
        const deliveryCharge = 100.00; // Example delivery charge

        // Get the initial subtotal from the cart
        let cartSubtotal = parseFloat(cartSubtotalElement.textContent.replace(/,/g, ''));

        function formatPrice(price) {
            return price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function updatePaymentInstructions() {
            let orderTotal = cartSubtotal;

            if (onlinePaymentRadio.checked) {
                paymentInstructions.innerHTML = "<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>";
            } else if (codRadio.checked) {
                paymentInstructions.innerHTML = "<p>You have selected Cash on Delivery. Please have the exact amount ready at the time of delivery. A delivery charge of " + formatPrice(deliveryCharge) + " will be added to your order.</p>";
                orderTotal += deliveryCharge;
            }

            orderTotalElement.textContent = formatPrice(orderTotal);
        }

        onlinePaymentRadio.addEventListener('change', updatePaymentInstructions);
        codRadio.addEventListener('change', updatePaymentInstructions);

        // Initialize with the default selection
        if (onlinePaymentRadio.checked || codRadio.checked) {
            updatePaymentInstructions();
        }
    });
</script>
@endsection
