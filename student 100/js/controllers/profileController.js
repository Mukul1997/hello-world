angular.module('myApp').controller('profileController', function($scope, $http) {
    $scope.init = function() {
       
        $http.post("pages/php/student.php").then(function(response){
            $scope.studDetails=response.data;
        });
    }
    $scope.init();
});