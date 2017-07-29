<?php
      session_start();
      if(!$_SESSION['sname']) {
       header('Location:Login.php?action=Please Login');
      }
?>

<html lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="img/Nitte-Logo.png">
    <title> Dashboard </title>
    
    <link rel="stylesheet" href="css/Stylesheet.css">
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Angular Plugin -->
    <script src="js/controllers/angular.min.js"></script>
    <script src="js/controllers/angular-route.js"></script>
    <!-- Angular Script -->
    <script src="js/script.js"></script>
    <!-- Controllers -->
    <script src="js/controllers/mainController.js"></script>
    <script src="js/controllers/attendanceController.js"></script>
    <script src="js/controllers/profileController.js"></script>

  </head>

  <body>
    <div class="view" id="Dashboard_Background">
      
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="Dashboard.php"> NSAM Smart Campus </a>
                </div>
              
                <ul class="nav navbar-nav">
                  <li><a href="#"> Home </a></li>
                  <li><a href="#Profile"> My Profile </a></li>
                  <li><a href="#Attendance"> Attendance </a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"> <?php echo($_SESSION['sname']);?> </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" name="logout"></span> Log Out </a></li>
                </ul>
        </div>
      </nav>

        <div class="container">
               
                <div class="row">
                  <h2 id="title" class="h1-responsive page-header">NSAM First Grade College Smart Campus, Nitte</h2>
                  <hr style="border-top: 1.5px solid #102f78;">
                </div>

                <div ng-view>
                  <!-- modules are dynamically loaded here -->
                </div> 
       
       </div>

    </div>   
  </body>
</html>