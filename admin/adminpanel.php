<?php
include('../constant.php');
include('logincheck.php');
?>


<!DOCTYPE html>
    <html lang="ar" dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>
            <link rel="stylesheet" href="../CSS/AdminScreen.css">
            <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
            <!-- font awesome cdn link  @ https://cdnjs.com/ The iconic SVG, font, and CSS toolkit  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        </head>

        <body>
            <div class="container">
                <div class="navigation">
                    <ul>
                        <li>
                           <a href="#">
                                <img src="../images/logo1.png" alt="" width="250" height="120" draggable="false" style="margin-right:-23px;">
                           </a>
                        </li>
        
                        <li>
                            <a href="dashboard.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-home icon"> </span>
                                <span class="title">الرئيسية</span>
                            </a>
                        </li>

                        <li>
                            <a href="manage-admin.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-users icon"> </span>
                                <span class="title">المشرفين</span>
                            </a>
                        </li>

                        <li>
                            <a href="manage-pharmacy.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-hospital icon"> </span>
                                <span class="title">الصيدليات</span>
                            </a>
                        </li>

                        <li>
                            <a href="manage-medi.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-pills icon"> </span>
                                <span class="title">الأدوية</span>
                            </a>
                        </li>

                        <li>
                            <a href="manage-adv.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-camera icon"></span>
                                <span class="title">الإعلانات</span>
                            </a>
                        </li>

                        <li>
                            <a href="manage-post.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-clipboard-list icon"> </span>
                                <span class="title">منشورات</span>
                            </a>
                        </li>

                        <li>
                            <a href="userPage.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-user icon"> </span>
                                <span class="title">مستخدم</span>
                            </a>
                        </li>

                        <li>
                            <a href="logout.php?id=<?php echo $_SESSION['id-user'] ?>">
                                <span class="las la-sign-out-alt icon"> </span>
                                <span class="title">تسجيل خروج</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </body>
    </html>

