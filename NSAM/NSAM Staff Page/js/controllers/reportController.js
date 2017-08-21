angular.module('myApp').controller('reportController', function($scope,$http,LoginFactory) {
    $scope.staff_id=LoginFactory.getID;

    $scope.exportData = function () {
        var blob = new Blob([document.getElementById('exportable').innerHTML], {
            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
        });
        saveAs(blob, "report.xls");
    };
    
    $scope.loadSemester = function(){  
           $http.post("pages/php/semester_attendance.php").then(function(response){  
                $scope.semester = response.data;
           });

        }
     

        $scope.loadSubject = function(){  
           $http.get("pages/php/retrieve1.php").then(function(response){  
                $scope.subject = response.data;
           });

        }  
        
        $scope.loadSection = function(){  
             $http.post("pages/php/retrieve2.php").then(function(response){  
                  $scope.section = response.data;  
             }); 
        }

        $scope.attendanceView = function(){
              $scope.date1 = document.getElementById('x').value;
              $scope.date2 = document.getElementById('y').value;
              console.log($scope.date1);
              console.log($scope.date2);
           $http({  
                     method:'POST',
                     url:'pages/php/report_attendance.php',  
                     data:{'selectedFromDate':$scope.date1,
                          'selectedToDate':$scope.date2,
                          'sem_attend':$scope.sem_attend,
                          'sub_attend':$scope.sub_attend,
                          'sec_attend':$scope.sec_attend
                      		}
              }).then(function(response){
             $scope.StudAtt = response.data;
               console.log(response.data);  
              $scope.usn=$scope.StudAtt[0];
              $scope.dates=$scope.StudAtt[1];
              $scope.status=$scope.StudAtt[2];
              console.log($scope.status);
              
             });
            
          }
          $scope.loadSemester();
});
       