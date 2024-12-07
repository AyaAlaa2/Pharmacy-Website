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
    </div>

    <div>
        <?php       
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }        
                     
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
    </div>

    <!--card -->
    <div class="cardBox">
        <div class="card">
            <div>
                <?php
                   $id = $_SESSION['id-user'];
                   $sql = "SELECT * FROM tbl_admin";
                   $res = mysqli_query($conn, $sql); // execute que
                   $count = mysqli_num_rows($res);
                ?>
                <div class="numbers"><?php echo  $count ?></div>
                <div class="cardName"> مشرف</div>
            </div>
            <div class="las la-users iconBox"></div>
        </div>

        <div class="card">
            <div>
                <?php
                    $sql2 = "SELECT * FROM tbl_pharmcy";
                    $res2 = mysqli_query($conn, $sql2); // execute que
                    $count2 = mysqli_num_rows($res2);
                ?>
                <div class="numbers"><?php echo  $count2 ?></div>
                <div class="cardName"> صيدلية</div>
            </div>
            <div class="las la-hospital iconBox"></div>
        </div>

        <div class="card">
            <div>
                <?php
                    $sql3 = "SELECT * FROM tbl_medi";
                    $res3 = mysqli_query($conn, $sql3); // execute que
                    $count3 = mysqli_num_rows($res3);
                ?>
                <div class="numbers"><?php echo  $count3 ?></div>
                <div class="cardName"> دواء</div>
            </div>
            <div class="las la-pills iconBox"></div>
        </div>

        <div class="card">
            <div>
                <?php
                    $sql4 = "SELECT * FROM tbl_adv";
                    $res4 = mysqli_query($conn, $sql4); // execute que
                    $count4 = mysqli_num_rows($res4);
                ?>
                <div class="numbers"><?php echo  $count4 ?></div>
                <div class="cardName"> إعلان</div>
            </div>
            <div class="las la-camera iconBox"></div>
        </div>
    </div>

    <!-- data list -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2> طلبات الإنضمام الأخيرة</h2>
            </div>

            <div class="cardHeader">
                <h4>يمكنك التواصل مع الصيدلية عبر البريد الالكتروني المرسل لمنحها كلمة المرور ثم تأكيدها هنا 
                    <span> <a href="https://mail.google.com/" target="_blank"> اضغط هنا</a></span>
                </h4>
                <h4 style="color: red;" class="h4CardHeader">احرص على تمرير كلمة المرور بشكل صحيح  </h4>
            </div>

            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> الصيدلية</td>
                        <td> البريد الالكتروني</td>
                        <td> الإجراء</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM  tbl_pharmcy WHERE state ='إضافة'" ; // query
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
                                    $email  = $rows['email'];
                                        //display value in our table
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $full_name;?> </td>
                        <td><?php echo $email;?> </td>
                        <td>
                            <form action="addPharmacy.php" method="POST" class="formAddPharmacy">
                                <input type="hidden" name="id" value="<?php echo $id ?>" >
                                <input style=" border-radius: 12px;font-size: 0.93rem;text-transform: none;border:.1rem solid rgba(0,0,0,.3);" class="passInput" type="password" name="password"  placeholder=" كلمة المرور"   minlength="8" required>
                                <input type="submit" name="submit-add" value="اضافة " class="addBtn">
                            </form>
                        </td>
                    </tr>
                    <?php
                                 }
                           }else {                        
                    ?> 
                    <tr>
                        <td colspan="4">
                            <div class="error">لم يتم الإنضمام مؤخراً</div>
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
<?php include('footer.php'); ?>