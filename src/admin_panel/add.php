<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

// Start output buffering
ob_start();

 // Function to compress an image
 function compressImage($source, $destination, $quality) {
  // Get image info
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];

  // Create a new image from file
  switch($mime){
      case 'image/jpeg':
          $image = imagecreatefromjpeg($source);
          break;
      case 'image/png':
          $image = imagecreatefrompng($source);
          break;
      case 'image/gif':
          $image = imagecreatefromgif($source);
          break;
      default:
          $image = imagecreatefromjpeg($source);
  }

  // Save the compressed image
  imagejpeg($image, $destination, $quality);
}

// Check if the user has submitted the form
if(isset($_POST['add'])) {
  $price = $_POST['price'];
  $category = $_POST['type'];
  $Available = $_POST['Available'];
  $tag = $_POST['tag'];
  $seo = mysqli_real_escape_string($conn,$_POST['seo']);
  $desc = mysqli_real_escape_string($conn,$_POST['desc']);

  // Upload the Image if selected
 $countfiles = count($_FILES['images']['name']);
// Create an array to store the compressed image names
$compressed_images = array();
// Allowed file extensions
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
// Loop through each uploaded file
for($i=0;$i<$countfiles;$i++){
    // Get the file name
    $filename = uniqid() . ".jpg";
    // $filename = $_FILES['images']['name'][$i];
    // Get the file extension
    $extension = strtolower(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION));
    // Check if the file extension is allowed
    if (!in_array($extension, $allowed_extensions)) {
        // Throw an error to the UI and prevent further action
          $_SESSION['login'] ='
         <div class="w-auto bg-teal-100 border-t-4 border-teal-500 my-4 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm"> Only JPG, JPEG, PNG, and GIF files are allowed.</p>
          </div>
        </div>
      </div>
         ';
        header('location:add');
       exit();
    }
    // Set the destination path for the compressed image
    $destination = "../assets/images/products/" . $filename;
    compressImage($_FILES['images']['tmp_name'][$i], $destination, 55);
    $compressed_images[] = $filename;
}
$compressed_images_string = implode(",", $compressed_images);

  // Insert data into database
  $sql2 = "INSERT INTO products_list SET
   product_price = $price,
        product_category = '$category',
        product_seo='$seo',
        product_desc='$desc',
        available = '$Available',
        best_or_new = $tag,
        Product_image = '$compressed_images_string'
        ";
  
  //Execute the Query
  $res2 = mysqli_query($conn, $sql2);

  //CHeck whether data inserted or not
  //4. tealirect with MEssage to Manage Food page
  if($res2 == true){
      //Data inserted Successfullly
      $_SESSION['login'] = ' 
      <div class="w-full flex justify-center items-center bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex w-1/2">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div class="w-full"> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Product Successfully added.</p>
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
            <p class="text-sm">Error adding Product try again</p>
          </div>
        </div>
      </div>
         ';
      // header('location:index');
      // exit();
  }}

// Flush output buffer and send output to browser
ob_end_flush();

// header
include 'partials/header-add.php';

?>



<!-- add new form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="lg:w-1/2 w-full space-y-4 " method="post" enctype="multipart/form-data">
    <!-- back btn -->
    <a href="index" class="w-auto p-1 mb-2  bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>


    <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>


    <!-- <div class="">
        <label class="block mb-1 font-medium" for="forms-labelOverInputCode">Name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="enter name" name="name" required/>
      </div>
      -->

      <div class="">
        <label class="block mb-1 font-medium" for="forms-labelOverInputCode">Price</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="enter price" name="price" required/>
      </div>
     
      <div class="">
        <label class="block font-medium mb-1" >Select category </label>
        <select name="type" class="h-10 px-3 mb-2 text-base bg-white  border border-slate-400 rounded-lg focus:outline-none" required>
        <?php
//Create PHP Code to display categories from Database
//1. CReate SQL to get all active categories from database
$sql = "SELECT * FROM tbl_category";
//Executing qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have categories or not
$count = mysqli_num_rows($res);
//IF count is greater than zero, we have categories else we donot have categories
if($count>0){//WE have categories
while($row=mysqli_fetch_assoc($res)){
//get the details of categories
$id = $row['id'];
$title = $row['cat_name'];?>
<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
<?php } }else{//WE do not have category?>
<option value="0">No Category Found</option>
<?php
} ?>
              </select>
      </div>


      <div class=" flex items-center">
        <label class="mr-2 font-medium" for="forms-labelOverInputCode">Is it Available ?</label>
        <input class="mx-1" type="radio" value="1"  name="Available"/><span>Yes</span>
        <input class="mx-1" type="radio" value="0" name="Available"/><span>No</span>
      </div>
      
      <div  class="">
        <label class="mr-2 font-medium" for="forms-labelOverInputCode">Tag as :</label>
       <div  class=" flex items-center">
       <input class="mx-1" type="radio" value="0" name="tag" checked/><span>General</span>
        <input class="ml-2" type="radio" value="1" name="tag"/><span>New Arrival</span>
        <input class="ml-2" type="radio" value="2" name="tag"/><span>Best Seller</span>
       </div>
      </div>

      <div class="">
        <label class="mr-2 font-medium"  for="forms-labelOverInputCode">Product SEO <span class="text-xs italic">(keywords only,comma separated words)</span> </label>
    
        <input name="seo" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"/>
      </div>

      <div class="">
        <label class="mr-2 font-medium" for="forms-labelOverInputCode">Select Image(s) </label>
     <div class="flex items-center">
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file: file:bg-teal-500 file:text-white" type="file" name="images[]" id="avatars" multiple required>
     </div>
      </div>

      <div class="">
        <label class="mr-2 font-medium"  for="forms-labelOverInputCode">General product description <span class="text-xs italic">(optional)</span> </label>
    
        <textarea  name="desc" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"></textarea>
      </div>

     

    <input class="w-1/2 h-10 px-3 mt-6  bg-teal-500 text-white focus:outline-none focus:bg-teal-600" type="submit" name="add" value="Add"/>
   
  </form>
</div>



<!-- yinymce init -->
<script>
        tinymce.init({
        selector : "textarea",
        content_css: 'writer',
        theme: "silver",
        plugins:  'table  preview  searchreplace   save directionality code visualblocks  fullscreen image link media template codesample    nonbreaking anchor insertdatetime advlist lists wordcount help  quickbars emoticons paste',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat |  emoticons | fullscreen save  |  image media  link anchor  | ltr rtl',
  toolbar_sticky: true,
  image_advtab: true,
    
        })
    </script>
<!-- footer -->
<?php include 'partials/footer.php'; ?>