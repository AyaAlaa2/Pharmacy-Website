<?php 
        include('pharmPanel.php'); 
        $id = $_GET['id'];
        $id_pharm = $_SESSION['id-pharm'];
        $sql3 = "SELECT * FROM tbl_adv WHERE id=$id and id_pharm_admin = '$id_pharm'";
        $res3 = mysqli_query($conn, $sql3);
        if ($res3 == true) {
            //count rows
            $count3 = mysqli_num_rows($res3);
            if ($count3 == 1) {
                $rows3 = mysqli_fetch_assoc($res3);
                $current_image = $rows3['image_name'];
                $description  = $rows3['description'];
                $active = $rows3['active'];
            } else {
                header("location:" . "advPharm.php?id=".$id_pharm);
            }
        }
?>

<div class="main-content">
        <div class="topbar">
            <div class="toggle">
                <h2><span class="las la-bars"></span></h2>
            </div>

            <div class="user-wrapper">
                <img src="../images/profile-img.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $_SESSION['user-pharm']; ?></h4>                                      
                </div>
            </div>
        </div>

        <div class="update-form-container-post">
            <form action="updateData-advPharm.php" method="POST" enctype="multipart/form-data"> 
                <h3>تعديل  بيانات الإعلان</h3>
                <div class="lines">
                    <span class="textLines"> الرقم :</span>
                    <input type="text" name="id" class="box" value="<?php echo $id?>"  readonly> 
                </div>
                 
                <div class="lines">
                    <span class="textLines textLines3"> الصورة الحالية : </span>
                    <?php
                        if ($current_image != "") {
                    ?>
                    <img src="<?php echo '../images/pharm/' . $current_image ?>" width="150px" class="imgLines">
                    <?php
                        } else {
                            echo "<div class='error'>لم يتم اضافة صورة</div>";
                        }
                    ?>                 
                </div>
                  
                <div class="lines">
                    <span class="textLines"> تحديث الصورة :</span>
                    <input type="file" name="image" class="box">
                </div>

                <div class="lines">
                    <span class="textLines textLines2"> الوصف: </span>
                    <textarea name="description" cols="15" rows="3" class="box" > <?php  echo $description ?></textarea>
                </div>

                <div class="lines">
                    <span class="textLines"> الصفحة الرئيسية : </span>
                    <input <?php
                               if ($active == "نعم") {
                                   echo "checked";
                                } 
                            ?>
                        type="radio" class="radiobtn" name="active" value="نعم">نعم  
                    <input <?php 
                               if ($active == "لا") {
                                    echo "checked";
                                } 
                            ?>
                        type="radio" class="radiobtn" name="active" value="لا">لا                    
                </div>
                <input type="submit" name="submit-update-adv" value="تأكيد " class="btn">    
            </form>
        </div>
</div>

<?php include('../admin/footer.php'); ?>