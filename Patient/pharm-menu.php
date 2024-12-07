<?php include('header.php'); ?>

<!-- menu section starts  -->
<div class="menu" id="menu">
    <h2 class="heading">
        <span>صيدليات</span>
    </h2>

    <div class="menu-box-container">
        <?php 
            $sql = "SELECT * FROM tbl_pharmcy  WHERE state='مضاف' AND featured='نعم' ORDER BY id DESC ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                //found ph in db
                while ($row = mysqli_fetch_assoc($res)) {
                    //image and title and id 
                    $id = $row['id'];
                    $full_name = $row['full_name'];
                    $address = $row['address'];
                    $phone = $row['phone'];
       ?>

        <div class="box">
            <img src="../images/ph3.png">
            <div class="menu-content">
                <h3><?php echo ' صيدلية' .' '.$full_name; ?></h3>
                <h5> <?php echo ' العنوان/' .' '.$address; ?></h5>
                <p><?php echo ' للتواصل/' .' '.$phone; ?></p>
                <a href="<?php  echo 'pharm-page.php?id=' .$id ?>"><button class="btn" >استكشف الصيدلية </button></a>             
            </div>
        </div>

        <?php 
                }
            }
        ?>
    </div>
</div>
<!-- menu section ends -->
 
<?php include('footer.php'); ?>