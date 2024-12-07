<?php include('pharmPanel.php'); ?>

<div class="main-content">
      <div class="topbar">
          <div class="toggle">
             <h2><span class="las la-bars"></span></h2>
          </div>
          <div class="user-wrapper">
                 <img src="../images/pro.jpg" width="40px" height="40px" alt="">
                 <div>
                    <h4><?php echo $_SESSION['user-pharm']; ?></h4>                                      
                 </div>
          </div>
      </div>
      
      <div>
         <?php
              if (isset($_SESSION['update'])) {
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
               }  //done good
           ?>
      </div>
       <!--card -->
      <div class="cardBox">
           <div class="card">
               <div>
                  <?php
                       $id = $_GET['id'];
                       $sql3 = "SELECT * FROM tbl_medi WHERE id_pharm_admin = '$id'";
                       $res3 = mysqli_query($conn, $sql3); // execute que
                       $count3 = mysqli_num_rows($res3);
                   ?>
                   <div class="numbers"><?php echo  $count3 ?></div>
                   <div class="cardName"> دواء</div>
               </div>
               <div class="las la-pills iconBox"></div>
           </div>

           <div class="card">
               <div>
                   <?php
                        $sql4 = "SELECT * FROM tbl_adv WHERE id_pharm_admin = '$id'";
                        $res4 = mysqli_query($conn, $sql4); // execute que
                        $count4 = mysqli_num_rows($res4);
                    ?>
                   <div class="numbers"><?php echo  $count4 ?></div>
                   <div class="cardName"> إعلان</div>
               </div>
               <div class="las la-camera iconBox"></div>
           </div>

           <div class="card">
               <div>
                    <?php
                        $sql5 = "SELECT * FROM tbl_pharmcy WHERE id='$id'";
                        $res5 = mysqli_query($conn, $sql5);
                        $count5 = mysqli_num_rows($res5);
                        if($count5 == 1){
                            $rows = mysqli_fetch_assoc($res5);                                   
                            $worktime= $rows['worktime'];                          
                        }
                        else{
                            $worktime = 0;
                        }
                     ?>
                   <div class="numbers worktimeText"><?php echo $worktime ?></div>
                   <div class="cardName"> اوقات العمل</div>
               </div>
               <div class="las la-clock iconBox"></div>
           </div>
      </div>

      <div class="details">
             <div class="recentOrders">
                 <div class="cardHeader">
                    <h2>  كيف يمكنك التعامل مع هذا النظام ؟ اليك بعض الارشادات:</h2>
                 </div>

                 <div class="cardHeader cardHeader2">
                    <h3>إضافة الأدوية ومنتجات التجميل :</h3>
                    <h4>قم بإضافة الأدوية ومنتجات التجميل المتوفرة داخل الصيدلية.</h4>
                    <h5>ملاحظة: الأسعار مراقبة </h5>
                 </div>

                 <div class="cardHeader cardHeader2">
                    <h3>معلومات الأدوية : </h3>
                    <h4>نحن نثق بك! زود الزبائن برابط يحتوي على معلومات عن الدواء وأعراضه.</h4>
                    <h5>تحذير: كن حذراً لأجل المرضى </h5>
                 </div>

                 <div class="cardHeader cardHeader2">
                    <h3>قائمة الأدوية : </h3>
                    <h4>تتيح لك قائمة الأدوية صلاحية إضافة الأدوية وتحديث القائمة بالأدوية المتوفرة.</h4>
                 </div>

                 <div class="cardHeader cardHeader2">
                     <h3>إعدادات الموقع : </h3>
                     <h4>من قائمة الإعدادات، قم بإضافة موقعك عبر خريطة جوجل لتسهيل الوصول.</h4>
                 </div>

                 <div class="cardHeader cardHeader2">
                    <h3> الإعلانات : </h3>
                    <h4> أبرز اهم الإعلانات الى الزبائن من قائمة الإعلانات</h4>
                 </div>
            </div>
      </div>  
</div>

<script>
      let toggle = document.querySelector('.toggle');
      let navigation = document.querySelector('.navigation');
      let main = document.querySelector('.main-content');
      let list = document.querySelectorAll('.navigation li');

      toggle.onclick =function(){
         navigation.classList.toggle('active');
         main.classList.toggle('active');
      };
           
      function activelink(){
         list.forEach((item) =>
         item.classList.remove('hovered'));
         this.classList.add('hovered');
      };

      list.forEach((item) =>
         item.addEventListener('mouseover',activelink)
      );

</script>

<?php include('../admin/footer.php'); ?>