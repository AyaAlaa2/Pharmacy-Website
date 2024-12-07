<?php include('../constant.php'); ?>

<?php
  if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $worktime = $_POST['worktime'];
        $state = 'إضافة';
        $featured = 'لا';
        $active= 'لا';

        $sql = "INSERT INTO  tbl_pharmcy SET
        id ='$id',
        full_name ='$full_name',
        address ='$address',
        email  = '$email', 
        phone  = '$phone',
        featured  = '$featured' ,
        active	= '$active',
        worktime  = '$worktime',
        state = '$state'";

        //execute query ans save data in db
        $res = mysqli_query($conn, $sql);

        //check if data insert or not, display message
        if($res == true){
            //create a session variable to display message
            $_SESSION['add']= "<div class='success'>تم إرسال البيانات بنجاح ..</div>";
            header("location:" . "loginPharm.php");
        }
        else{
            $_SESSION['add']="<div class='error'>رقم المستخدم غير مسموح به الرجاء المحاولة برقم مستخدم آخر</div>";
            header("location:" . "registerPharm.php");
        }
   }
?>