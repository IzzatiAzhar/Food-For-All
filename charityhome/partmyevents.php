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

	<script type="text/javascript">
	  function percentage(eventtotaldonation)
	{
		var percentage ;
		var percent;
		var target = 50000;
		percent = (eventtotaldonation/target)*100;
		percentage = percent.toFixed(2);
		alert("The percentage of total donation is "  + percentage);
 
	}
	
  </script>
  </head>
  <body>
    <?php include 'header.php'; ?>
	
  <?php include 'navigation.php'; ?>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/banner.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">My Events</h2>
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
								<thead class="thead-light">
									<tr>
										<th>Organizer ID</th>
										<th>Event ID</th>
										<th>Event Name</th>
										<th>State </th>
										<th>Location</th>
										<th>Number of Participant</th>
										<th>Date Event</th>
										<th>Person-in-charge</th>
										<th>Total Donation (RM) </th>
										<th>Percentage of Total Donation </th>
									</tr>
					        </thead>
						
						
						<?php
							$partid = $login_id;
							$conn=OpenCon();
							
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
							if($page=="" || $page=="1")
							{
								$page1=0;
							}
							
							else
							{
								$page1=($page*7)-7;
							}
							
							$sql = "SELECT *
									FROM `event` e, `registration` r, `organizer` o
									where r.eventid = e.eventid
									and e.orgid = o.orgid
 									and r.partid = '$partid'
									order by eventdate desc
									limit $page1,7";
									
									
								  
								  $result=$conn->query($sql);
								 
								  if($result->num_rows > 0)
								  {
										
										if($result->num_rows>0)
										//output data of each row
										{
											while($row=$result->fetch_assoc())
											{
												$orgid = $row["orgid"];
												$eventid = $row["eventid"];
												$eventname = $row["eventname"];
												$eventstate = $row["eventstate"];
												$eventlocation = $row["eventlocation"];
												$eventnumofpart = $row["eventnumofpart"];
												$eventdate = $row["eventdate"];
												$eventpic = $row["eventpic"];
												$eventtotaldonation = $row["eventtotaldonation"];
												
												
												echo "<tr>";
													echo "<td><a href=organizerdetails.php?orgid=$orgid>$orgid</a></td>";
													//echo "<td>$orgid</td>";
													echo "<td>$eventid</td>";
													echo "<td>$eventname</td>";
													echo "<td>$eventstate</td>";
													echo "<td>$eventlocation</td>";
													echo "<td>$eventnumofpart</td>";
													echo "<td>$eventdate</td>";
													echo "<td>$eventpic</td>";
													echo "<td>$eventtotaldonation</td>";
													echo "<td>" ?><button class="btn btn-primary px-3 py-2" value="Print" onclick="percentage('<?php echo $eventtotaldonation ?>')">Percentage</button><?php  "</td>";
												echo "</tr>";
											}
										}

										
									echo "</table>";
									
									
						//count number of record
						if($result->num_rows>0)
						{
							$sql2="select count(*)
								   FROM `event` e, `registration` r, `organizer` o
									where r.eventid = e.eventid
									and e.orgid = o.orgid
 									and r.partid = '$partid'";
								 
							$result=$conn->query($sql2);
							$row=$result->fetch_row();
							$count=ceil($row[0]/7);
							
							for($pageno=1;$pageno<=$count;$pageno++)
							{
								?><a href="partmyevents.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " ";?></a><?php

							}
						}
						
								  }
								  
						else
						{
						echo "<ul align='left'> <font color=red size='4pt'>There is no data </font></ul>";
						}
								  
						
							CloseCon($conn);
							
							?>
								<table class="table">
									<tr>
										<td></td>
											<td colspan="2" align="right">
												<input  class="btn btn-primary px-3 py-2"  type="button" value="Back" onclick="history.back()" />
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