<?php
//customer_list.php 

?>
<?php include 'includes/config.php'; ?>
<?php include 'includes/header_list.php'; ?>

		<div class="container w">
		<div class="row centered">
			<br><br>
      		<h3><?=$title?></h3>
<p>
 <?php
  $sql = "select * from seattle_locations";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
		echo '<a href="location_view.php?id='. $row['LocationID'] . '"><img src="uploads/location' .$row['LocationID']. '.jpg" height="62" width="62" /></a><br />';
		
		
			echo '<a href="location_view.php?id='. $row['LocationID'] . '">'. $row['Name'] . '</a><br />';
		
	  // echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
	   echo "Address: <b>" . $row['Location'] . "</b><br />";
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No Locations?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database

  
  ?>
        </p>
 		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->
<?php include 'includes/footer.php'; ?>