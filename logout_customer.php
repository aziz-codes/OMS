<?php
session_start();
session_destroy();
unset($_SESSION['customer_id']);
header("location: OMS_Home.php");
  ?>