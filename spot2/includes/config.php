<?php
/*
config.php

Provides a place to put all configuration info for opur app.
*/

include "credentials.php";

define('DEBUG',TRUE); #we want to see all errors

//THIS_PAGE is the name of the current page
define('THIS_PAGE' ,basename($_SERVER['PHP_SELF']));



$nav1['index.php'] = "HOME";
$nav1['about.php'] = "ABOUT";
$nav1['services.php'] = "SERVICES";
$nav1['daily.php'] = "DAILY";
$nav1['customer_list.php'] = "CUSTOMERS";


$imageBG['index.php'] = "../img/header-bg.jpg";
$imageBG['about.php'] = "../img/about.jpg";
$imageBG['services.php'] = "assests/img/services.jpg";
$imageBG['daily.php'] = "DAILY";


switch(THIS_PAGE){
  case "index.php":    
    $title = "Home page title";
    $pageID = "Home Page";
      break;
    
   case "about.php":
    $title = "About page title";
    $pageID = "About Page";
      break;
    
    case "services.php":
     $title = "Services page title";
    $pageID = "Services Page";
      break;
    
     case "daily.php":
    $title = "Welcome to $day";
    $pageID = "Daily Page";
      break;
    
    case "dailyspot.php":
     $title = "Welcome to $day";
     $pageID = "Daily Page";
      break;
    
    case "customer_list.php":
    $title = "Customers List Page";
    $pageID = "Customer List";
      break;
    
    default: 
    $title = THIS_PAGE;
    $pageID = "";
}

function makeLinks($ar){
  $myReturn = '';
  foreach($ar as $url => $label){
    
    if($url == THIS_PAGE){
       echo '<li><li class="active"><a href="' . $url . '">' . $label . '</a></li>';
    }else{
       echo '<li><a href="' . $url . '">' . $label . '</a></li>';
    }
  }  
  
  return $myReturn;
}


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}


