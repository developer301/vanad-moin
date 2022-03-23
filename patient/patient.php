<?php
session_start();
include_once '../include/conn/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../index.php");
}

$usersession = $_SESSION['patientSession'];


$res=mysqli_query($con,"SELECT * FROM patient WHERE icPatient=".$usersession);

// if ($res===false) {
// 	echo mysql_error();
// } 

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Patient - Vanad Clinic</title>
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
	
  <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-12 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5 pt-md-5">
		          	<span class="subheading mb-2">Hi <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?>.</span>
		            <h2 class="mb-2" style="font-size: 32px;">Set an appointment today!</h2>
              </div>
	          </div>


  <div class="pl-md-5 ml-md-5 pt-md-5">    
        <div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8">
					
						<?php if ($userRow['patientMaritialStatus']=="") {
						// <!-- / notification start -->
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								echo "<div class='alert alert-danger alert-dismissable'>";
									echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
									echo " <span class=iconify' data-icon='bi:info-circle-fill'></span>  <strong>Please complete your profile.</strong>" ;
								echo "  </div>";
							echo "</div>";
							// <!-- notification end -->
							} else {
							}
							?>		
		<!-- notification end -->
							<div class="input-group" style="margin-bottom:10px;">
								<div class="input-group-addon">
                <span class="iconify" data-icon="uim:calender" style="font-size:50px"></span>
								</div>
                <div class="form-group">
								<input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>          
              </div>

    
							</div>
						</div>
						<!-- date textbox end -->
						<!-- script start -->
						<script>
						function showUser(str) {
						
						if (str == "") {
						document.getElementById("txtHint").innerHTML = "No data to be shown";
						return;
						} else {
						if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
						}
						};
						xmlhttp.open("GET","getschedule.php?q="+str,true);
						console.log(str);
						xmlhttp.send();
						}
						}
						</script>
						
						<!-- script start end -->
						
						<!-- table appointment start -->
						<!-- <div class="container"> -->
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-md-8">
									<div id="txtHint"></div>
								</div>							
              </div>
						</div>
						<!-- </div> -->
						<!-- table appointment end -->
					</div>
				</div>
				<!-- /.row -->
			</div>
</div>

        <div class="pl-md-5 ml-md-5 mb-5">
            <p>They are treating all sexual problems from past 15 years with highest success rate.</p>
            <p>
              With about 14+ years of practicing experience we now strongly believe that Nature has answers for almost all the ailments human being suffer from. At Vanad Clinic we offer Homeopathy, Ayurveda, supplementary or combination of this therapy for patients with sexual ailments. The key benefit of this is patients from each and every corner of globe can seek an expert and experienced guidance and also save their valuable time and money. This portal has made knowledge and therapeutic skills available to worldwide community overcoming time and distance barriers.
              </p>
						</div>
					</div>
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

<!-- date start -->
		<script>
		$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
		format: 'yyyy-mm-dd',
		container: container,
		todayHighlight: true,
		autoclose: true,
		})
		})
		</script>
		<!-- date end -->
		<script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>