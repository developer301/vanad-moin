<?php
session_start();
include_once '../include/conn/dbconnect.php';
$session= $_SESSION['patientSession'];
// $appid=null;
// $appdate=null;
if (isset($_GET['scheduleDate']) && isset($_GET['appid'])) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appid'];
}
// on b.icPatient = a.icPatient
$res = mysqli_query($con,"SELECT a.*, b.* FROM doctorschedule a INNER JOIN patient b
WHERE a.scheduleDate='$appdate' AND scheduleId=$appid AND b.icPatient=$session");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


	
//INSERT
if (isset($_POST['appointment'])) {
$patientIc = mysqli_real_escape_string($con,$userRow['icPatient']);
$scheduleid = mysqli_real_escape_string($con,$appid);
$symptom = mysqli_real_escape_string($con,$_POST['symptom']);
$comment = mysqli_real_escape_string($con,$_POST['comment']);
$avail = "notavail";


$query = "INSERT INTO appointment (  patientIc , scheduleId , appSymptom , appComment  )
VALUES ( '$patientIc', '$scheduleid', '$symptom', '$comment') ";

//update table appointment schedule
$sql = "UPDATE doctorschedule SET bookAvail = '$avail' WHERE scheduleId = $scheduleid" ;
$scheduleres=mysqli_query($con,$sql);
if ($scheduleres) {
	$btn= "disable";
} 


$result = mysqli_query($con,$query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php
header("Location: patientapplist.php");
}
else
{
	echo mysqli_error($con);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location: patient/patient.php");
}
//dapat dari generator end
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Appointment - Vanad Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
   
	<div class="py-md-5 py-4 border-bottom">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-md-4 order-md-2 mb-2 mb-md-0 align-items-center text-center">
		    		<a class="navbar-brand" href="index.html">
              <img src="../img/vanad_logo.png" width="210px">
            </span></a>
	    		</div>
	    		<div class="col-md-4 order-md-1 d-flex topper mb-md-0 mb-2 align-items-center text-md-right">
	    			<div class="icon d-flex justify-content-center align-items-center order-md-last">
	    				<span class="icon-map"></span>
	    			</div>
	    			<div class="pr-md-4 pl-md-0 pl-3 text">
					    <p class="con"><span>Email</span> <span>vanadclinic24@gmail.com</span></p>
              <p class="con"><span>Call</span> <span>+91-92255-00666</span></p>
					    <p class="con">304, 4th Floor, Eiffel Square Bldg., Opp. Chocolate Biclate Near Badshahi Hotel, Tilak Smarak, Chowk, Lokmanya Bal Gangadhar Tilak Rd, Sadashiv Peth, Pune, Maharashtra 411030</p>
				    </div>
			    </div>
			    <div class="col-md-4 order-md-3 d-flex topper mb-md-0 align-items-center">
			    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
			    	<div class="text pl-3 pl-md-3">
			<p class="hr"><span>Open Hours</span></p>
			<p class="time"><span>Monday</span> <span>10am–2pm, 5–9:30pm</span></p>
              <p class="time"><span>Tuesday</span> <span>10am–9:30pm</span></p>
              <p class="time"><span>Wednesday</span> <span>10am–2pm, 5–9:30pm</span></p>
              <p class="time"><span>Thursday</span> <span>10am–9:30pm</span></p>
              <p class="time"><span>Friday</span> <span>10am–2pm, 5–9:30pm</span></p>
              <p class="time"><span>Saturday</span> <span>10am – 9:30pm</span></p>
              <p class="time"><span>Sunday</span> <span>Closed</span></p>
              
            </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="index.html" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="department.html" class="nav-link">Treatments</a></li>
	     	    <li class="nav-item"><a href="contact.html" data-toggle="modal" data-target="#myModal" class="nav-link">Contact</a></li>
             <li class="nav-item"><a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>" class="nav-link">Appointment</a></li>
             <li class="nav-item"><a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>" class="nav-link">Profile</a></li>
             <li class="nav-item"><a href="patientlogout.php?logout" class="nav-link"><span class="iconify" data-icon="mdi-light:logout" style="font-size:20px;"></span>Log out</a></li>
          </ul>
	      </div>
	    </div>
	  </nav>
	   <!-- END nav -->
 
	   
<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay">
            </div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-2 bread">
      Appointment
      </h1>

            <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p> -->
          </div>
        </div>
      </div>
</section>


<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">Appointment Information</h2>
         
			<form class="form" role="form" method="POST" accept-charset="UTF-8">
											<div class="panel panel-default">
												<div class="panel-body">
													<b>Day:</b> <?php echo $userRow['scheduleDay'] ?><br>
													<b>Date:</b> <?php echo $userRow['scheduleDate'] ?><br>
													<b>Time:</b> <?php echo $userRow['startTime'] ?> - <?php echo $userRow['endTime'] ?><br>
												</div>
											</div>
											<br>
											<div class="form-group">
												<label for="recipient-name" class="control-label"><b>Symptom:</b></label>
												<input type="text" class="form-control" name="symptom" required>
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label"><b>Comment:</b></label>
												<textarea class="form-control" name="comment" required></textarea>
											</div>
											<div class="form-group">
												<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
											</div>
										</form>
   
          

		</div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
            	<h2>Patient Information</h2>
            <p>
			<b>Patient Name:</b> <?php echo $userRow['patientFirstName'] ?> <?php echo $userRow['patientLastName'] ?><br>
			<b>Patient IC:</b> <?php echo $userRow['icPatient'] ?><br>
			<b>Contact Number:</b> <?php echo $userRow['patientPhone'] ?><br>
			<b>Address:</b> <?php echo $userRow['patientAddress'] ?>
												
			</p> 
			<a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>" class="btn btn-primary">Update Profile</a>
				</div>				
			</div><!-- END COL -->
		</div>
	</div>
</section>
	
<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 logo">Vanad Clinic</h2>
              <p>
              </p>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">
                  304, 4th Floor, Eiffel Square Bldg., Opp. Chocolate Biclate Near Badshahi Hotel, Tilak Smarak, Chowk, Lokmanya Bal Gangadhar Tilak Rd, Sadashiv Peth, Pune, Maharashtra 411030
                  </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91-92255-00666</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">vanadclinic24@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Treatment</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Book Appointment</a></li>
              </ul>
            </div>
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Social Media Account</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Facebook</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Instagram</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Twitter</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Lnkedin</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <iframe style="border:0; width: 100%; height: 350px;" alt="learnthedigital.com ADDRESS MAP" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCiqr_X7Kz8OGVbv0WZkntguXmOioJtmck&amp;q=Shop+No+6+B+Building+no+69+Yusuf+Building+Dilima+Street+Dockyard Rd+Mumbai+Maharashtra+400010" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md">
          	<div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Opening Hours</h2>
            	<h3 class="open-hours pl-4">Monday 10am–2pm, 5–9:30pm</span></h3>
              <h3 class="open-hours pl-4">Tuesday 10am–9:30pm</h3>
            	<h3 class="open-hours pl-4">Wednesday 10am–2pm, 5–9:30pm</h3>
            	<h3 class="open-hours pl-4">Thursday 10am–9:30pm</h3>
            	<h3 class="open-hours pl-4">Friday 10am–2pm, 5–9:30pm</h3>
              <h3 class="open-hours pl-4">Saturday 10am – 9:30pm</h3>
              <h3 class="open-hours pl-4">Sunday Closed</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Vanad Clinic  | Design and Developed by  <a href="https://colorlib.com" target="_blank">www.learnthedigital.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>
<script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>