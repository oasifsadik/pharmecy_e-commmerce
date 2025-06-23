@extends('medWebsite.master')

@section('medwebtitle', 'Registration')

@section('medWebContent')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Account</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- REGISTRATION AREA START -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-title">Register Your Account</h1>
                <p>Please fill out the form below to create your account.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="account-login-inner">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" class="ltn__form-box contact-form-box">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="first_name" placeholder="First Name*" value="{{ old('first_name') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" placeholder="Last Name*" value="{{ old('last_name') }}">
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="company_name" placeholder="Company Name (Optional)" value="{{ old('company_name') }}">
                                <input type="text" name="address" placeholder="Street Address*" value="{{ old('address') }}">
                                <input type="text" name="street_address" placeholder="Apartment, suite, unit (Optional)" value="{{ old('street_address') }}">
                                <input type="text" name="city" placeholder="City*" value="{{ old('city') }}">
                                <input type="text" name="state_county" placeholder="State / County*" value="{{ old('state_county') }}">

                                <select name="country" class="form-control">
                                    <option value="">Select Country*</option>
                                    <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                                    <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    <!-- Add more countries if needed -->
                                </select>

                                <input type="text" name="postcode" placeholder="Postcode / Zip*" value="{{ old('postcode') }}">
                                <input type="email" name="email" placeholder="Email Address*" value="{{ old('email') }}">
                                <input type="text" name="phone" placeholder="Phone Number*" value="{{ old('phone') }}">
                                <input type="password" name="password" placeholder="Password*">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password*">
                            </div>

                            <div class="col-md-12">
                                <label class="checkbox-inline">
                                    <input type="checkbox" required>
                                    I agree to the <a href="#">Privacy Policy</a> & <a href="#">Terms of Use</a>.
                                </label>
                            </div>

                            <div class="col-md-12 mt-20">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Create Account</button>
                            </div>

                            <div class="col-md-12 text-center mt-3">
                                <a href="{{ route('login') }}">Already have an account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- REGISTRATION AREA END -->

<!-- CALL TO ACTION START -->
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="img/1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner ltn__secondary-bg text-center">
                    <h1 class="text-white">Buy medical disposable face mask <br> to protect your loved ones</h1>
                    <a class="btn btn-effect-3 btn-white mt-3" href="shop.html">Explore Products <i class="icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CALL TO ACTION END -->
@endsection
