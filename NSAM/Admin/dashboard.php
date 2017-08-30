<?php
      include 'view/php/bstaff.php';
      include 'view/php/bstudent.php';
      session_start();
      if(!$_SESSION['name']) {
       header('Location: index.php?action=Please Login');
      }
?>

<html lang="en" ng-app="adminApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSAM First Grade College</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script-->

    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NSAM First Degree College</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Dashboard</a></li>
            <!-- <li><a href="#courseAndSemester">Course &amp; Semester</a></li>
            <li><a href="#section">Section</a></li>
            <li><a href="#subject">Subject</a></li>            
            <li><a href="#staff">Staff</a></li>
            <li><a href="#student">Student</a></li>
            <li><a href="#sms">SMS</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="validation/logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin <small>Toolkit</small></h1>
          </div>
          <!-- <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Bulk Upload
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage1">Add Staff</a></li>
                <li><a type="button" data-toggle="modal" data-target="#addPage2">Add Student</a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#courseAndSemester" class="list-group-item">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Course and Semester 
              </a>
              <a href="#section" class="list-group-item">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Section 
              </a>
              <a href="#subject" class="list-group-item">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Subject 
              </a>
              <a href="#staff" class="list-group-item">
                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Staff 
              </a>
              <a href="#student" class="list-group-item">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Student 
              </a>
              <a href="#sms" class="list-group-item">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> SMS 
              </a>
            </div>
          </div>
          <div class="col-md-9">
            <div ng-view></div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright FInite Loop, &copy; 2017</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page1 -->
    <!-- <div class="modal fade" id="addPage1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="m1.">
        <form>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">Add Staff</h3>
        </div>
        <div class="modal-body">
          
          <form action="view/php/bstaff.php" method="post" enctype="multipart/form-data">
              <h1>Bulk Entry (Staff)</h1>
              <input type="file" name="file"/>
              <br><br>
              <input class="btn btn-info" type="submit" name="importsub"/>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </form>
      </div>
    </div>
</div> -->

<!-- Add Page2 -->
<!--     <div class="modal fade" id="addPage2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="m2.">
        <form>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">Add Student</h3>
        </div>
        <div class="modal-body">
          
          <form action="view/php/bstudent.php" method="post" enctype="multipart/form-data">
              <h1>Bulk Entry (Student)</h1>
              <input type="file" name="file"/>
              <br><br>
              <input class="btn btn-info" type="submit" name="importsub"/>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </form>
      </div>
    </div>
</div> -->

<!--script>
    CKEDITOR.replace( 'editor1' );
</script-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
    <script src="js/bstrap_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Basic Router Setup and Controllers -->
    <script src="js/route.js"></script>
    <script src="js/controller/addStaffController.js"></script>
    <script src="js/controller/addStudentController.js"></script>
    <script src="js/controller/courseAndSemesterController.js"></script>
    <script src="js/controller/editStaffController.js"></script>
    <script src="js/controller/editStudentController.js"></script>
    <script src="js/controller/homeController.js"></script>
    <script src="js/controller/sectionController.js"></script>
    <script src="js/controller/smsController.js"></script>
    <script src="js/controller/staffController.js"></script>
    <script src="js/controller/studentController.js"></script>
    <script src="js/controller/subjectController.js"></script>


    <!-- Chartjs -->
    <!-- <script src="js/chart.min.js"></script>
    <script>
      var myChart = document.getElementById('myChart').getContex('2d');

      var massPopChart = new Chart(mychart, {
        type: 'doughnut',
        data: {
          labels:['Boston', 'Worcester', 'Springdield', 'Lowell', 'Cambridge', 'New Bedford'],
          datasets:[{
            label:'Population',
            data:[
              617594,
              181045,
              153060,
              106519,
              105162,
              95072
            ]
          }]
        },
        options: {} 
      }); 
    </script> -->
  </body>
</html>
