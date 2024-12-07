<?php 

 include('../constant.php');
  //Destroy the session
  //session_destroy();//كيف اطلع الصيدلية بس مش النقابة كمان
  unset($_SESSION['user-pharm']);
  unset($_SESSION['id-pharm']);
  //rediret to login
  header("location:" . "loginPharm.php");
?>