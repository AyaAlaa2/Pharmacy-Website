<?php include('header.php');?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>

	<body>
        <div class="menu" id="menu">
            <?php
			    $search= mysqli_real_escape_string($conn,$_GET['search']); 
            ?>
            <div class="menu-box-container menu-box-container2"> 
            <?php
                
				$sql = "SELECT * FROM tbl_pharmcy WHERE (full_name LIKE '%$search%' OR address LIKE '%$search%') AND
				state='مضاف' AND featured='نعم' ORDER BY id DESC";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
		 
				if ($count > 0){
				   //found food in db
				   while ($row = mysqli_fetch_assoc($res)) {
					   //get detaiels
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
                    <a href="<?php  echo 'pharm-page.php?id=' .$id ?>">
                    <button class="btn" >استكشف الصيدلية </button></a>             
                </div>
            </div>
			<div>
                <?php 
                        }
                    }
                    else {
                        //No pharm    
						echo '<script>window.location.href = "suggpharm.php";</script>';
					}
                ?>    
            </div>
            </div>
        </div>
	</body>
</html>

<!-- menu section ends -->
<?php include('footer.php'); ?>


