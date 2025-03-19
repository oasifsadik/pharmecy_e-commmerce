@extends('admin.master')
@section('admintitle')
    Products
@endsection
@section('dashboardContent')
     @include('admin.layout.slidebar')
         @include('admin.layout.navbar')
     @include('admin.layout.rightbar')
     <div class="br-mainpanel">
        <div class="br-pagetitle d-flex justify-content-between align-items-center">
            <i class="icon ion-ios-box-outline"></i>
            <div>
                <h4>Products</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
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
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Product Quantity</th>
                  <th class="wd-15p">Expiry Date</th>
                  <th class="wd-15p">Selling Price</th>
                  <th class="wd-15p">Unit Price</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $sl = 1
                @endphp
                @if ($productStocks->count() > 0)
                @foreach ($productStocks as $stock)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $stock->product->product_name }}</td>
                    <td>{{ $stock->product_quantity }}</td>
                    <td>{{ $stock->expiry_date }}</td>
                    <td>{{ $stock->selling_price}}</td>
                    <td>{{ $stock->single_unit_price}}</td>
                    <td>
                        <a href="{{ route('admin.product.stock.view', $stock->id ) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('admin.product.stock.edit', $stock->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('admin.product.stock.delete', $stock->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Product Stock?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                    {{-- <tr >
                        <td>{{ $sl++ }}</td>
                        <td>{{ $productStocks- }}</td>
                        @if ($product->category->count() < 0)
                            <td>Category Not Found</td>
                        @else
                        <td>{{ $product->category->category_name }}</td>
                        @endif
                        @if ($product->totalStock())
                        <td>
                            <span class="badge badge-primary m-1">In-Stock</span>
                            <sup class="badge badge-info">{{ $product->totalStock() }}</sup>
                        </td>
                    @else
                        <td>
                            <span class="badge badge-danger m-1">Out Of Stock</span>
                        </td>
                    @endif


                        <td>{{ $product->selling_price }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id ) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr> --}}
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
