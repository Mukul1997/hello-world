<!DOCTYPE html>
<html lang="eng">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
	<title>Database Management</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
    
  	 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body id="views"> 
                 <!-- Navigation -->
				    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				        <div class="container">
				            <!-- Brand and toggle get grouped for better mobile display -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				                    <span class="sr-only">Toggle navigation</span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				                <a href="https://ih1.redbubble.net/image.52959096.7208/flat,800x800,075,t.u7.jpg" target="_blank" class="navbar-left"><img id="nav-brand" src="img/logo.png"  style="margin-left:-80px;width:100px;"></a>
                        <a class="navbar-brand" href="#" style="padding-left:25px;">NSAM</a>
                        <!--a class="navbar-brand" href="#"><img src="img/logo.png" style="display: inline-block;"><span style="display: inline-block;">NSAM Nitte</span></a-->
				            </div>
				            <!-- Collect the nav links, forms, and other content for toggling -->
				                <ul class="nav navbar-nav navbar-right">
				                    <li>
				                        <a href="#">About</a>
				                    </li>
				                    <li>
				                        <a href="#">Services</a>
				                    </li>
				                    <li>
				                        <a href="#">Contact</a>
				                    </li>
				                </ul>
				            <!-- /.navbar-collapse -->
				        </div>
				        <!-- /.container -->
				    </nav>
            <div class="container begin" style="width:900px;"> 
                <h1 align="center">Staff Database</h1>  
                <div ng-app="myapp" ng-controller="usercontroller"> 
                     <div ng-hide="notVisible">
                     	  <label>Staff ID</label>  
                         <input type="text" name="usn" ng-model="u_roll" class="form-control" />  
                         <br />
                         <label>Password</label>  
                         <input type="password" name="pass" ng-model="u_pass" class="form-control" />  
                         <br />  
                         <label>Name</label>  
                         <input type="text" name="name" ng-model="u_name" class="form-control" />
                         <br />
                         <label>Mobile</label>  
                         <input type="text" name="mobile" ng-model="u_mob" class="form-control" />  
                         <br /> 
                         <label>Email</label>  
                         <input type="text" name="email" ng-model="u_email" class="form-control" />
                         <br />  
	                     <input type="hidden" ng-model="id" />  
	                     <div style="text-align:center;">
	                     	<input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="{{btnName}}"/>
	                     	<!--input style="display:inline-block;" type="submit" name="btnInsert" class="btn btn-info" ng-click="displayData()" value="{{btnName2}}"/-->
	                     </div>
                     </div>
                     <div style="text-align:center;padding-top:5px;">
                     	<input style="display:inline-block;" type="submit" name="btnInsert" class="btn btn-info" ng-click="displayData()" value="{{btnName2}}"/>
                     </div>
                     <br /><br /> 
                     <div ng-show="isVisible">
                     	<hr>
                     	 <table class="table table-striped" style=""> 
                            <tr>  
                                 <th>Staff ID</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Email</th>                         
                                 <th>Update</th>
                                 <th>Delete</th>  
                            </tr>  
                            <tr ng-repeat="x in student">  
                                 <td>{{x.staff_id}}</td>
                                 <td>{{x.st_name}}</td>  
                                 <td>{{x.st_mob}}</td>  
                                 <td>{{x.st_email}}</td>
                                 <td><button ng-click="updateData(x.id, x.staff_id, x.st_name, x.st_mob, x.st_email)" class="btn btn-success btn-xs">Update</button></td>
                                 <td><button ng-click="deleteData(x.id )"class="btn btn-danger btn-xs">Delete</button></td>  
                            </tr>   
                       </table>
                     </div>  
                </div>  
           </div> 
<script>  
 var app = angular.module("myapp",[]);  
 app.controller("usercontroller", function($scope, $http){  
      $scope.btnName = "ADD";
      $scope.btnName2 = "VIEW/CLOSE";  
      $scope.insertData = function(){  
           if($scope.u_roll == null)  
             {  
                  alert("Staff ID is required");  
             }  
             else if($scope.u_pass == null)  
             {  
                  alert("Password is required");  
             }
             else if($scope.u_name == null)  
             {  
                  alert("Name is required");  
             }
             else if($scope.u_mob == null)  
             {  
                  alert("Mobile number is required");  
             }
             else if($scope.u_email == null)  
             {  
                  alert("Email ID is required");  
             }  
           else  
           {  
                $http.post(  
                     "insert.php",  
                     {'u_roll':$scope.u_roll, 'u_pass':$scope.u_pass, 'u_name':$scope.u_name, 'u_mob':$scope.u_mob, 'u_email':$scope.u_email, 'id':$scope.id}  
                ).success(function(data){  
                     alert(data);  
                       $scope.u_roll = null;
                       $scope.u_pass = null;   
                       $scope.u_name = null;
                       $scope.u_mob = null;  
                       $scope.u_email = null;   
                       $scope.btnName = "ADD";  
                       $scope.displayData();  
                });  
           }  
      }  
      $scope.isVisible = false;
      $scope.notVisible = false;
      $scope.displayData = function(){  
           $http.get("retrieve.php")  
           .success(function(data){  
                $scope.student = data;  
           });
           $scope.isVisible = $scope.isVisible ? false : true;
           $scope.notVisible = $scope.notVisible ? false : true;   
      }  
      $scope.updateData = function(id, usn, pass, name, mobile, email){  
             $scope.id = id;  
             $scope.u_roll = usn;
             $scope.u_pass = pass;   
             $scope.u_name = name;
             $scope.u_mob = mobile;  
             $scope.u_email = email;    
             $scope.btnName = "Update";
             $scope.isVisible = $scope.isVisible ? false : true;
             $scope.notVisible = $scope.notVisible ? false : true;  
        }
      $scope.deleteData = function(id){  
           if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("delete.php", {'id':id})  
                .success(function(data){  
                     alert(data);  
                     $scope.displayData();  
                });  
           }  
           else  
           {  
                return false;  
           }  
      }  
 });  
 </script>  
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

