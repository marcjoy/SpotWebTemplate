<?php
//template.php_check_syntaxUse this file as a model for make new application pages


?>
<?php include 'includes/config.php'; ?>
<?php include 'includes/header_list.php'; ?>


	<?php
		if (isset($_POST['Email'])){
			/*
			echo '<pre>';
			var_dump($_POST);
			echo'</pre>';
			*/
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$privatekey = '6LecJRoTAAAAAGvR6elumhGa9NPHxGrroVU4YTDi';
			$to = "marcus@seattlemarcus.com";
			$subject = "Test Email from Spot";
			$content = "<b>clever content goes here</b>";
			$replyTo = $_POST['Email'];
			
			
			$content='
			<p><b>Comments: '. $_POST['Comments'] . '</b></p>
			
			';
			function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{//default is text
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    
    if($replyTo !=''){//only add replyTo if passed
        //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    //collapse all header data into a string with operating system safe
    //carriage returns - PHP_EOL
    $headers = implode(PHP_EOL,$headers);

    //use mail() command internally and pass back the feedback
    return mail($to, $subject, $message, $headers);

}//end safeEmail()
			
			$response = safeEmail($to, $subject, $content, $replyTo,'html');

					if($response)
					{
							echo '<p>We will get back to you shortly</p><br />';
					}else{
						 echo 'Trouble with HTML email!<br />'; 
					}

		}else{
			echo ' <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
				<script src="assets/js/util.js"></script>
			<form action="contact.php" method="post" name="myForm" onsubmit="return checkForm(this);">
			
<div align="center"><span class="required">(*required)</span></div>
	<table border="1" style="border-collapse:collapse" align="center">
		<tr><!-- the form elements "Name" and "Email" are sigificant to the app, any others can be added/deleted -->
			<td align="right"><span class="required">*</span>Name:</td>
			<td><input type="text" name="Name" required /></td>
		</tr>
		<tr><td align="right"><span class="required">*</span>Email:</td>
			<td><input type="email" name="Email" required placeholder="Enter a valid email address"/></td>
		</tr>
		<tr><td align="right">How Did You Hear About Us?</td>
			<td>
				<select name="How_Did_You_Hear_About_Us?">
					<option value="">Choose How You Heard</option>
					<option value="Phone">Phone</option>
					<option value="Web">Web</option>
					<option value="Magazine">Magazine</option>
					<option value="Smoke Signal">Smoke Signal</option>
					<option value="Other">Other</option>
				</select>
			</td>
		</tr>
		<tr><td align="right">What Services Are You Interested In?:</td>
			<td>
				<input type="checkbox" name="Interested_In[]" value="New Website" /> New Website <br />
				<input type="checkbox" name="Interested_In[]" value="Website Redesign" /> Website Redesign <br />
				<input type="checkbox" name="Interested_In[]" value="Special Application" /> Special Application <br />
				<input type="checkbox" name="Interested_In[]" value="Lollipops" /> Complimentary Lollipops <br />
				<input type="checkbox" name="Interested_In[]" value="Other" /> Other <br />
			</td>
		</tr>
		<tr>
			<td align="right">Would You Like To Join Our Mailing List?</td>
			<td>
				<input type="radio" name="Join_Mailing_List?" value="Yes" /> Yes <br />
				<input type="radio" name="Join_Mailing_List?" value="No" /> No <br />
			</td>
		</tr>
		<tr><td align="right">Comments:</td>
			<td><textarea name="Comments" cols="40" rows="4" wrap="virtual"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="submit" /></td>
			<div class="g-recaptcha" data-sitekey="6LecJRoTAAAAAObViSeSH-XXGgA6vC4fZsD2FaHc"></div>
		</tr>
    </table>
    </form>
			';
		}



?>
<?php include 'includes/footer.php'; ?>