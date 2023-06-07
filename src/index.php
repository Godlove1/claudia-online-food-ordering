

<!-- HEADER -->
<?php
include 'config/config.inc.php';
  include 'partials/header.php';
  ?>
<!-- /HEADER -->

<!-- CAROUSEL IMAGE -->
<?php
  include 'partials/hero_carousel.php';
  ?>
<!-- CAROUSEL IMAGE -->

<!-- CATEGORIES -->
<div class="categories mansonry lg:grid lg:grid-cols-4 my-12 mx-2 ">
<a href="shop?cat=all">
        <div class="p-2 bg--slate-400 font-bold break-words my-2 text-center ">
            <p>Shop</p>
        </div>
        </a>
        <?php

  $get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>
  
        <a href="shop?cat=<?php echo $cid;?>">
        <div class="p-3 <?=($acat ==$cid)?'bg-pink-400 text-white':'bg-[#F3F2F3]'?> text-black font-bold break-words my-2 text-center ">
            <p><?php echo ucwords($cname) ?></p>
        </div>
        </a>
        <?php
 } 
?>

</div>



<!-- CATEGORY NAME -->
<div class="cat_name w-full flex justify-between items-center px-4 mt-8">
    <div class="font-bold text-2xl "><h2>Best Sellers</h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
            <p>More</p>
            <i class="fa-solid fa-chevron-right text-sm ml-1 font-extrabold "></i>
        </a>
    </div>
</div>


<!-- BEST SELLING -->
<div class="cats w-full grid grid-flow-col auto-cols-max gap-4  overflow-x-scroll overflow-y-hidden  p-4 mb-2 mt-8 ">

<?php
//List products from database
$results = $db->query("SELECT * FROM products_list WHERE best_or_new=2 AND  available != 0  order by rand() limit 0,10");
$count =mysqli_num_rows($results);
if ($count>0){
while($row = $results->fetch_assoc()) {
  $id=$row["product_code"];
  $name=$row["product_name"];
  $prod_imgs=$row["product_image"];
  $price= $row["product_price"];
  $pprice= $row["product_pprice"];
  $prod_img =explode(",",$prod_imgs);
  $promo=$row["promo"];

    ?>
    <!-- template -->
    <?php
    include 'partials/prod_template.php';
    ?>
 <!-- template -->
 <?php } }else{
                            echo 'No Products';
                           } ?>


 
  </div>
<!-- BEST SELLING -->



<!-- CATEGORY NAME -->
<div class="cat_name w-full  bg-[#F6F4FD] flex justify-between items-center p-4 mt-16">
    <div class="font-bold text-2xl"><h2>New Arrivals</h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
            <p>More</p>
            <i class="fa-solid fa-chevron-right text-sm ml-1 font-extrabold "></i>
        </a>
    </div>
</div>
<!-- NEW ARRIVAL -->
<div class="cats w-full grid grid-flow-col auto-cols-max gap-4  bg-[#F6F4FD] overflow-x-scroll overflow-y-hidden  mb-8 p-4 ">

<?php
//List products from database
$results = $db->query("SELECT * FROM products_list WHERE best_or_new=1 AND  available != 0 order by rand() limit 0,10");
$count =mysqli_num_rows($results);
if ($count>0){
while($row = $results->fetch_assoc()) {
  $id=$row["product_code"];
  $name=$row["product_name"];
  $prod_imgs=$row["product_image"];
  $price= $row["product_price"];
  $pprice= $row["product_pprice"];
  $prod_img =explode(",",$prod_imgs);
  $promo=$row["promo"];

    ?>
    <!-- template -->
    <?php
    include 'partials/prod_template.php';
    ?>
 <!-- template -->
 <?php } }else{
                            echo 'No Products';
                           } ?>


 
  </div>
<!-- NEW ARRIVALS -->




<!-- CATEGORY NAME -->
<div class="cat_name w-full  flex justify-between items-center p-4 mt-16 mb-4">
    <div class="font-bold text-xl underline"><h2>Popular Categories</h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
          
        </a>
    </div>
</div>
<!-- CAROUSEL IMAGE -->
<?php
  include 'partials/cat-carousel.php';
  ?>
<!-- CAROUSEL IMAGE -->






<!-- Featured -->
<div class="cat_name w-full flex justify-center items-center px-4 mt-12">
    <div class="font-bold text-2xl border-b-2 border-black "><h2>Just for You</h2></div>

</div>
<!-- BEST SELLING -->
<div class="cats w-full gap-2 lg:gap-6 lg:space-y-4 columns-2 p-2 my-4 lg:columns-4">

<?php
//List products from database
$resu = $db->query("SELECT * FROM products_list WHERE best_or_new=0 AND  available != 0  order by rand() limit 0,20");
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
    <!-- template for feautred -->
    <?php
    include 'partials/fet.php';
    ?>
 <!-- template -->
 <?php } }else{
                            echo 'No Products';
                           } ?>


   
  </div>
<!-- for you -->


<div class="w-full flex justify-center items-center my-8">
  <a href="shop" class="bg-black text-white text-xl font-bold p-4 w-1/2 text-center">More</a>
</div>




<!-- banner IMAGE -->
<div class="my-8">
<?php
 include 'partials/bottom_banner.php';
 ?>
</div>
<!-- banner IMAGE -->


<!-- popular-->
<div class="cat_name w-full  bg-[#F6F4FD] flex justify-between items-center p-4 mt-16">
    <div class="font-bold text-2xl"><h2>Popular </h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
            <p>More</p>
            <i class="fa-solid fa-chevron-right text-sm ml-1 font-extrabold "></i>
        </a>
    </div>
</div>
<!-- BEST SELLING -->
<div class="cats w-full grid grid-cols-1 gap-4 lg:grid-cols-4 lg:p-4 my-2 px-12">

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
    <!-- template for feautred -->
    <?php
    include 'partials/pop.php';
    ?>
 <!-- template -->
 <?php } }else{
                            echo 'No Products';
                           } ?>


   
  </div>
<!-- for you -->

<div class="w-full flex justify-center items-center mt-8 mb-24">
  <a href="shop" class="bg-black text-white text-xl font-bold p-4 w-1/2 text-center">More</a>
</div>





<!-- FOOTER -->
<?php
include 'partials/footer.php';
?>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
    <script>
      var swiper = new Swiper('.HSwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.hswiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
</body>
</html>