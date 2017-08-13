angular.module('adminApp').controller('studentController', function($scope, $http) {
    //$scope.msg = 'Student Controller Working';
    $scope.btnName = "ADD";
      $scope.btnName2 = "VIEW/CLOSE";  
      $scope.insertData = function(){  
           if($scope.u_roll == null)  
             {  
                  alert("USN is required");  
             }  
             else if($scope.u_dob == null)  
             {  
                  alert("Date of Birth is required");  
             }
             else if($scope.u_name == null)  
             {  
                  alert("Name is required");  
             }
             else if($scope.u_mob == null)  
             {  
                  alert("Mobile number is required");  
             }
             else if($scope.u_add == null)  
             {  
                  alert("Address is required");  
             }
             else if($scope.u_email == null)  
             {  
                  alert("Email ID is required");  
             }
             else if($scope.u_sec == null)  
             {  
                  alert("Section is required");  
             } 
             else if($scope.u_sem == null)  
             {  
                  alert("Semester is required");  
             }  
           else  
           {  
                $http.post(  
                     "view/php/insert.php",  
                     {'u_roll':$scope.u_roll, 'u_dob':$scope.u_dob, 'u_name':$scope.u_name, 'u_mob':$scope.u_mob, 'u_add':$scope.u_add, 'u_email':$scope.u_email, 'u_sec':$scope.u_sec, 'u_sem':$scope.u_sem, 'btnName':$scope.btnName, 'id':$scope.id}  
                ).success(function(data){  
                     alert(data);  
                       $scope.u_roll = null;
                       $scope.u_dob = null;   
                       $scope.u_name = null;
                       $scope.u_mob = null;
                       $scope.u_add = null;  
                       $scope.u_email = null;  
                       $scope.u_sec = null;
                       $scope.u_sem = null;   
                       $scope.btnName = "ADD";  
                       $scope.displayData();  
                });  
           }  
      }  
      $scope.isVisible = false;
      $scope.notVisible = false;
      $scope.displayData = function(){  
           $http.get("view/php/retrieve.php")  
           .success(function(data){  
                $scope.student = data;  
           });
           $scope.isVisible = $scope.isVisible ? false : true;
           $scope.notVisible = $scope.notVisible ? false : true;   
      }  
      $scope.updateData = function(id, usn, date, name, mobile, address, email, section, sem){  
             $scope.id = id;  
             $scope.u_roll = usn;
             $scope.u_dob = date;   
             $scope.u_name = name;
             $scope.u_mob = mobile;
             $scope.u_add = address;  
             $scope.u_email = email;  
             $scope.u_sec = section;
             $scope.u_sem = sem;    
             $scope.btnName = "Update";
             $scope.isVisible = $scope.isVisible ? false : true;
             $scope.notVisible = $scope.notVisible ? false : true;  
        }
      $scope.deleteData = function(id){  
           if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("view/php/delete.php", {'id':id})  
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