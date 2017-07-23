<?php 
  require 'db.php';
?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Attendance</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
           <link rel="stylesheet" type="text/css" href="style.css">  
      </head>  
      <body id="view" class="img-responsive">  
           <br /><br />  
           <div class="container img-responsive" style="width:850px;">  
                <h2 id="main-title" align="center">Attendance (ಹಾಜರಾತಿ) </h2>  
                <br />  
                <div ng-app="myApp" ng-controller="myCtrl" ng-init="init()">  
                    <table class="table">
                    <thead>
                        <tr>
                            <td>Date(ದಿನಾಂಕ)</td>
                            <td>Semester(ಸೆಮಿಸ್ಟರ್)</td>
                            <td>Subject(ವಿಷಯ)</td>
                            <td>Section(ವಿಭಾಗ)</td>
                            <td>Period(ಅವಧಿ)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="date" ng-model="selectedDate" name="select date" id="x" >
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
                            <td>
                                <select ng-model="selectedPeriod" ng-options="x for x in period">
                                 <option value="">Select Period</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-info" ng-click="displayStud()">SAVE</button>
                                                                                                       
                    <div class="table-responsive">
                        <h2>Table</h2>           
                        <table class="table table-hover"> 
                                <tr>  
                                     <th>USN</th>
                                     <th>Name</th>
                                     <th>Present</th>                      
                                     <th>Absent</th>
                                     <th>Status</th>  
                                </tr>  
                                <tr ng-repeat="z in Student">  
                                    <td>{{z.usn}}</td> 
                                    <td>{{z.name}}</td>
                                    <td><input type="radio" ng-model="stats"  value='1'></td>
                                  <td><input type="radio" ng-model="stats" value='0'></td>
                                  <td ng-checked="test($index,stats)">{{stats}}</td>  
                                </tr>
                           </table>
                           <button type="button" class="btn btn-success" ng-click="insert_attend()">Submit</button>
                    </div>
                </div>  
           </div>
      </body> 
      <script src="data.js"></script> 
      <!--script type="text/javascript">
      function t() {
        today = document.getElementById('x').value;
        console.log(today);
      }
      </script-->
 </html>  
