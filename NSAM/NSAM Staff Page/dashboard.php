<?php
      session_start();
      if(!$_SESSION['sname']) {
       header('Location:login.php?action=Please Login');
      }
?>

<html ng-app="myApp">
  <head>
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Angular plugins -->
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.js"></script>
    
    <!-- Angular Script -->
    <script src="js/script.js"></script>

    <!-- Controllers -->
    <script src="js/controllers/mainController.js"></script>
    <script src="js/controllers/subjectController.js"></script>
    <script src="js/controllers/attendanceController.js"></script>  
    <script src="js/controllers/viewController.js"></script>
    <script src="js/controllers/reportController.js"></script> 
    <script src="js/controllers/staffChangePasswordController.js"></script> 
    <script src="https://rawgithub.com/eligrey/FileSaver.js/master/FileSaver.js" type="text/javascript"></script>
    <script src="js/fileSaver.js" type="text/javascript"></script>

  </head>

  <!-- define angular controller -->
  <body ng-controller="mainController">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NSAM First Grade College</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo($_SESSION['sta_name'])?></a></li>
          <li><a href="session/logout.php" name="logout">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div style="margin-top:5rem;">
      <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-3 col-md-2 sidebar">
                      <div class="text-center">
                          <img src="img/logo3.jpg" alt="Logo not Loaded" class="img-responsive">
                          <p class="lead">NSAM First Grade College, Nitte</p>
                          <hr />
                      </div>
                      <ul class="nav nav-sidebar">
                          <li id="homeBtn"><a href="#">Home</a></li>
                          <li id="subjectBtn"><a href="#subject">Subjects</a></li>
                          <li id="attendanceBtn"><a href="#attendance">Attendance Entry</a></li>
                          <li id="viewBtn"><a href="#view">View Attendance</a></li>
                          <li id="reportBtn"><a href="#report">Attendance Report</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-8 col-md-9 col-md-offset-2 col-sm-offset-3 main">
                      <h1 class="page-header">NSAM First Grade College</h1>
                      <div ng-view></div>
                  </div>
              </div>
          </div>
    </div>
  </body>
  
</html>