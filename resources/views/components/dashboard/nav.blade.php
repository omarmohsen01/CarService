<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
       <a href="index.html" class="header-logo">
       {{-- <img src="{{ asset('dashboard/images/logo.png') }}" class="img-fluid rounded" alt=""> --}}
       <span>Turbo Tune</span>
       </a>
       <div class="iq-menu-bt align-self-center">
          <div class="wrapper-menu">
             <div class="main-circle"><i class="ri-menu-line"></i></div>
             <div class="hover-circle"><i class="ri-close-fill"></i></div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="active">
                <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                   <li class="active"><a href="{{ route('dashboard.index') }}"><i class="las la-laptop-code"></i>Account Dashboard</a></li>
                </ul>
             </li>
              <li>
                <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                   <li><a href="{{ route('dashboard.admins.index') }}"><i class="las la-th-list"></i>Admin & Vendor List</a></li>
                   <li><a href="{{ route('dashboard.users.index') }}"><i class="las la-th-list"></i>User List</a></li>
                </ul>
             </li>
             <li>
                <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-car iq-arrow-left"></i><span>Car</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{ route('dashboard.brands.index') }}"><i class="las la-certificate"></i>Brand</a></li>
                   <li><a href="form-validation.html"><i class="las la-flag"></i>Model</a></li>
                </ul>
             </li>
             {{--
             <li>
                <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>UI Elements</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="ui-colors.html"><i class="las la-palette"></i>colors</a></li>
                   <li><a href="ui-typography.html"><i class="las la-keyboard"></i>Typography</a></li>
                   <li><a href="ui-alerts.html"><i class="las la-tag"></i>Alerts</a></li>
                   <li><a href="ui-badges.html"><i class="lab la-atlassian"></i>Badges</a></li>
                   <li><a href="ui-breadcrumb.html"><i class="las la-bars"></i>Breadcrumb</a></li>
                   <li><a href="ui-buttons.html"><i class="las la-tablet"></i>Buttons</a></li>
                   <li><a href="ui-cards.html"><i class="las la-credit-card"></i>Cards</a></li>
                   <li><a href="ui-carousel.html"><i class="las la-film"></i>Carousel</a></li>
                   <li><a href="ui-embed-video.html"><i class="las la-video"></i>Video</a></li>
                   <li><a href="ui-grid.html"><i class="las la-border-all"></i>Grid</a></li>
                   <li><a href="ui-images.html"><i class="las la-images"></i>Images</a></li>
                   <li><a href="ui-list-group.html"><i class="las la-list"></i>list Group</a></li>
                   <li><a href="ui-media-object.html"><i class="las la-ad"></i>Media</a></li>
                   <li><a href="ui-modal.html"><i class="las la-columns"></i>Modal</a></li>
                   <li><a href="ui-notifications.html"><i class="las la-bell"></i>Notifications</a></li>
                   <li><a href="ui-pagination.html"><i class="las la-ellipsis-h"></i>Pagination</a></li>
                   <li><a href="ui-popovers.html"><i class="las la-eraser"></i>Popovers</a></li>
                   <li><a href="ui-progressbars.html"><i class="las la-hdd"></i>Progressbars</a></li>
                   <li><a href="ui-tabs.html"><i class="las la-database"></i>Tabs</a></li>
                   <li><a href="ui-tooltips.html"><i class="las la-magnet"></i>Tooltips</a></li>
                </ul>
             </li>
             <li>
                <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-wpforms iq-arrow-left"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="form-layout.html"><i class="las la-book"></i>Form Elements</a></li>
                   <li><a href="form-validation.html"><i class="las la-edit"></i>Form Validation</a></li>
                   <li><a href="form-switch.html"><i class="las la-toggle-off"></i>Form Switch</a></li>
                   <li><a href="form-chechbox.html"><i class="las la-check-square"></i>Form Checkbox</a></li>
                   <li><a href="form-radio.html"><i class="ri-radio-button-line"></i>Form Radio</a></li>
                </ul>
             </li>
             <li>
                <a href="#wizard-form" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line iq-arrow-left"></i><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="wizard-form" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Simple Wizard</a></li>
                   <li><a href="form-wizard-validate.html"><i class="ri-clockwise-2-line"></i>Validate Wizard</a></li>
                   <li><a href="form-wizard-vertical.html"><i class="ri-anticlockwise-line"></i>Vertical Wizard</a></li>
                </ul>
             </li>
             <li>
                <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-table-line iq-arrow-left"></i><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="tables" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="tables-basic.html"><i class="ri-table-line"></i>Basic Tables</a></li>
                   <li><a href="data-table.html"><i class="ri-database-line"></i>Data Table</a></li>
                   <li><a href="table-editable.html"><i class="ri-refund-line"></i>Editable Table</a></li>
                </ul>
             </li>
             <li>
                <a href="#charts" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pie-chart-box-line iq-arrow-left"></i><span>Charts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="charts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                   <li><a href="chart-apex.html"><i class="ri-folder-chart-2-line"></i>Apex Chart</a></li>
                </ul>
             </li>
             <li>
                <a href="#icons" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-list-check iq-arrow-left"></i><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="icons" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="icon-dripicons.html"><i class="ri-stack-line"></i>Dripicons</a></li>
                   <li><a href="icon-fontawesome-5.html"><i class="ri-facebook-fill"></i>Font Awesome 5</a></li>
                   <li><a href="icon-lineawesome.html"><i class="ri-keynote-line"></i>line Awesome</a></li>
                   <li><a href="icon-remixicon.html"><i class="ri-remixicon-line"></i>Remixicon</a></li>
                   <li><a href="icon-unicons.html"><i class="ri-underline"></i>unicons</a></li>
                </ul>
             </li>
             <li>
                <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line iq-arrow-left"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="authentication" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="sign-in.html"><i class="las la-sign-in-alt"></i>Login</a></li>
                   <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
                   <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
                   <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
                   <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
                </ul>
             </li>
             <li>
                <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line iq-arrow-left"></i><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="pages-timeline.html"><i class="ri-map-pin-time-line"></i>Timeline</a></li>
                   <li><a href="pages-invoice.html"><i class="ri-question-answer-line"></i>Invoice</a></li>
                   <li><a href="blank-page.html"><i class="ri-invision-line"></i>Blank Page</a></li>
                   <li><a href="pages-error.html"><i class="ri-error-warning-line"></i>Error 404</a></li>
                   <li><a href="pages-error-500.html"><i class="ri-error-warning-line"></i>Error 500</a></li>
                   <li><a href="pages-pricing.html"><i class="ri-price-tag-line"></i>Pricing</a></li>
                   <li><a href="pages-pricing-one.html"><i class="ri-price-tag-2-line"></i>Pricing 1</a></li>
                   <li><a href="pages-maintenance.html"><i class="ri-archive-line"></i>Maintenance</a></li>
                   <li><a href="pages-comingsoon.html"><i class="ri-mastercard-line"></i>Coming Soon</a></li>
                   <li><a href="pages-faq.html"><i class="ri-compasses-line"></i>Faq</a></li>
                </ul>
             </li>
             <li>
                <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line iq-arrow-left"></i><span>Menu Level</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="#"><i class="ri-record-circle-line"></i>Menu 1</a></li>
                   <li>
                      <a href="#"><i class="ri-record-circle-line"></i>Menu 2</a>

                   </li>
                   <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                   <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
                </ul>
             </li> --}}
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
 <!-- TOP Nav Bar -->
 <div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-menu-bt d-flex align-items-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-menu-line"></i></div>
                <div class="hover-circle"><i class="ri-close-fill"></i></div>
             </div>
             <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                <a href="index.html" class="header-logo">
                <img src="{{ asset('dashboard/images/logo.png')}}" class="img-fluid rounded" alt="">
                <span>TurboTune</span>
                </a>
             </div>
          </div>
          <div class="iq-search-bar">
             <form action="#" class="searchbox">
                <input type="text" class="text search-input" placeholder="Type here to search...">
                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
             </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
          <i class="ri-menu-3-line"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto navbar-list">
                <li class="nav-item">
                   <a class="search-toggle iq-waves-effect language-title" href="#"><span class="ripple rippleEffect" style="width: 98px; height: 98px; top: -15px; left: 56.2969px;"></span><img src="{{ asset('dashboard/images/small/flag-01.png')}}" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;"> EN <i class="ri-arrow-down-s-line"></i></a>
                   <div class="iq-sub-dropdown">
                      <a class="iq-sub-card" href="#"><img src="{{ asset('dashboard/images/small/flag-02.png')}}" alt="img-flaf" class="img-fluid mr-2">French</a>
                      <a class="iq-sub-card" href="#"><img src="{{ asset('dashboard/images/small/flag-03.png')}}" alt="img-flaf" class="img-fluid mr-2">Spanish</a>
                      <a class="iq-sub-card" href="#"><img src="{{ asset('dashboard/images/small/flag-04.png')}}" alt="img-flaf" class="img-fluid mr-2">Italian</a>
                      <a class="iq-sub-card" href="#"><img src="{{ asset('dashboard/images/small/flag-05.png')}}" alt="img-flaf" class="img-fluid mr-2">German</a>
                      <a class="iq-sub-card" href="#"><img src="{{ asset('dashboard/images/small/flag-06.png')}}" alt="img-flaf" class="img-fluid mr-2">Japanese</a>
                   </div>
                </li>
                <li class="nav-item nav-icon">
                   <a href="#" class="iq-waves-effect bg-primary rounded"><span class="ripple rippleEffect"></span><i class="ri-shopping-cart-2-line"></i></a>
                </li>
                <li class="nav-item nav-icon">
                   <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                   <i class="ri-notification-line"></i>
                   <span class="bg-danger dots"></span>
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                            </div>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/01.jpg') }}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Emma Watson Barry</h6>
                                     <small class="float-right font-size-12">Just Now</small>
                                     <p class="mb-0">95 MB</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/02.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">New customer is join</h6>
                                     <small class="float-right font-size-12">5 days ago</small>
                                     <p class="mb-0">Cyst Barry</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/03.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Two customer is left</h6>
                                     <small class="float-right font-size-12">2 days ago</small>
                                     <p class="mb-0">Cyst Barry</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/04.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">New Mail from Fenny</h6>
                                     <small class="float-right font-size-12">3 days ago</small>
                                     <p class="mb-0">Cyst Barry</p>
                                  </div>
                               </div>
                            </a>
                         </div>
                      </div>
                   </div>
                </li>
                <li class="nav-item nav-icon dropdown">
                   <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                   <i class="ri-mail-line"></i>
                   <span class="bg-danger count-mail"></span>
                   </a>
                   <div class="iq-sub-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                            </div>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/01.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Barry Emma Watson</h6>
                                     <small class="float-left font-size-12">13 Jun</small>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/02.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                     <small class="float-left font-size-12">20 Apr</small>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/03.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Why do we use it?</h6>
                                     <small class="float-left font-size-12">30 Jun</small>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/04.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Variations Passages</h6>
                                     <small class="float-left font-size-12">12 Sep</small>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('dashboard/images/user/05.jpg')}}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                     <small class="float-left font-size-12">5 Dec</small>
                                  </div>
                               </div>
                            </a>
                         </div>
                      </div>
                   </div>
                </li>
             </ul>
          </div>
          <ul class="navbar-list">
             <li class="line-height">
                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                   <img src="{{ asset('storage/'.auth()->guard('admin')->user()->image)}}" class="img-fluid rounded mr-3" alt="user">
                   <div class="caption">
                      <h6 class="mb-0 line-height">{{  ucfirst(substr(auth()->guard('admin')->user()->first_name,0,1)) }}.{{ ucfirst(auth()->guard('admin')->user()->last_name) }}</h6>
                      <p class="mb-0">{{ auth()->guard('admin')->user()->type }}</p>
                   </div>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                   <div class="iq-card shadow-none m-0">
                      <div class="iq-card-body p-0 ">
                         <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white line-height">Hello {{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }}</h5>
                            <span class="text-white font-size-12">Available</span>
                         </div>
                         <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-file-user-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">My Profile</h6>
                                  <p class="mb-0 font-size-12">View personal profile details.</p>
                               </div>
                            </div>
                         </a>
                         <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-profile-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">Edit Profile</h6>
                                  <p class="mb-0 font-size-12">Modify your personal details.</p>
                               </div>
                            </div>
                         </a>
                         <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-account-box-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">Account settings</h6>
                                  <p class="mb-0 font-size-12">Manage your account parameters.</p>
                               </div>
                            </div>
                         </a>
                         <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-lock-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">Privacy Settings</h6>
                                  <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                               </div>
                            </div>
                         </a>
                         <div class="d-inline-block w-100 text-center p-3">
                            <form method="POST" action="{{ route('dashboard.logout') }}">
                                @csrf
                                <button class="bg-primary iq-sign-btn" type="submit">Sign out<i class="ri-login-box-line ml-2"></i></button>
                            </form>
                            {{-- <a class="bg-primary iq-sign-btn" href="{{ route('dashboard.logout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a> --}}
                         </div>
                      </div>
                   </div>
                </div>
             </li>
          </ul>
       </nav>
    </div>
 </div>
