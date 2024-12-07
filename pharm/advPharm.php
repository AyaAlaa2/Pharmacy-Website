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
                    <h2 class="headerOfCard">  الإعلانات </h2>
                 </div>
                 <table>
                     <thead>
                         <tr>
                             <td> الرقم </td>
                             <td> الصورة </td>
                             <td> الوصف</td>
                             <td>  الصفحة الرئيسية</td>                             
                             <td> الإجراء</td>
                         </tr>
                     </thead>
                     <tbody>
                       <?php
                          $id_pharm = $_SESSION['id-pharm'];
                          $sql = "SELECT * FROM  tbl_adv WHERE id_pharm_admin= '$id_pharm' ORDER BY id DESC"; 
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
                                        $description  = $rows['description'];
                                        $active=$rows['active']; 
                        ?>
                         <tr>
                             <td><?php echo $id;?></td>
                             <td> 
                              <?php 
                                //check name image
                                 if($image_name !=""){
                                     ?>
                                     <img src="<?php echo "../images/pharm/".$image_name?>" width="80px" height="50px">
                                     <?php
                                 }
                                 else{
                                     echo "<div class='error'>لم يتم اضافة صورة </div>";
                                 }
                              ?>  
                             </td>
                             <td> <?php echo $description;?> </td>
                             <td><?php echo $active;?></td>
                             <td>
                               <a href="update-advPharm.php?id=<?php echo $id?>" class="btn-secondary" id="btn-update">تحديث</a>
                               <a href="delete-advPharm.php?id=<?php echo $id?>" class="btn-danger">حذف</a>
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
                <i class="btn" id="add-adv-btn"> إضافة إعلان</i>
             </div>
        </div>

        <div class="login-form-container3">
              <i class="las la-times" id="form-close-adv"></i>
              <form action="add-advPharm.php" method="POST" enctype="multipart/form-data">  
                  <h3>إضافة إعلان</h3>
                  <span class="textForm">اختر صورة الاعلان :</span>
                  <input type="file" name="image" class="box">
                  <textarea name="description" cols="15" rows="2"class="box"  placeholder="وصف الاعلان "></textarea>      
                  <span style="color:#1f6d5d;">عرض في الصفحة الرئيسية :</span>
                  <input class="radiobtn" type="radio" name="active" value="نعم"> نعم 
                  <input class="radiobtn" type="radio" name="active" value="لا" > لا  
                  <input type="submit" name="submit-add-adv" value="اضافة " class="btn">   
              </form>
        </div>
</div>

<script>
        let formBtnadv = document.querySelector('#add-adv-btn');
        let loginFormadv= document.querySelector('.login-form-container3');
        let close = document.querySelector('#form-close-adv');
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
            loginFormadv.classList.remove('active');
        });

        formBtnadv.addEventListener('click', () =>{
            loginFormadv.classList.add('active');
        });

</script> 
