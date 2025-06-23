@extends('medWebsite.master')

@section('medwebtitle')
Prescription
@endsection

@section('mw-css')
    <style>
        .upload-buttons {
            margin-bottom: 20px;
        }

        .upload-buttons button {
            margin-right: 10px;
        }

        .upload-section {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
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
                    <h1 class="page-title">Prescription</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Prescription</li>
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
                <div class="ltn__shop-options">
                    <div class="prescription-upload-container">
                        <div class="row upload-buttons mb-4">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <button onclick="showSection('prescription')" class="btn btn-primary w-100">Prescription Upload</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button onclick="showSection('manual')" class="btn btn-secondary w-100">Manual Upload</button>
                            </div>
                        </div>

                        <!-- Prescription Upload Section -->
                        <div id="prescription-section" class="upload-section" style="display: none;">
                            <h4>Upload Prescription</h4>
                            <form action="{{ route('prescription.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="phone" class="fw-bold">Phone Number <sup class="text-danger">(*)</sup></label>
                                    <input type="tel" id="phone" class="form-control" value="{{ auth()->user()->phone ?? '' }}" placeholder="Enter your phone number">
                                </div>
                                <div class="form-group">
                                    <label for="fileUpload">Upload File <sup class="text-danger">(*)</sup></label>
                                    <input type="file" id="fileUpload" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="medicine_duration">Medicine Duration (days) <sup class="text-danger">(*)</sup></label>
                                    <input type="number" class="form-control" id="medicine_duration" name="medicine_duration" placeholder="Enter number of days" min="1" required>
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label d-block fw-bold"></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="doseMorning[]" value="morning">
                                        <label class="form-check-label">Remainder For medicine</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success" style="border-radius: 5px;">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- Manual Upload Section -->
                        <!-- Manual Upload Section -->
<div id="manual-section" class="upload-section" style="display: none;">
    <h4 class="text-center">Enter Prescription Manually</h4>
    <form id="medicineForm" action="{{ route('prescription.store') }}" method="POST">
        @csrf
        <div id="medicineRows">
            <div class="medicine-row row mb-3" data-index="0">
                <!-- Medicine Name -->
                <div class="col-md-4">
                    <input list="medicine-options" name="medicines[0][name]" class="form-control medicine-name" placeholder="Medicine Name" required>
                    <datalist id="medicine-options"></datalist>
                    <div class="price-info text-muted mt-1"></div>
                </div>

                <!-- Doses -->
                <div class="col-md-5">
                    <label>Medicine Doses:</label><br>
                    <label><input type="checkbox" name="medicines[0][doses][morning]" class="dose-checkbox" data-dose="morning" value="1"> Morning</label>
                    <label><input type="checkbox" name="medicines[0][doses][afternoon]" class="dose-checkbox" data-dose="afternoon" value="1"> Afternoon</label>
                    <label><input type="checkbox" name="medicines[0][doses][night]" class="dose-checkbox" data-dose="night" value="1"> Night</label>
                </div>

                <!-- Buttons -->
                <div class="col-md-3">
                    <button type="button" class="btn btn-success add-row">+</button>
                    <button type="button" class="btn btn-danger remove-row">−</button>
                </div>
            </div>
        </div>

        <!-- Fields that should not be duplicated -->
        <div class="form-group mt-3">
            <label class="fw-bold" for="medicine_duration">Medicine Duration (days) <sup class="text-danger">(*)</sup></label>
            <input type="number" class="form-control" id="medicine_duration" name="medicine_duration" placeholder="Enter number of days" min="1" required>
        </div>

        <div class="col-md-5 mt-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="reminder" value="1">
                <label class="form-check-label">Reminder For Medicine</label>
            </div>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-sm btn-success" style="border-radius: 5px;">Submit</button>
        </div>
    </form>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->
<!-- CALL TO ACTION START (call-to-action-6) -->
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="{{ asset('medweb/img/1.jpg--') }}">
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
    function showSection(type) {
        document.getElementById('prescription-section').style.display = (type === 'prescription') ? 'block' : 'none';
        document.getElementById('manual-section').style.display = (type === 'manual') ? 'block' : 'none';
    }

    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("medicineRows");

        async function fetchMedicineSuggestions(query) {
            const response = await fetch(`/medicines/search?q=${encodeURIComponent(query)}`);
            return await response.json();
        }

        async function fetchMedicineDetails(name) {
            const response = await fetch(`/medicines/details?name=${encodeURIComponent(name)}`);
            return await response.json();
        }

        container.addEventListener("input", async function (e) {
            if (e.target.classList.contains("medicine-name")) {
                const input = e.target;
                const datalist = document.getElementById("medicine-options");
                const query = input.value;

                if (query.length > 1) {
                    const results = await fetchMedicineSuggestions(query);
                    datalist.innerHTML = "";
                    results.forEach(item => {
                        const option = document.createElement("option");
                        option.value = item.product_name;
                        datalist.appendChild(option);
                    });
                }
            }
        });

        container.addEventListener("change", async function (e) {
            // When medicine name is selected or dose is toggled
            if (e.target.classList.contains("medicine-name") || e.target.classList.contains("dose-checkbox")) {
                const row = e.target.closest(".medicine-row");
                const nameInput = row.querySelector(".medicine-name");
                const selectedMedicine = nameInput.value;

                if (!selectedMedicine) return;

                const details = await fetchMedicineDetails(selectedMedicine);
                const duration = parseInt(document.getElementById("medicine_duration").value || 1);

                if (details) {
                    let total = 0;
                    let prices = {
                        morning: details.morning_price || 0,
                        afternoon: details.afternoon_price || 0,
                        night: details.night_price || 0,
                    };

                    ['morning', 'afternoon', 'night'].forEach(dose => {
                        const checkbox = row.querySelector(`input[data-dose="${dose}"]`);
                        if (checkbox?.checked) {
                            total += prices[dose] * duration;
                        }
                    });

                    const info = `
                        Morning: ${prices.morning} TK,
                        Afternoon: ${prices.afternoon} TK,
                        Night: ${prices.night} TK
                        → Total (${duration} days): ${total.toFixed(2)} TK
                    `;
                    row.querySelector('.price-info').innerText = info;
                }
            }
        });

        container.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-row")) {
                const rows = container.querySelectorAll(".medicine-row");
                const lastRow = rows[rows.length - 1];
                const newRow = lastRow.cloneNode(true);
                const newIndex = rows.length;

                newRow.setAttribute('data-index', newIndex);
                newRow.querySelectorAll("input").forEach(input => {
                    if (input.type === "text") input.value = "";
                    if (input.type === "checkbox") input.checked = false;

                    const name = input.getAttribute("name");
                    if (name) {
                        const updatedName = name.replace(/\[\d+\]/g, `[${newIndex}]`);
                        input.setAttribute("name", updatedName);
                    }
                });

                newRow.querySelector(".price-info").innerText = "";
                container.appendChild(newRow);
            }

            if (e.target.classList.contains("remove-row")) {
                const rows = container.querySelectorAll(".medicine-row");
                if (rows.length > 1) {
                    e.target.closest(".medicine-row").remove();
                } else {
                    alert("At least one medicine row is required.");
                }
            }
        });
    });
</script>
@endsection

