<?php
//template.php_check_syntaxUse this file as a model for make new application pages


?>
<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h3>Contact Us</h3>
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
			echo '<form action="contact.php" method="post">
						<p>Name: <input type="text" name="Name" /></p>
						<p>Email: <input type="email" name="Email" required /></p>
						<p>Comments: <input type="textarea" name="Comments" /></textarea></p>	
						<p>Name: <input type="submit" value="Contact Us!" /></p>
						<div class="g-recaptcha" data-sitekey="6LecJRoTAAAAAObViSeSH-XXGgA6vC4fZsD2FaHc"></div>
			</form>
			';
		}



?>
<?php include 'includes/footer.php'; ?>