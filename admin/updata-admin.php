<?php include('adminpanel.php'); ?>

<?php
      //get details
      // 1.get id
      $id = $_GET['id'];

      //2.sql query
      $sql3 = "SELECT * FROM tbl_admin WHERE id=$id";

      //3.execute the query
      $res3 = mysqli_query($conn, $sql3);

      //check if data found or not, display message
      if ($res3 == true) {
         //count rows
         $count3 = mysqli_num_rows($res3);
         if ($count3 == 1) {
            $rows3 = mysqli_fetch_assoc($res3);
            $full_name = $rows3['full_name'];
            $username  = $rows3['username'];
         } else {
            header("location:" . "manage-admin.php");
         }
      }
?>

<div class="main-content">
   <div class="topbar">
      <div class="toggle">
         <h2><span class="las la-bars"></span></h2>
      </div>
      <div class="user-wrapper">
         <img src="../images/profile-img.png" width="40px" height="40px" alt="">
         <div>
            <h4><?php echo $_SESSION['user']; ?></h4>                                      
         </div>
      </div>
   </div>

   <div>
      <?php
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        
        if (isset($_SESSION['user-not-found'])) {
         echo $_SESSION['user-not-found'];
         unset($_SESSION['user-not-found']);
         }
      ?>
   </div>

   <div class="update-form-container">
      <form action="updateData-admin.php" method="POST">
         <h3>تعديل  بيانات</h3>
         <div class="lines">
            <span class="textLines">الاسم: </span> 
            <input type="text" name="full_name" class="box" value="<?php echo $full_name?>" >
         </div>
         <div class="lines">
           <span class="textLines">اسم المستخدم :  </span> 
           <input type="text" name="username"  class="box" value="<?php echo $username?>">
         </div>
         <div class="lines">
           <span class="textLines"> كلمة المرور الحالية : </span>  
           <input type="password" name="current_password" placeholder="كلمة المرور" class="box" required> 
         </div>
         <div class="lines">
           <span>تغيير كلمة المرور الحالية </span>
           <a id="show"> اضغط هنا</a> 
         </div>
         <input type="submit" name="submit" value="تأكيد " class="btn">
         <div class="passwordInput">
            <div class="hide_password lines" >
               <span>كلمة المرور الجديدة : </span>
               <input type="password" name="new_password" class="box" placeholder="  كلمة المرور الجديدة" >
            </div>   
            <div class="hide_password lines" >
               <span> تأكيد كلمة المرور :  </span>
               <input type="password" name="confirm_password" class="box" placeholder=" تأكيد كلمة المرور ">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">   
         </div>  
      </form>
   </div>
</div>

<script>
    let show= document.querySelector('#show');
    let hide =document.querySelector('.passwordInput');

    show.addEventListener('click',() =>{
         hide.style.display="inline" ;
    });
</script>

<?php include('footer.php'); ?>