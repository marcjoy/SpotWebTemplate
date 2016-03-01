<?php

//Using the date fuction to get the current day from the server and putting the value into a variable.
$day = $_GET['day'];

//This switch conditional checks the $day variable then executes the case that matches the day.
switch ($day){
  case Monday:    
    $todayPic = "assets/img/monday.png";
    $color = #fff;
    $colorName = "white";
    $planet = "the moon";
    $latin = "Lunae";
    $outline = '-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black';
    break;
  
  case Tuesday:    
    $todayPic = "assets/img/tuesday.png";
    $color = #FF0000;
    $colorName = "red";
    $planet = "the planet Mars";
    $latin = "Martis";   
    break;
    
  case Wednesday:  
    $todayPic = "assets/img/wednesday.png";
    $color = #0080000;
    $colorName = "green";
    $planet = "Mercury";
    $latin = "Merurii";    
    break;
    
  case Thursday:    
    $todayPic = "assets/img/thursday.png";
    $color = #ffff00;
    $colorName = "yellow";
    $planet = "Jupiter";
    $latin = "Jovis";
     $outline = "-webkit-text-stroke-width: 1px;
   -webkit-text-stroke-color: black";
    break;
    
  case Friday:   
    $todayPic = "assets/img/friday.png";
    $color = #0000ff;
    $colorName = "blue";
    $planet = "Venus";
    $latin = "Veneris";
    break;
    
  case Saturday:   
    $todayPic = "assets/img/saturday.png";
    $color = #000000;
    $colorName = "black";
    $planet = "Saturn";
    $latin = "Saturni";
    $outline = "-webkit-text-stroke-width: 1px;
   -webkit-text-stroke-color: grey";
    break;
    
  case Sunday:   
    $todayPic = "assets/img/sunday.png";
    $color = #FFA500;
    $colorName = "orange";
    $planet = "the Sun";
    $latin = "Solis";
    break;
}
  
?>

  
 <?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>





<div class="container w">
		<div class="row centered">
			<br><br>
      		<h3>Today dosen't have to be <?=$day?>.</h3>

<form action="dailyspot.php" method="get">
 <p>
    Choose a Different Day: 
   <input type="submit" name="<?=day;?>" value="Sunday">
   <input type="submit" name="<?=day;?>" value="Monday">
   <input type="submit" name="<?=day;?>" value="Tuesday">
   <input type="submit" name="<?=day;?>" value="Wednesday">
   <input type="submit" name="<?=day;?>" value="Thursday">
   <input type="submit" name="<?=day;?>" value="Friday">
   <input type="submit" name="<?=day;?>" value="Saturday">
   
  </p>
  
  <h1>Today is <?=$day?></h1>
          <img src=<?=$todayPic?> alt="#">
  
              <p>The color of the day for <?=$day?> is <?=$colorName?>.</p>
              <p>The Celestial Object that today represents is <?=$planet?>.</p>
              <p>The latin name for <?=$day?> is <?=$latin?>. </p>
        
 		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->
<?php include 'includes/footer.php'; ?>