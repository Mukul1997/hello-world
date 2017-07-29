angular.module('myApp').controller('profileController', function($scope, $http) {
    $scope.init = function() {
       
        $http.post("../pages/student.php").then(function(response){
            $scope.studDetails=response.data;
            $scope.student=$scope.studDetails[0];
            $scope.details=$scope.studDetails[1];
        });
    }
    $scope.init();
});