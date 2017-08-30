angular.module('myApp').controller('attendanceController', function($scope, $http) {
   var thor = [];
   var thor2 = [];
   var res = [];

   $scope.init = function() {
       
        $http.post("pages/php/attendance.php").then(function(response){
            $scope.detail=response.data;
            $scope.subject=$scope.detail[0];
            $scope.total=$scope.detail[1];
            $scope.present=$scope.detail[2];
        });
    }
    $scope.init();

    $scope.blah = function(c,d) {
    	thor[c] = parseInt(d); 
    }

    $scope.blah2 = function(c,d) {
    	thor[c] = (thor[c]/parseInt(d) * 100).toFixed(2); 
    }

    $scope.res = thor;
    console.log($scope.res);

});