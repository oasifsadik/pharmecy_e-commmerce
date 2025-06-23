<div class="br-logo"><a href="{{ route('admin.dashboard') }}"><span>[</span>Bangla-<i>Med</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('category.index') }}" class="br-menu-link {{ Request::routeIs('category.index') || Request::routeIs('category.create') || Request::routeIs('category.edit') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
            <span class="menu-item-label">Categories</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
            <a href="{{ route('brand.index') }}" class="br-menu-link {{ Request::routeIs('brand.index') || Request::routeIs('brand.create') || Request::routeIs('brand.edit') ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
              <span class="menu-item-label">Brands</span>
            </a><!-- br-menu-link -->
          </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('products.index') }}" class="br-menu-link {{ Request::routeIs('products.index') || Request::routeIs('products.create') || Request::routeIs('products.edit') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-box-outline tx-24"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.product.stock') ||Request::routeIs('admin.product.stock.list') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Product Stock</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.product.stock') }}" class="sub-link">Add Stock</a></li>
            <li class="sub-item"><a href="{{ route('admin.product.stock.list') }}" class="sub-link">Stock List</a></li>
            {{-- <li class="sub-item"><a href="{{ route('admin.order.confirm.list') }}" class="sub-link">Confirm &amp; Order List</a></li>
            <li class="sub-item"><a href="{{ route('admin.orders.history') }}" class="sub-link">Shop &amp; Listing</a></li> --}}
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.orders') ||Request::routeIs('admin.orders.details') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Orders</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.orders') }}" class="sub-link">Orders</a></li>
            <li class="sub-item"><a href="{{ route('admin.order.confirm.list') }}" class="sub-link">Confirm &amp; Order List</a></li>
            <li class="sub-item"><a href="{{ route('admin.orders.history') }}" class="sub-link">Shop &amp; Listing</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.prescrip.orders') ||Request::routeIs('admin.orders.details') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Prescrip Medicine</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.prescrip.orders') }}" class="sub-link">Prescrip Orders</a></li>
            <li class="sub-item"><a href="{{ route('admin.order.confirm.list.prescrib') }}" class="sub-link">Prescrip Confirm Orders</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.ambulance') ||Request::routeIs('admin.ambulance.create') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Ambulance</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.ambulance.create') }}" class="sub-link">Create</a></li>
            <li class="sub-item"><a href="{{ route('admin.ambulance') }}" class="sub-link">Ambulance &amp; List</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.ambulance.booking.List') ||Request::routeIs('admin.ambulance.booking.confirm.List') || Request::routeIs('admin.ambulance.booking.cancel.List')  ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Ambulance Booking</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.ambulance.booking.List') }}" class="sub-link">List</a></li>
            <li class="sub-item"><a href="{{ route('admin.ambulance.booking.confirm.List') }}" class="sub-link">Confirm &amp; List</a></li>
            <li class="sub-item"><a href="{{ route('admin.ambulance.booking.cancel.List') }}" class="sub-link">Cancel &amp; List</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.lab.test.create') ||Request::routeIs('admin.lab.test.booking.list') ||Request::routeIs('admin.lab.test.booking.list') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Lab Test</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.lab.test.create') }}" class="sub-link">Create</a></li>
            <li class="sub-item"><a href="{{ route('admin.lab.test') }}" class="sub-link">Test list</a></li>
            <li class="sub-item"><a href="{{ route('admin.lab.test.booking.list') }}" class="sub-link">Test Booking &amp; List</a></li>
          </ul>
        </li>
      </ul><!-- br-sideleft-menu -->
      <br>
    </div>
