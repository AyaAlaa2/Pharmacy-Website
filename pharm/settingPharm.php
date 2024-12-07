<?php
      include('pharmPanel.php'); 
      $id = $_SESSION['id-pharm'];
      $sql3 = "SELECT * FROM tbl_pharmcy WHERE id=$id";
      $res3 = mysqli_query($conn, $sql3);
      if ($res3 == true) {
         $count3 = mysqli_num_rows($res3);
         if ($count3 == 1) {
            $rows3 = mysqli_fetch_assoc($res3); 
            $email = $rows3['email'];
            $phone  = $rows3['phone'];
            $address = $rows3['address'];
            $location=$rows3['location'];
            $worktime =$rows3['worktime'];
         } else {
            header("location:" . "settingPharm.php?id".$id);
         }
      }
?>

<div>
      <?php
            if (isset($_SESSION['update'])) {
               echo $_SESSION['update'];
               unset($_SESSION['update']);
            }
            if (isset($_SESSION['pwd-not-match'])) {
               echo $_SESSION['pwd-not-match'];
               unset($_SESSION['pwd-not-match']);
            }//done good
      ?>
</div>

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

      <div class="update-form-container-post update-form-container-post2">
            <form action="settingUpdatePharm.php" method="POST" enctype="multipart/form-data">
                  <h3>تحديث  بيانات</h3>
                  <div class="lines">
                        <span class="textLines"> العنوان : </span>
                        <input type="text" name="address" class="box"  value="<?php echo $address?>" > 
                  </div>
                  <div class="lines">
                        <span class="textLines"> البريد الإلكتروني : </span>
                        <input type="email" name="email"  class="box" value="<?php echo $email;?>">
                  </div>
                  <div class="lines">
                        <span class="textLines"> رقم الجوال : </span>
                        <input type="text" class="box" name="phone" value= "  <?php echo $phone;?>" >
                  </div>
                  <div class="lines3">
                        <span>ساعد بالوصول الى مكان صيدليتك عبر خريطة جوجل يوفر لك هذا الرابط شرح لإضافة نفسك !</span> 
                        <span> <a href="https://www.youtube.com/watch?v=ZUSZluaPFMU" target="_blank"> اضغط هنا</a></span>
                  </div>
                  <div class="lines4">
                        <h4>يمكنك الان بعد الحصول على الرابط ارفاقه هنا </h4>
                  </div> 
                  <div class="lines">
                       <span class="textLines"> إضافة الموقع: </span>
                       <input type="url" class="box" name="location" value= "  <?php echo $location;?>"  >
                  </div>
                  <div class="lines">
                       <span class="textLines"> أوقات العمل: </span>
                       <input type="text" class="box" name="worktime" value= "  <?php echo $worktime;?>" >
                  </div>
                  <div class="lines">
                       <span class="textLines">كلمة المرور الجديدة :  </span>
                       <input type="password" name="new_password" class="box" placeholder="كلمة المرور الجديدة"  minlength="8"  >
                  </div>
                  <div class="lines">
                       <span class="textLines">تأكيد كلمة المرور : </span> 
                       <input type="password" name="confirm_password" class="box" placeholder=" تأكيد كلمة المرور "  minlength="8" >
                  </div>
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="submit" name="submit" value="تحديث " class="btn">
            </form>
      </div>
</div>

<?php include('../admin/footer.php'); ?>










       