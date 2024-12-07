<?php 
    include('../constant.php');

    if(isset($_POST['submit'])){
        $title_new = $_POST['title'];
        $description_new = $_POST['description'];
        $full_description_new = $_POST['full_description'];
        $featured_new = $_POST['featured'];
        $active_new = $_POST['active'];
        $id = $_POST['id'];

        $sql3 = "SELECT * FROM tbl_post WHERE id='$id' ";
        //3.execute the query
        $res3 = mysqli_query($conn, $sql3);
        //check if data found or not, display message
        if ($res3 == true) {
            //count rows
            $count3 = mysqli_num_rows($res3);
            if ($count3 == 1) {
                $rows3 = mysqli_fetch_assoc($res3);
                $current_image = $rows3['image_name'];
            } else {
                header("location:" . "manage-post.php");
            }
        }

        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            if ($image_name != "") { //image avaliable //upload the new image and remove current image
                $ext = end(explode('.', $image_name));
                $image_name = "post_".rand(000,999).'.'. $ext;
                $src_path = $_FILES['image']['tmp_name'];
                $dst_path = "../images/" . $image_name;
                $upload = move_uploaded_file($src_path, $dst_path);

                //check image uplode
                if ($upload == false) {
                    die();
                }
                if ($current_image != "") {
                    $remove_path = "../images/" . $current_image;
                    $remove = unlink($remove_path);
                    //check whether image remove or nor
                    if ($remove == false) {
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }
      
        $sql4 = "UPDATE tbl_post SET
                  image_name= '$image_name',
                  description  = '$description_new',
                  full_description  = '$full_description_new',
                  active = '$active_new',
                  title ='$title_new',
                  featured = '$featured_new'
                  WHERE id='$id' ";
        //execute query ans save data in db                           
        $res4 = mysqli_query($conn, $sql4);

        //check if data insert or not, display message
        if($res4 == true){
            //create a session variable to display message
            $_SESSION['update']=" <div class='alert'>                              
                                        <span class='msg'>  تم التعديل بنجاح</span>
                                        <span class='close-btn'>
                                           <span class='la la-check'></span>
                                        </span>
                                    </div>";
            //Redirect page
            header("location:" . "manage-post.php");
        }else{
            $_SESSION['update']="<div class='alert-error'>                    
                                    <span class='msg'>  لم يتم التعديل . حاول مرة أخرى</span>
                                    <span class='close-btn-error'>
                                      <span class='la la-close'></span>
                                    </span>
                                 </div>";

            header("location:" . "manage-post.php");
            //Redirect page 
        }

    }
?>