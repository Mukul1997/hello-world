angular.module('adminApp').controller('homeController', function($scope,$http) {    
   
  $scope.init = function(){
       $http.get("view/php/staff_count.php").then(function(response){
       $scope.stcount = response.data;
  });
}       

  $scope.init2 = function(){
       $http.get("view/php/student_count.php").then(function(response){
       $scope.stucount = response.data;
  });
}

  $scope.init();
  $scope.init2();

  console.log($scope.stcount);
  console.log($scope.stucount);
});