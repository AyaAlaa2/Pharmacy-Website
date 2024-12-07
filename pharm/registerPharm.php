<?php include('../constant.php'); ?>    
<html>
       <head>
            <style>
                a:link{
                   color:#16a085 ;
                   font-size:22px;
                   text-decoration: none;
                   transition: all 0.5s;
                }
                a:visited{
                   color:#16a085 ;
                } 
                a:hover{
                   color:white;
                }
                a:active{
                   color:aqua;
                }
            </style> 
            <title>Register - Pharmacy</title>
            <link rel="stylesheet" href="../CSS/admin.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
       </head>
   
       <body>
           <div class="loginback">
               <div class="signup">
                    <h2 class="text-center">إنشاء حساب</h2>
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
                   <!--Signup form start-->
                   <form action="RegisterPharmData.php" method="POST">
                        <div class="lines">
                            <span class="inputField">رقم المستخدم :</span>
                            <input class="input" type="text" name="id" placeholder="أدخل رقم المستخدم" required >
                        </div>
                        <div class="lines">
                            <span class="inputField">الاسم بالكامل:</span>
                            <input class="input" type="text" name="full_name" placeholder="أدخل اسم الصيدلية" required >
                        </div>
                        <div class="lines">
                            <span class="inputField">العنوان :</span>
                            <input class="input" type="text" name="address" placeholder="أدخل عنوان الصيدلية " required > 
                        </div>
                        <div class="lines">
                            <span class="inputField">البريد الإلكتروني :</span>
                            <input class="input" type="text" name="email" placeholder="أدخل البريد الإلكتروني" required > 
                        </div>
                        <div class="lines">
                            <span class="inputField">رقم الهاتف :</span>
                            <input class="input" type="text" name="phone" placeholder="أدخل رقم الهاتف" required >  
                        </div>
                        <div class="lines">
                            <span class="inputField">ساعات العمل :</span>
                            <input class="input" type="text" name="worktime" placeholder="أدخل ساعات العمل "  > 
                        </div>
                        <button type="submit" name="submit" value="انشاء حساب" class="btn-brimary1"  >تسجيل</button>
                   </form>
                   <a  href="loginPharm.php" class="back" ><i class="fas fa-chevron-right"></i></a>   
                 <!--login form end-->
              </div>
           </div>
       </body>
</html>



