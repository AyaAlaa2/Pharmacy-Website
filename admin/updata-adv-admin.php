<?php 
    include('adminpanel.php'); 
    //get details
    // 1.get id
    $id = $_GET['id'];
    //2.sql query
    $sql3 = "SELECT * FROM tbl_adv WHERE id=$id";
    //3.execute the query
    $res3 = mysqli_query($conn, $sql3);
    //check if data found or not, display message
    if ($res3 == true) {
        //count rows
        $count3 = mysqli_num_rows($res3);
        if ($count3 == 1) {
            $rows3 = mysqli_fetch_assoc($res3);
            $current_image = $rows3['image_name'];
            $description  = $rows3['description'];
            $featured = $rows3['featured'];
        } else {
            header("location:" . "manage-adv.php");
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
                <h4><?php echo $_SESSION['user']; ?></h4>                                      
            </div>
        </div>
    </div>

    <div class="update-form-container">
        <form action="updateData-adv.php" method="POST" enctype="multipart/form-data">
            <h3>تعديل  بيانات</h3>
            <div class="lines">
                <span class="textLines textLines3">الصورة الحالية : </span> 
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
                <span class="textLines">تحديث الصورة : </span> 
                <input type="file" name="image" class="box box2">  
            </div>

            <div class="lines">
                <span class="textLines">الوصف : </span> 
                <textarea name="description" cols="15" rows="2" class="box box2"  > <?php  echo $description ?></textarea>
            </div> 

            <div class="lines">
                <span class="textLines">قائمة الصيدليات : </span> 
                <input <?php 
                           if ($featured == "نعم") {
                                  echo "checked";
                                } 
                        ?> 
                    type="radio" class="radiobtn" name="featured" value="نعم">نعم 
                <input <?php
                           if ($featured == "لا") {
                                    echo "checked";
                                } 
                         ?>
                    type="radio"  class="radiobtn" name="featured" value="لا">لا
            </div> 

            <input type="hidden"   name="id" value ="<?php echo $id; ?>">
            <input type="submit" name="submit" value="تأكيد " class="btn">                          
        </form>
    </div>
</div>

<?php include('footer.php'); ?>