<?php
 
    $email_to = "andrei.lupu1996@yahoo.com";
	$email_subject= "Email de la G.T.V ";
     
    $user=$_POST["user"];
	$email=$_POST["email"];
	$subiect=$_POST["problema"];
	$text=$_POST["subiect"];
	$robotest = $_POST['name'];
     
	function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    } 
	$email_message = "Form details below.\n\n";
    $email_message .= "Username: ".clean_string($user)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Problema: ".clean_string($subiect)."\n";
    $email_message .= "Subiect: ".clean_string($text)."\n";
 
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
if($robotest)
		{
			echo "<script>alert('You are a robot.');window.location.href='contact.php';</script>";
		}
else
{
@mail($email_to, $email_subject, $email_message, $headers); 
  echo "<script>alert('Thank you for contacting us. We will be in touch with you very soon. ');window.location.href='contact.php';</script>";
}
 ?>