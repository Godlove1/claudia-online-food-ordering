
<?php
// header
include '../config/config.inc.php';


//adding testimony
if(isset($_POST['add_testi'])){
  //1. Get the DAta from Form
  // $name = $_POST['name'];
  //  $desc =mysqli_real_escape_string($conn,$_POST['desc']);
 
  if(isset($_FILES['image']['name'])) {
      $image_name = $_FILES['image']['name'];
      if($image_name!=""){
          $ext = end(explode('.', $image_name));
          $image_name = "testimony-".rand(0000,9999).".".$ext; //New Image Name May Be "NST-prod-45.jpg"
          $src = $_FILES['image']['tmp_name'];
          $dst = "../assets/images/testi/".$image_name;

          //Finally Uppload the food image
          $upload = move_uploaded_file($src, $dst);

          //check whether image uploaded of not
          if($upload==false){
              //Failed to Upload the image
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
              die();
          }}}else{ 
    $image_name = ""; //SEtting DEfault Value as blank
}

  $sql2 = "INSERT INTO tbl_testimony SET
      prof_image = '$image_name'
  ";

  //Execute the Query
  $res2 = mysqli_query($conn, $sql2);
  if($res2 == true){
      //Data inserted Successfullly
      $_SESSION['login'] = ' 
      <div class="w-full bg-green-100 border-t-4 border-green-500 my-2 md:my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex w-1/2">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">image Successfully Added.</p>
        </div>
      </div>
      </div>
      ';
      header('location:testimony');
      exit();
    
  }else{
      //FAiled to Insert Data
      $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error adding image try again</p>
          </div>
        </div>
      </div>
         ';
      header('location:index');
      exit();
  }}


 // delete testimony
 if(isset($_GET['tid']) && isset($_GET['image_name'])){
  $did = $_GET['tid'];
  $image_name = $_GET['image_name'];
  //2. Remove the Image if Available
  if($image_name != ""){
      $path = "../assets/images/testi/".$image_name;
      $remove = unlink($path);
      if($remove==false){
          //Failed to Remove image
          $_SESSION['login'] ='
   <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">Something went Wrong</p>
      <p class="text-sm">Error Deleting image. please try again.</p>
    </div>
  </div>
</div>
   ';
          //REdirect to Manage item
          header('location:index');
          die();
      } }

  //3. Delete item from Database
  $sql = "DELETE FROM tbl_testimony WHERE id=$did";
  //Execute the Query
  $res = mysqli_query($conn, $sql);
  //CHeck whether the query executed or not and set the session message respectively
  //4. Redirect to Manage item with Session Message
  if($res==true){
      //item Deleted
      $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-4 md:my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
<div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
<div> 
<p class="font-bold">SUCCESS!</p>
<p class="text-sm">image  Deleted.</p>
</div>
</div>
</div>
  ';
  //Redirect to Manage Admin Page
  header('location:index');
  exit();
  }
  else{
      $_SESSION['login'] ='
      <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
     <div class="flex">
       <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
       <div>
         <p class="font-bold">Something went Wrong</p>
         <p class="text-sm">Error Deleting item. please try again.</p>
       </div>
     </div>
   </div>
      ';
             //REdirect to Manage item
             header('location:index');
             die();
  } }


  include 'partials/header-add.php';


?>

 <!-- back btn -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<a href="index" class="w-auto p-1 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>
</div>


<!-- testimonial side form -->
<div class="w-full lg:flex justify-center items-center p-2 mt-2 ">

<!-- testimnoial idv -->
<div class="testimny__wrapper w-full lg:w-1/2 lg:p-4">
<div class="small_wrap border-2 border-gray-300 rounded-lg p-2 lg:p-4">
    <form action="" method="post" enctype="multipart/form-data">
   <h2 class="font-bold text-2xl my-4 underline">Gallery</h2>
   <div class="from__grp">
   <!-- <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="name of person" name="name" required/>
      </div> -->
      <div class="font-semibold my-2">
        <label class="block mb-1 " for="forms-labelOverInputCode">Picture </label>
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-teal-500 file:text-white" type="file" name="image" required/>
      </div>

      <!-- <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Testimony</label>
        <textarea class="w-full h-16 px-3 py-2 text-base font-semibold placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none " name="desc" required></textarea>
      </div> -->
      <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="add_testi" value="ADD"/>
   </div>
    </form>
    <!-- see all testimonial -->
    <div class="border border-gray-300 rounded-lg  w-full my-8 ">
    <h2 class="font-bold text-2xl my-4 underline ml-4">All images</h2>
   
    <div class="mony__wrapper p-2  w-full max-h-[500px] flex flex-wrap justify-around items-center overflow-scroll">
   
<?php
$sql = "SELECT * FROM tbl_testimony  order by id DESC";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
    $id = $row['id'];
    // $name = $row['name'];
    // $text = $row['testimony'];
    $p_img = $row['prof_image'];
    
    ?>

     <!-- template -->
     <div class="card  my-2 lg:w-[200px] border-2 rounded-md p-1 border-gray-300">
<div class="prof flex items-center">
   <?php
if(empty($p_img)){
    echo '<p class="h-[50px] w-[50px] flex p-1 justify-center items-center border-2 text-xs border-teal-500 rounded-[50%]">No-image</p>';
}else{

    echo '<img src="../assets/images/testi/'.$p_img.'" class="h-[100px] w-[100px] rounded-full">';
}
   ?>
    <!-- <p class="ml-3 capitalize"><?php// echo $name; ?></p> -->
</div>
<!-- <div class="text text-sm p-2">
    <p>
    <?php// echo $text; ?>
    </p>
</div> -->
<div class="cation flex justify-end items-center">
    <a href="testimony?tid=<?php echo $id; ?>&image_name=<?php echo $p_img; ?>" class="bg-red-500 text-white px-3"><i class="fa-solid fa-trash-can"></i></a>
</div>
    </div>
       <!-- template -->

                <?php
}   }else{
 echo '
 <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
                <p>No image added</p>
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