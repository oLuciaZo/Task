<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <link href="<?php echo base_url(); ?>/vendor/bootstrap/css/dropdown.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url(); ?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Site Management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="Controller/adddevicesHQ">Add HQ</a>
            </li>
            <li>
              <a href="Controller/adddevicesBranch">Add Branch</a>
            </li>
            <li>
              <a href="cards.html">Edit/Update</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">User Management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Privillege Assignment</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Under Construction</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="Controller/test">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">.
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-search"></i>
              </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 Deploy Success</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 Deploy Fails</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 Site Down</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>


      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> HQ-Site -> <div class="dropdown">
            <button onclick="groupid()" class="dropbtn">GroupID</button>
            <div id="group" class="dropdown-content">
              <a href="<?php echo base_url(); ?>">All</a>
              <?php
              if(isset($hq)){
                $no=1;
              foreach ($hq as $object) {

              ?>
            <a href="<?php echo base_url(); ?>Welcome/groupid/<?php print($object->group_device); ?>">Group<?php print($object->group_device); ?></a>
          <?php }}?>
            </div>
          </div></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>LAN1</th>
                  <th>LAN2</th>
                  <th>SiteID</th>
                  <th>SiteName</th>
                  <th>Group</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
              </thead>

              <tbody>
                <?php
                if(isset($hq)){
                  $no=1;
                foreach ($hq as $object) {

                ?>
                <tr>
                  <td><?php print($no); ?></td>
                  <td><?php print($object->lan1); ?></td>
                  <td><?php print($object->lan2); ?></td>
                  <td><?php print($object->siteid); ?></td>
                  <td><?php print($object->sitename); ?></td>
                  <td><?php print($object->group_device); ?></td>
                  <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Controller/callback_edit_hq/<?php print($object->siteid); ?> " id="toggleNavPosition">Edit</a></td>
                  <td><a class="btn btn-primary" id="toggleNavPosition" onclick="del_confirm_hq(<?php print($object->siteid); ?>)">Delete</a></td>
                </tr>
              <?php $no++; }} ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">HQ-Site</div>
      </div>

	<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Branch</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>LAN</th>
                  <th>SIM1</th>
                  <th>SIM2</th>
                  <th>IPSecKey</th>
                  <th>SiteID</th>
                  <th>SiteName</th>
                  <th>Group</th>
                  <th>Operation</th>
                  <th>Edit</th>
                  <th>Remove</th>

                </tr>
              </thead>

              <tbody>
                <?php
                if(isset($branch)){
                  $no=1;
                foreach ($branch as $object) {
                  //print($object->operation);
                  if($object->operation == 1){
                ?>
                <tr>
                  <td><?php print($no); ?></td>
                  <td><?php print($object->lan); ?></td>
                  <td><?php print($object->ipwan1); ?></td>
                  <td><?php print($object->ipwan2); ?></td>
                  <td><?php print($object->ipseckey); ?></td>
                  <td><?php print($object->siteid); ?></td>
                  <td><?php print($object->sitename); ?></td>
                  <td><?php print($object->group_device); ?></td>
                  <td><div class="dropdown">
                    <button onclick="dropdown()" class="dropbtn">Operation</button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="<?php echo base_url(); ?>Controller/update_operation/<?php print($object->siteid); ?>/2">Maintainnance</a>
                      <a href="<?php echo base_url(); ?>Controller/update_operation/<?php print($object->siteid); ?>/3">Relocation</a>
                    </div>
                  </div></td>
                  <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Controller/callback_edit_branch/<?php print($object->siteid); ?> " id="toggleNavPosition">Edit</a></td>
                  <td><a class="btn btn-primary" id="toggleNavPosition" onclick="del_confirm_branch(<?php print($object->siteid); ?>)">Delete</a></td>

                </tr>
              <?php $no++; }}} ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Branch</div>
      </div>
      <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> NewSite</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>LAN</th>
                      <th>SIM1</th>
                      <th>SIM2</th>
                      <th>IPSecKey</th>
                      <th>SiteID</th>
                      <th>SiteName</th>
                      <th>Group</th>
                      <th>Deploy</th>
                      <th>Edit</th>
                      <th>Remove</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    if(isset($branch)){
                      $no=1;
                    foreach ($branch as $object) {
                      if($object->operation == 0){
                    ?>
                    <tr>
                      <td><?php print($no); ?></td>
                      <td><?php print($object->lan); ?></td>
                      <td><?php print($object->ipwan1); ?></td>
                      <td><?php print($object->ipwan2); ?></td>
                      <td><?php print($object->ipseckey); ?></td>
                      <td><?php print($object->siteid); ?></td>
                      <td><?php print($object->sitename); ?></td>
                      <td><?php print($object->group_device); ?></td>
                      <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Welcome/deploy/<?php print($object->siteid."/");print($object->group_device); ?> " id="toggleNavPosition">Deploy</a></td>
                      <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Controller/callback_edit_branch/<?php print($object->siteid); ?> " id="toggleNavPosition">Edit</a></td>
                      <td><a class="btn btn-primary" id="toggleNavPosition" onclick="del_confirm_branch(<?php print($object->siteid); ?>)">Delete</a></td>
                    </tr>
                  <?php $no++; }}} ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">NewSite</div>
          </div>

          <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Maintainnance</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>LAN</th>
                          <th>SIM1</th>
                          <th>SIM2</th>
                          <th>IPSecKey</th>
                          <th>SiteID</th>
                          <th>SiteName</th>
                          <th>Group</th>
                          <th>Deploy</th>
                          <th>Edit</th>
                          <th>Remove</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        if(isset($branch)){
                          $no=1;
                        foreach ($branch as $object) {
                            if($object->operation == 2){
                        ?>
                        <tr>
                          <td><?php print($no); ?></td>
                          <td><?php print($object->lan); ?></td>
                          <td><?php print($object->ipwan1); ?></td>
                          <td><?php print($object->ipwan2); ?></td>
                          <td><?php print($object->ipseckey); ?></td>
                          <td><?php print($object->siteid); ?></td>
                          <td><?php print($object->sitename); ?></td>
                          <td><?php print($object->group_device); ?></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Welcome/deploy/<?php print($object->siteid."/");print($object->group_device); ?> " id="toggleNavPosition">Deploy</a></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url(); ?>Controller/callback_edit_branch/<?php print($object->siteid); ?> " id="toggleNavPosition">Edit</a></td>
                          <td><a class="btn btn-primary" id="toggleNavPosition" onclick="del_confirm_branch(<?php print($object->siteid); ?>)">Delete</a></td>
                        </tr>
                      <?php $no++; }}} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Maintainnance</div>
              </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Task Management Power by Netbuild</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>/vendor/engine/confirm.js"></script>
    <script src="<?php echo base_url(); ?>/vendor/engine/dropdown.js"></script>
  </div>
</body>

</html>
