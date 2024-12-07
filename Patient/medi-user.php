<?php include('header.php'); ?>

    <!-- home section ends -->
    <div class="main-content">
        <h2 class="heading">
             <span> ابحث عن الدواء هنا</span>
        </h2>

        <?php 
            if(isset($_POST['search'])){
                $searchkey= $_POST['search'];
                $sql = "SELECT * FROM  tbl_medi WHERE full_name_en LIKE '%$searchkey%'	OR  full_name_ar LIKE '%$searchkey%'
                Order by full_name_en ASC " ; // query
            }else{
                $sql = "SELECT * FROM   tbl_medi  Order by full_name_en ASC"; // query
                $searchkey="";
            }
        ?>

        <form action="" method="POST" class="formSearch">
            <div class="sea">
                <div class="ic"></div>
                <div class="input">
                    <input type="text" name="search" placeholder="ابحث هنا" value="<?php echo $searchkey;?>"  id="mysearch">
                </div>
            </div>
        </form>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> الأدوية الشائعة</h2>
                </div>
                <table style=" background-image: url('../images/m.jpg');
                                background-repeat: no-repeat;
                                background-size: cover;
                ">
                    <thead>
                        <tr>
                            <td> الصيدلية</td>                            
                            <td> اسم الدواء/ إنجليزي</td>
                            <td> اسم الدواء / عربي</td>
                            <td> السعر</td>
                            <td> متوفر</td>
                            <td> الوصف كاملا </td>
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
                                            $description = $rows['description'];
                                            $full_name_en = $rows['full_name_en'];
                                            $full_name_ar  = $rows['full_name_ar'];
                                            $price = $rows['price'];
                                            $available= $rows['available'];
                                            $id_pharm_admin =$rows['id_pharm_admin'];
                                            //display value in our table 
                        ?>
                         
                        <tr> 
                            <td style="font-size: 1.7rem;"> <a href="<?php echo 'pharm-page.php?id='.$id_pharm_admin ;?>" style="color:#16a085;">اذهب الى الصيدلية</a></td>                             
                            <td style="font-size: 1.7rem;"> <?php echo $full_name_en;?> </td>
                            <td style="font-size: 1.7rem;"><?php echo $full_name_ar;?></td>
                            <td style="font-size: 1.7rem;"> <?php echo $price;?> </td>
                            <td style="font-size: 1.7rem;"><?php echo $available;?></td>
                            <td style="font-size: 1.5rem;"><a href="<?php echo $description;?>" target="_blank" style="color:#16a085;">اضغط هنا لتفاصيل الدواء</a></td>  
                        </tr>

                        <?php
                                        }
                                    } 
                                    else //no data in db 
                                    {                        
                        ?> 
                        <tr>
                            <td colspan="4">
                                <div class="error">لا يوجد نتيجة للبحث</div>
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
    let icon= document.querySelector('.ic');
    let sea =document.querySelector('.sea');

    icon.onclick = function(){
      sea.classList.toggle('active')
    }
    
</script>

<?php include('footer.php'); ?>