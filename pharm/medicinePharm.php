<?php include('pharmPanel.php'); ?>

<div class="main-content">
   <div class="topbar">
      <div class="toggle">
        <h2><span class="las la-bars"></span></h2>
      </div>
      <div class="user-wrapper">
         <img src="../images/pro.jpg" width="40px" height="40px" alt="">
         <div>
            <h4><?php echo $_SESSION['user-pharm']; ?></h4>                                      
         </div>
      </div>
   </div> 
   <!--end topbar class -->

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
         //done good
       ?>  
   </div>

    <?php 
        $id = $_SESSION['id-pharm'];
        if(isset($_POST['search'])){
            $searchkey= $_POST['search'];
            $sql = "SELECT * FROM   tbl_medi WHERE full_name_ar LIKE '%$searchkey%'	
            and  id_pharm_admin = $id  OR full_name_en LIKE '%$searchkey%' and id_pharm_admin = $id  ORDER BY full_name_en ASC"  ; // query
        }else{
            $sql = "SELECT * FROM tbl_medi WHERE id_pharm_admin = $id ORDER BY full_name_en ASC";
            $searchkey="";
        }
    ?>

   <form action="" method="POST">
        <div class="sea">
            <div class="ic"></div>
            <div class="input">
                <input type="text" name="search" placeholder="ابحث هنا"  value="<?php echo $searchkey;?>" id="mysearch">
            </div>
        </div>
   </form>

    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2 class="headerOfCard"> قسم الأدوية</h2>               
            </div>
            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> اسم الدواء/ إنجليزي</td>
                        <td> اسم الدواء / عربي</td>
                        <td> السعر</td>
                        <td> متوفر</td>
                        <td>الاجراء </td>                             
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['id-pharm'];
                        $res = mysqli_query($conn, $sql); // execute query
                        //check if query is execute or not, 
                        if ($res == true) {
                            //count rows
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                // have admin
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id_med = $rows['id'];
                                    $full_name_en = $rows['full_name_en'];
                                    $full_name_ar  = $rows['full_name_ar'];
                                    $price = $rows['price'];
                                    $available=$rows['available'];
                                    //display value in our table 
                    ?>
                    <tr>
                        <td><?php echo $id_med;?></td>
                        <td > <?php echo $full_name_en;?> </td>
                        <td ><?php echo $full_name_ar;?></td>
                        <td > <?php echo $price;?> </td>
                        <td > <?php echo $available;?> </td>
                        <td >
                            <a href=" updata-pharm-medicine.php?id=<?php echo $id_med;?> " class="btn-secondary" id="btn-update">تحديث</a>
                            <a href=" delete-pharm-medicine.php?id=<?php echo $id_med;?> " class="btn-danger">حذف</a>
                        </td>
                    </tr>
                    <?php
                            }
                        } 
                        else //no data in db 
                        {                        
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
            <i class="btn" id="add-pharm-btn"> إضافة دواء</i>  
        </div>
    </div>
    
    <div class="login-form-container2">
         <i class="las la-times" id="form-close-phrm"></i>
         <form action="add-medicine.php" method="POST">
             <h3>إضافة دواء</h3>
             <input type="text" name="full_name_en" class="box"  placeholder=" اسم الدواء بالانجليزية " required >
             <input type="text" name="full_name_ar" class="box"  placeholder=" اسم الدواء بالعربية "  required >
             <input type="text" name="price" class="box"  placeholder=" السعر" required > 
             <input type="url" name="description" class="box"  placeholder=" الوصف " required > 
             <span style="color:#1f6d5d;"> متوفر/ غير متوفر</span>
             <input class="radiobtn" type="radio" name="available" value="نعم" > نعم 
             <input class="radiobtn" type="radio" name="available" value="لا" > لا  
             <input type="submit" name="submit-add-medicine" value="اضافة " class="btn">
             <input type="hidden" name="id" value="<?php echo $id_med ?>"> 
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

<?php include('../admin/footer.php'); ?>




        
