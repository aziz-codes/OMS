<?php 
if(isset($_POST['submit']))
{
//====================================================
    // Program : Fake send mail
    // Author : pouletfou at gmail
    // Description : save this file as /usr/sbin/sendmail
    //  and you can test your PHP applications using mail
    //  by looking at the /tmp/fakesendmail.log files.
    //====================================================

$Name = "Da Duder"; //senders name
$email = "azizisoffline@gmail.com"; //senders e-mail adress
$recipient = "azizisoffline@email.com"; //recipient
$mail_body = "The text for the mail..."; //mail body
$subject = "Subject for reviever"; //subject

if(mail($recipient, $subject, $mail_body, $header)){
	echo "mail send successfully..";
} //mail command :)
}
else
echo "mail not send.";
?>



<!DOCTYPE html>
<html>
<head>
	<title>Send email</title>
</head>
<body>
<form method="POST" action="practice.php">
	<input type="email" name="email" placeholder="enter your email">
<br>
<input type="submit" name="submit" value="send code">
</form>
</body>
</html>