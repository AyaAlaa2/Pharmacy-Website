<?php include('../constant.php'); ?>
<html>

   <head>
        <style>
           a:link{
              color: #16a085;
              font-size:22px;
              text-decoration: none;
              transition: all 0.5s;
              display: block;
              margin-bottom: 15px;
           }
           a:visited{
              color:#16a085;
           }
           a:hover{
              color:white;
            }
           a:active{
              color:aqua;
           }
       </style> 
       <title>Login - Pharmacy</title>
       <link rel="stylesheet" href="../CSS/admin.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <body>
      <div class="loginback">
           <div class="login">
                <h2 class="text-center">تسجيل الدخول</h2>
                 <?php
                     if (isset($_SESSION['login'])) {
                         echo $_SESSION['login'];
                         unset($_SESSION['login']);
                     }
                     if (isset($_SESSION['no-login-message'])) {
                         echo $_SESSION['no-login-message'];
                         unset($_SESSION['no-login-message']);
                     }
                     if (isset($_SESSION['add'])) {
                         echo $_SESSION['add'];
                         unset($_SESSION['add']);
                     }
                 ?>
                 <!--login form start-->
                 <form action="" method="POST">
                     <div class="lines">
                         <span class="inputField">رقم المستخدم :</span>
                         <input class="input" type="text" name="id" placeholder="أدخل رقم المستخدم" required >
                     </div>
                     <div class="lines">
                          <span class="inputField inputField2">كلمة المرور :</span>
                          <input class="input" type="password" name="password" placeholder="أدخل كلمة المرور" minlength="8" required >
                     </div>
                     <button type="submit" name="submit" value="login" class="btn-brimary1">تسجيل الدخول</button>
                 </form>
                 <a  href="registerPharm.php" class="newAccount"> إنشاء حساب جديد ؟</a>
                 <div style="position:relative;"> 
                      <div class="halfLine"></div>
                      <span style="font-size:25px;">أو</span>
                      <div class="halfLine halfLine2"></div>
                 </div>
                 <a  href="../admin/login.php" class="AdminLogin">تسجيل دخول إلى الإدارة</a>
                     <!--login form end-->
            </div>
        </div>
    </body>
</html>

<?php
  if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $password = mysqli_real_escape_string($conn, ($_POST['password']));
        $sql = "SELECT * FROM  tbl_pharmcy WHERE id='$id' and password1 ='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $rows = mysqli_fetch_assoc($res);
            $full_name = $rows['full_name'];
            // $_SESSION['login'] = "<div class='success'>Login Successfully ! ..</div>";
            $_SESSION['user-pharm'] = $full_name;
            $_SESSION['id-pharm'] = $id;
            // Redirect page 
            header("location:" . "dashboardPharm.php?id=".$_SESSION['id-pharm']);
        } else {
            $_SESSION['login'] = "<div class='error'>اسم المستخدم أو كلمة المرور غير صحيحة</div>";
            //Redirect page 
            header("location:" . "loginPharm.php");
        }
    }
?>