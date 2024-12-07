<?php include('pharmPanel.php'); ?>

<!-- description is a reserved word , we should change it with another one -->
<?php
  if(isset($_POST['submit-add-medicine'])){
    $full_name_en = mysqli_real_escape_string($conn,$_POST['full_name_en']);
    $full_name_ar = mysqli_real_escape_string($conn,$_POST['full_name_ar']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $id_pharm_admin = $_SESSION['id-pharm'];

    if (isset($_POST['available'])) {
      $available = $_POST['available'];
    } else {
      $available = "لا";
    }
    
    //SQL query
    $sql = "INSERT INTO  tbl_medi SET
            full_name_en = '$full_name_en',
            full_name_ar  = '$full_name_ar',            
            price  = '$price',
            description	= '$description',
            available	= '$available' ,
            id_pharm_admin = '$id_pharm_admin' ";
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

          header("location:" . "medicinePharm.php?id=".$id_pharm_admin);
     }
     else{
         $_SESSION['add']="<div class='alert-error'>                    
                               <span class='msg'>  لم يتم الإضافة . حاول مرة أخرى</span>
                               <span class='close-btn-error'>
                                  <span class='la la-close'></span>
                               </span>
                            </div>";

        header("location:" . "medicinePharm.php?id=".$id_pharm_admin);
     }
}

?>

<?php include('../admin/footer.php'); ?>