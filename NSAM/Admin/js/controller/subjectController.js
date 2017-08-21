angular.module('adminApp').controller('subjectController', function($scope,$http) {
    $scope.btnname="ADD";
	$scope.coursename="Select Course";
	$scope.sem="Select Semester";
	$scope.subjecttype="Select SubjectType";
	$scope.init=function(){
		$scope.subtype=[{'typename':'Theory','typevalue':'0'},{'typename':'Lab','typevalue':'1'},{'typename':'Elective','typevalue':'2'}];
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
		$scope.subjecttype="Select SubjectType";
		$http.post("view/php/semester.php",{'courseid':$scope.coursename}).then(function(response){
			$scope.semester=response.data;
		});
	}
	$scope.displayData=function(){
		$http.get("view/php/getSubjectDetail.php").then(function(response){
			$scope.section=response.data;
		});
	}
	$scope.addSubject=function(){
		if($scope.coursename=="Select Course"){
			alert("Course name is needed");
		}else if($scope.sem=="Select Semester"){
			alert("Semester is needed");
		}else if($scope.subjectname==null){
			alert("Subject name is needed");
		}else if($scope.subjectid==null){
			alert("Subject ID is needed");
		}else if($scope.subjecttype=="Select Subject Type"){
			alert("Subject Type is needed");
		}else{
			$http.post("view/php/addSubject.php",
				{'cid':$scope.coursename,
				'sem':$scope.sem,
				'subname':$scope.subjectname,
				'subid':$scope.subjectid,
				'oldsubid':$scope.oldsubid,
				'subtype':$scope.subjecttype,
				'button':$scope.btnname,
				'id':$scope.id
				
			}).then(function(response){
				alert(response.data);
				$scope.btnname="ADD";
				$scope.displayData();
			});
		}
	}
	$scope.updateData=function(id,sname,sid){
		$scope.btnname="UPDATE";
		$scope.id=id;
		$scope.coursename="Select Course";
		$scope.sem="Select Semester";
		$scope.subjectname=sname;
		$scope.subjectid=sid;
		$scope.oldsubid=sid;
		$scope.subjecttype=="Select SubjectType";
	}
	$scope.deleteData=function(id){
		$scope.btnname="ADD";
		
		if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("view/php/delete_subject.php", {'id':id})  
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