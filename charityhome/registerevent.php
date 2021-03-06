
	<nav>
	<?php include 'orgnav.php';?>
	</nav>

	
	<h2 style="text-align:center">EVENT REGISTRATION FORM</h2>
	<form action="registereventaction.php" id="form" method="POST">
	<?php
		
		$conn = mysqli_connect("localhost","root","","ffa") or die("Database Not Connected");
		$sql1="select * from organizer where orgid=$orgid";
		$result1=$conn->query($sql1);
		
		if($result1->num_rows > 0)
		{
			while($row=$result1->fetch_assoc())
			{
				$orgid=$row["orgid"];
			}
		}
		
		else
		{
			echo "Data cannot be displayed";
		}
		
	$sql2="select * from event";
	$result2=$conn->query($sql2);
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FoodForAll &mdash; We Care</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="images/LOGO.jpg">
	<link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
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
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    
  <?php include 'orgnav.php'; ?>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/home.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Food For All</h2>
              <p style="display: inline-block;color:white">We Care. We Share. We Love.</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
   <article>
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
	  
	  
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
					<br><br>
                        <legend><h2 class="form-title" align="center">HOST AN EVENT NOW !</h2></legend><br>
						<br>
						
                        <form method="POST" class="register-form" id="register-form" align="center">
                          
                            <div class="form-group">
                                <label for="eventname">Event Name<i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="eventname" id="eventname" />
                            </div>
                            <div class="form-group">
                                <label for="eventstate">Event State<i class="zmdi zmdi-account-calendar"></i></label>
                                <select name="eventstate" id="eventstate">
								  <option value="kl">Kuala Lumpur</option>
								  <option value="johor">Johor</option>
								  <option value="kedah">Kedah</option>
								  <option value="kelantan">Kelantan</option>
								  <option value="melaka">Melaka</option>
								  <option value="negeri">Negeri Sembilan</option>
								  <option value="pahang">Pahang</option>
								  <option value="perak">Perak</option>
								  <option value="perlis">Perlis</option>
								  <option value="penang">Penang</option>
								  <option value="sabah">Sabah</option>
								  <option value="sarawak">Sarawak</option>
								  <option value="terengganu">Terengganu</option>
								</select>
                            </div>
							
                            <div class="form-group">
                                <label for="eventlocation">Event Location<i class="zmdi zmdi-sort-amount-desc"></i></label>
                                <input type="text" name="eventlocation" id="eventlocation"/>
                            </div>
							
							
							
							<div class="form-group">
                                <label for="eventdate">Date of Event<i class="zmdi zmdi-lock"></i></label>
                                <input type="date" name="eventdate" id="eventdate" />
                            </div>
							
							
							<div class="form-group">
                                <label for="eventpic">Organization Representative In Charge<i class="zmdi zmdi-sort-amount-desc"></i></label>
                                <input type="text" name="eventpic" id="eventpic" />
                            </div>
						
                            <div class="form-group">
                                <input type="checkbox" name="term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </section>

        

    </div>
      
    </div>
</article>	


  <footer class="footer">
    <?php include 'footer.php'; ?>
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
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>
  
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>