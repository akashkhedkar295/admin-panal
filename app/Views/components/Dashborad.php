<?= $this->extend('Maintmplet') ?>
<?= $this->section('NavBar') ?>
<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
          
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
               <img src="https://bflcrm.slashrtc.in/assets/images/slashRTCBrandLogo.png" style='height:45px; width:70px; margin-right:20px; ' alt="">
              
              <ul class="navbar-nav flex-row align-items-center ms-auto sidenav">
                <li class="nav-item lh-1 me-3"><a class="dropdown-item" href="#">Dashboard</a></li>
                <li class="nav-item lh-1 me-3"><a class="dropdown-item" href="#">Conversations</a></li>
                <li class="nav-item lh-1 me-3" ><a class="dropdown-item" href="#">Live</a></li>
                <li id="accordionIcon" class="nav-item lh-1 me-3 dropdown accordion accordion-without-arrow">
                  <a class="dropdown-toggle dropbtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     reports
                  </a>

                <div>
                <ul class="dropdown-menu dropdown-content " aria-labelledby="dropdownMenuButton1">

                  <li>
                      <a
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-1"
                          aria-controls="accordionIcon-1"
                        >
                          hourly reports
                        </a>
                      <ul id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                         <li><a class="dropdown-item" href="<?= base_url('/logger_report/mysql')?>">MySql Reports</a></li>
                         <li><a class="dropdown-item" href="<?= base_url('/logger_report/mongo')?>">Mongo Reports</a></li>
                         <li><a class="dropdown-item" href="<?= base_url('logger_report/elastic') ?>">elasticSearch Reports</a></li>
                      </ul>
                  </li>
                  <li>
                  <a
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-2"
                          aria-controls="accordionIcon-2"
                        >
                          summary reports
                        </a>
                      

                      <ul id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                         <li><a class="dropdown-item" href="<?= base_url('/call_Data/mysql')?>">MySql Reports</a></li>
                         <li><a class="dropdown-item" href="<?= base_url('/call_Data/mongo')?>">Mongo Reports</a></li>
                         <li><a class="dropdown-item" href="<?= base_url('call_Data/elastic') ?>">elasticSearch Reports</a></li>
                      </ul>
                  </li>
                </ul>
                </div>
              </li>
                <li class="nav-item lh-1 me-3" ><a class="dropdown-item" href="<?= base_url('logger_report')?>">Contact</a></li>
                <li class="nav-item lh-1 me-3 dropdown ">
                  <a class="dropdown-toggle dropbtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     opertions
                  </a>
                <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="<?= base_url('/')?>">Users Details</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('/Campagin')?>">Campaign Details</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('chatPage') ?>">chat</a></li>
                </ul>
              </li>
                
                <li class="nav-item lh-1 me-3" >Advanced Settings</li>
                <li class="nav-item lh-1 me-3" >Customer Reports</li>
              </ul>
            

              <ul class="navbar-nav flex-row align-items-strat ms-auto" >
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="dropdown-toggle" type="button" id="dropdownMenuButton1"  aria-expanded="false">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('img/avatars/1.png')?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  
                  <ul class="dropdown-menu dropdown-content dropdown-menu-start" style="display:relative; right:14%; top:70% " aria-labelledby="dropdownMenuButton1">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url('/img/avatars/1.png')?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $loginDetails['name']?></span>
                            <small class="text-muted"><?= $loginDetails['JobTitle']?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                 
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('/Logout') ?>">
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
          <div class="container-xxl flex-grow-1 ">
               <h4 class="fw-bold pt-2 "><span class="text-muted fw-light">Account Settings /</span> Account</h4>
          </div>
          
    <!-- / Content -->
    <?= $this->endSection() ?>

     