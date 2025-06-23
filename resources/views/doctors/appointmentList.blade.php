@extends('doctors.master')

@section('admintitle')
    Appointment List
@endsection

@section('dashboardContent')
    @include('doctors.layout.slidebar')
    @include('doctors.layout.navbar')
    @include('admin.layout.rightbar')

    <div class="br-mainpanel">
        <div class="br-pagetitle d-flex justify-content-between align-items-center">
            <i class="icon ion-ios-calendar-outline"></i>
            <div>
                <h4>Appointment List</h4>
                <p class="mg-b-0">Manage your patient appointments here.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="table-wrapper">
                    <table id="datatable2" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">#SL</th>
                                <th class="wd-20p">Patient Name</th>
                                <th class="wd-10p">Age</th>
                                <th class="wd-20p">Symptoms</th>
                                <th class="wd-15p">Appointment Date</th>
                                <th class="wd-20p">Reports</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach($appointmentList as $appointment)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $appointment->patient_name }}</td>
                                    <td>{{ $appointment->age }}</td>
                                    <td>{{ $appointment->symptoms }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>
                                        @foreach($appointment->files as $file)
                                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">View</a><br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

        @include('doctors.layout.footer')
    </div><!-- br-mainpanel -->
@endsection

@section('js__')
<script>
    $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
    });
</script>
@endsection
