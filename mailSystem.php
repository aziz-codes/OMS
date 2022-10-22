<?PHP
if(isset($_POST['submit']))
{

$sender = 'azizisoffline@gmail.com';
$recipient = 'test-hn62a52cu@srv1.mail-tester.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}

}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Send email</title>
</head>
<body>
<form method="POST" action="#">
	<input type="email" name="email" placeholder="enter your email">
<br>
<input type="submit" name="submit" value="send code">
</form>
</body>
</html>