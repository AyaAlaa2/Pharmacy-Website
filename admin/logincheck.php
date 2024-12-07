<?php 
   //Authorization and access control
   // checked user loged in or not
   if(!isset($_SESSION['user'])){
       //user not login
       //redirect login page with masseage
       $_SESSION['no-login-message']="<div class='error'>الرجاء تسجيل الدخول</div>";
       header("location:" . "login.php");
   }
?>