<?php
//include constant.php
    include('../constant.php');
    // 1.get id
    $id = $_GET['id'];
    $id_pharm = $_SESSION['id-pharm'];
    $sql = "DELETE FROM tbl_adv WHERE id=$id and id_pharm_admin = '$id_pharm' ";
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
        header("location:" . "advPharm.php?id=".$id_pharm);
    } else {
        $_SESSION['delete'] = "<div class='alert-error'>                    
                                    <span class='msg'>  لم يتم الإضافة . حاول مرة أخرى</span>
                                    <span class='close-btn-error'>
                                       <span class='la la-close'></span>
                                    </span>
                                </div>";
        //Redirect page 
        header("location:" . "advPharm.php?id=".$id_pharm);
    }
?>