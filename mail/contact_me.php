<?php
// Check for empty fields
// empty($_POST['phone'])      ||
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'chihhong.pang@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: NOREPLY@chihhongpang.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);

$guest_email_subject = "Your message has been sent on Chih-Hong James Pang";
$guest_email_body = "Dear visitor,\nThank you for visiting http://chihhongpang.com ! Your message has been sent to James and we will be in touch shortly. Here is the summary of your message: \n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$guest_headers = "From: NOREPLY@chihhongpang.com\n";
mail($email_address, $guest_email_subject, $guest_email_body, $guest_headers);

return true;			
?>