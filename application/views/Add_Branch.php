<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register Branch Router</div>
      <div class="card-body">
        <form name=form1 action="add_branch" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">SIM1</label>
                <input class="form-control" id="WAN1" name=WAN1 type="text" aria-describedby="nameHelp" placeholder="IP Address Interface1">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">SIM2</label>
                <input class="form-control" id="WAN2" name=WAN2 type="text" aria-describedby="nameHelp" placeholder="IP Address Interface2" onclick="ValidateIPaddress(document.form1.WAN1)">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">LAN</label>
            <input class="form-control" id="LAN" name=LAN type="text" aria-describedby="emailHelp" placeholder="IP Address LAN" onclick="ValidateIPaddress(document.form1.WAN2)">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">SiteID</label>
                <input class="form-control" id="SiteID" name=SiteID type="text" placeholder="SiteID" onclick="ValidateIPaddress(document.form1.LAN)">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">SiteName</label>
                <input class="form-control" id="SiteName" name=SiteName type="text" placeholder="SiteName" onclick="ValidateIPaddress(document.form1.WAN1)">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Username</label>
                <input class="form-control" id="Username" name=Username type="text" placeholder="Username" onclick="ValidateIPaddress(document.form1.WAN2)">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Password</label>
                <input class="form-control" id="Password" name=Password type="password" placeholder="Password" onclick="ValidateIPaddress(document.form1.LAN)">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
              </div>
              <div class="col-md-3">
                <input class="form-control" type="submit" name="submit" value="OK" />
              </div>
          <div class="col-md-3">
                <input class="form-control" type="button" onclick="history.back();" value="Cancel">
            </div>
          <div class="col-md-3">
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>/vendor/engine/checkip.js"></script>
  <script src="<?php echo base_url(); ?>/vendor/engine/notab.js"></script>
</body>

</html>
