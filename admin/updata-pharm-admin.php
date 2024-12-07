<?php 
      include('adminpanel.php'); 

      $id = $_GET['id'];
      $sql2 = "SELECT * FROM tbl_pharmcy WHERE id=$id";
      //3.execute the query
      $res2 = mysqli_query($conn, $sql2);
      $count2 = mysqli_num_rows($res2);
      if ($count2 == 1) { //no if
         $rows2 = mysqli_fetch_assoc($res2);
         $address = $rows2['address'];
         $email = $rows2['email'];
         $featured = $rows2['featured'];
         $active = $rows2['active'];
      } else { //no
         $_SESSION['no-pharmacy-found'] = "<div class='alert-error'>                    
                                             <span class='msg'>  حاول مرة أخرى</span>
                                             <span class='close-btn-error'>
                                                <span class='la la-close'></span>
                                             </span>
                                           </div>";
         header("location:" . "manage-pharmacy.php");
      } //no
     
     if(isset($_POST['submit'])){
         //button clicked 
         //Get data Form
         $id = $_POST['id'];
         $new_password = md5($_POST['new_password']);
         $confirm_password = md5($_POST['confirm_password']);
         $featured_new = $_POST['featured'];
         $active_new = $_POST['active'];
         $email_new = $_POST['email'];
         $address_new = $_POST['addres'];
     
         if($new_password == $confirm_password){ 
            if($new_password != "d41d8cd98f00b204e9800998ecf8427e"){
               $sql4 = "UPDATE tbl_pharmcy SET  
               address ='$address_new',
               featured = '$featured_new',
               active = '$active_new',
               email  ='$email_new',   
               password = '$new_password'
               WHERE id='$id'";
              //execute query ans save data in db                           
               $res4 = mysqli_query($conn, $sql4);
               //check if data insert or not, display message
               if($res4 == true){
                  //create a session variable to display message
                  $_SESSION['update']=" <div class='alert'>                              
                                            <span class='msg'>  تم التعديل بنجاح</span>
                                            <span class='close-btn'>
                                               <span class='la la-check'></span>
                                            </span>
                                         </div>";
                //Redirect page
                   header("location:" . "manage-pharmacy.php");
               } else{
                  $_SESSION['update']="<div class='alert-error'>                    
                                            <span class='msg'>  لم يتم التعديل  حاول مرة أخرى</span>
                                            <span class='close-btn-error'>
                                               <span class='la la-close'></span>
                                            </span>
                                        </div>";
    
                  header("location:" . "manage-pharmacy.php");
                //Redirect page 
               }
            } else{ // no new password
               $sql5 = "UPDATE tbl_pharmcy SET  
               address ='$address_new',
               featured = '$featured_new',
               active = '$active_new',
               email  ='$email_new'
               WHERE id='$id'";
               //execute query ans save data in db                           
               $res5 = mysqli_query($conn, $sql5);
    
               //check if data insert or not, display message
               if($res5 == true){
               //create a session variable to display message
                  $_SESSION['update']=" <div class='alert'>                              
                                            <span class='msg'>  تم التعديل بنجاح</span>
                                            <span class='close-btn'>
                                               <span class='la la-check'></span>
                                            </span>
                                         </div>";
                //Redirect page
                   header("location:" . "manage-pharmacy.php");
               } else{
                  $_SESSION['update']="<div class='alert-error'>                    
                                            <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                            <span class='close-btn-error'>
                                                <span class='la la-close'></span>
                                            </span>
                                        </div>";
    
                  header("location:" . "manage-pharmacy.php");
                //Redirect page 
               }
            }
         } else {
            $_SESSION['pwd-not-match']=" <div class='alert-error'>                    
                                            <span class='msg'>  تأكد من كلمة المرور الجديدة</span>
                                            <span class='close-btn-error'>
                                               <span class='la la-close'></span>
                                            </span>
                                          </div>";
            header("location:" . "updata-pharm-admin.php?id=".$id);                              
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
         ?>
      </div>

      <div class="update-form-container">
         <form action="" method="POST">
            <h3>  تعديل بيانات   </h3>
            <div class="lines">
               <span class="textLines">الرقم التعريفي : </span> 
               <input type="text" name="id" class="box" value="<?php echo $id?>"  readonly> 
            </div>

            <div class="lines">
               <span class="textLines"> العنوان : </span> 
               <input type="text" name="addres" class="box"  value="<?php echo $address?>">
            </div>

            <div class="lines">
               <span class="textLines"> البريد الإلكتروني : </span> 
               <input type="email" name="email" class="box"  value="<?php echo $email?>"> 
            </div>

            <div class="lines">
               <span class="textLines">  قائمة الصيدليات : </span> 
               <input <?php 
                          if ($featured == "نعم") {
                              echo "checked";
                           } 
                        ?> 
                  type="radio" class="radiobtn" name="featured" value="نعم">نعم  
               <input <?php 
                           if ($featured == "لا") {
                              echo "checked";
                           } 
                        ?>
                  type="radio" class="radiobtn" name="featured" value="لا">لا 
            </div>

            <div class="lines">
               <span class="textLines">الصفحة الرئيسية : </span> 
               <input <?php 
                          if ($active == "نعم") {
                              echo "checked";
                           } 
                        ?>
                   type="radio" class="radiobtn" name="active" value="نعم">نعم  
               <input <?php 
                           if ($active == "لا") {
                              echo "checked";
                           } 
                        ?> 
                   type="radio" class="radiobtn" name="active" value="لا">لا 
            </div>

            <div class="lines">
               <span class="textLines">  كلمة المرور الجديدة : </span> 
               <input type="password" name="new_password" class="box" placeholder="  كلمة المرور الجديدة"  minlength="8"  >
            </div>

            <div class="lines">
               <span class="textLines"> تأكيد كلمة المرور : </span> 
               <input type="password" name="confirm_password" class="box" placeholder=" تأكيد كلمة المرور "  minlength="8" >
            </div>
                 
            <input type="submit" name="submit" value="تأكيد " class="btn">      
         </form>
      </div>
   </div>


<?php include('footer.php'); ?>