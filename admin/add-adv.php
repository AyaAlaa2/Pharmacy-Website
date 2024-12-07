<?php 
    include('adminpanel.php'); 
    //process the value from form and save it in database
    //check whether the submit button is clicked or not
    if (isset($_POST['submit-add-adv'])) {
        //button clicked 
        //Get data Form
        $description= $_POST['description'];
        if (isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        } else {
            $featured = "لا";
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "لا";
        }
  
        if (isset($_FILES['image']['name'])) {
            $image_name=$_FILES['image']['name'];
            //Auto rename
            //upload image
            if($image_name != ""){
                $ext= end(explode('.',$image_name));
                $image_name = "adv_".rand(000,999).'.'. $ext; 
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/".$image_name;
                $upload=move_uploaded_file($source_path,$destination_path);
                //check image uplode
                if($upload==false){
                     //$_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                    // header("location:"."add-category.php");
                     die();
                }
            }  
        } else {
            $image_name="";
        }

        //SQL query
        $sql = "INSERT INTO  tbl_adv SET
         description ='$description',
         image_name='$image_name',
         featured  = '$featured' ,
         active	= '$active' ";
        //execute query ans save data in db
        $res = mysqli_query($conn, $sql);

        //check if data insert or not, display message
        if($res == true){
        //create a session variable to display message
             $_SESSION['add']=" <div class='alert'>
                                   <span class='msg'>  تم الاضافة بنجاح</span>
                                   <span class='close-btn'>
                                      <span class='la la-check'></span>
                                   </span>
                                 </div>";
             header("location:" . "manage-adv.php");
       } else{
            $_SESSION['add']="<div class='alert-error'>                    
                                  <span class='msg'>  لم يتم الإضافة . حاول مرة أخرى</span>
                                  <span class='close-btn-error'>
                                    <span class='la la-close'></span>
                                  </span>
                                </div>";
            header("location:" . "manage-adv.php");
       }
    }
?>

<?php include('footer.php'); ?>