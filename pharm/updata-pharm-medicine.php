<?php 
        include('pharmPanel.php'); 
        $id = $_GET['id']; //id medicine
        $id_pharm = $_SESSION['id-pharm'];
        $sql3 = "SELECT * FROM tbl_medi WHERE id=$id and id_pharm_admin = '$id_pharm'";
        
        //3.execute the query
        $res3 = mysqli_query($conn, $sql3);

        //check if data found or not, display message
        if ($res3 == true) {
            //count rows
            $count3 = mysqli_num_rows($res3);
            if ($count3 == 1) {
                $rows3 = mysqli_fetch_assoc($res3);
                $full_name_en = $rows3['full_name_en'];
                $full_name_ar = $rows3['full_name_ar'];
                $price = $rows3['price'];
                $description = $rows3['description'];
                $available = $rows3['available'];

            } else {
                $_SESSION['no-pharmacy-found'] = "<div class='error'>medicine Not Found</div>";
                header("location:" . "medicinePharm.php");
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
                    <h4><?php echo $_SESSION['user-pharm'];?></h4>                                      
                </div>
        </div>
    </div>

    <div class="update-form-container">
        <form action="update-medicine-data.php" method="POST">
            <h3>تعديل معلومات دواء </h3>
            <div class="lines">
                <span class="textLines">الاسم بالانجليزية</span> 
                <input type="text" name="full_name_en" class="box"  value=" <?php echo $full_name_en ; ?> ">
            </div>
            <div class="lines">
                <span class="textLines">الاسم بالعربية </span>
                <input type="text" name="full_name_ar" class="box"  value=" <?php echo $full_name_ar ;?> "> 
            </div>
            <div class="lines">
                <span class="textLines">السعر </span> 
                <input type="text" name="price" class="box"  value=" <?php echo $price ; ?> "> 
            </div>
            <div class="lines">
                <span class="textLines">متوفر/غير متوفر</span>
                <input <?php 
                            if ($available == "نعم") {
                               echo "checked";
                            } 
                        ?> 
                    type="radio" class="radiobtn" name="available" value="نعم">نعم  
                <input <?php 
                            if ($available == "لا") {
                                echo "checked";
                            } 
                        ?>
                    type="radio" class="radiobtn" name="available" value="لا">لا
            </div>
            <div class="lines">
                <span class="textLines"> الوصف</span>
                <input type="text" name="description" class="box"  value=" <?php echo $description ; ?> ">  
            </div> 
            <input type="submit" name="submit" value="تأكيد " class="btn">
            <input type="hidden" name="id" value="<?php echo $id ?>"> 
        </form>
    </div>
</div>

<script>
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
</script>


