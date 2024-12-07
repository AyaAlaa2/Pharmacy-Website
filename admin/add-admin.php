<?php 
   include("adminpanel.php"); 

   if(isset($_POST['submit-add'])){
       $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $password = mysqli_real_escape_string($conn, $_POST['password']);//password encripting
       //SQL query
      $sql = "INSERT INTO tbl_admin SET
               full_name = '$full_name',
               username  = '$username',
               password1 = '$password'";
      //execute query ans save data in db
      $res = mysqli_query($conn, $sql);
      //check if data insert or not, display message
      if($res == true){
         //create a session variable to display message
         $_SESSION['add']=" <div class='alert'>
                                <span class='msg'>  تم الاضافة بنجاح</span>
                                <span class='close-btn'>
                                   <span class='la la-check'></span>
                                </span>
                            </div>";
         header("location:" . "manage-admin.php");
      }
      else{
         $_SESSION['add']="<div class='alert-error'>                    
                              <span class='msg'>  لم يتم الإضافة . حاول مرة أخرى</span>
                              <span class='close-btn-error'>
                                 <span class='la la-close'></span>
                              </span>
                            </div>";
        header("location:" . "manage-admin.php");
      }
   }
?>

<?php include('footer.php'); ?>