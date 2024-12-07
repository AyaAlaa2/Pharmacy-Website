<?php include('../constant.php'); ?>

<?php        
      if(isset($_POST['submit'])){
         $id = $_POST['id'];
         $id_pharm = $_SESSION['id-pharm'];
         $new_password = $_POST['new_password'];
         $confirm_password = $_POST['confirm_password'];
         $email_new = $_POST['email'];
         $address_new = $_POST['address'];
         $phone_new = $_POST['phone'];
         $location_new=$_POST['location'];
         $worktime_new=$_POST['worktime'];

         if($new_password == $confirm_password){
            if($new_password != "d41d8cd98f00b204e9800998ecf8427e"){
                  $sql4 = "UPDATE tbl_pharmcy SET
                  location='$location_new', 
                  worktime = '$worktime_new',
                  address ='$address_new',
                  email  ='$email_new',
                  phone  ='$phone_new',
                  password1 = '$new_password'                        
                  WHERE id='$id'";
                  //execute query ans save data in db                           
                  $res4 = mysqli_query($conn, $sql4);
            
                  //check if data insert or not, display message
                  if($res4 == true){
                     //create a session variable to display message
                     $_SESSION['update']=" <div class='alert alert2'>                              
                                                <span class='msg'>  تم التعديل بنجاح</span>
                                                <span class='close-btn'>
                                                      <span class='la la-check'></span>
                                                </span>
                                           </div>";
                     //Redirect page
                           header("location:" . "settingPharm.php?id=".$id);
                  }
                  else{
                     $_SESSION['update']="<div class='alert-error error2'>                    
                                                <span class='msg'>  لم يتم التعديل  حاول مرة أخرى</span>
                                                <span class='close-btn-error'>
                                                   <span class='la la-close'></span>
                                                </span>
                                           </div>";
                            //Redirect page
                             header("location:" . "settingPharm.php?id=".$id); 
                  }
               }
               else{ // no new password
                  $sql5 = "UPDATE tbl_pharmcy SET  
                           address ='$address_new',
                           email  ='$email_new',
                           location='$location_new', 
                           worktime = '$worktime_new',
                           phone  ='$phone_new' 
                           WHERE id='$id'";
                  //execute query ans save data in db                           
                  $res5 = mysqli_query($conn, $sql5);
                  //check if data insert or not, display message
                  if($res5 == true){
                     //create a session variable to display message
                     $_SESSION['update']=" <div class='alert alert2'>                              
                                                <span class='msg'>  تم التعديل بنجاح</span>
                                                <span class='close-btn'>
                                                   <span class='la la-check'></span>
                                                </span>
                                           </div>";
                        //Redirect page
                        header("location:" ."settingPharm.php?id=".$id);
                  }
                  else{
                     $_SESSION['update']="<div class='alert-error error2'>                    
                                                <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                                <span class='close-btn-error'>
                                                   <span class='la la-close'></span>
                                                </span>
                                           </div>";
                        //Redirect page
                        header("location:" . "settingPharm.php?id=".$id);  
                  }
               }
         }
         else{
               $_SESSION['pwd-not-match']=" <div class='alert-error error2'>                    
                                                <span class='msg'>  تأكد من كلمة المرور الجديدة</span>
                                                <span class='close-btn-error'>
                                                      <span class='la la-close'></span>
                                                </span>
                                             </div>";     
                     //Redirect page             
                      header("location:" . "settingPharm.php?id=".$id);                                    
         }
      }
?>
