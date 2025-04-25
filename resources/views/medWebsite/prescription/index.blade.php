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
                            <form>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" class="form-control" placeholder="Enter your phone number">
                                </div>
                                <div class="form-group">
                                    <label for="fileUpload">Upload File</label>
                                    <input type="file" id="fileUpload" class="form-control">
                                </div>
                            </form>
                        </div>

                        <!-- Manual Upload Section -->
                        <div id="manual-section" class="upload-section" style="display: none;">
                            <h4 class="text-center">Enter Prescription Manually</h4>
                            <form id="medicineForm">
                                <div id="medicineRows">
                                    <div class="row medicine-row mb-3">
                                        <!-- Medicine Name -->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Medicine Name</label>
                                                <input type="text" name="medicineName[]" class="form-control" placeholder="Enter medicine name">
                                            </div>
                                        </div>

                                        <!-- Medicine Doses -->
                                        <div class="col-md-5">
                                            <label class="form-label d-block">Medicine Doses</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="doseMorning[]" value="morning">
                                                <label class="form-check-label">Morning</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="doseAfternoon[]" value="afternoon">
                                                <label class="form-check-label">Afternoon</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="doseNight[]" value="night">
                                                <label class="form-check-label">Night</label>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-success btn-sm me-2 add-row">+</button>
                                            <button type="button" class="btn btn-danger btn-sm remove-row">🗑</button>
                                        </div>

                                    </div>
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
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("medicineRows");

        container.addEventListener("click", function (e) {
            // Add new row
            if (e.target.classList.contains("add-row")) {
                const newRow = e.target.closest(".medicine-row").cloneNode(true);

                // Clear input values in cloned row
                newRow.querySelectorAll("input").forEach(input => {
                    if (input.type === "text") input.value = "";
                    if (input.type === "checkbox") input.checked = false;
                });

                container.appendChild(newRow);
            }

            // Remove row
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
