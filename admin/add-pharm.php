<?php 
      include('adminpanel.php'); 

      if(isset($_POST['submit-add-pharm'])){
            //button clicked 
            //Get data Form
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
            $address = mysqli_real_escape_string($conn,$_POST['address']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            $password = mysqli_real_escape_string($conn,$_POST['password']);//password encripting
            //SQL query

            if (isset($_POST['featured'])) {
              $featured = $_POST['featured'];
            } else {
              $featured = "لا";
            }

            if (isset($_POST['active'])) {
              $active = $_POST['active'];
            } else {
              $active = "لا";
            }

           $sql = "INSERT INTO  tbl_pharmcy SET
                   id = '$id',
                   full_name = '$full_name',
                   address  = '$address' ,            
                   featured  = '$featured' ,
                   active	= '$active',
                   email='$email',
                   password1 = '$password',
                   state = 'مضاف ',
                   phone = '$phone' ";
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

              header("location:" . "manage-pharmacy.php");
           } else{
               $_SESSION['add']="<div class='alert-error'>                    
                                   <span class='msg'>  لم يتم الإضافة . حاول مرة أخرى</span>
                                   <span class='close-btn-error'>
                                     <span class='la la-close'></span>
                                   </span>
                                  </div>";

              header("location:" . "manage-pharmacy.php");
           }
      }
?>

<?php include('footer.php'); ?>