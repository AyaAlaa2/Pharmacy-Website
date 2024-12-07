<?php include('header.php');
?>
    <!-- home section starts  -->
    <section class="home" id="home">
        <div>
            <div class="video-container">
                <video src="../images/3.mp4" id="video-slider" loop autoplay muted></video>
            </div>
        </div>
    </section>
    <!-- home section ends -->

    <!-- gallery section starts  -->
    <section class="gallery" id="gallery">
        <h2 class="heading">
            <span > الصيدليات الأكثر طلبًا </span>
        </h2>
        <div class="line"></div>
        <div class="box-container">
            <?php 
                $sql = "SELECT * FROM tbl_pharmcy WHERE active='نعم' AND featured='نعم' AND state='مضاف' LIMIT 5";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $n = 1;

                if ($count > 0) {
                    //found ph in db
                    while ($row = mysqli_fetch_assoc($res)) {
                        //image and title and id 
                        $id = $row['id'];
                        $full_name = $row['full_name'];

            ?>
            <div class="box">
                <a href="<?php  echo 'pharm-page.php?id=' .$id ?>"><img src="../images/<?php echo $n++;?>.jpg" alt=""></a>
                <div class="content">
                    <a href="<?php  echo 'pharm-page.php?id=' .$id ?>">
                        <h3> <?php echo ' صيدلية' .' '.$full_name ?> </h3>
                    </a>
                </div>
            </div>
            <?php 
                    }
                }
                else{
                    echo "<div class='error'>  لم يتم اضافة صيدليات </div>";
                }
            ?>
        </div>
    </section>
    <!-- gallery section ends -->

    <!-- packages section starts  -->
    <section class="packages" id="packages">
        <h2 class="heading">
            <span>عناوين موصى بها</span>
        </h2>
        <div class="line"></div>
        <div class="box-container">
            <?php 
                $sql2 = "SELECT * FROM tbl_post WHERE active='نعم' AND featured='نعم' LIMIT 4";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                
                if ($count2 > 0) {
                    //found ph in db
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                        //image and title and id 
                        $id2 = $row2['id'];
                        $title = $row2['title'];
                        $image_name = $row2['image_name'];
                        $description = $row2['description'];
                        $full_description = $row2['full_description'];

            ?>

            <div class="box">
                <?php
                    if ($image_name == "") {
                        echo "<div class='error'>Image Not Avaliable </div>";
                    } else {
                    ?>
                <a href="#"><img src="<?php echo '../images/' . $image_name ?>" alt=""></a>
                <?php
                    }
                ?>
                <div class="content">
                    <h3> <?php echo $title;?></h3>
                    <p> <?php echo $description; ?></p>
                   <a href="<?php echo 'readmore.php?id='.$id2 ?>" class="btn" >اقرأ المزيد</a>
                </div>
            </div>
            <?php
                }
                } else {
                    // no cat in db
                    echo "<div class='error'> لم يتم إضافة منشورات</div>";
                }
            ?>
        </div>
    </section>
    <!-- packages section ends -->

    <!-- adv section ends -->
    <section class="adv" id="adv">
        <h2 class="heading">
            <span> إعلانات موصى بها </span>
        </h2>
        <div class="line"></div>
        <!-- Slideshow container -->
        <div class="container">
            <div class="box-container">
            <?php 
                $sql3 = "SELECT * FROM  tbl_adv WHERE featured='نعم' AND active='نعم' LIMIT 6";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
                
                if ($count3 > 0) {
                    //found ph in db
                    while ($row3 = mysqli_fetch_assoc($res3)) {
                        //image and title and id 
                        $id3 = $row3['id'];
                        $image_name3 = $row3['image_name'];
                        $description3 = $row3['description'];
                        $id_pharm_admin	 = $row3['id_pharm_admin'];

            ?>
            <div class="box" >
                <?php
                    if ($image_name3 == "") {
                        echo "<div class='error'>Image Not Avaliable </div>";
                    } else {
                ?>
                <a href="pharm-page.php?id=<?php echo $id_pharm_admin?> "><img src="<?php echo '../images/pharm/' . $image_name3 ?>" alt=""></a>
                <?php
                    }
                ?>
            </div>
                
            <?php
                    }
                } else {
                    // no cat in db
                    echo "<div class='error'> لم يتم إضافة إعلانات</div>";
                }
            ?> 
            </div>
        </div>
    </section>
    <!-- adv section ends -->

    <?php include('footer.php'); ?>