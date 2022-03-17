<?php
include_once 'include/conn/dbconnect.php';
// include_once 'assets/conn/server.php';
?>


<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['patientSession']) != "") {
header("Location: patient/patient.php");
}
if (isset($_POST['login']))
{
$icPatient = mysqli_real_escape_string($con,$_POST['icPatient']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM patient WHERE icPatient = '$icPatient'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['patientSession'] = $row['icPatient'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: patient/patient.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>
<!-- register -->
<?php
if (isset($_POST['signup'])) {
$patientFirstName = mysqli_real_escape_string($con,$_POST['patientFirstName']);
$patientLastName  = mysqli_real_escape_string($con,$_POST['patientLastName']);
$patientEmail     = mysqli_real_escape_string($con,$_POST['patientEmail']);
$icPatient     = mysqli_real_escape_string($con,$_POST['icPatient']);
$password         = mysqli_real_escape_string($con,$_POST['password']);
$month            = mysqli_real_escape_string($con,$_POST['month']);
$day              = mysqli_real_escape_string($con,$_POST['day']);
$year             = mysqli_real_escape_string($con,$_POST['year']);
$patientDOB       = $year . "-" . $month . "-" . $day;
$patientGender = mysqli_real_escape_string($con,$_POST['patientGender']);
//INSERT
$query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName,  patientDOB, patientGender,   patientEmail )
VALUES ( '$icPatient', '$password', '$patientFirstName', '$patientLastName', '$patientDOB', '$patientGender', '$patientEmail' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Register success. Please Login to make an appointment.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('User already registered. Please try again');
</script>
<?php
}

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vanad Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="py-md-5 py-4 border-bottom">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-md-4 order-md-2 mb-2 mb-md-0 align-items-center text-center">
		    		<a class="navbar-brand" href="index.html">
              <img src="img/vanad_logo.png" width="210px">
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
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        	<li class="nav-item"><a href="blog.html" class="btn btn-secondary px-4 py-3 mt-3">Book Appointment</a></li>
          </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    
    <section class="home-slider owl-carousel">
  
    
    <div class="slider-item" style="background-image:url(img/slider1-welcome-to-vanad-clinic-scaled.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4" style="color:aliceblue;">WELCOME TO VANAD CLINIC</h1>
            <h3 class="subheading" style="color:aliceblue;">Best Sex Clinic for you. Vanad Clinic is leading sexology clinic in Pune which offers treatment for Sexual Dysfunction, Erectile Dysfunction, Premature Ejaculation, Night Fall, Over Masturbation, Porn De-Addiction, General Infections , Phimosis and Infertility.  Clinic for Holistic Sexual Treatment and Education </h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">COUPLE HERAPY</a></p>
          </div>
        </div>
        </div>
      </div>
  
      <div class="slider-item" style="background-image:url(img/slider3-couple-therapy-scaled.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4" style="color:white">Improving communication between partners</h1>
            <h3 class="subheading" style="color:white">Couple therapy is a therapeutic treatment which aims to deal with the various and possible crises that couples can encounter</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">COUPLE HERAPY</a></p>
          </div>
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
		          	<span class="subheading mb-2">VANAD CLINIC</span>
		            <h2 class="mb-2" style="font-size: 32px;">Let's believe in us.</h2>
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

    <section class="home-slider owl-carousel">
      
      <div class="slider-item" style="background-image:url(img/ERECTILE-DYSFUNCTION.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Erectile Dysfunction</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>
    
      

      <div class="slider-item" style="background-image:url(img/Premature-Ejaculation.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Premature Ejaculation</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>


      <div class="slider-item" style="background-image:url(img/Azoospermia.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Azoospermia</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>
    
      <div class="slider-item" style="background-image:url(img/Infertility.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Infertility</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(img/Phimosis.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Phimosis</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(img/Varicocele.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Varicocele</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(img/Low-Motility-of-Sperm.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Low Motility of Sperm</h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
          </div>
        </div>
        </div>
      </div>

    </section>

    
		
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(img/dr-amit-nale.jpg);">
					</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5 pt-md-5">
		          	<span class="subheading mb-2">ABOUT DOCTOR</span>
		            <h2 class="mb-2" style="font-size: 32px;">Dr Amit Nale .</h2>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p>
              With more than 14+ years of experience in sexology, Dr. Amit Nale is one of the best sexologist in Pune. He has gives 100% result in treatment of Erectile Dysfunction, Premature Ejaculation, Low Libido, & Infertility. He is qualified to perform sex treatment in Pune by counseling or with the prescription of drugs.
              </p>
							<p>
              Over a period of his medical career Dr. Amit Nale who is a super specialist in field of sexology and sexual health is very much interested in creating awareness about sexual life in Indian society.
              </p>
              <p>
              He is the member of prestigious organisation Council of Sex Education and Parenthood (International). He continuously participates in activities regarding development of sexology (sexual medicine) and mental health that are organized by various organization, forums and institutions .
              </p>
              <p><b>1,200 + Clients across globe satisfied by Video Consultation</b></p>
              <p><b>05 Clinic across 5 cities in Maharastra</b></p>
              <p><b>25,000 + Delivered medicines to 25+ international cities</b></p>
              <p><b>Delivered medicines to 25+ international cities</b></p>
							<br>

              <div class="pl-md-5 ml-md-5 mb-5">
							<div class="founder d-flex align-items-center mt-5">
								<div class="img" style="background-image: url(img/Confidentiality.jpg);"></div>
								<div class="text pl-3">
                <h3 class="mb-0">100 %</h3>
                <span class="position">Confidentiality</span>
								</div>
                <div class="img" style="background-image: url(img/Years-of-Experience.jpg);"></div>
								<div class="text pl-3">
                <h3 class="mb-0">14</h3>
									<span class="position">Years of Experience</span>
								</div>
              </div>
						</div>

            <div class="pl-md-5 ml-md-5 mb-5">
							<div class="founder d-flex align-items-center mt-5">
								<div class="img" style="background-image: url(img/Satisfied-Patients.jpg);"></div>
								<div class="text pl-3">
                <h3 class="mb-0">25,000 +</h3>
									<span class="position">Satisfied Patients</span>
								</div>
								<div class="img" style="background-image: url(img/Happy-Couples.jpg);"></div>
								<div class="text pl-3">
                <h3 class="mb-0">10,000 +</h3>
									<span class="position">Happy Couples</span>
								</div>

              </div>
						</div>

  
            </div>
          </div>
				</div>
			</div>
		</section>

    
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-md-0">
				<div class="row no-gutters">
				<div class="col-md-3 d-flex align-items-stretch">
						<div class="consultation w-100 text-center px-4 px-md-5">
            <h3 class="mb-4">Couple Therapy</h3>
							<p>
                Only at Pune's only Google and Practro 5 star Rated Exclusive Sexelogy Clinic
              </p>
							<a href="#" class="btn-custom">See Services</a>
						</div>
					</div>	
        <div class="col-md-6 d-flex align-items-stretch">
						<div class="consultation consul w-100 px-4 px-md-5">
							<div class="text-center">
								<h3 class="mb-4">Please Select date to check Doctor Avalibility</h3>
							</div>
							<form action="#" class="appointment-form">
								<div class="row">
						
                <div class="col-md-12 col-lg-6 col-xl-4">
										<div class="form-group">
				    					<div class="input-wrap">
				            		<div class="icon"><span class="ion-md-calendar"></span></div>
				  
                        <div class="input-group" style="margin-bottom:10px;">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar">
                                </i>
                            </div>
                            <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
                        </div>
                </div>
				    				</div>
									</div>

                  
                        <!-- script start -->
                        <script>

                            function showUser(str) {
                                
                                if (str == "") {
                                    document.getElementById("txtHint").innerHTML = "";
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
                                    xmlhttp.open("GET","getuser.php?q="+str,true);
                                    console.log(str);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        
                        <!-- script start end -->
                     
                        <!-- table appointment start -->
                        <div id="txtHint"><b> </b></div>


						
                </div>
		    			</form>
		    	  </div>
					</div>
					<div class="col-md-3 d-flex align-items-stretch">
						<div class="consultation w-100 text-center px-4 px-md-5">
            <h3 class="mb-4">Login</h3>
              <form action="#" class="appointment-form" class="form" role="form" method="POST" accept-charset="UTF-8">
            <input type="text" class="form-control" placeholder="icPatient">
            <input type="password" class="form-control" placeholder="Password"><br>
            <input type="submit" name="login" id="login" value="SIGN IN" class="btn btn-secondary py-2 px-4">
            </form>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section bg-light">
			<div class="container">
				
      <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<!-- <span class="subheading">Blog</span>
            <h2 class="mb-4">Recent Blog</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> -->
          </div>
        </div>
				<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/Vanad-Clinic-ERECTILE-DYSFUNCTION.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">ERECTILE DYSFUNCTION</a></h3>
                <p>
                Persistent difficulty achieving and maintaining an erection sufficient to have sex.
                </p>
                <ul>
                  <li>Causes are usually medical but can also be psychological</li>
                  <li>Medical condition affecting the blood vessels or nerves</li>
                  <li>Prescription / recreational drugs, alcohol & smoking all cause ED</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/Vanad-Clinic-PREMATURE-EJACULATION.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">PREMATURE EJACULATION</a></h3>
                <p>
                Premature ejaculation (PE) is when ejaculation happens sooner than his partner would like during sex.  
              </p>
                <ul>
                  <li>1 out of 3 men say they experience this problem</li>
                  <li>Mostly psychological than physical causes</li>
                  <li>It is treatable by proper medication and counselling</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/Vand-clinic-INFERTILITY.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">INFERTILITY</a></h3>
                <p>
                Infertility means not being able to become pregnant after a year of trying
              </p>
                <ul>
                  <li>1 out of 3 families struggle with infertility</li>
                  <li>Infertility can be found in both, females and males</li>
                  <li>Treatment - hormone treatments, fertility drugs and surgery</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/vanad-clinic-AZOOSPERMIA.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">AZOOSPERMIA</a></h3>
                <p>
                Azoospermia is a condition in which there’s no measurable sperm in a man’s ejaculate (semen). 
                </p>
                <ul>
                  <li>Infertility affects about 15 % of the male population</li>
                  <li>Obstruction in the reproductive tract or less sperm production</li>
                  <li>Azoospermia can be treated with medication</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/vanad-clinic-PHIMOSIS.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">PHIMOSIS</a></h3>
                <p>
                Phimosis is a condition in which the foreskin can’t be retracted from around the tip of the penis</p>
                <ul>
                  <li>Main symptom is inability to retract foreskin by the age of 3</li>
                  <li>Phimosis occur in less than 1 % of teenagers between 16 & 18</li>
                  <li>Phimosis can occur naturally or be the result of scarring</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('img/Vand-Clinic-VARICOCELE.jpg');">
						  </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">VARICOCELE</a></h3>
                <p>
                Phimosis is a condition in which the foreskin can’t be retracted from around the tip of the penis
                </p>
                <ul>
                  <li>Main symptom is inability to retract foreskin by the age of 3</li>
                  <li>Phimosis occur in less than 1 % of teenagers between 16 & 18</li>
                  <li>Phimosis can occur naturally or be the result of scarring
</li>
                </ul>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Know More <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
			</div>
		</section>

    <section class="ftco-intro" style="background-image: url(img/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h2>Video Consultation.</h2>
						<p class="mb-0">BENEFITS OF VIDEO CONSULTATION</p>
            <ul>
              <li>Convinient Time</li>
              <li>Cost Effective</li>
              <li>No Travelling</li>
              <li>Excellent patient satisfactio</li>
            </ul>
						<p></p>
					</div>
					<div class="col-md-3 d-flex align-items-center">
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">BOOK ONLINE SESSION</a></p>
					</div>
				</div>
			</div>
		</section>


		

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonials</span>
            <h2 class="mb-4">Our Patients Says About Us</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pl-4 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>
                    It was amazing experience at Vanad Clinic, they offer each and everything you need to get cured – Homeopathy, Ayurveda , supplements and everything.. They also taught me certain exercises and I don’t know why they do not mention anything about exercise on website.
                    </p>
                    <p class="name">Mr. Pravin K</p>
                    <span class="position">IT Professional</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pl-4 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>
                    Took 2 months of complete therapy and now me and my wife both are very happy and satisfied.
                    </p>
                    <p class="name">Mr. Sachin M</p>
                    <span class="position">HealthCare Worker</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<h2>New Effectiveness.</h2>
            <p>LOW INTENSITY EXTRACORPOREAL SHOCK WAVE THERAPY (LI-ESW THERAPY)</p>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-6 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Basic</h3>
	        			<p><span class="price">Erectile Dysfunction Shock Wave Therapy (EDSWT) is an innovative approach to vasculogenic ED, a device that uses advanced acoustics technology.</span></p>
                <p>This technology has proven to be effective in cardiology, with recent success in reversible ischemic tissues of the heart. EDSWT utilizes low-intensity extracorporeal shock waves, focusing on blood vessels and encouraging neovascularization in the penis shaft and crus. The low-intensity shock waves help relieve vascular deficiency, a common cause of erectile dysfunction.</p>
	        		</div>
        			<p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
        		</div>
        	</div>
        	<div class="col-md-6 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
            <P><img src="img/Erectile-Dysfunction-Shock-Wave-Therapy-812x1024.png" width="100%"></P>
              </div>
        		</div>
        	</div>
        	
        </div>
    	</div>
    </section>


    
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<h2>Sexual health..</h2>
            <p>I believe that sexual health is a state of physical, emotional, mental and social well-being in relation to sexuality; it is not merely the absence of disease, dysfunction or infirmity.</p>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-6 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<p>Sexual health requires a positive and respectful approach to sexuality and sexual relationships, as well as the possibility of having pleasurable and safe sexual experiences, free of coercion, discrimination, and violence. For sexual health to be attained and maintained, the sexual rights of all persons must be respected, protected and fulfilled.
                </p>
	        		</div>
        			<p class="button text-center">World Health Organisation. (2006)</p>
        		</div>
        	</div>
        	<div class="col-md-6 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
            <P><img src="img/happy-couple-1.jpg" width="100%"></P>
              </div>
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


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
    </script>
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

  </body>
</html>