<?php
    //include constant.php
    include('../constant.php');

    // 1.get id
    $id = $_GET['id'];

    //2.sql query
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //3.execute the query
    $res = mysqli_query($conn, $sql);

    //check if data insert or not, display message
    if ($res == true) {
        //create a session variable to display message
        $_SESSION['delete'] = "<div class='alert'>                              
                                   <span class='msg'>  تم الحذف  بنجاح</span>
                                   <span class='close-btn'>
                                       <span class='la la-check'></span>
                                   </span> 
                                </div>";

        //Redirect page 
        header("location:" . "manage-admin.php");
    } else {
        $_SESSION['delete'] = "<div class='alert-error'>                    
                                    <span class='msg'>  لم يتم الحذف . حاول مرة أخرى</span>
                                    <span class='close-btn-error'>
                                        <span class='la la-close'></span>
                                    </span>
                                </div>";
        //Redirect page 
        header("location:" . "manage-admin.php");
    }
?>
   
