<div class="br-header">
    <div class="br-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
      <div class="input-group hidden-xs-down wd-170 transition">
        <input id="searchbox" type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
        </span>
      </div><!-- input-group -->
    </div><!-- br-header-left -->
    <div class="br-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-email-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
          <div class="dropdown-menu dropdown-menu-header">
            <div class="dropdown-menu-label">
              <label>Messages</label>
              <a href="#">+ Add New Message</a>
            </div><!-- d-flex -->

            <div class="media-list">
              <!-- loop starts here -->
              <a href="#" class="media-list-link">
                <div class="media">
                  <img src="../img/img3.jpg" alt="">
                  <div class="media-body">
                    <div>
                      <p>Donna Seay</p>
                      <span>2 minutes ago</span>
                    </div><!-- d-flex -->
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img4.jpg" alt="">
                  <div class="media-body">
                    <div>
                      <p>Samantha Francis</p>
                      <span>3 hours ago</span>
                    </div><!-- d-flex -->
                    <p>My entire soul, like these sweet mornings of spring.</p>
                  </div>
                </div><!-- media -->
              </a>
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img7.jpg" alt="">
                  <div class="media-body">
                    <div>
                      <p>Robert Walker</p>
                      <span>5 hours ago</span>
                    </div><!-- d-flex -->
                    <p>I should be incapable of drawing a single stroke at the present moment...</p>
                  </div>
                </div><!-- media -->
              </a>
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img5.jpg" alt="">
                  <div class="media-body">
                    <div>
                      <p>Larry Smith</p>
                      <span>Yesterday</span>
                    </div><!-- d-flex -->
                    <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                  </div>
                </div><!-- media -->
              </a>
              <div class="dropdown-footer">
                <a href="#"><i class="fas fa-angle-down"></i> Show All Messages</a>
              </div>
            </div><!-- media-list -->
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown">
          <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-bell-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
          <div class="dropdown-menu dropdown-menu-header">
            <div class="dropdown-menu-label">
              <label>Notifications</label>
              <a href="#">Mark All as Read</a>
            </div><!-- d-flex -->

            <div class="media-list">
              <!-- loop starts here -->
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img8.jpg" alt="">
                  <div class="media-body">
                    <p class="noti-text"><strong>Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span>October 03, 2017 8:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img9.jpg" alt="">
                  <div class="media-body">
                    <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work <strong>The Social Network</strong></p>
                    <span>October 02, 2017 12:44am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img10.jpg" alt="">
                  <div class="media-body">
                    <p class="noti-text">20+ new items added are for sale in your <strong>Sale Group</strong></p>
                    <span>October 01, 2017 10:20pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="#" class="media-list-link read">
                <div class="media">
                  <img src="../img/img5.jpg" alt="">
                  <div class="media-body">
                    <p class="noti-text"><strong>Julius Erving</strong> wants to connect with you on your conversation with <strong>Ronnie Mara</strong></p>
                    <span>October 01, 2017 6:08pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <div class="dropdown-footer">
                <a href="#"><i class="fas fa-angle-down"></i> Show All Notifications</a>
              </div>
            </div><!-- media-list -->
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown">
          <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name hidden-md-down">{{ Auth::guard('doctor')->user()->full_name }}</span>
            <img src="{{ asset('backend/img/img1.jpg') }}" class="wd-32 rounded-circle" alt="">
            <span class="square-10 bg-success"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-250">
            <div class="tx-center">
              <a href="#"><img src="{{ asset('backend/img/img1.jpg') }}" class="wd-80 rounded-circle" alt=""></a>
              <h6 class="logged-fullname">{{ Auth::guard('doctor')->user()->full_name }}</h6>
              <p>{{ Auth::guard('doctor')->user()->email }}</p>
            </div>

            <hr>
            <ul class="list-unstyled user-profile-nav">
              <li><a href="#"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
              <li><a href="#"><i class="icon ion-ios-gear"></i> Settings</a></li>
              <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('doctor.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <div class="navicon-right">
        <a id="btnRightMenu" href="#" class="pos-relative">
          <i class="icon ion-ios-chatboxes-outline"></i>
          <!-- start: if statement -->
          <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
          <!-- end: if statement -->
        </a>
      </div><!-- navicon-right -->
    </div><!-- br-header-right -->
  </div>
