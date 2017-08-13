angular.module('adminApp').controller('sectionController', function($scope,$http) {
    $scope.btnname="ADD";
	$scope.coursename="Select Course";
	$scope.sem="Select Semester";
	$scope.init=function(){
		$scope.displayData();
		$scope.loadCourse();
	}
	$scope.loadCourse=function(){
		$http.get("view/php/getCourseDetail.php").then(function(response){
			$scope.course=response.data;
			$scope.lencourse=$scope.course.length;
		});
	}
	$scope.loadSemester=function(){
		$scope.sem="Select Semester";
		$http.post("view/php/semester.php",{'courseid':$scope.coursename}).then(function(response){
			$scope.semester=response.data;
		});
	}
	$scope.displayData=function(){
		$http.get("view/php/getSectionDetail.php").then(function(response){
			$scope.section=response.data;
		});
	}
	$scope.addSection=function(){
		var letter=/^[a-zA-Z]$/;
		if($scope.coursename=="Select Course"){
			alert("Course name is needed");
		}else if($scope.sem=="Select Semester"){
			alert("Semester is needed");
		}else if($scope.sectionname==null){
			alert("Section name is needed");
		}else if(!$scope.sectionname.match(letter)){
			alert("Section name should be a single character alphabet");
		}else{
			$http.post("view/php/addSection.php",
				{'sectionname':$scope.sectionname,
				'sem':$scope.sem,
				'button':$scope.btnname,
				'id':$scope.id
				
			}).then(function(response){
				alert(response.data);
				$scope.btnname="ADD";

				$scope.displayData();
			});
		}
	}
	$scope.updateData=function(id,coname,sem,sec){
		$scope.btnname="UPDATE";
		$scope.id=id;
		$scope.coursename="Select Course";
		$scope.sem="Select Semester";
		$scope.sectionname=sec;
	}
	$scope.deleteData=function(id){
		$scope.btnname="ADD";
		if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("view/php/delete_section.php", {'id':id})  
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
	$scope.init();
});
angular.module('adminApp').filter("semesterfilter",function(){
	return function(y){
		var i,c;
		for(i=0;i<y.length;i++){
			if(y[i]=="_"){
				c=y.substr(i+1);
				return c;
			}
		}
	};
});