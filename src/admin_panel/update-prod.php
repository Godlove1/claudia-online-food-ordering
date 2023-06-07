<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
 <?php
    //CHeck whether id is set or not
    if(isset($_GET['id'])){
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM products_list WHERE product_code=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Food
        // $id = $row['product_code'];
         $title = $row['product_name'];
         $price = $row['product_price'];
         $current_images_row = $row['product_image'];
        $disp_cur_images =explode(",",substr($current_images_row , 0 ,-1));
        $status=$row['available'];
        $promo = $row['promo'];
        $promo_ens = $row['product_pprice'];
        $categ = $row['product_category'];
        $tag = $row['best_or_new'];
       $descc = $row['product_desc'];
       $seoo = $row['product_seo'];


    } else{
        //tealirect to Manage Food
        header('location:index');
    }
?>
    <?php

        if(isset($_POST['update'])){
            //1. Get all the details from the form
    $id = $_POST['id'];
    $received_cur_images = $_POST['current_images'];
    $pname = $_POST['name'];
    $price = $_POST['price'];
    $promo = $_POST['promo'];
    $pend = $_POST['pprice'];
   $category = $_POST['type'];
   $Available = $_POST['Available'];
   $tagn = $_POST['tag'];
   $seo = mysqli_real_escape_string($conn,$_POST['seo']);
   $desc = mysqli_real_escape_string($conn,$_POST['desc']);
  


            //2. Upload the image if selected
            //CHeck whether upload button is clicked or not
            if(isset($_FILES['images']['name'])) {
                $images_new="";
                for($i=0; $i<count($_FILES['images']['name']); $i++){
                   $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                   if ($tmpFilePath != "") {
            
                        $location = '../assets/images/products/';
                       $name = $_FILES['images']['name'][$i];
                       $size = $_FILES['images']['size'][$i];
            
                       list($txt, $ext) = explode(".", $name);
                       $file= time().substr(str_replace(" ", "_", $txt), 0);
                       $info = pathinfo($file);
                       $filename = $file.".".$ext;
                       if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $location.$filename))
                       {
                          $images_new.=$filename.",";
                       }

                    // remove image
                    if($received_cur_images!=""){
                        $prod_imgs =explode(",",substr($received_cur_images , 0 ,-1));
                               foreach ($prod_imgs as $prod_img){
                                   $remove_path = "../assets/images/products/".$prod_img;
                                   // echo '<script>alert('.var_dump($remove_path).')</script>';
                                    $remove = unlink($remove_path);
                                   //Check whether the image is removed or not
                                   if($remove==false){
                                      // failed to remove current image
           $_SESSION['login'] = "<div class='text-center my-8 text-teal-500 font-medium'>Failed to remove current images.</div>";
                                       //tealirect to manage food
                                       // header('location:index');
                                       //stop the process
                                       // die();
                                   }
       
                               }
                           }

                    }else{
                        $images_new=$received_cur_images;
                    }

                }
            }else{
                $images_new=$received_cur_images;
            }

            //4. Update the Food in Database
$sql3 = "UPDATE products_list SET
        product_name = '$pname',
        product_price = $price,
        promo = '$promo',
        product_pprice = '$pend',
        product_category = '$category',
        product_seo='$seo',
        product_desc='$desc',
        available = '$Available',
        best_or_new = $tagn,
        Product_image = '$images_new'

        WHERE product_code=$id
    ";

            //Execute the SQL Query
            $res3 = mysqli_query($conn, $sql3);

            //CHeck whether the query is executed or not
            if($res3==true){
                //Query Exectued and Food Updated
                $_SESSION['login'] = "<div class='text-center text-green-500 font-medium my-8'>Product Updated Successfully.</div>";
                //  header('location:update-prod?id='.$id.'');
                header('location:index');
                 die();
            }else{
                //Failed to Update Food
$_SESSION['login'] = "<div class='text-center text-teal-500 font-medium  my-8'>Failed to Update Product.</div>";
                // header('location:index');
            }

        }

// header
include 'partials/header-add.php';

?>

<!--contents-->
<div class="text-center font-bold text-3xl my-8" >
    Update Product
</div>

 <!-- back btn -->
 <div class="w-full flex justify-center items-center">
 <a href="index" class="w-auto p-1 mb-2  font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>

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
                     <input class="focus:outline-none border-2  font-medium  rounded ml-2 text-sm p-1" class="focus:outline-none border rounded ml-2 text-sm p-1" type="text" name="name" value="<?php echo $title; ?>" >
                </div>


                <div class=" mb-2 p-2">
                <div class="flex items-center">
                   <p class="font-medium">Price : </p>
                     <input class="focus:outline-none border-2  font-medium  rounded ml-2 text-sm p-1" class="focus:outline-none border rounded ml-2 text-sm p-1" type="text" name="price" value="<?php echo $price; ?>" >
                </div>
            </div>

            <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Promo ?</label>
        <input <?php if($promo==1) {echo "checked";} ?> type="radio" name="promo" value="1">Yes
        <input <?php if($promo==0) {echo "checked";} ?> type="radio" name="promo" value="0">No
      </div>
      <div class="font-semibold my-4">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Promo price <span class="text-[.6rem]">(enter promo  price if on promo)</span> </label>
       <input value="<?php echo $promo_ens; ?>" class="h-10 px-3 text-base border border-slate-400 rounded-lg focus:shadow-outline" type="text" name="pdate"/>
      </div>
   
    <div class="my-4">
        <label class="block mb-1 text-gray-500" >Category</label>
        <select name="type" class=" h-10 px-3 mb-2 text-base bg-white  font-semibold border border-slate-400 rounded-lg focus:shadow-outline">
        <?php
//Query to Get ACtive Categories
$sql = "SELECT * FROM tbl_category";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Count Rows
$count = mysqli_num_rows($res);
//Check whether category available or not
if($count>0){
//CAtegory Available
while($row=mysqli_fetch_assoc($res)){
$category_title = $row['cat_name'];
$category_id = $row['id'];
?>
<option <?php if($categ==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
<?php } } else {//CAtegory Not Available
echo "<option value='0'>Category Not Available.</option>";
                            }
                        ?>
              </select>
      </div>
            

      <div class="flex items-center">
        <label class="mr-2 text-gray-500" for="forms-labelOverInputCode">Is it Available ?</label>
        <input <?php if($status==1) {echo "checked";} ?> class="mx-1" type="radio" value="1"  name="Available"/><span>Yes</span>
        <input <?php if($status==0) {echo "checked";} ?> class="mx-1" type="radio" value="0" name="Available"/><span>No</span>
      </div>

      <div  class="mt-4">
        <label class="mr-2 text-gray-500" for="forms-labelOverInputCode">Select tag</label>
       <div  class=" flex items-center">
       <input <?php if($tag==0) {echo "checked";} ?> class="mx-1" type="radio" value="0" name="tag" checked/><span>General</span>
       <input <?php if($tag==1) {echo "checked";} ?> class="ml-2" type="radio" value="1" name="tag"/><span>New Arrival</span>
       <input <?php if($tag==2) {echo "checked";} ?> class="ml-2" type="radio" value="2" name="tag"/><span>Best Seller</span>
       </div>
      </div>


      <div class="my-3">
                    <p class="font-medium">Current Images: </p>
                      <div class="flex">
                      <?php
                       foreach ($disp_cur_images as $cur_item){
                            //Image Available
                            ?>
<img src="../assets/images/products/<?php echo $cur_item; ?>" alt="/" width="100px" height="100px" class="rounded ml-2 border-2">
                            <?php
                        }
                    ?>

                      </div>
                 </div>

                 <div class="my-4 lg:flex">
                    <p class="font-medium">New Images (3): </p>
      <input class="focus:outline-none  file:rounded-full ml-2  file:border-0
                      file:text-sm file:font-semibold
                      file:bg-black file:text-white"  type="file" name="images[]"  multiple>
                 </div>

                 
      <div class="mt-4">
        <label class="mr-2 text-gray-500"  for="forms-labelOverInputCode">Product SEO <span class="text-xs italic">(keywords only,comma separated words)</span> </label>
    
        <input name="seo" value="<?php echo $seoo; ?>" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"/>
      </div>

      <div class="mt-4">
        <label class="my-2 text-gray-500"  for="forms-labelOverInputCode">General product description</label>
    
        <textarea  name="desc" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"><?php echo $descc; ?></textarea>
      </div>

     


      <input type="hidden" name="current_images" value="<?php echo $current_images_row; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="update" value="Update"/>
   
  </form>
                    </section>



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
</body>
</html>