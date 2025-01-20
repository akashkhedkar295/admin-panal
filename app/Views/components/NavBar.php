
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
               <img src="https://bflcrm.slashrtc.in/assets/images/slashRTCBrandLogo.png" style='height:45px; width:70px; margin-right:20px; ' alt="">
              
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item lh-1 me-3"><a class="dropdown-item" href="#">Dashboard</a></li>
                <li class="nav-item lh-1 me-3"><a class="dropdown-item" href="#">Conversations</a></li>
                <li class="nav-item lh-1 me-3" ><a class="dropdown-item" href="#">Live</a></li>
                <li class="nav-item lh-1 me-3" ><a class="dropdown-item" href="#">Reports</a></li>
                <li class="nav-item lh-1 me-3" ><a class="dropdown-item" href="#">Contact</a></li>
                <li class="nav-item lh-1 me-3 dropdown ">
                  <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     opertions
                  </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="">Users Details</a></li>
                  <li><a class="dropdown-item" href="#">Capmaign Details </a></li>
                  <li><a class="dropdown-item" href="#">Access Level</a></li>
                </ul>
              
              </li>
                
                <li class="nav-item lh-1 me-3" >Advanced Settings</li>
                <li class="nav-item lh-1 me-3" >Customer Reports</li>
              </ul>
            

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('img/avatars/1.png')?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url('/img/avatars/1.png')?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>

            </div>
          </nav>
         