angular.module('myApp').controller('attendanceController', function($scope, $http) {
   console.log(" attendance working");
   $scope.init = function() {
       
        $http.post("pages/php/attendance.php").then(function(response){
            $scope.detail=response.data;
            $scope.subject=$scope.detail[0];
            $scope.total=$scope.detail[1];
            $scope.present=$scope.detail[2];
            // console.log($scope.total);
            // console.log($scope.present);
        });
    }
    $scope.init();
});