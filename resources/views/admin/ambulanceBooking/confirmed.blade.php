@extends('admin.master')
@section('admintitle')
    Ambulance
@endsection
@section('dashboardContent')
     @include('admin.layout.slidebar')
         @include('admin.layout.navbar')
     @include('admin.layout.rightbar')
     <div class="br-mainpanel">
        <div class="br-pagetitle d-flex justify-content-between align-items-center">
            <i class="icon ion-ios-box-outline"></i>
            <div>
                <h4>Ambulance</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
            </div>
        </div>


       <div class="br-pagebody">
        <div class="br-section-wrapper">


          {{-- <h6 class="br-section-label">Disabling Search &amp; Items Per Page Menu</h6>
          <p class="br-section-text">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> --}}

          <div class="table-wrapper">
            <table id="datatable2" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">#SL</th>
                  <th class="wd-15p">User Name</th>
                  <th class="wd-15p">contact_number </th>
                  <th class="wd-15p">pickup_location </th>
                  <th class="wd-15p">drop_location</th>
                  <th class="wd-15p">pickup_time</th>
                  <th class="wd-15p">distance</th>
                  <th class="wd-15p">price</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $sl = 1
                @endphp
                @if ($ambulanceBookings->count() > 0)
                @foreach ($ambulanceBookings as $ambulance)
                    <tr >
                        <td>{{ $sl++ }}</td>
                        <td>{{ $ambulance->user->first_name }} {{ $ambulance->user->last_name }}</td>
                        <td>{{ $ambulance->contact_number }}</td>
                        <td>{{ $ambulance->pickup_location }}</td>
                        <td>{{ $ambulance->drop_location }}</td>
                        <td>{{ $ambulance->pickup_time }}</td>
                        <td>{{ $ambulance->distance }}</td>
                        <td>{{ $ambulance->price }}</td>
                        <td>
                            <a href="{{ route('admin.ambulance.booking.show', $ambulance->id ) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('ambulanceBooking.cancel', $ambulance->id) }}" class="btn btn-sm btn-danger mr-1"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                <th class="text-center text-danger text-bold" colspan="6">No products available.</th>
                @endif
              </tbody>
            </table>
          </div><!--    table-wrapper -->


        </div><!-- br-section-wrapper -->
      </div>
       @include('admin.layout.footer')
     </div>

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
