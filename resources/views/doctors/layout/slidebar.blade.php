<div class="br-logo"><a href="{{ route('admin.dashboard') }}"><span>[</span>E-<i>commerce</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('doctor.dashboard') }}" class="br-menu-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.orders') ||Request::routeIs('admin.orders.details') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Appoinment</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="" class="sub-link">Appoinment List</a></li>
          </ul>
        </li>
      </ul><!-- br-sideleft-menu -->
      <br>
    </div>
