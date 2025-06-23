@extends('doctors.master')

@section('admintitle')
    Write Prescription
@endsection

@section('dashboardContent')
    @include('doctors.layout.slidebar')
    @include('doctors.layout.navbar')
    @include('admin.layout.rightbar')

    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-medkit-outline"></i>
            <div>
                <h4>Write a Prescription</h4>
                <p class="mg-b-0">Select patient and prescribe medicine.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('doctor.prescribe.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="appointment_id">Select Patient</label>
                        <select name="appointment_id" class="form-control" required>
                            <option value="">-- Select --</option>
                            @foreach($appointments as $appointment)
                                <option value="{{ $appointment->id }}">
                                    {{ $appointment->patient_name }} ({{ $appointment->appointment_date }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="medicine-section">
                        <label>Medicines</label>
                        <div class="row mb-2 medicine-group">
                            <div class="col-md-4">
                                <input type="text" name="medicineName[]" class="form-control" placeholder="Medicine Name" required>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" name="doseMorning[]" value="morning"> Morning
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" name="doseAfternoon[]" value="afternoon"> Afternoon
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" name="doseNight[]" value="night"> Night
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-sm remove-medicine">X</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-medicine" class="btn btn-sm btn-info mb-3">+ Add Another Medicine</button>

                    <div class="form-group">
                        <label for="medicine_duration">Medicine Duration (days)</label>
                        <input type="number" name="medicine_duration" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Prescription</button>
                </form>
            </div>
        </div>

        @include('doctors.layout.footer')
    </div>
@endsection

@section('js__')
<script>
    $(document).ready(function() {
        $('#add-medicine').click(function() {
            let group = $('.medicine-group').first().clone();
            group.find('input').val('');
            group.find('input[type="checkbox"]').prop('checked', false);
            $('#medicine-section').append(group);
        });

        $(document).on('click', '.remove-medicine', function() {
            if ($('.medicine-group').length > 1) {
                $(this).closest('.medicine-group').remove();
            }
        });
    });
</script>
@endsection
