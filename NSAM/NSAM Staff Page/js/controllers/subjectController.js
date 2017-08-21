angular.module('myApp').controller('subjectController', function($scope,$http) {
    $scope.init=function(){
        $scope.subtype="0";
 		    $scope.displayData();
      	$scope.selectCourse();
    } 
    $scope.displayData=function(){
      $http.get("pages/php/selectall.php").then(function(response){
        $scope.detail=response.data;
      });
    }
    $scope.selectCourse=function(){          
      $scope.cour="Select Course";
      $scope.sem="Select Semester";
      $scope.sec="Select Section";
      $scope.sub="Select Subject";    
      $http.get("pages/php/course.php").then(function(response){
        $scope.course=response.data;
      });
    } 
    $scope.selectSemester=function(){
      $scope.sem="Select Semester";
      $scope.sec="Select Section";
      $scope.sub="Select Subject";
      $scope.section=null;
      $scope.subject=null;
      
      $http.post("pages/php/semester.php",{'courseid':$scope.cour}).then(function(response){
        $scope.semester=response.data;
      }); 
    }  
    $scope.selectSectionSubject=function(){
      $scope.sec="Select Section";
      $scope.sub="Select Subject";
     
      $http.post("pages/php/section.php",{'sem':$scope.sem}).then(function(response){
        $scope.section=response.data;
      });

      $http.post("pages/php/subject.php",{'sem':$scope.sem,'subtype':$scope.subtype}).then(function(response){
        $scope.subject=response.data;
      });
    }
    $scope.selectSectionID=function(){
      $http.post("pages/php/getsectionid.php",{'sectionname':$scope.sec,'sem':$scope.sem}).then(function(response){
        $scope.B=response.data;
        $scope.secid=$scope.B[0].sec_id;
      });
    }
    $scope.selectSubjectID=function(){
      $http.post("pages/php/getsubjectid.php",{'subjectname':$scope.sub}).then(function(response){
        $scope.C=response.data;
        $scope.subid=$scope.C[0].sub_id;
      });
    }
    $scope.insertData = function(){        
      if($scope.cour == "Select Course")  
      {  
        alert("Course is required");  
      }  
      else if($scope.b == "Select Semester")  
      {  
        alert("Semester is required");  
      }
      else if($scope.sec == "Select Section")  
      {  
        alert("Section is required");  
      }
      else if($scope.sub == "Select Subject")  
      {  
        alert("Subject is required");  
      }       
      else  
      {                      
        $http({  
          method:'POST',
          url:'pages/php/insert.php',  
          data:{
            'cour':$scope.cour,
            'sem':$scope.sem,
            'sec':$scope.secid,
            'sub':$scope.subid}           
          }).then(function(response){  
              alert(response.data); 
              $scope.displayData();                  
        });                   
      }  
    }
    $scope.deleteData=function(a,b,c){
      $http.post("pages/php/getsectionid.php",{'sectionname':b,'sem':c}).then(function(response){
                  $scope.C=response.data;
                  $scope.section=$scope.C[0].sec_id;
                  if(confirm("Are you sure you want to delete this data?"))  
                   {  
                        $http.post("pages/php/delete_subject.php",{'subid':a,'sec':$scope.section,'semid':c})  
                        .then(function(response){  
                            alert(response.data);  
                            $scope.displayData();  
                            console.log($scope.section);
                        });  
                   }  
                   else  
                   {  
                        return false;  
                   }  
      });
      
    }
    $scope.init();
});

angular.module("myApp").filter("semesterfilter",function(){
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