<?php
      require 'db.php';
      require 'db_con.php';
      session_start();
      if(!$_SESSION['sname']) {
        header('Location: index.php?action=Please Login to continue');
      }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>NSAM First Grade College</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">



    <!-- Material Bootstrap CSS Core -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">  
  </head>

  <body ng-app="myApp">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" data-toggle="modal" data-target="#about-college" style="margin-left:-100px;" >NSAM First Grade College</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><span class="navbar-text">Welcome <?php echo($_SESSION['sname']);?> </span></li>
            <li><a data-toggle="tab" href="#home">Dashboard</a></li>
           <!-- <li><a data-toggle="tab" href="#profile">Profile</a></li>-->
            <li><a href="logout.php"><i class="fa fa-sign-out fa-lg" name="logout" aria-hidden="true"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- About College Details -->
    <div class="modal fade" id="about-college" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="modal-title w-100" id="myModalLabel">NSAM First Grade College</h2>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <p class="aboutModal">Dr. Nitte Shankara Adyanthaya Memorial First Grade College was established in 1988. The college is named after Dr. Nitte Shankara Adyanthaya, a philanthropic medical practitioner who contributed immensely to the upliftment of Nitte village.</p>
                  <p class="aboutModal">Dr. Nitte Shankara Adyanthaya Memorial High School which is the first fruit of Nitte Education Trust was founded in 1980 by Justice K. S. Hegde, the former speaker of Lokasabha. It was upgraded as a Pre- University College in 1983 offering two years Pre-University Education (Karnataka PU Board) in Science and Commerce streams. The college was granted permanent affiliation to the Mangalore University and recognised by the University Grants Commission (UGC) for research funding and development grants in 1998. Dr. Nitte Shankara Adyanthaya Memorial First Grade College was accredited with an A grade by the National Assessment and Accreditation Council in Dec. 2009.</p>
                  <h3>Aim</h3>
                  <p class="aboutModal">The College aims to instill in the students, the ability for analysis and judgement, the ability to relate to professional problems and to draw upon his or her resources for understanding and meaningful action and to inculcate values to draw out a desire for authenticity and sincerity.</p>
              </div>
              <!--Footer-->
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
          <!--/.Content-->
      </div>
  </div>

    <div class="container-fluid">
      <div class="row content-main">
        <div class="col-sm-3 col-md-2 sidebar">
          <div class="text-center">
            <img src="http://www.bookspar.com/wp-content/uploads/2012/12/nitte-logo-300x178.jpg" width="200" height="200" class="img-responsive img-rounded" alt="Logo">
            <h4>NSAM First Grade College, Nitte</h4>
          </div>
          <hr>
          <ul class="nav nav-pills nav-stacked text-justify">
            <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
            <li><a data-toggle="pill" href="#menu2">Subjects</a></li>
            <li><a data-toggle="pill" href="#menu3">Attendance Entry</a></li>
            <li><a data-toggle="pill" href="#menu4">View Attendance</a></li>
            <li><a data-toggle="pill" href="#menu5">Attendance Report</a></li>
          </ul>
        </div>

        <div class="col-sm-9  main">
          <div class="tab-content">
           <div id="home" class="tab-pane fade in active">
           <h1 class="page-header">Dashboard <small>Staff login of NSAM</small></h1>

            <div class="tab-content">
             <div id="home" class="tab-pane fade in active">
              <h3>Profile</h3>
                            <p>Enim rem cumque. Qui corrupti repudiandae quas quasi. Et consectetur sint ea.</p>
              </div>
             </div>
           </div>

            <div id="menu2" class="tab-pane fade"> 
            <h1 class="page-header">Dashboard <small>Staff login of NSAM</small></h1>                 
                <div ng-controller="myCtrl" ng-init="init()">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio"  name="sub" value="Theory" checked> Theory                   
                        </div>
                        <div class="col-md-3">
                            <input type="radio"  name="sub" value="Lab" > Lab                   
                        </div>
                        <div class="col-md-3">
                            <input type="radio"  name="sub" value="Elective"> Elective                    
                        </div>
                        <div class="col-md-3">&nbsp;<br><br></div>
                    </div>
                    <div class="table-responsive">
      
      <table class="table">
        <thead>
          <tr>
            <th><label>Select Course</label></th>
            <th><label>Select Semester</label></th>
            <th><label>Select Section</label></th>
            <th><label>Select Subject</label></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select ng-model="cour" ng-change="selectSemester(cour)" name="course">
                <option selected>Select Course</option>
                <option ng-repeat="a in course">{{a}}</option>
              </select>
            </td>
            <td>
              <select ng-model="sem" ng-change="selectSectionSubject(sem)" name="semester">
                <option selected>Select Semester</option>
                <option ng-repeat="b in semester">{{b}}</option>
              </select>
            </td>
            <td>
              <select ng-model="sec" name="section">
                <option selected>Select Section</option>
                <option ng-repeat="c in section">{{c}}</option> 
              </select>
            </td>
            <td>
              <select ng-model="sub" name="subject">
                <option selected>Select Subject</option>
                <option ng-repeat="d in subject">{{d}}</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><button type="button" class="btn" ng-click="insertData()">SAVE</button></td>
          </tr>
        
        </tbody>
      
      </table>


    
      <div>
           <table class="table table-striped">
        <thead>
          <tr>
            <th>Subject Name</th>
            <th>Subject Code</th>
            <th>Staff Name</th>
            <th>Semester</th>
            <th>Course</th>
            <th>Section</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in detail">
            <td>{{x.sub_name}}</td>
            <td>{{x.sub_id}}</td>
            <td>{{x.st_name}}</td>
            <td>{{x.section_semester_sem_id}}</td>
            <td>{{x.c_name}}</td>
            <td>{{x.sec_name}}</td>
            
          </tr>
        </tbody>
      </table>
         </div>
  </div>
            </div>  <!-- subject app -->            
      </div>        
            
    <div id="menu3" class="tab-pane fade">
    <h1 class="page-header">Dashboard <small>Staff login of NSAM</small></h1>  
       <!-- <div class="container"> -->
            <div ng-controller="myCtrl" ng-init="init2()">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Subject</td>
                            <td>Section</td>
                            <td>Period</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select ng-model="selectedDate" ng-options="x for x in dates">
                                </select>
                            </td>
                            <td>
                                <select ng-model="selectedSubjects" ng-options="x for x in subjects">
                                </select>
                            </td>
                            <td>
                                <select ng-model="selectedSections" ng-options="x for x in sections">
                                </select>
                            </td>
                            <td>
                                <select ng-model="selectedPeriod" ng-options="x for x in period">
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table> 
                <h2>Table</h2>                                                                                      
                <div class="table-responsive">          
                    <table class="table table-striped" style=""> 
                            <tr>  
                                 <th>USN</th>
                                 <th>Name</th>
                                 <th>Present</th>                      
                                 <th>Absent</th>  
                            </tr>  
                            <tr ng-repeat="x in student">  
                                <td>{{x.usn}}</td> 
                                <td>{{x.name}}</td>
                                <td><input type="radio" name="attend{{x.usn}}" value="Present" ng-checked="true"></td>
                              <td><input type="radio" name="attend{{x.usn}}" value="Absent"></td> 
                            </tr>   
                       </table>
                </div>
            </div>
        <!--</div>-->
    </div> 

            <div id="menu4" class="tab-pane fade">
            <h1 class="page-header">Dashboard <small>Staff login of NSAM</small></h1>  
              <h3>Menu 4</h3>
              <p>Some content in menu 4.</p>
            </div>
           
            <div id="menu5" class="tab-pane fade">
            <h1 class="page-header">Dashboard <small>Staff login of NSAM</small></h1>  
              <h3>Menu 5</h3>
              <p>Some content in menu 5.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/mdb.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/staff.controller.js"></script>
    <script src="js/selectdata.js"></script>
    <script>
        //set user name here
        document.getElementById('getUserName').innerText += " "+<?php echo($_SESSION['sname']);?>;
    </script>
  </body>
</html>