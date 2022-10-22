<?php


if(isset($_POST['send']))
{
	$recepient=$_POST['rec'];
$subject=$_POST['subject'];
$body=$_POST['body'];
$header="FROM: oms.org@gmail.com";

$send_mail=mail($recepient, $subject, $body,$header);
if($send_mail)
{
	echo "your mail has been sent";
}
else
echo "mail not send,..";
}


  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Send Mail</title>
  </head>
  <body>
  <form action="#" method="POST">
  	<div class="panel">
  	<input type="email" name="rec" placeholder="Mail to">
  	<br>
  	<br>
  	<input type="text" name="subject" placeholder="subject">
  	<br><br>
  	<input type="text" name="body" placeholder="body">
  	<br><br>
  	<input type="submit" name="send" value="Send">
  </div>
  </form>
  </body>
  </html>