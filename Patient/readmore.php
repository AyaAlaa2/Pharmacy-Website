<?php include('header.php');?>

<section class="readMorePage" id="packages">
    <div class="box-container">
        <?php 
            $id_post = $_GET['id'];
            $sql3 = "SELECT * FROM tbl_post where id ='$id_post' ";
            $res3 = mysqli_query($conn, $sql3);
            $count3 = mysqli_num_rows($res3);
                
            if ($count3 > 0) {
                //found ph in db
                while ($row3 = mysqli_fetch_assoc($res3)) {
                    $title3 = $row3['title'];
                    $image_name3 = $row3['image_name'];
                    $description3 = $row3['description'];
                    $full_description3 = $row3['full_description'];
        ?>

        <div class="box">
            <?php
                if ($image_name3 == "") {
                    echo "<div class='error'>Image Not Avaliable </div>";
                } else {
            ?>
            <a href="#"><img src="<?php echo '../images/' . $image_name3 ?>" alt=""></a>
            <?php
                }
            ?>
            <div class="content">
                <h3> <?php echo $title3;?></h3>
                <p> <?php echo $full_description3; ?></p>                     
            </div>
        </div>

        <?php
                }
            } else {
                echo "<div class='error'> لم يتم إضافة منشورات</div>";
            }
        ?>
    </div>
</section>

<section class="packages packagesReadMore" id="packages">
    <h2 class="heading">
        <span>عناوين موصى بها</span>
    </h2>
    <div class="line"></div>
    <div class="box-container">
        <?php 
            $sql2 = "SELECT * FROM tbl_post ";
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

        <div class="box"  >
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
                <a href="<?php echo 'readmore.php?id='.$id2 ?>" class="btn">اقرأ المزيد</a>
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

<?php include('footer.php'); ?>