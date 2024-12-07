<?php 
    include('adminpanel.php'); 
    //get details
    // 1.get id
    $id = $_GET['id'];
    //2.sql query
    $sql3 = "SELECT * FROM tbl_post WHERE id=$id";
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
                $active= $rows3['active'];
                $full_description  = $rows3['full_description'];
                $title = $rows3['title'];
          } else {
                header("location:" . "manage-post.php");
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

    <div class="update-form-container-post">
        <form action="updateData-post.php" method="POST" enctype="multipart/form-data">  
            <h3>تعديل  بيانات</h3>
            <div class="lines">
                <span class="textLines">العنوان : </span> 
                <input type="text" name="title" class="box" value="<?php  echo $title ?>" >
            </div>

            <div class="lines">
                <span class="textLines textLines3">الصور الحالية : </span> 
                <?php
                    if ($current_image != "") {
                ?>
                <img src="<?php echo '../images/' . $current_image ?>" width="150px" class="imgLines">
                <?php
                    } else {
                        echo "<div class='error'>لم يتم اضافة صورة</div>";
                    }
                ?> 
            </div>

            <div class="lines">
                <span class="textLines">تحديث الصورة : </span> 
                <input type="file" name="image" class="box"> 
            </div>

            <div class="lines">
                <span class="textLines"> الوصف الكامل : </span> 
                <textarea name="full_description" cols="15" rows="2"class="box"  > <?php  echo $full_description ?></textarea>
            </div>

            <div class="lines">
                  <span class="textLines"> الوصف باختصار : </span> 
                  <textarea name="description" cols="15" rows="2"class="box"  > <?php  echo $description ?></textarea>
            </div>

            <div class="lines">
                  <span class="textLines">  قائمة المنشورات : </span> 
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
                      type="radio" class="radiobtn" name="featured" value="لا"> لا  
            </div>

            <div class="lines">
                <span class="textLines">  الصفحة الرئيسية : </span> 
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
                     type="radio" class="radiobtn" name="active" value="لا"> لا         
            </div>

            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="تأكيد " class="btn">
                  
        </form>

    </div>

</div>


<?php include('footer.php'); ?>