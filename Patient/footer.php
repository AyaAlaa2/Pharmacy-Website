   <!-- footer section start-->
<html>
    <body>
        <section class="footer" id="footer">
            <div class="box-container">
                <div class="box">
                    <h3>تواصل معنا</h3>
                    <div style="margin-bottom: 5px;">
                        <i class="fa fa-phone" style="font-size:15px;cursor:pointer; color:rgb(255, 255, 255)"></i>
                        <a href="">
                            <h2>08 2020 2021</h2>
                        </a>
                    </div>
                    <div style="margin-bottom: 5px;">
                        <i class="fa fa-envelope" style="font-size:15px;cursor:pointer; color:rgb(255, 255, 255)"></i>
                        <a href="">
                           <h2>ph@gmail.com</h2>
                        </a>
                    </div>
                    <div style="margin-bottom: 5px;">
                        <i class="fa fa-map-marker" style="font-size:15px;cursor:pointer; color:rgb(255, 255, 255)"></i>
                        <a href="">
                           <h2>فلسطين - غزة</h2>
                        </a>
                    </div>
                </div>
                <div class="box box1">
                    <div style="margin-bottom: 5px;">
                        <i id="icon-medis" class="fas fa-pills"
                           style="font-size:15px;cursor:pointer;color:rgb(255, 255, 255)"></i>
                        <a href="pharm-menu.php">
                            <h2>الصيدليات </h2>
                        </a>
                    </div>

                    <div style="margin-bottom: 5px;">
                        <i id="icon-medis" class="fas fa-pills"
                           style="font-size:15px;cursor:pointer;color:rgb(255, 255, 255)"></i>
                        <a href="medi-user.php">
                            <h2>الأدوية </h2>
                        </a>
                    </div>
                </div>

                <div class="box">
                    <a class="social-icon" href="https://www.facebook.com/">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a class="social-icon" href="https://www.instagram.com/">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a class="social-icon" href="https://twitter.com/">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </div>
           </div>
           <div class="lineFooter"></div>
           <h2 class="credit"> &copy; جميع الحقوق محفوظة | نقابة الصيادلة قطاع غزة 2024 2025  </h2>
        </section>
       <!-- footer section end-->

       <!--for icon social media-->
       <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
       <script src="index-js.js"></script>
       <!-- magnific popup js link  -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js">
        $('.adv').magnificPopup({
                delegate:'a',
                type:'image',
                gallery:{
                enabled:true
                }
            });
       </script>
       <!-- aos js file cdn link  -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
       <!-- jquery cdn link  -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
       <script>
           AOS.init({
           duration:1000,
           delay:400
           });
      </script>
    </body>
</html>