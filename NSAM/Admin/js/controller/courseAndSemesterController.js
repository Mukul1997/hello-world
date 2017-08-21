angular.module('adminApp').controller('courseAndSemesterController', function($scope,$http) {
    $scope.btnname="ADD";
	$scope.displayData=function(){
		$http.get("view/php/getCourseDetail.php").then(function(response){
			$scope.course=response.data;
		});
	}
	$scope.addCourse=function(){
		if($scope.coursename==null){
			alert("Course name is needed");
		}else if($scope.semnumber==null){
			alert("Number of semesters is needed");
		}else if(isNaN($scope.semnumber)){
			alert("Sem should be a number");
		}else if($scope.semnumber<=0){
			alert("Sem should be a valid number");
		}else{
			$http.post("view/php/addCourse.php",
				{'coursename':$scope.coursename,
				'semnumber':$scope.semnumber,
				'button':$scope.btnname,
				'id':$scope.id,
				'cid':$scope.cid
			}).then(function(response){
				alert(response.data);
				$scope.btnname="ADD";
				$scope.displayData();
			});
		}
	}
	$scope.updateData=function(id,cid,cname){
		$scope.btnname="UPDATE";
		$scope.id=id;
		$scope.cid=cid;
		$scope.coursename=cname;
		$http.post("view/php/getSemCount.php",{'cid':$scope.cid}).then(function(response){
			$scope.A=response.data;
			$scope.semnumber=$scope.A[0].semcount;	
		});
	}
	$scope.deleteData=function(id){
		if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("view/php/delete_course.php", {'id':id})  
                .then(function(response){  
                     alert(response.data);  
                     $scope.displayData();  
                });  
           }  
           else  
           {  
                return false;  
           }  
	}
	$scope.displayData();
});