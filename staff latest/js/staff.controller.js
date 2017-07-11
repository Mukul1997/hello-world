var app = angular.module('myApp', [])
.controller('myCtrl', function($scope) {
    $scope.course = ["x", "y", "z"],
    $scope.subject = ["a","b","c"],  
    $scope.section = ["p", "q", "r"],
    $scope.sem = ["l","m","n"] 
})
.controller('atdEntry', function($scope) {
    $scope.dates = ["x", "y", "z"],
    $scope.subjects = ["a","b","c"],  
    $scope.sections = ["p", "q", "r"],
    $scope.period = ["l","m","n"]
});