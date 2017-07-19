var app=angular.module("myApp",[]);

   
      app.controller("myCtrl",function($scope,$http){
        $scope.init4 = function(){
          $scope.insert_attend();
        }
        
        $scope.init=function(){
         
         
           $scope.selectCourse();
           $scope.displayData();
        }
         $scope.insert_attend=function(){
         $http({  
                     method:'POST',
                     url:'insert_attend.php',  
                     data:{'selectedDate':$scope.courseid,'sub_attend':$scope.sem,'sec_attend':$scope.secid,'selectPeriod':$scope.subid,'staff':'st001'}
                  
                }).then(function(response){  
                     alert(response.data); 
                   $scope.displayData();
                        
                });
      }
        $scope.displayData=function(){
         $http.post("selectall.php",{'staff':'st001'}).then(function(response){
             $scope.detail = response.data;
         });
      }

      
     
        $scope.init2=function(){
             $scope.loadSubject();
             //$scope.displayStud();
             $scope.period = ["1","2","3","4","5","6","7","8","9","10"];
         }
         
         $scope.displayStud = function(){  
           $http.get("retrieve.php").then(function(response){
             $scope.student = response.data;
         });
      }


          $scope.selectCourse=function(){
             
              $scope.cour="Select Course";
              $scope.sem="Select Semester";
              $scope.sec="Select Section";
              $scope.sub="Select Subject";
            
              $http.get("course.php").then(function(response){
                  $scope.recievedcoursedata=response.data;
                  $scope.len1=$scope.recievedcoursedata.length;
                  var i,arr1=[];
                  for(i=0;i<$scope.len1;i++){
                      arr1[i]=$scope.recievedcoursedata[i].c_name;
                  }
                  $scope.course=arr1;

                  $http.get("semester.php").then(function(response){
                    $scope.recievedsemdata=response.data;
                  });
              });


          }

          $scope.selectSemester=function(a){
            var i;
            $scope.courseid=null;
            for(i=0;i<$scope.len1;i++){
              if($scope.recievedcoursedata[i].c_name==a){
                  $scope.courseid=$scope.recievedcoursedata[i].c_id;
                  break;
              }
            }

            $scope.len2=$scope.recievedsemdata.length;
            var arr2=[],j=0;
            for(i=0;i<$scope.len2;i++){
              if($scope.recievedsemdata[i].course_c_id==$scope.courseid){
                arr2[j]=$scope.recievedsemdata[i].sem_id;
                j++;
              }
            }
            $scope.semester=arr2;

            $http.get("section.php").then(function(response){
                $scope.recievedsecdata=response.data;
            });
            $http.get("subjectlink.php").then(function(response){
                $scope.recievedsubjectdata=response.data;
            });
            $http.get("subject.php").then(function(response){
                $scope.recievedsubdata=response.data;
            });
          }

          $scope.selectSectionSubject=function(a){
              var i,j=0;
              var arr3=[];
              $scope.len3=$scope.recievedsecdata.length;
              for(i=0;i<$scope.len3;i++){
                if($scope.recievedsecdata[i].semester_sem_id==a){
                    arr3[j]=$scope.recievedsecdata[i].sec_name;
                    j++;
                }
              }
              $scope.section=arr3;
              
              var arr4=[],k=0;
              $scope.len4=$scope.recievedsubjectdata.length;
              for(i=0;i<$scope.len4;i++){
                if($scope.recievedsubjectdata[i].semester_sem_id==a && $scope.recievedsubjectdata[i].semester_course_c_id==$scope.courseid){
                    arr4[k]=$scope.recievedsubjectdata[i].subject_list_sub_id;
                    k++;
                }
              }

              var flag,l=0;
              var arr5=[];
              $scope.len5=$scope.recievedsubdata.length;
              for(i=0;i<$scope.len5;i++){
                flag=0;
                for(j=0;j<k;j++){
                  if($scope.recievedsubdata[i].sub_id==arr4[j]){
                    flag=1;
                    break;
                  }
                }
                if(flag==1){
                    arr5[l]=$scope.recievedsubdata[i].sub_name;
                    l++;
                }
              }
              $scope.subject=arr5;

          }

         $scope.loadSubject = function(){  
           $http.get("retrieve1.php").then(function(response){  
                $scope.subject = response.data;
           })

        }  
        $scope.loadSection = function(){  
             $http.post("retrieve2.php").then(function(response){  
                  $scope.section = response.data;  
             }); 
        }

         $scope.init3=function(){
             $scope.displayStud();
         }

         $scope.insertData = function(){  
          console.log('hey')
           if($scope.cour == "Select Course")  
             {  
                  alert("Course is required");  
             }  
             else if($scope.sem == "Select Semester")  
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
                var i;
                for(i=0;i<$scope.len5;i++){
                  if($scope.recievedsubdata[i].sub_name==$scope.sub){
                    $scope.subid=$scope.recievedsubdata[i].sub_id;
                    break;
                  }
                }

                for(i=0;i<$scope.len3;i++){
                  if($scope.recievedsecdata[i].sec_name==$scope.sec){
                    $scope.secid=$scope.recievedsecdata[i].sec_id;
                    break;
                  }
                }

               
                $http({  
                     method:'POST',
                     url:'insert.php',  
                     data:{'cour':$scope.courseid,'sem':$scope.sem,'sec':$scope.secid,'sub':$scope.subid,'staff':'st001'}
                  
                }).then(function(response){  
                     alert(response.data); 
                   $scope.displayData();
                        
                }); 
                 
                 
           }  
      }    


 });