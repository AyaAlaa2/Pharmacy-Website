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

    <?php 
        $id = $_GET['id'];
        if(isset($_POST['search'])){
            $searchkey= $_POST['search'];
            $sql = "SELECT * FROM    tbl_medi WHERE full_name_en LIKE '%$searchkey%'	OR  full_name_ar LIKE '%$searchkey%' 
            OR  id_pharm_admin LIKE '%$searchkey%' " ; // query
        }else{
            $sql = "SELECT * FROM    tbl_medi"; // query
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
                <h2>  قسم مراقبة أسعار الأدوية  </h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> اسم الدواء/ إنجليزي</td>
                        <td> اسم الدواء / عربي</td>
                        <td> السعر</td>
                        <td>  الصيدلية</td>
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
                                    $full_name_en = $rows['full_name_en'];
                                    $full_name_ar  = $rows['full_name_ar'];
                                    $price = $rows['price'];
                                    $id_pharm_admin=$rows['id_pharm_admin'];
                                    $available= $rows['available'];
                                    //display value in our table 
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td> <?php echo $full_name_en;?> </td>
                        <td><?php echo $full_name_ar;?></td>
                        <td> <?php echo $price;?> </td>
                        <td><?php echo $id_pharm_admin;?></td>    
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
</div>

<script>
    let icon2= document.querySelector('.ic');
    let search2 =document.querySelector('.sea');

    icon2.onclick = function(){
       search2.classList.toggle('active')
    }
</script>

<?php include('footer.php'); ?>