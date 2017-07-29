<?php 
  require 'loginValidate.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/png" href="img/Nitte-Logo.png">


<title>NSAM First Grade College </title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="css/Stylesheet.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="css/jquery-ui-1.10.0.custom.css" type="text/css" rel ="stylesheet">

<link href="css/jquery.virtual_keyboard.css" rel="stylesheet" type="text/css"/>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>



</head>

<body>



   <div class="view hm-black-strong">

        <div class="full-bg-img">

            <h2 id="title" class="h1-responsive page-header">NSAM First Grade College Smart Campus, Nitte</h2>

   <div class="row container-box flex-center">
				
				<div class="login-page col-md-8">
				
				<section id="Login-Site"> 
				
				<img src="img\Login-Vector.png" alt="Login-Vector" class="user-avatar">
				
				<h4 class="h3-responsive visible-xs-12">Login Here</h4>
				
					<form action="#" method="post" onsubmit="ClearOff()" >
				
						<div class="form-content">
				
							<div class="form-group"> 
				
								<input type="text" class="form-control input-underline input-lg" name="s_name" id="kebab" placeholder="Enter Username" required/>
				
								<i class="fa fa-user" aria-hidden="true"></i>



							</div>

											<div class="form-group"> 

								<input type="date" class="form-control input-underline input-lg" name="s_pass" id="password"
								placeholder="Enter Password" required/>

								<i class="fa fa-lock" aria-hidden="true"></i>

							</div>

							<a href="#" data-toggle="modal" data-target="#User-Help" style="margin-left: 270px; 
							color: orange; font-size: 20px; font-family:'Raleway'; text-decoration: none; ">Need 
							Help.?</a>			
	

						
						<button type="submit" name="Login" class="btn btn-warning btn-lg">Log In!</button>
					

                            <h4 style="text-align: center; " class="Invalid-Message"  > <?php echo @$_GET["invalid"]; ?> </h4>
                            <h4 style="text-align: center;" class="Logout-Message"> <?php echo @$_GET["logout"]; ?> </h4>
                            <h4 style="text-align: center;" class="Invalid-Message"> <?php echo @$_GET["action"]; ?> </h4> 

					</div>	

					</form>

					</section>
				
			</div> 

		</div>

	</div>

</div>

			<div class="modal fade" id="User-Help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
			aria-hidden="true">
            
                <div class="modal-dialog" role="document">
            
                    <!--Content-->
            
                    <div class="modal-content">
            
                        <!--Header-->
            
                        <div class="modal-header">
            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
                                <span aria-hidden="true">&times;</span>
            
                            </button>
            
                            <h2 class="modal-title w-100" id="myModalLabel" style="text-align: center;">User Help 
                            Information</h2>
                        
                        </div>
                        
                        <!--Body-->
                        
                        <div class="modal-body">
                        
                            <p class="aboutHelp"> The Username is the Student's University Serial Number
                                                    </p>
                        
                            <p class="aboutHelp"> The Password is the Student's Date Of Birth
                                                    </p>
                        </div>
                        
                        <!--Footer-->
                        
                        <div class="modal-footer">
                        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        </div>
                    
                    </div>
                    
                    <!--/.Content-->
                
                </div>
            
            </div>

	<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/mdb.min.js"></script>

    <script src="js/tether.min.js"></script>
        
	<script src="js/jquery.virtual_keyboard.js" type="text/javascript"> </script>
    
	<script src="js/keyboard_function.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
        
	 <!--script src="js/demo.js" type="text/javascript"></script-->
    
    <script type="text/javascript">

        window.sr = ScrollReveal();
        sr.reveal('.page-header',{
            origin: 'top',
            distance: '200px',
            duration: 2000,
            reset: false
        });
        sr.reveal('.login-page',{
            origin: 'bottom',
            delay: 700,
            distance: '69px',
            duration: 2000,
            viewFactor: 0.3,
            reset: false
        });

        function ClearOff(){
        document.getElementById('username').value="";
    }
    </script>

</body>

</html>