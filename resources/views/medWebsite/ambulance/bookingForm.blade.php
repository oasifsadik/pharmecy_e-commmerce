@extends('medWebsite.master')

@section('medwebtitle')
    Ambulance Booking
@endsection

@section('mw-css')
<style>
    .product-ratting i {
            color: #ccc;
            font-size: 24px;
            transition: color 0.3s;
        }

        .product-ratting i.selected {
            color: gold !important;
        }
</style>
@endsection

@section('medWebContent')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image"  data-bs-bg="{{ asset('medWeb') }}/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Ambulances Booking</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Ambulance Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container my-4">
                    <div class="row">
                        <!-- Left Side: Ambulance Info -->
                        <div class="col-lg-6 mb-4">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ asset($ambulance->image) }}" alt="{{ $ambulance->name }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px;">
                                </a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">{{ $ambulance->availability }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info mt-3">
                                <h2 class="product-title">{{ $ambulance->name }}</h2>
                                <p><strong>Driver:</strong> {{ $ambulance->driver_name }}</p>
                                <p><strong>Location:</strong> {{ $ambulance->location }}</p>
                                <p><strong>Ambulance Number:</strong> {{ $ambulance->vehicle_number }}</p>
                                <div class="product-price">
                                    <span class="badge bg-primary">৳{{ number_format($ambulance->price_per_km, 2) }}/km</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Booking Form -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm p-4">
                                <h4 class="mb-3">Book This Ambulance</h4>
                                <form id="booking-form" action="{{ route('ambulance.booikng') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ambulance_id" value="{{ $ambulance->id }}">
                                    <div class="mb-3">
                                        <label for="contact_number" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contact_number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pickup_location" class="form-label">Pickup Location</label>
                                        <input type="text" class="form-control" name="pickup_location" id="pickup_location" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="drop_location" class="form-label">Drop Location</label>
                                        <input type="text" class="form-control" name="drop_location" id="drop_location" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pickup_time" class="form-label">Pickup Time</label>
                                        <input type="datetime-local" class="form-control" name="pickup_time" required>
                                    </div>
                                    <div class="mb-3" id="distance-info" style="display: none;">
                                        <label for="distance" class="form-label">Distance (in km)</label>
                                        <input type="text" class="form-control" name="distance" id="distance" readonly>
                                    </div>
                                    <div class="mb-3" id="price-info" style="display: none;">
                                        <label for="price" class="form-label">Total Price</label>
                                        <input type="text" class="form-control" name="price" id="price" readonly>
                                    </div>

                                    <button type="button" class="btn btn-secondary w-100 mb-2" id="calculate-distance">Calculate Distance & Price</button>
                                    <button type="submit" class="btn btn-primary w-100" id="confirm-booking" style="display: none;">Confirm Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Map Display -->
                    <div id="map" style="height: 400px; margin-top: 20px;"></div>
                </div>
            </div>
             <!-- Shop Tab Start -->
            <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                <div class="ltn__shop-details-tab-menu">
                    <div class="nav">
                        <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_2">Reviews</a>

                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_details_1_2">
                        <div class="ltn__shop-details-tab-content-inner">
                            <h4 class="title-2">Customer Reviews</h4>
                            <div class="product-ratting">
                                <ul >
                                    @php
                                        $filledStars = floor($averageRating);
                                        $halfStar = ($averageRating - $filledStars) >= 0.5;
                                        $emptyStars = 5 - $filledStars - ($halfStar ? 1 : 0);
                                    @endphp

                                    @for ($i = 0; $i < $filledStars; $i++)
                                        <li><i style="color: gold" class="fas fa-star"></i></li>
                                    @endfor

                                    @if ($halfStar)
                                        <li><i style="color: gold" class="fas fa-star-half-alt"></i></li>
                                    @endif

                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <li><i class="far fa-star"></i></li>
                                    @endfor

                                    <li class="review-total"> <a href="#">({{ $reviewCount }} Reviews)</a></li>
                                </ul>
                            </div>

                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @foreach ($reviews as $review)
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-img">
                                                        {{-- <img src="{{ asset('profile') }}" alt="Image"> <!-- Or user avatar --> --}}
                                                    </div>
                                                    <div class="ltn__commenter-comment">
                                                        <h6><a href="#">{{ $review->user->first_name }} {{ $review->user->last_name }}</a></h6>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                @for ($i = 0; $i < $review->rating; $i++)
                                                                    <li><i style="color: gold"  class="fas fa-star"></i></li>
                                                                @endfor
                                                                @for ($i = $review->rating; $i < 5; $i++)
                                                                    <li><i class="far fa-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        <p>{{ $review->comments }}</p>
                                                        <span class="ltn__comment-reply-btn">{{ $review->created_at->format('F d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!-- comment-reply -->
                            <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                <form action="{{ route('ambulance.booikng.review') }}" method="POST">
                                    @csrf
                                    <h4 class="title-2">Add a Review</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                            <h6>Your Ratings:</h6>
                                            <div class="product-ratting">
                                                <ul style="list-style: none; padding: 0; display: flex; gap: 5px;">
                                                    <li><a href="#"><i class="fas fa-star" data-value="1"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star" data-value="2"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star" data-value="3"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star" data-value="4"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star" data-value="5"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="comments" placeholder="Type your comments...."></textarea>
                                    </div>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                    </div>

                                    <!-- Hidden input to store selected rating value -->
                                    <input type="hidden" name="rating" id="rating-value" value="0">
                                    <input type="hidden" name="ambulance_id"  value="{{ $ambulance->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Tab End -->
        </div>

    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->
@endsection

@section('font-js')
<!-- Add Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

<!-- Add Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>
    let map;
    const pricePerKm = {{ $ambulance->price_per_km }};

    function calculateDistance(pickupLocation, dropLocation) {
        const geocodeUrl = 'https://nominatim.openstreetmap.org/search?format=json&limit=1&q=';

        Promise.all([
            fetch(geocodeUrl + encodeURIComponent(pickupLocation)),
            fetch(geocodeUrl + encodeURIComponent(dropLocation))
        ])
        .then(responses => Promise.all(responses.map(response => response.json())))
        .then(([pickupData, dropData]) => {
            if (pickupData[0] && dropData[0]) {
                const pickupLatLng = [pickupData[0].lat, pickupData[0].lon];
                const dropLatLng = [dropData[0].lat, dropData[0].lon];

                if (!map) {
                    map = L.map('map').setView(pickupLatLng, 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                } else {
                    map.eachLayer(layer => {
                        if (layer instanceof L.Marker || layer instanceof L.Routing.Control) {
                            map.removeLayer(layer);
                        }
                    });
                    map.setView(pickupLatLng, 13);
                }

                L.marker(pickupLatLng).addTo(map).bindPopup('Pickup Location').openPopup();
                L.marker(dropLatLng).addTo(map).bindPopup('Drop Location').openPopup();

                // Optional: Draw route
                L.Routing.control({
                    waypoints: [
                        L.latLng(pickupLatLng),
                        L.latLng(dropLatLng)
                    ],
                    createMarker: () => null,
                    addWaypoints: false,
                    routeWhileDragging: false,
                }).addTo(map);

                const distance = map.distance(pickupLatLng, dropLatLng);
                const distanceKm = (distance / 1000).toFixed(2);
                const price = (distanceKm * pricePerKm).toFixed(2);

                document.getElementById('distance').value = distanceKm;
                document.getElementById('price').value = price;

                document.getElementById('distance-info').style.display = 'block';
                document.getElementById('price-info').style.display = 'block';
                document.getElementById('confirm-booking').style.display = 'block';
            } else {
                alert('Could not find one or both locations.');
            }
        })
        .catch(error => {
            console.error(error);
            alert('Error occurred while fetching the locations.');
        });
    }

    document.getElementById('calculate-distance').addEventListener('click', function () {
        const pickupLocation = document.getElementById('pickup_location').value;
        const dropLocation = document.getElementById('drop_location').value;

        if (pickupLocation && dropLocation) {
            calculateDistance(pickupLocation, dropLocation);
        } else {
            alert('Please enter both pickup and drop locations.');
        }
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".product-ratting ul li a");
    const ratingInput = document.getElementById("rating-value");

    stars.forEach((star, index) => {
        star.addEventListener("click", function (e) {
            e.preventDefault();

            // Remove all 'selected' classes from the <i> tags inside <a>
            stars.forEach(s => {
                const icon = s.querySelector("i");
                if (icon) {
                    icon.classList.remove("selected");
                }
            });

            // Add 'selected' class to clicked star and those before it
            for (let i = 0; i <= index; i++) {
                const icon = stars[i].querySelector("i");
                if (icon) {
                    icon.classList.add("selected");
                }
            }

            // Set hidden input value to selected rating
            const selectedValue = star.querySelector("i").getAttribute("data-value");
            ratingInput.value = selectedValue;
        });
    });
});

</script>
@endsection
