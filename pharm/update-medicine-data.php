<?php
   include('../constant.php');    
   if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $id_pharm = $_SESSION['id-pharm'];
        $full_name_en_new = $_POST['full_name_en'];
        $full_name_ar_new = $_POST['full_name_ar'];
        $price_new = $_POST['price'];
        $description_new = $_POST['description'];
        $available_new = $_POST['available'];
    
        $sql4 = "UPDATE tbl_medi SET  
        full_name_en ='$full_name_en_new',
        full_name_ar ='$full_name_ar_new',
        price = $price_new,
        description = '$description_new',
        available  ='$available_new'
        WHERE id=$id and id_pharm_admin = '$id_pharm'";

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
            header("location:" ."medicinePharm.php?id=".$id_pharm);
        }
        else{
            $_SESSION['update']="<div class='alert-error'>                    
                                     <span class='msg'>  لم يتم التعديل ... حاول مرة أخرى</span>
                                     <span class='close-btn-error'>
                                        <span class='la la-close'></span>
                                     </span>
                                  </div>";
            //Redirect page 
            header("location:" ."medicinePharm.php?id=".$id_pharm);    
        }
   }
?>