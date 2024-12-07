<?php include('../constant.php'); ?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>pharmacy</title>
            <link rel="stylesheet" href="../CSS/PatientScreen.css">
            <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
            <!-- aos css file cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
            <!-- magnific popup css cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
            <!-- font awesome cdn link  @ https://cdnjs.com/ The iconic SVG, font, and CSS toolkit  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        </head>

        <body>
            <header>
                <div id="menu-bar" class="fas fa-bars"></div>
                <div class="logo">
                     <img src="../images/logo1.png" alt="logo" id="img-logo" width="250" height="140">
                </div>
 
                <div class="containerNavbar">
                    <ul class="navbar">
                        <li class="navEle">
                            <a href="Homepage.php">
                                <i id="icon-medis" class="fa fa-home icon" style="font-size:19px;cursor:pointer; color:rgb(255, 255, 255)"></i>
                                الصفحة الرئيسية
                            </a> 
                        </li>
                        <li class="navEle">
                            <a href="pharm-menu.php">
                                <i id="icon-medis" class="fas fa-pills icon" style="font-size:19px;cursor:pointer;color:rgb(255, 255, 255)"></i>
                                الصيدلية
                            </a>
                        </li>
                        <li class="navEle">
                            <a href="medi-user.php">
                               <i id="icon-medis" class="fa fa-camera icon" style="font-size:19px;cursor:pointer;color:rgb(255, 255, 255)"></i>
                               الأدوية
                            </a> 
                        </li>
                        <li class="navEle">   
                            <a href="#footer">
                                <i id="icon-medis" class="fa fa-heart icon" style="font-size:19px;cursor:pointer;color:rgb(255, 255, 255)"></i>
                                من نحن
                            </a>
                        </li>
                    </ul>
                </div> 
        
                <div class="icons">
                    <i class="fas fa-search" id="search-btn" style="cursor:pointer;color:rgb(255, 255, 255)"></i>
                    <div class="login">
                        <span>تسجيل الدخول</span>
                    </div>
                </div>

                <form action="pharm-search.php" class="search-bar-container">
                    <input type="search" name="search" id="search-bar" placeholder="ابحث عن الصيدلية هنا ">
                    <label for="search-bar" class="fas fa-search" style="font-size:30px;cursor:pointer;"></label>
                </form>    
            </header>
        </body>
    </html>


<script>
       let iconSearch= document.querySelector('#search-btn');
       let search2 =document.querySelector('.search-bar-container');
       let loginBtn = document.querySelector('.login');
       let menuBar =document.querySelector('#menu-bar');
       let containerNavbar =document.querySelector('.containerNavbar');
       let navbar =document.querySelector('.navbar');
       let newLi = document.createElement('li');
       let anchorLink = document.createElement('a');
       let textNode = document.createTextNode(' بحث');
    

        iconSearch.onclick = function(){
            search2.classList.toggle('active'); 
        }

        loginBtn.onclick = function(){
           window.location.href = '../pharm/loginPharm.php'
        }

        menuBar.onclick = function(){
            containerNavbar.classList.toggle('active');
            let lastLi = navbar.lastElementChild;         
            anchorLink.appendChild(iconSearch);
            anchorLink.appendChild(textNode); 
            newLi.appendChild(anchorLink);
            newLi.classList.add('navEle');
            navbar.insertBefore(newLi, lastLi);
        }

        anchorLink.onclick = function () {
            search2.classList.toggle('active'); 
        }

</script>
