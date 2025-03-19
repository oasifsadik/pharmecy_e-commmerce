<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecommerce | Doctor Register</title>


    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bracket.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ">

        <div class="pd-25 pd-xs-40 bg-white rounded shadow-base mt-4 mb-4">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <span class="tx-normal">[</span> Doctor <span class="tx-info">Sign Up</span> <span class="tx-normal">]</span>
            </div>

            <div class="registration-container">
                <form action="{{ route('register.submit.doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                            @error('full_name') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}" required>
                            @error('state') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Experience</label>
                            <input type="number" name="experience" class="form-control" value="{{ old('experience') }}" required>
                            @error('experience') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Specialization</label>
                            <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}" required>
                            @error('specialization') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>License Number</label>
                            <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}" required>
                            @error('license_number') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Clinic Name</label>
                            <input type="text" name="clinic_name" class="form-control" value="{{ old('clinic_name') }}">
                            @error('clinic_name') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Clinic Address</label>
                            <input type="text" name="clinic_address" class="form-control" value="{{ old('clinic_address') }}">
                            @error('clinic_address') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}" required>
                            @error('country') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                            @error('city') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control">
                            @error('profile_picture') <small class="text-danger">{{ $message }}</small> @enderror

                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 w-100">Register</button>
                </form>
            </div>


    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        @if(Session::has('message'))
            toastr.success("{{ session()->get('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ session()->get('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ session()->get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ session()->get('warning') }}");
        @endif
    });
</script>


</body>
</html>
