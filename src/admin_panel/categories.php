<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//adding main category
if(isset($_POST['add_main_cat'])){
  //1. Get the DAta from Form
  $name = $_POST['name'];

   //Check whether the select image is clicked or not and upload the image only if the image is selected
   if(isset($_FILES['image']['name'])) {
    //Get the details of the selected image
    $image_name = $_FILES['image']['name'];
    //Check Whether the Image is Selected or not and upload image only if selected
    if($image_name!=""){
        // Image is SElected
        //A. REnamge the Image
        //Get the extension of selected image (jpg, png, gif, etc.)
        $tmp      = explode('.',$_FILES['image']['name']);
        $ext = strtolower(end($tmp));
        // Create New Name for Image
        $image_name = "cat-".rand(0000,9999).".".$ext; //New Image Name May Be "NST-prod-45.jpg"

        //B. Upload the Image
        //Get the Src Path and DEstinaton path
        // Source path is the current location of the image
        $src = $_FILES['image']['tmp_name'];

        //Destination Path for the image to be uploaded
        $dst = "../assets/images/cats/".$image_name;

        //Finally Uppload the food image
        $upload = move_uploaded_file($src, $dst);

        //check whether image uploaded of not
        if($upload==false){
            //Failed to Upload the image
            //REdirect to Add Food Page with Error Message
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
        //  header('location:index');
        //  exit();
            //STop the process
            die();
        }}}else{ 
  $image_name = ""; //SEtting DEfault Value as blank
}

 
  $sql2 = "INSERT INTO tbl_category SET
      cat_name = '$name',
      cat_image = '$image_name'
  ";

  //Execute the Query
  $res2 = mysqli_query($conn, $sql2);
  if($res2 == true){
      //Data inserted Successfullly
      $_SESSION['login'] = ' 
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-2 md:my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Category Successfully Added.</p>
        </div>
      </div>
      </div>
      ';
      // header('location:index');
      // exit();
    
  }else{
      //FAiled to Insert Data
      $_SESSION['login'] ='
         <div class="w-auto bg-teal-100 border-t-4 border-teal-500 my-4 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error adding category, try again</p>
          </div>
        </div>
      </div>
         ';
      // header('location:index');
      // exit();
  }}



         // delete main Category
    if(isset($_GET['id']) && isset($_GET['cat_image'])){
        $id = $_GET['id'];
        $image_name = $_GET['cat_image'];

        //2. Remove the Image if Available
        if($image_name != ""){
        
            $remove = unlink($image_name);

            if($remove==false){
                //Failed to Remove image
                $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error Deleting cover image. please try again.</p>
          </div>
        </div>
      </div>
         ';
                //REdirect to Manage item
                // header('location:index');
                // die();
            } }
        //3. Delete item from Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //CHeck whether the query executed or not and set the session message respectively
        //4. tealirect to Manage item with Session Message
        if($res==true){ 
            //item Deleted
            $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-4 md:my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
  <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
  <div> 
    <p class="font-bold">SUCCESS!</p>
    <p class="text-sm">Category  Deleted.</p>
  </div>
</div>
</div>
        ';
        // //tealirect to Manage Admin Page
        // header('location:index');
        // exit();
        }
        else{
            $_SESSION['login'] ='
            <div class="w-auto bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 my-6 px-4 py-3 shadow-md" role="alert">
           <div class="flex">
             <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
             <div>
               <p class="font-bold">Something went Wrong</p>
               <p class="text-sm">Error Deleting category. please try again.</p>
             </div>
           </div>
         </div>
            ';
                  //  //tealirect to Manage item
                   header('location:categories');
                   die();
        } }


 // header
include 'partials/header-add.php';



?>

 <!-- back btn -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<a href="index" class="w-auto p-1 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>
</div>


<!-- successfull login -->
<?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
<!-- successfull login -->





<!-- testimonial side form -->
<div class="w-full lg:flex justify-center items-center p-2 mt-2 ">

<!-- testimnoial idv -->
<div class="testimny__wrapper w-full  lg:p-4  lg:w-1/2">
<div class="small_wrap border-2 border-gray-300 rounded-lg p-2 lg:p-4">
    <form action="" method="post" enctype="multipart/form-data">
   <h2 class="font-bold text-2xl my-4 underline">Add  Category</h2>
   <div class="from__grp">
   <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Category image</label>
        <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file: file:bg-teal-500 file:text-white" type="file" name="image" required>
      </div>
   <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="name of category" name="name" required/>
      </div>
     
      <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white  focus:outline-none" type="submit" name="add_main_cat" value="ADD"/>
   </div>
    </form>
 


    <!-- see all testimonial -->
    <div id="add_sub" class="border border-gray-300 rounded-lg  w-full my-8 ">
    <h2 class="font-bold text-2xl my-4 underline ml-4">All Categories</h2>
   
    <div class="mony__wrapper p-2  w-full max-h-[500px] flex flex-wrap justify-around items-center overflow-scroll">
   
<?php
$sql = "SELECT * FROM tbl_category  order by id DESC";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
    $id = $row['id'];
    $name = $row['cat_name'];
    $c_img = '../assets/images/cats/'.$row['cat_image'];
    ?>

     <!-- template -->
     <div class="card my-2 lg:w-[200px] border-2 rounded-md p-1 border-gray-300">
<div class="cation flex justify-center items-center flex-wrap">
  <div>
    <img src="<?php echo $c_img; ?>" class="w-[80px] h-[80px] rounded-full mr-2">
  </div>
<p class="capitalize"><?php echo $name; ?></p>
<a href="update-cat?id=<?php echo $id; ?>" class=" bg-green-500 px-2 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
    <a href="categories?id=<?php echo $id; ?>&cat_image=<?php echo $c_img; ?>" class="bg-red-500 text-white px-2 ml-2 hover:text-white hover:bg-teal-700"><i class="fa-solid fa-trash"></i></a>
</div>
    </div>
       <!-- template --> 

                <?php
}   }else{
 echo '
 <div class="w-full text-center bg-teal-500 p-6 text-white font-bold">
                <p>No categoriest</p>
              </div>
 ';
} 
?>
   

       </div>
    </div>

</div>
</div>


<!-- testimonial wrapper end -->
</div>


<!-- footer -->
<?php include 'partials/footer.php'; ?>