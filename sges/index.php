<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>SGES - Système de Gestion des Elections au Sénégal</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>


  </head>
  <body class="vertical  light rtl ">
    <div class="wrapper">

      <!-- ###################  HEADER ################################### -->
                
                <?php include("header.php") ?>

      <!------------------------ Fin Header   ------------------------------------>

      <!-- ####################### BARRE NAVIGATION #############################-->
                                      <!-- NAV BAR VERTICAL  -->
                <?php include("navbar.php") ?>

      <!--------------------------  fIN Barre navigation  ----------------------->
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Dalal Jam!</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                      <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card shadow my-4">
                <!-- #################### Hero SGES ############################### -->
                
                <!-- Hero SGES -->
                <?php include("zoneHero.php") ?>
                    
              </div> <!-- .card -->

                <!-- #################### Fin hero  ############################### -->

                <!-- ######################## SECTION 1 ###############################-->
                
                  <?php include('section_index1.php') ?>

                <!-- ######################## Fin SECTION 1 ###############################-->
              <div class="row">
                <!-- Recent orders -->
                <div class="col-md-8">
                  <div class="card shadow eq-card">
                    <div class="card-header">
                      <strong class="card-title">Recent Orders</strong>
                      <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body">
                      <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>3224</td>
                            <th scope="col">Keith Baird</th>
                            <td>Enim Limited<br /><span class="small text-muted">901-6206 Cras Av.</span></td>
                            <td>Apr 24, 2019</td>
                            <td><span class="dot dot-lg bg-warning mr-2"></span></td>
                          </tr>
                          <tr>
                            <td>3218</td>
                            <th scope="col">Graham Price</th>
                            <td>Nunc Lectus Incorporated<br /><span class="small text-muted">Ap #705-5389 Id St.</span></td>
                            <td>May 23, 2020</td>
                            <td><span class="dot dot-lg bg-success mr-2"></span></td>
                          </tr>
                          <tr>
                            <td>2651</td>
                            <th scope="col">Reuben Orr</th>
                            <td>Nisi Aenean Eget Limited<br />
                              <span class="small text-muted">7425 Malesuada Rd.</span></td>
                            <td>Nov 4, 2019</td>
                            <td><span class="dot dot-lg bg-warning mr-2"></span></td>
                          </tr>
                          <tr>
                            <td>2636</td>
                            <th scope="col">Akeem Holder</th>
                            <td>Pellentesque Associates<br />
                              <span class="small text-muted">896 Sodales St.</span></td>
                            <td>Mar 27, 2020</td>
                            <td><span class="dot dot-lg bg-danger mr-2"></span></td>
                          </tr>
                          <tr>
                            <td>2757</td>
                            <th scope="col">Beau Barrera</th>
                            <td>Augue Incorporated<br />
                              <span class="small text-muted">4583 Id St.</span></td>
                            <td>Jan 13, 2020</td>
                            <td><span class="dot dot-lg bg-success mr-2"></span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- / .col-md-8 -->
                <!-- Recent Activity -->
                <div class="col-md-4">
                  <div class="card shadow eq-card timeline">
                    <div class="card-header">
                      <strong class="card-title">Recent Activity</strong>
                      <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body" data-simplebar style="height: 360px; overflow-y: auto; overflow-x: hidden;">
                      <div class="pb-3 timeline-item item-primary">
                        <div class="pl-5">
                          <div class="mb-1 small"><strong>@Brown Asher</strong><span class="text-muted mx-2">Just create new layout Index, form, table</span><strong>Tiny Admin</strong></div>
                          <p class="small text-muted">Creative Design <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-warning">
                        <div class="pl-5">
                          <div class="mb-3 small"><strong>@Fletcher Everett</strong><span class="text-muted mx-2">created new group for</span><strong>Tiny Admin</strong></div>
                          <ul class="avatars-list mb-2">
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-1.jpg">
                              </a>
                            </li>
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                              </a>
                            </li>
                            <li>
                              <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-3.jpg">
                              </a>
                            </li>
                          </ul>
                          <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                      <div class="pb-3 timeline-item item-success">
                        <div class="pl-5">
                          <div class="mb-2 small"><strong>@Kelley Sonya</strong><span class="text-muted mx-2">has commented on</span><strong>Advanced table</strong></div>
                          <div class="card d-inline-flex mb-2">
                            <div class="card-body bg-light small py-2 px-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                          </div>
                          <p class="small text-muted">Back-End Development <span class="badge badge-light">1h ago</span>
                          </p>
                        </div>
                      </div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- / .col-md-3 -->
              </div> <!-- end section -->
            </div>
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

    <!---------- Script de la zone HERO -----------------------> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $('#myCarousel').carousel({
        interval: 30,
        })
  
    </script>


  </body>
</html>