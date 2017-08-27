angular.module('adminApp').controller('staffController', function($scope,$http) {
    //$scope.msg = 'Staff Controller working';
    $scope.btnName = "ADD";
      $scope.btnName2 = "VIEW/CLOSE";  
      $scope.insertData = function(){  
           if($scope.u_roll == null)  
             {  
                  alert("Staff ID is required");  
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
                     "view/php/insertSTAFF.php",  
                     {'u_roll':$scope.u_roll, 'u_name':$scope.u_name, 'u_mob':$scope.u_mob, 'u_email':$scope.u_email, 'btnName':$scope.btnName, 'id':$scope.id}  
                ).success(function(data){  
                     alert(data);  
                       $scope.u_roll = null;  
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
           $http.get("view/php/retrieveSTAFF.php")  
           .success(function(data){  
                $scope.student = data;  
           });
           $scope.isVisible = $scope.isVisible ? false : true;
           $scope.notVisible = $scope.notVisible ? false : true;   
      }  
      $scope.updateData = function(id, usn, name, mobile, email){  
             $scope.id = id;  
             $scope.u_roll = usn;   
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
                $http.post("view/php/deleteSTAFF.php", {'id':id})  
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