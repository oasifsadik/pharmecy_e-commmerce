@extends('admin.master')
@section('admintitle')
    Brands
@endsection
@section('dashboardContent')
     @include('admin.layout.slidebar')
         @include('admin.layout.navbar')
     @include('admin.layout.rightbar')
     <div class="br-mainpanel">
        <div class="br-pagetitle d-flex justify-content-between align-items-center">
            <i class="icon ion-ios-folder-outline"></i>
            <div>
                <h4>Brands</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('brand.create') }}" class="btn btn-primary">Create</a>
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
                  <th class="wd-15p">Brand name</th>
                  <th class="wd-15p">Brand Description</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $sl = 1
                @endphp
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        @php($pDesc = strip_tags(htmlspecialchars_decode($brand->brand_description)))

                        <td>{!! (strlen($pDesc) > 20) ? substr($pDesc,0,50).'...' : $pDesc; !!}</td>
                        <td>
                            <a href="{{ route('brand.show', $brand->id ) }}" class="btn btn-sm btn-success mr-1">Show</a>
                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Brand?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->


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
