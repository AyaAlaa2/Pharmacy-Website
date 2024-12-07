<?php 
    include('../constant.php');

    if (isset($_POST['submit-add'])) {
        //get all the value from our form
        $id = $_POST['id'];
        $password = mysqli_real_escape_string($conn,$_POST['password']);//password encripting
        $sql3= "UPDATE tbl_pharmcy SET
                    password1 = '$password',
                    state = 'مضاف'
                    WHERE id=$id ";
        //execute
        $res3 = mysqli_query($conn, $sql3);
        //redirect with mss
        if ($res3 == true) { //updating..
            $_SESSION['update'] = " <div class='alert'>                              
                                        <span class='msg'>  تم الاضافة بنجاح</span>
                                        <span class='close-btn'>
                                            <span class='la la-check'></span>
                                        </span>
                                    </div>";

            header("location:" . "dashboard.php");
        } else { //failed updating
            $_SESSION['update'] = "<div class='alert-error'>                    
                                        <span class='msg'>  لم يتم الاضافة . حاول مرة أخرى</span>
                                        <span class='close-btn-error'>
                                            <span class='la la-close'></span>
                                        </span>
                                    </div>";

            header("location:" . "dashboard.php");
        }
    }
?>
         
 