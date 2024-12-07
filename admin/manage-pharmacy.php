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
            if (isset($_SESSION['no-pharmacy-found'])) {
                echo $_SESSION['no-pharmacy-found'];
                unset($_SESSION['no-pharmacy-found']);
            }
        ?>
    </div>

    <?php
        $id = $_SESSION['id-user'];
        if(isset($_POST['search'])){
            $searchkey= $_POST['search'];
            $sql = "SELECT * FROM   tbl_pharmcy WHERE (full_name LIKE '%$searchkey%'	OR  address LIKE '%$searchkey%') AND state='مضاف' " ; // query
        }else{
            $sql = "SELECT * FROM   tbl_pharmcy WHERE state='مضاف'"; // query
            $searchkey="";
        }
    ?>

    <form action="" method="POST">
        <div class="sea">
            <div class="ic"></div>
            <div class="input">
                <input type="text" name="search" placeholder="ابحث هنا" value="<?php echo $searchkey;?>" id="mysearch">
            </div>
        </div>
    </form>

    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>   صيدليات قطاع غزة</h2>
                <i class="btn" id="add-pharm-btn"> إضافة صيدلية</i>
            </div>
            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> الصيدلية</td>
                        <td> العنوان</td>
                        <td> البريد الالكتروني</td>
                        <td>رقم الجوال</td>
                        <td>  قائمة الصيدليات</td>
                        <td>  الصفحة الرئيسية</td>
                        <td> الإجراء</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res = mysqli_query($conn, $sql); // execute query
                        //check if query is execute or not, 
                        if ($res == true) {
                            //count rows
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                // have admin
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $address  = $rows['address'];
                                    $email = $rows['email'];
                                    $featured=$rows['featured'];
                                    $active= $rows['active'];
                                    $phone = $rows['phone'];
                                    //display value in our table 
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td> <?php echo $full_name;?> </td>
                        <td><?php echo $address;?></td>
                        <td> <?php echo $email;?> </td>
                        <td> <?php echo $phone;?> </td>
                        <td><?php echo $featured;?></td>
                        <td> <?php echo $active;?> </td>
                        <td style="width:150px;">
                            <a href="updata-pharm-admin.php?id=<?php echo $id;?>" class="btn-secondary" id="btn-update">تحديث</a>
                            <a href="delete-pharm-admin.php?id=<?php echo $id;?>" class="btn-danger">حذف</a>
                        </td>
                    </tr>
                    <?php
                                }
                            } 
                         else {                        
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
        </div>
    </div>

    <div class="login-form-container2">
        <i class="las la-times" id="form-close-phrm"></i>
        <form action="add-pharm.php" method="POST">       
            <h3>إضافة صيدلية</h3>
            <input type="text"     name="id"        class="box"  placeholder=" الرقم التعريفي" required >
            <input type="text"     name="full_name" class="box"  placeholder=" اسم الصيدلية "  required >
            <input type="text"     name="address"   class="box"  placeholder=" العنوان"        required >
            <input type="email"    name="email"     class="box"  placeholder=" البريد الالكتروني" required >
            <input type="text"    name="phone"      class="box"  placeholder=" رقم الجوال" required >
            <input type="password" name="password"  class="box"  placeholder=" كلمة المرور"   minlength="8" required>  
            <span style="color:#1f6d5d;" class="spanLine">  عرض في قائمة الصيدليات:</span>
            <input type="radio" class="radiobtn" name="featured" value="نعم">نعم  
            <input type="radio" class="radiobtn" name="featured" value="لا" >  لا  
            <br>
            <span style="color:#1f6d5d;" class="spanLine">  عرض في الصفحة الرئيسية:</span>                 
            <input type="radio" class="radiobtn" name="active" value="نعم">نعم 
            <input type="radio" class="radiobtn" name="active" value="لا">لا
            <input type="submit"   name="submit-add-pharm" value="اضافة " class="btn">      
        </form>

    </div>

</div>

<script>
    let icon= document.querySelector('.ic');
    let sea =document.querySelector('.sea');
    let formBtnpharm = document.querySelector('#add-pharm-btn');
    let loginFormpharm = document.querySelector('.login-form-container2');
    let close = document.querySelector('#form-close-phrm');

    close.addEventListener('click', () =>{
        loginFormpharm.classList.remove('active');
    });

    icon.onclick = function(){
        sea.classList.toggle('active')
    }

    formBtnpharm.addEventListener('click', () =>{
        loginFormpharm.classList.add('active');
    });
</script>

<?php include('footer.php'); ?>