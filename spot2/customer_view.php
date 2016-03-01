<?php
//customer_list.php 


?>
<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
if(isset($_GET['id']) && (int)$_GET['id'] > 0 ){
	$id = (int)$_GET['id'];
}else{
	header('Location:customer_list.php');
}
?>
		<div class="container w">
		<div class="row centered">
			<br><br>
      		<h3>Section 1 <?=$title?></h3>
<p>
<?php 
  $sql = "select * from test_Customers where  CustomerID=$id";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	  
	   echo '<img src="uploads/customer' .$id. '.jpg" />';
    }
}else{//no records
	echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database

  
  ?>
        </p>
 		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->
<?php include 'includes/footer.php'; ?><?php
//customer_list.php 


?>
<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

		<div class="container w">
		<div class="row centered">
			<br><br>
      		<h3>Section 1 <?=$title?></h3>
<p>
 <?php
  $sql = "select * from test_Customers";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
		echo "First Name: ";
			echo '<a href="customer_view.php?id='. $row['CustomerID'] . '">'. $row['FirstName'] . '</a><br />';
	  // echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
	   echo "LastName: <b>" . $row['LastName'] . "</b><br />";
	   echo "Email: <b>" . $row['Email'] . "</b><br />";
		//echo '<a href="customer_view.php?id='. $row['CustomerID'] . '">'. $row['FirstName'] . '</a>';
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
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