

<?php
// Initialize the session
// session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//   header("location: /Kenyan_Careers_WebApp/kenyan_careers_webapp/applicant_login.php");
//   exit;
// }

?>

<?php

require_once "sqlFunctions.php";
$link = connect();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>

  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <title>Page-1</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Kenyan_Careers_WebApp/kenyan_careers_webapp/Assets/CSS/Israel_custom.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    #status {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #status td, #status th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #status tr:nth-child(even){background-color: #f2f2f2;}

    #status tr:hover {background-color: #ddd;}

    #status th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #2E86C1;
      color: white;
    }
   .jumbotron {
  
    background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)); 
    /* padding-top: 33%; 
    padding-bottom: 10%; */
    /* background-size: cover; */
    padding-top: 10%;
    padding-bottom: 1%;
   }
 
   @media screen and (max-width: 991px) {
    .jumbotron {
      padding-top: 35%;
      padding-bottom: 3%;

      }
    }
    </style>
  
</head>
<body>

<!-- <div class="jumbotron"> -->

<nav class="navbar navbar-fixed-top navbar-inverse">
<div id="constant" style="background: white; height: 40px; position: relative;">

</div>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="/Kenyan_Careers_WebApp/kenyan_careers_webapp/Assets/Images/logo.jpg" alt="logo" style="width:85px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">APPLY</a></li>
        <li><a href="#">LINK A</a></li>
        <li><a href="#">LINK B</a></li>
        <li ><a href="/Kenyan_Careers_WebApp/kenyan_careers_webapp/applicant_logout.php" style=""><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
  <h1 style="border-radius: 25px; color: black; text-transform: uppercase;">Job Description</h1> 
</div>


<!-- Container (News Section) -->
<div id="news" class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-6">
            <div class="thumbnail bg-grey">
                <img src="/Kenyan_Careers_WebApp/kenyan_careers_webapp/Assets/Images/social.jpg" class="img-responsive" alt="Picture" width="400" height="300" style="max-height: 500px; object-fit: cover;">

         
            </div>

        </div>
        
        <div class="col-sm-6">
            <?php
                  $jobId = $_POST["jobId"];
                  $query1 = "SELECT * FROM `jobs` WHERE jobId = '$jobId'";
                  $result = $link->query($query1);

                  while ($row = $result->fetch_assoc()){

                    
                    
                    
                  echo "

                  <h2 style='color:#2E86C1;'>Job Title</h2>
                  <hr style='border-top: 1px solid grey;'>
                  <h2>".$row['jobName']."</h2><br>
                  <h3>Description</h3>
                  <hr style='border-top: 1px solid grey;'>
                
                  <h4>".$row['jodDescr']."</h4>
                
                  <form method='post'>
                  <input type = 'hidden' name = 'jobId' value = '".$row['jobId']."'/>
                
                  </form>	

                  ";
                  }
            
            ?>

        </div>  
             
    </div>
    <hr style="border-top: 1px solid grey;">
    
    <div class="row">
        <h2><strong>Job Requirements</strong></h2>
        <br>
        <table id="status">
          <tr>
            <th>What skills and certifications are required?</th>

            <?php
                  $jobId = $_POST["jobId"];
                  $query2 = "SELECT * FROM `jobrequirements` WHERE jobId = '$jobId'";
                  $result = $link->query($query2);

                  while ($row = $result->fetch_assoc()){

                    
                  echo "

                  <tr>
                    <td>".$row['jobReqDescr']."</td>
                  </tr>
                  
              
                  <form method='post'>
                  <input type = 'hidden' name = 'jobId' value = '".$row['jobId']."'/>
                
                  </form>	
                  ";
                }

                echo "



          </tr>
         
        </table>
    </div>
    <div class='row'>
    <br>
    <div class='col-sm-8'>
    
    <form method='post' action='/Kenyan_Careers_WebApp/kenyan_careers_webapp/Application_Process/applicationDetails.php'>
        <input type = 'hidden' name = 'jobId' value = '".$jobId."'/>
        <input type='submit' class='btn btn-success' value='Apply Now'>

    </form>
    

    </div>
    <div class='col-sm-4'>
    <a href='#'><button type='button' class='btn btn-warning'>Skype Job</button></a>
    "

?>
    </div>
    </div>
</div>

<!-- Footer -->
<footer class="pt-5 pb-4" id="contact">

</footer>
		<!-- Copyright -->
<section class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<div class="text-center text-white">
							&copy; 2020 HCI. All Rights Reserved. Developed By <a href="#" title="Contact Developer" style="color:white;">Young Israel Izere</a>
						</div>
					</div>
				</div>
			</div>
</section>
<!-- font awesome footer -->

</body>
</html>
