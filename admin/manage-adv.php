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
                <h2> أظهر الاعلانات المهمة للزبائن على الصفحة الرئيسية </h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td> الرقم </td>
                        <td>الصيدلية</td>
                        <td> الصورة </td>
                        <td> الوصف</td>
                        <td>  الصفحة الرئيسية</td>
                        <td> الإجراء</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['id-user'];
                        $sql = "SELECT * FROM   tbl_adv where active = 'نعم'"; 
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
                                    $featured=$rows['featured'];
                                    $id_pharm_admin =$rows['id_pharm_admin'];
                                    //display value in our table 
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $id_pharm_admin;?></td>
                        <td> 
                            <?php 
                                //check name image
                                if($image_name !=""){
                            ?>
                            <img src="<?php echo "../images/pharm/".$image_name?>" width="80px" height="50px">
                            <?php
                                } else {
                                    echo "<div class='error'>لم يتم اضافة صورة </div>";
                                }
                            ?>   
                        </td>
                        <td> <?php echo $description;?> </td>
                        <td><?php echo $featured;?></td>
                        <td>
                            <a href="updata-adv-admin.php?id=<?php echo $id;?>" class="btn-secondary" id="btn-update">تحديث</a>
                            <a href="delete-adv-admin.php?id=<?php echo $id;?>" class="btn-danger">حذف</a>
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
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

