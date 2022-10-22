<?php
session_start();
ob_start();
if(!isset($_SESSION['customer_id']))
{
 $_SESSION['user']="Logged in guest.";
}

?>