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
                <a href="{{ route('admin.ambulance.create') }}" class="btn btn-primary">Create</a>
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
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Vehicle Number</th>
                  <th class="wd-15p">Driver Name</th>
                  <th class="wd-15p">Location</th>
                  <th class="wd-15p">Availability</th>
                  <th class="wd-15p">price</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $sl = 1
                @endphp
                @if ($ambulances->count() > 0)
                @foreach ($ambulances as $ambulance)
                    <tr >
                        <td>{{ $sl++ }}</td>
                        <td>{{ $ambulance->name }}</td>
                        <td>{{ $ambulance->vehicle_number }}</td>
                        <td>{{ $ambulance->driver_name }}</td>
                        <td>{{ $ambulance->location }}</td>
                        <td>{{ $ambulance->availability }}</td>
                        <td>{{ $ambulance->price_per_km }}</td>
                        <td>
                            <a href="{{ route('admin.ambulance.show', $ambulance->id ) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.ambulance.edit', $ambulance->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('admin.ambulance.delete', $ambulance->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Ambulance?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
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
