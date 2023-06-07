
<!-- HEADER -->
<?php
include 'config/config.inc.php';
include 'partials/header.php';

// varibale for filter
@$cat=$_GET['cat']; 


// pagination
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 16;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 


?>
<!-- /HEADER -->


<div class="carousel_container_wrapper mb-12 w-full flex justify-center items-center ">
    <div class="div">
        <img src="assets/images/red.jpg" alt="" class="object-contain">
    </div>
</div>
 
<!-- CATEGORIES -->
<div class="mx-2">
  <h2 class="underline">Popular Categories</h2>
</div>
<div class="categories mansonry lg:m3 mb-8 mx-2 ">
<a href="shop?cat=all">
        <div class="p-2 bg--slate-400 font-bold break-words my-2 text-center ">
            <p>All</p>
        </div>
        </a>
        <?php
 if(isset($_GET['cat'])){
  $acat=$_GET['cat'];

  $get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>
  
        <a href="shop?cat=<?php echo $cid;?>">
        <div class="p-2 <?=($acat ==$cid)?'bg-[#FFD700] text-white':'bg-[#F3F2F3]'?> text-black font-bold break-words my-2 text-center ">
            <p><?php echo ucwords($cname) ?></p>
        </div>
        </a>
        <?php
 } }else{

 $get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>
        <a href="shop?cat=<?php echo $cid;?>">
        <div class="p-2 <?=($acat ==$cid)?'bg-red-400 text-white':'bg-[#FFD700]'?> text-black font-bold break-words my-2 text-center ">
            <p><?php echo ucwords($cname) ?></p>
        </div>
        </a>
        <?php
 }
 }
?>

</div>


<!-- Featured -->
<div class="cat_name w-full flex justify-center items-center px-4 mt-12">
    <div class="font-bold text-2xl border-b-2 border-black "><h2>Shop</h2></div>

</div>
<!-- BEST SELLING -->

<?php
  if(isset($_GET['cat']) && strlen($_GET['cat'])<3){
    $type_cat=$_GET['cat'];
    ?>
    <div class="cats w-full grid grid-cols-2 gap-4 lg:grid-cols-6 p-4 my-2">
      <?php
    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list` WHERE product_category=$type_cat  AND  available != 0");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;   
    
$sql = "SELECT * FROM products_list WHERE product_category=$type_cat AND  available != 0 order by product_code DESC LIMIT $offset, $total_records_per_page";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
    $prod_id=$row["product_code"];
    $name=$row["product_name"];
    $prod_imgs=$row["product_image"];
    $price= $row["product_price"];
    $pprice= $row["product_pprice"];
    $prod_img =explode(",",$prod_imgs);
    $promo=$row["promo"];
  ?>
    <!-- template -->
    <?php
    include 'partials/fet.php';
    ?>
 <!-- template -->

 <?php
}
?>
<!-- load more posts -->
</div>
<!-- pagination -->
<?php
    include 'page_counter.php';
  ?>

<?php
}else{
  ?>
  </div>
<div class="w-full flex justify-center items-center font-bold">
  <p>No products for availbale for this category, try another!</p>
</div>

  <?php
} } else{
?>
<div class="cats w-full grid grid-cols-2 gap-4 lg:grid-cols-6 p-4 my-2">
  <?php
  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;   
  
$sql = "SELECT * FROM products_list order by rand() LIMIT $offset, $total_records_per_page";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res)) {
  $prod_id=$row["product_code"];
  $name=$row["product_name"];
  $prod_imgs=$row["product_image"];
  $price= $row["product_price"];
  $pprice= $row["product_pprice"];
  $prod_img =explode(",",$prod_imgs);
  $promo=$row["promo"];
?>
  <!-- template -->
  <?php
    include 'partials/fet.php';
    ?>
<!-- template -->

<?php
}
?>
<!-- load more posts -->
</div>
</div>
<!-- pagination -->
<div class="w-full flex justify-center items-center">
<?php
  include 'page_counter.php';
  ?>
</div>

<?php
}else{
?>

<div>
  <p>No products availale</p>
</div>
  <?php
} }
    ?>
 
<!-- shop -->
</div>




<!-- banner IMAGE -->
<?php
 include 'partials/bottom_banner.php';
 ?>
<!-- banner IMAGE -->
<!-- FOOTER -->
<?php
include 'partials/footer.php';
?>
</body>
</html>