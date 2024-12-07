<?php 
    include('../constant.php');
    if(isset($_POST['submit'])){
        $description_new = $_POST['description'];
        $featured_new = $_POST['featured'];
        $id = $_POST['id'];

        $sql4 = "UPDATE tbl_adv SET                        
                description  = '$description_new',
                featured = '$featured_new'
                WHERE id='$id' ";
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
            header("location:" . "manage-adv.php");
        } else{
            $_SESSION['update']="<div class='alert-error'>                    
                                    <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                    <span class='close-btn-error'>
                                      <span class='la la-close'></span>
                                    </span>
                                 </div>";

             header("location:" . "manage-adv.php");
                        //Redirect page 
        }
    }
?>