<?php include('../constant.php'); ?>

<?php
  if(isset($_POST['submit'])){
      $id = $_POST['id'];
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $current_password = $_POST['current_password'];// req..
      $new_password = $_POST['new_password'];//option
      $confirm_password = $_POST['confirm_password'];//option
      
      // اي تعديل يلزم ادخال الادمن كلمة المرور
      $sql = "SELECT * FROM tbl_admin WHERE id='$id' ";
     //execute query ans save data in db
      $res = mysqli_query($conn, $sql);
     //check if data insert or not, display message
      if($res == true){
        $count = mysqli_num_rows($res);

        if ($count == 1) {
           if(($new_password == $confirm_password)){ 
              if($new_password != ""){ // update with current passwrd              
                  $sql2 = "UPDATE tbl_admin SET
                           full_name = '$full_name',
                           username  = '$username',
                           password1 = '$new_password'
                           WHERE id='$id' ";
                 //execute query ans save data in db                          
                  $res2 = mysqli_query($conn, $sql2);

                  //check if data insert or not, display message
                  if($res2 == true){
                  //create a session variable to display message
                        $_SESSION['update']=" <div class='alert'>                              
                                                   <span class='msg'>تم التعديل بنجاح</span>
                                                   <span class='close-btn'>
                                                       <span class='la la-check'></span>
                                                   </span>
                                               </div>";
                        //Redirect page
                        header("location:" . "userPage.php");
                         
                     }
                     else{
                           $_SESSION['update']="<div class='alert-error'>                    
                                                    <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                                    <span class='close-btn-error'>
                                                        <span class='la la-close'></span>
                                                    </span>
                                                </div>";
                        header("location:" . "userPage.php");
                     }
            } else{ //update with new password
                $sql4 = "UPDATE tbl_admin SET
                           full_name = '$full_name',
                           username  = '$username',
                           password1 = '$current_password'
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
                        header("location:" . "userPage.php");
                  } else{
                        $_SESSION['update']="<div class='alert-error'>                    
                                                   <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                                   <span class='close-btn-error'>
                                                       <span class='la la-close'></span>
                                                   </span>
                                                </div>";
                        header("location:" . "userPage.php");
                  }
              }
            } else{
                $_SESSION['pwd-not-match']=" <div class='alert-error'>                    
                                                <span class='msg'>  تأكد من كلمة المرور الجديدة</span>
                                                <span class='close-btn-error'>
                                                    <span class='la la-close'></span>
                                                </span>
                                             </div>";
                header("location:" . "userPage.php?id=". $id);                            
            }
        } else {
            $_SESSION['user-not-found']=" <div class='alert-error'>                    
                                             <span class='msg'> تأكد من كلمة المرور الحالية </span>
                                             <span class='close-btn-error'>
                                                <span class='la la-close'></span>
                                             </span>
                                          </div>";
            header("location:" . "userPage.php?id=". $id);
        }  
      }//if query true
   }//if submit
?>