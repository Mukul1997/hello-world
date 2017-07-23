var app=angular.module("myApp",[]);
      app.controller("myCtrl",function($scope,$http){

        $scope.loadSemester = function(){  
           $http.get("semester.php").then(function(response){  
                $scope.semester = response.data;
           });

        }

        $scope.loadSubject = function(){  
           $http.get("retrieve1.php").then(function(response){  
                $scope.subject = response.data;
           });

        }  
        
        $scope.loadSection = function(){  
             $http.post("retrieve2.php").then(function(response){  
                  $scope.section = response.data;  
             }); 
        }

        $scope.attendanceView = function(){
              $scope.date = document.getElementById('x').value;
              alert($scope.date);
           
           $http({  
                     method:'POST',
                     url:'retrieve.php',  
                     data:{'selectedDate':$scope.date,
                          'sem_attend':$scope.sem_attend,
                          'sub_attend':$scope.sub_attend,
                          'sec_attend':$scope.sec_attend}
              }).then(function(response){
             $scope.StudAtt = response.data;
             console.log(response.data);         
               });
            
          }
});