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
       <title>Login - Admin</title>
       <link rel="stylesheet" href="../CSS/admin.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="loginback">
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
            ?>
            <!--login form start-->
            <form action="" method="POST">
                <div class="lines">
                    <span class="inputField">اسم المستخدم : </span>
                    <input class="input" type="text" name="username" placeholder="أدخل اسم المستخدم" required >
                </div>
                <div class="lines">
                    <span class="inputField inputField2">كلمة المرور :</span>
                    <input class="input" type="password" name="password" placeholder="أدخل كلمة المرور" minlength="8" required >
                </div>
                <button type="submit" name="submit" value="Login" class="btn-brimary1">تسجيل الدخول</button>
                <div style="position:relative;">
                    <div class="halfLine"></div>
                    <span style="font-size:25px;">أو</span>
                    <div class="halfLine halfLine2"></div>
                </div>
                <a  href="../pharm/loginpharm.php" class="AdminLogin">تسجيل الدخول باسم الصيدلية</a>
            </form>
            <!--login form end-->
        </div>
    </body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM  tbl_admin WHERE username='$username' and password1='$password' ";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $user = mysqli_fetch_assoc($res);  
            // $_SESSION['login'] = "<div class='success'>Login Successfully ! ..</div>";
            $_SESSION['user'] = $username;
            $_SESSION['id-user'] = $user['id'];
                    header("location:" . "dashboard.php?id=".$_SESSION['id-user']);
        } else {
            $_SESSION['login'] = "<div class='error'>اسم المستخدم أو كلمة المرور غير صحيحة</div>";
            header("location: login.php");
            exit();
        }
    }
?>