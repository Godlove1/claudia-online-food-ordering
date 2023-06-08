

<!-- HEADER -->
<?php
include 'config/config.inc.php';
include 'partials/header.php';
// <!-- hero -->
include 'partials/hero.php';
  ?>
<!-- /HEADER -->



<!-- Featured -->
<div class="cat_name w-full px-4 mt-12">
    <div class="font-bold text-xl  "><h2>🏃‍♂️ On-the-Go Grub</h2></div>
</div>
<!-- Categoris -->
<?php
  include 'partials/categories.php';
  ?>




<!-- Featured -->
<div class="cat_name w-full flex justify-center items-center px-4 mt-12">
    <div class="font-bold text-2xl  "><h2>Hangover Helper 🍳🥓🥞</h2></div>

</div>
<!-- BEST SELLING -->
<div class=" w-full gap-2 lg:gap-6 lg:space-y-4 space-y-8 columns-1 px-8 pt-8 lg:p-2 lg:columns-5 ">


<?php
//List products from database
$resu = $db->query("SELECT * FROM products_list  order by rand() limit 0,5");
$counta =mysqli_num_rows($resu);
if ($counta>0){
while($row = $resu->fetch_assoc()) {
    $prod_id=$row["product_code"];
    $name=$row["product_name"];
    $prod_imgs=$row["product_image"];
    $price= $row["product_price"];
    $pprice= $row["product_pprice"];
    $prod_img =explode(",",$prod_imgs);
    $promo=$row["promo"];

    ?>
  <!-- TEMPLATE -->
  <?php
  include 'partials/template.php';
  ?>
    <!-- TEMPLATE -->
    <?php } }else{
                    echo 'No food';
              } ?>



    </div>


    <div class="w-full flex justify-center items-center my-12 ">
        <a href="restaurant" class="bg-black shadow-md text-white rounded-md font-semibold p-3 w-1/3 text-center hover:text-red-500 transition-all ease-linear">See More...</a>
      </div>



    <!-- BANNER -->
    <?php
    include 'partials/banner.php';
    ?>
    <!-- BANNER -->
        
<!-- Featured -->
<div class="cat_name w-full  bg-[#F6F4FD] flex justify-between items-center p-4 mt-16">
    <div class="font-bold text-2xl"><h2>🍔 Munchies Menu</h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
            <p>More</p>
            <i class="fa-solid fa-chevron-right text-sm ml-1 font-extrabold "></i>
        </a>
    </div>
</div>
<div class="cats w-full grid grid-flow-col gap-4  bg-[#F6F4FD] overflow-x-scroll overflow-y-hidden  mb-6 p-4  ">

<?php
//List products from database
$resu = $db->query("SELECT * FROM products_list  order by rand() limit 0,5");
$counta =mysqli_num_rows($resu);
if ($counta>0){
while($row = $resu->fetch_assoc()) {
    $prod_id=$row["product_code"];
    $name=$row["product_name"];
    $prod_imgs=$row["product_image"];
    $price= $row["product_price"];
    $pprice= $row["product_pprice"];
    $prod_img =explode(",",$prod_imgs);
    $promo=$row["promo"];

    ?>
  <!-- TEMPLATE -->
  <?php
  include 'partials/template.php';
  ?>
    <!-- TEMPLATE -->
    <?php } }else{
                    echo 'No food';
              } ?>


</div>




      
<!-- Featured -->
<div class="cat_name w-full flex justify-center items-center px-4 mt-16">
    <div class="font-bold text-2xl  "><h2>🌃 Late Night Bites</h2></div>

</div>
<!-- BEST SELLING -->
<div class=" w-full gap-2 lg:gap-6 lg:space-y-4 space-y-8 columns-1 px-8 pt-8 lg:p-2 lg:columns-5 ">

<?php
//List products from database
$resu = $db->query("SELECT * FROM products_list  order by rand() limit 0,5");
$counta =mysqli_num_rows($resu);
if ($counta>0){
while($row = $resu->fetch_assoc()) {
    $prod_id=$row["product_code"];
    $name=$row["product_name"];
    $prod_imgs=$row["product_image"];
    $price= $row["product_price"];
    $pprice= $row["product_pprice"];
    $prod_img =explode(",",$prod_imgs);
    $promo=$row["promo"];

    ?>
  <!-- TEMPLATE -->
  <?php
  include 'partials/template.php';
  ?>
    <!-- TEMPLATE -->
    <?php } }else{
                    echo 'No food';
              } ?>


    </div>


    <div class="w-full flex justify-center items-center my-12 ">
        <a href="restaurant" class="bg-black shadow-md text-white rounded-md font-semibold p-3 w-1/3 text-center hover:text-red-500 transition-all ease-linear">See More...</a>
      </div>

      <?php
      include 'partials/footer.php';
      ?>