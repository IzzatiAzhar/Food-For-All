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
    <?php include 'headerorg.php'; ?>
	
  <?php include 'orgnav.php'; ?>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/home.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Current Events</h2>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
		<article>
					<table class="table">
								<thead class="thead-dark">
									<tr>
										<th>Event ID</th>
										<th>Event Name</th>
										<th>State </th>
										<th>Location</th>
										<th>Number of Participant</th>
										<th>Date Event</th>
										<th>Total Donation (RM) </th>
										<th>Person-in-charge</th>
										<th>Participant</th>
									</tr>
					            </thead>
						
						
						<?php
							$conn = mysqli_connect("localhost","root","","ffa") or die("Database Not Connected");
							
							//get page number
							$page=0;
							
							//set variable
							if(isset($_GET["page"])==true)
							{
								$page=$_GET["page"];
							}
							
							else 
							{
								$page=0;
							}
							
							//algo for pagination in sql
							if($page==""|| $page=="1")
							{
								$page1=0;
							}
							else
							{
								$page1=($page*4)-4;
							}
							
							
							$sql="select * from event limit $page1,4";
							$result=$conn->query($sql);
								  
								 
								  if($result->num_rows > 0)
								  {
											if($result->num_rows>0)
											//output data of each row
											{
											while($row=$result->fetch_assoc())
											{
												
								
												$eventid = $row["eventid"];
												$eventname = $row["eventname"];
												$eventstate = $row["eventstate"];
												$eventlocation = $row["eventlocation"];
												$eventnumofpart = $row["eventnumofpart"];
												$eventdate = $row["eventdate"];
												$eventtotaldonation = $row["eventtotaldonation"];
												$eventpic = $row["eventpic"];
												//echo '<script>console.log('.json_encode("sql success tak?") . ')</script>';
												//echo "$eventid" ;
												$sql2 = "update `event` e
															set `eventnumofpart` = (select count(e.eventid) as numofpart 
																	from `registration` r, `event`e
																	where r.eventid = e.eventid
																	and r.eventid = '$eventid')
															where e.eventid = '$eventid'";
															
								
								$result2 = $conn->query($sql2);
												
												
												echo "<tr>";
												
													echo "<td>$eventid</td>";
													echo "<td>$eventname</td>";
													echo "<td>$eventstate</td>";
													echo "<td>$eventlocation</td>";
													echo "<td>$eventnumofpart</td>";
													echo "<td>$eventdate</td>";
													echo "<td>$eventtotaldonation</td>";
													echo "<td>$eventpic</td>";
													echo"<td><a href=displayparticipant.php?eventid=$eventid>Show Participant</a></td>";
													
													
												echo "</tr>";
											}
										}

										
									echo "</table>";
									
									
							//count number of record
							if($result->num_rows>0)
							{
							$sql2="select count(*) FROM event";
							$result=$conn->query($sql2);
							$row=$result->fetch_row();
							$count=ceil($row[0]/4);
							
							for($pageno=1;$pageno<=$count;$pageno++)
							{
								?><a href="listevents.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. "";?></a><?php
							}
						}
						}
						
						CloseCon($conn);
								?>
							
								<table class="table">
									<tr>
											<td colspan="2" align="right">
											
												<!--<input type="button" onClick="window.location='myevent.php';" value="My Event" />-->
												<input type="button" value="Back" onclick="history.back()" />
												
											</td>
									</tr>
								</table>	
								
		</article> 
      </div>
    </div>
  </div>


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