<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

ob_start(); // start output buffering

    //CHeck whether id is set or not
    if(isset($_GET['id'])){
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM tbl_category WHERE id=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Food
        // $id = $row['product_code'];
         $title = $row['cat_name'];
         $c_image  = '../assets/images/cats/'.$row['cat_image'];
         $current_image  = $row['cat_image'];
       
    } else{
        //tealirect to Manage Food
        header('location:index');
        exit();
    }
?>
    <?php

        if(isset($_POST['update'])){
            //1. Get all the details from the form
    $id = $_POST['id'];
   $pname = $_POST['name'];
   $current_image = $_POST['current_image'];

  //2. Upload the image if selected
  if(isset($_FILES['image']['name'])){
    $image_name = $_FILES['image']['name']; //New Image NAme
    if($image_name!=""){
        $ext = end(explode('.', $image_name)); //Gets the extension of the image
        $image_name = "editedcat-".rand(0000, 9999).'.'.$ext; //THis will be renamed image
        //Get the Source Path and DEstination PAth
        $src_path = $_FILES['image']['tmp_name']; //Source Path
        $dest_path ='../assets/images/cats/'.$image_name; //DEstination Path
        //Upload the image
        $upload = move_uploaded_file($src_path, $dest_path);
        /// CHeck whether the image is uploaded or not
        if($upload==false){
            //FAiled to Upload
            $_SESSION['login'] ='
            <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
           <div class="flex">
             <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
             <div>
               <p class="font-bold">Something went Wrong</p>
               <p class="text-sm">Error uploading picture</p>
             </div>
           </div>
         </div>
            ';
         header('location:index');
         exit();
            //STop the process
        }
        //3. Remove the image if new image is uploaded and current image exists
        //B. Remove current Image if Available
        if($current_image!=""){
            $remove_path = '../assets/images/cats/'.$current_image;
            $remove = unlink($remove_path);
            //Check whether the image is removed or not
            if($remove==false){
                //failed to remove current image
                $_SESSION['login'] ='
                <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
               <div class="flex">
                 <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                 <div>
                   <p class="font-bold">Something went Wrong</p>
                   <p class="text-sm">Error Removing current picture</p>
                 </div>
               </div>
             </div>
                ';
             header('location:index');
             exit();
                //STop the process
            }
        }
    }else{
        $image_name = $current_image; //Default Image when Image is Not Selected
    }
}else{
    $image_name = $current_image; //Default Image when Button is not Clicked
}

            //4. Update the Food in Database
$sql3 = "UPDATE tbl_category SET
        cat_name = '$pname',
        cat_image = '$image_name'
        WHERE id=$id
    ";

            //Execute the SQL Query
            $res3 = mysqli_query($conn, $sql3);
            //CHeck whether the query is executed or not
            if($res3==true){
                //Query Exectued and Food Updated
                $_SESSION['login'] = "<div class='text-center text-green-500 font-medium my-8'>Product Updated Successfully.</div>";
                //  header('location:update-prod?id='.$id.'');
                header('location:categories');
                 exit();
            }else{
                //Failed to Update Food
$_SESSION['login'] = "<div class='text-center text-teal-500 font-medium  my-8'>Failed to Update Product.</div>";
                header('location:index');
                exit();
            }

        }

ob_end_flush(); // end output buffering and send output to the browser

// header
include 'partials/header-add.php';

?>

<!--contents-->
<div class="text-center font-bold text-3xl my-8" >
    Update category
</div>

 <!-- back btn -->
 <div class="w-full flex justify-center items-center">
 <a href="categories" class="w-auto p-1 mb-2  font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>

 </div>

<?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>


<section class="mb-[100px] md:flex justify-center items-center">
    <form  method="POST" class="p-3 md:w-1/2" enctype="multipart/form-data">

        <div class="border  p-2">
                <div class="flex items-center">
                   <p class="font-medium">Name: </p>
                     <input class="focus:outline-none border-2  font-medium  rounded ml-2 text-sm p-1" class="focus:outline-none border rounded ml-2 text-sm p-1" type="text" name="name" value="<?php echo $title; ?>" required>
                </div>
                <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Current cover Image </label>
       <img src="<?php echo $c_image; ?>" alt="prdo_image" class="w-[200px] h-[100px] rounded-md object-contain border border-slate-500" id="imgDisplay">
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Change cover Image </label>
        <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-[#2271B1] file:text-white" type="file" name="image" onChange="displayImage(this)"/>
      </div>
      <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="update" value="Update"/>
   
  </form>
                    </section>

<!-- remeber to put tinymce script here icase of the features part being added -->

<!-- footer -->
<?php include 'partials/footer.php'; ?>
</body>
</html>