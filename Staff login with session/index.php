<?php
  if(isset($_POST['Login'])) {
    $con =  mysqli_connect("localhost", "root", "", "mydb");
    $username = $_POST['sname'];
    $password = $_POST['spass'];
    $query = "SELECT * FROM staff WHERE staff_id = '$username' AND pwd = '$password'";
    $res = mysqli_query($con, $query) or die(mysql_error());
    if(mysqli_num_rows($res) == 1) {
        $_SESSION['sname'];
        echo '$name';
        header('Location: dashboard.php');
    }
    else
         echo "<html>";
         echo "<marquee><h1>!!Invalid Credentials!!</h1></marquee>";
        //echo "Invalid Credentials";
  }
    if(isset($_GET['logout'])) {
         session_unset();
         session_unregister('sname');
         mysqli_close($con); 
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.ico">
    
    <title>NSAM First Grade College</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   

    <link href='https://fonts.googleapis.com/css?family=Average' rel='stylesheet'>
	
	<link href="css/jquery.virtual_keyboard.css" rel="stylesheet" type="text/css"/>

    <link href="css/jquery-ui-1.10.0.custom.css" type="text/css" rel ="stylesheet">
	
	 <link href="css/style.css" rel="stylesheet" />
    <link href="css/mdb.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="view hm-black-strong">
        <div class="full-bg-img">
            <h1 id="title" class="h1-responsive page-header">NSAM First Grade College Smart Campus, Nitte</h1>
            <h1 id="title" class="h1-responsive">Staff Login</h1>
            <div class="row container-box flex-center">
                <div class="col-sm-6 hidden-xs">
                    <section id="left-section">
                        <p class="text-capitalize">Please Enter your login in details here</p>
                        <img src="img/logo3.jpg" alt="Nitte logo">
                    </section>
                </div>
                <div class="col-sm-6 col-xs-10">
                    <section id="right-section">
                        <h3 class="h3-responsive visible-xs-12">Login Here</h3>
                        <form method="post" onsubmit="t()">
                            <div class="form-group">
                                <input type="text" class="form-control" id="user" name="sname" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <!--input type="password" id="password" name="spass" placeholder="Enter password"-->
                                <input type="password" id="pass" name="spass" placeholder="Enter password">
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" name="Login" class="btn btn-default"></input>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <br/>
            </div>
            <div class="row">
                <p class="text-right">powered-by:Finite Loop</p>
            </div>
        </div>
    </div>
    
	<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/mdb.min.js"></script>

    <script src="js/tether.min.js"></script>
    
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
	
	<script src="js/jquery.virtual_keyboard.js" type="text/javascript"> </script>
    
	<script src="js/keyboard_function.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
        
	<script src="js/demo.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        window.sr = ScrollReveal();
        sr.reveal('.page-header',{
            origin: 'top',
            distance: '200px',
            duration: 2000,
            reset: false
        });
        sr.reveal('#left-section',{
            origin: 'left',
            delay: 1000,
            distance: '600px',
            duration: 2000,
            viewFactor: 0.3,
            reset: false
        });
        sr.reveal('#right-section',{
            origin: 'right',
            delay: 1000,
            distance: '600px',
            duration: 2000,
            viewFactor: 0.3,
            reset: false
        });
		
		function t(){
			document.getElementById('username').value = "";
		}
    </script>
  </body>
</html>