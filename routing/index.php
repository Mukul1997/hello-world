<?php 
  require 'db.php';
?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Attendance View</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
           <link rel="stylesheet" type="text/css" href="style.css">  
      </head>  
      <body id="view" class="img-responsive">  
           <br /><br />  
           <div class="container img-responsive" style="width:850px;">  
                <h2 id="main-title" align="center">Attendance View</h2>  
                <br />  
                
                <div ng-app="myApp" ng-controller="myCtrl" ng-init="loadSemester()">  
                    <table class="table">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Semester</td>
                            <td>Subject</td>
                            <td>Section</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="date" ng-model="selectedDate" name="select date" id="x">
                            </td>
                            <td>
                                          <select name="seme" ng-model="sem_attend" ng-change="loadSubject()">  
                                          <option value="">Select Semester</option>  
                                          <option ng-repeat="sem in semester" value="{{sem.section_semester_sem_id}}">{{sem.section_semester_sem_id}}</option>    
                                          </select>
                                    </td>
                            <td>
                                          <select name="subj" ng-model="sub_attend" ng-change="loadSection()">  
                                          <option value="">Select Subject</option>  
                                          <option ng-repeat="sub in subject" value="{{sub.sub_id}}" >{{sub.sub_id}}-{{sub.sub_name}}</option>  
                                          </select>
                                   </td>
                                    <td>
                                          <select name="sect" ng-model="sec_attend">  
                                          <option value="">Select Section</option>  
                                          <option ng-repeat="sec in section" value="{{sec.section_sec_id}}">{{sec.section_sec_id}}</option>    
                                          </select>
                                    </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-info" ng-click="attendanceView()">View</button>
                                                                                                       
                     <div class="table-responsive">
                        <h2>Attendance</h2>           
                        <table class="table table-striped"> 
                                <tr>  
                                     <!-- <th>Date</th> -->
                                     <th>USN</th>
                                     <th>{{date_attend}}</th>                     
                                </tr>  
                                 <tr ng-repeat="z in StudAtt">  
                                    <!-- <td>{{z.date_attend}}</td> -->
                                    <td>{{z.Student_usn}}</td> 
                                    <td>{{z.status}}</td>
                                </tr> 
                           </table>
                    </div>

                 </div>  
           </div>

      </body> 
      <script src="data.js"></script> 
 </html>  
