<?php include('adminpanel.php'); ?>
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
    </div> <!--end topbar class -->

    <div>
        <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['delete'])) {
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
    </div>

    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>  المنشورات </h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> العنوان </td>
                        <td> الصورة</td>
                        <td>  قائمة المنشورات</td>
                        <td>  الصفحة الرئيسية</td>
                        <td> الإجراء</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['id-user'];  
                        $sql = "SELECT * FROM   tbl_post "; 
                        $res = mysqli_query($conn, $sql); // execute query
                        //check if query is execute or not, 
                        if ($res == true) {
                            //count rows
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                // have admin
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $image_name = $rows['image_name'];
                                    $title = $rows['title'];
                                    $description  = $rows['description'];
                                    $full_description  = $rows['full_description'];
                                    $featured=$rows['featured'];
                                    $active= $rows['active'];
                                    //display value in our table 
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td> <?php echo $title;?> </td>    
                        <td> 
                            <?php 
                                //check name image
                                if($image_name !=""){
                            ?>
                            <img src="<?php echo "../images/".$image_name?>" width="80px" height="50px">
                            <?php
                                } else{
                                   echo "<div class='error'>لم يتم اضافة صورة </div>";
                                }
                            ?>    
                        </td>                           
                        <td><?php echo $featured;?></td>
                        <td> <?php echo $active;?> </td>
                        <td>
                            <a href="updata-post-admin.php?id=<?php echo $id;?>" class="btn-secondary" id="btn-update">تحديث</a>
                            <a href="delete-post-admin.php?id=<?php echo $id;?>" class="btn-danger">حذف</a>
                        </td>
                    </tr>
                    <?php
                               }
                            } else {                        
                    ?> 
                    <tr>
                        <td colspan="4">
                            <div class="error">لا يوجد نتيجةللبحث</div>
                        </td>
                    </tr>
                    <?php  
                             }
                        } //else
                    ?>
                </tbody>
            </table>
            <i class="btn" id="add-post-btn"> إضافة مقال</i>
        </div>
    </div>

    <div class="login-form-container login-form-container3">
        <i class="las la-times" id="form-close-post"></i>
        <form action="add-post.php" method="POST" enctype="multipart/form-data">
            <h3>إضافة منشور</h3>
            <input type="text" name="title" class="box" placeholder="العنوان">
            <textarea name="description" cols="15" rows="2"class="box"  placeholder="وصف المنشور بإختصار"></textarea>        
            <textarea name="full_description" cols="30" rows="4" class="box" placeholder="وصف التفاصيل/ الكامل"></textarea>     
            <span class="spanLine">اختر صورة الإعلان : </span>
            <input type="file" name="image" class="box">
            <span style="color:#1f6d5d;" class="spanLine">  عرض في قائمة المنشورات:</span>
            <input type="radio" class="radiobtn" name="featured" value="نعم"> نعم 
            <input type="radio" class="radiobtn" name="featured" value="لا" >  لا 
            <br> 
            <span style="color:#1f6d5d;" class="spanLine">  عرض في الصفحة الرئيسية:</span>                  
            <input type="radio" class="radiobtn" name="active" value="نعم"> نعم 
            <input type="radio" class="radiobtn" name="active" value="لا"> لا
            <input type="submit" name="submit-add-post" value="اضافة " class="btn">   
        </form>
   </div>
</div>

<script>
    let formBtnpost = document.querySelector('#add-post-btn');
    let loginFormpost= document.querySelector('.login-form-container');
    let close = document.querySelector('#form-close-post');
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main-content');
    let list = document.querySelectorAll('.navigation li');
    
    toggle.onclick =function(){
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }; 

    function activelink(){
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    };

    list.forEach((item) =>
        item.addEventListener('mouseover',activelink)
    );

    close.addEventListener('click', () =>{
        loginFormpost.classList.remove('active')
    });

    formBtnpost.addEventListener('click', () =>{
        loginFormpost.classList.add('active')
    });
</script>

