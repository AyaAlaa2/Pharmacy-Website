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
        ?>
    </div>

 <!-- data list -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2> إدارة المشرفين</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td> الرقم التعريفي</td>
                        <td> اسم المشرف </td>
                        <td> اسم المستخدم</td>
                        <td> الإجراء</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['id-user'];
                        $sql = "SELECT * FROM  tbl_admin"; // query
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
                                    $username  = $rows['username'];
                                    //display value in our table
                    ?>
                    <tr>                             
                        <td><?php echo $id;?></td>
                        <td> <?php echo $full_name;?> </td>
                        <td> <?php echo $username;?> </td>
                        <td>
                            <a href="delete-admin.php?id=<?php echo $id;?>" class="btn-danger">حذف</a>
                        </td>
                    </tr>   
                    <?php
                                }
                            } else {                        
                    ?> 
                    <tr>
                        <td colspan="4">
                            <div class="error">لم يتم اضافة مشرفين</div>
                    </td>
                    </tr>
                        <?php  
                            }
                         } //else
                        ?>

                </tbody>
            </table>

            <i class="btn" id="add-btn"> إضافة مشرف</i>
        </div>
    </div>

    <div class="login-form-container">
        <i class="las la-times" id="form-close"></i>
        <form action="add-admin.php" method="POST">
            <h3>إضافة مشرف</h3>     
            <input type="text" name="full_name" class="box" placeholder=" الاسم كاملا" required >
            <input type="text" name="username"  class="box"placeholder=" اسم المستخدم" required > 
            <input type="password" name="password"  class="box" placeholder=" كلمة المرور"   minlength="8" required>
            <input type="submit" name="submit-add" value="اضافة " class="btn">    
        </form>
    </div>
</div>

<script>
    let formBtnpost = document.querySelector('#add-btn');
    let loginFormpost= document.querySelector('.login-form-container');
    let close = document.querySelector('#form-close');
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

<?php include('footer.php'); ?>