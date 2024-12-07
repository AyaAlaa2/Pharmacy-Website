<?php include('header.php'); ?>
    
    <!-- home section starts  -->
    <section class="home" id="home">
        <div>
            <div class="video-container">
                <video src="../images/4.mp4" id="video-slider" loop autoplay muted></video>
            </div>
        </div>
    </section>
    <!-- home section ends -->
    <div class="main-content">
        <?php 
            $id = $_GET['id'];
            $sql2 = "SELECT * FROM tbl_pharmcy  WHERE id= '$id'; ";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                    //found ph in db
                while ($row2 = mysqli_fetch_assoc($res2)) {
                        //image and title and id 
                        $worktime = $row2['worktime'];
                        $full_name = $row2['full_name'];
                        $address = $row2['address'];
                        $phone = $row2['phone'];
                        $location= $row2['location'];

        ?>

        <div class="information"> 
            <h2 class="pharmaName"><?php echo ' صيدلية' .' '.$full_name; ?></h2> 
            <div class="informationList">
                <div class="infoItem">
                   <h2><i class="fas fa-map-marker-alt iconInformation" ></i>الموقع </h2>
                   <h2 class="textInformation"><?php echo  $address; ?></h2>
                </div>
                <div class="infoItem">
                   <h2><i class="fas fa-phone-alt iconInformation"></i> للتواصل</h2>
                   <h2 class="textInformation"><?php echo $phone; ?></h2>
                </div>
                <div class="infoItem">
                    <h2><i class="fas fa-clock iconInformation"></i> مواعيد العمل</h2>
                    <h2 class="textInformation"><?php echo $worktime; ?> </h2>
                </div>
                    </div> 
        </div>

        <?php 
                }
            }
                
        ?>
            
        <h2 class="heading">
            <span> ابحث عن الدواء هنا</span>
        </h2>

        <?php 
            if(isset($_POST['search'])){
                $searchkey= $_POST['search'];
                $sql = "SELECT * FROM    tbl_medi WHERE id_pharm_admin='$id' AND(full_name_en LIKE '%$searchkey%'	OR  full_name_ar LIKE '%$searchkey%') 
                Order by full_name_en ASC " ; // query
            }else{
                $sql = "SELECT * FROM   tbl_medi WHERE id_pharm_admin='$id' Order by full_name_en ASC"; // query
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
                    <h2> تفاصيل الأدوية  داخل الصيدلية</h2>
                </div>
                <table>
                    <thead>
                        <tr>                            
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
                                            //display value in our table 
                        ?>
                        <tr>
                            <td style="font-size: 1.7rem;"> <?php echo $full_name_en;?> </td>
                            <td style="font-size: 1.7rem;"><?php echo $full_name_ar;?></td>
                            <td style="font-size: 1.7rem;"> <?php echo $price;?> </td>
                            <td style="font-size: 1.7rem;"><?php echo $available;?></td>
                            <td style="font-size: 1.5rem;"><a href="<?php echo $description;?>" style=" color : #01a081;">اضغط هنا</a></td>     
                        </tr>

                        <?php
                                        }
                                    }else //no data in db 
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

        <section class="adv" id="adv">
            <h2 class="heading">
                <span> إعلانات موصى بها </span>
            </h2>
            <!-- Slideshow container -->
            <div class="container">                        
                <div class="box-container">
                    <?php  
                        $sql3 = "SELECT * FROM  tbl_adv  WHERE id_pharm_admin= '$id' AND active='نعم' order by id desc ; ";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);

                        if ($count3 > 0) {
                            //found ph in db
                            while ($row3 = mysqli_fetch_assoc($res3)) {
                                //image and title and id 
                                $image_name = $row3['image_name'];

                    ?>
                    <div class="box" data-aos="zoom-in" style="height: 300px; width: 300px">
                            <a href="<?php echo '../images/pharm/' . $image_name ?>">
                                <img src="<?php echo '../images/pharm/' . $image_name ?>" alt="">
                            </a>
                    </div>

                    <?php 
                            }
                        }
                        else {
                            // no cat in db
                            echo "<div class='error'> لم يتم إضافة إعلانات</div>";
                        }
                    ?>  
                </div>    
            </div>
        </section>

        <section id="map">
            <h2 class="heading" >
                <span>الموقع عبر خريطة جوجل</span>
            </h2> 
            <?php  
                $id = $_GET['id'];
                $sql3 = "SELECT * FROM  tbl_pharmcy  WHERE id= '$id'; ";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);

                if ($count3 == 1) {      
                    $row3 = mysqli_fetch_assoc($res3);
                    $locationPharm = $row3['location'];
            ?>
            <iframe src="<?php echo $locationPharm;?>" 
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="map_box">
            </iframe>

            <?php 
                }
                else {
                    // no cat in db               
                    echo "<div class='error'> لم يتم إضافة الموقع</div>";
                }
            ?> 
        </section> 
    </div>

    <script>
        let icon= document.querySelector('.ic');
        let sea =document.querySelector('.sea');

        icon.onclick = function(){
          sea.classList.toggle('active')
        }
    </script>

<?php include('footer.php'); ?>