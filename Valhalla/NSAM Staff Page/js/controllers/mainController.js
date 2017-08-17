angular.module('myApp').controller('mainController', function($scope, $http, LoginFactory) {
    $scope.staff_id = LoginFactory.getID;
    $scope.init = function() {
       
        $http.post("pages/php/staff.php",{'sid':$scope.staff_id}).then(function(response){
            $scope.staffDetails=response.data;
        });
    }
    $scope.init();
});