
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


<!-- Featured -->
<div class="cat_name w-full px-4 mt-12">
    <div class="font-bold text-xl  "><h2>Categories</h2></div>
</div>
<!-- Categoris -->
<div class="flex justify-around items-center flex-wrap mb-8 p-4 ">
 <!-- cateogry template -->
 <div class="cat-temp-wrapper relative border shadow-lg  w-[80px] h-[80px] rounded-full overflow-hidden">
    <a href="restaurant">
        <div class="cat-bg w-full ">
            <img src="https://images.pexels.com/photos/9609868/pexels-photo-9609868.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="w-full h-full object-cover">
        </div>
        <div class="name_cat absolute bg-black w-full h-full top-0 bg-opacity-30">
                <div class="w-full h-full flex justify-center items-center">
                    <p class="text-white capitalize">All</p>
                </div>
        </div>
    </a>
</div>
<!-- cateogry template -->


<?php
 if(isset($_GET['cat'])){
  $acat=$_GET['cat'];

  $get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>

    <!-- cateogry template -->
    <div class="cat-temp-wrapper relative <?=($acat == $cid)?'border-red-500':''?> border  shadow-lg  w-[80px] h-[80px] rounded-full overflow-hidden">
        <a href="restaurant?cat=<?php echo $cid;?>">
            <div class="cat-bg w-full ">
                <img src="assets/images/cats/<?php echo $ca_i;?>" alt="" class="">
            </div>
            <div class="name_cat absolute <?=($acat == $cid)?'bg-red-500':' bg-black'?>  w-full h-full top-0 bg-opacity-30">
                    <div class="w-full h-full flex justify-center items-center">
                        <p class="text-white capitalize"><?php echo ucwords($cname) ?></p>
                    </div>
            </div>
        </a>
    </div>
 <!-- cateogry template -->

 </a>
        <?php
 } }else{
 $get_cats="SELECT * FROM tbl_category order by id ASC";
 foreach ($db->query($get_cats) as $cats) {
     $cid=$cats['id'];
     $cname=$cats['cat_name'];
?>
    <!-- cateogry template -->
    <div class="cat-temp-wrapper relative <?=($acat == $cid)?'border-red-500':''?> border  shadow-lg  w-[80px] h-[80px] rounded-full overflow-hidden">
        <a href="restaurant?cat=<?php echo $cid;?>">
            <div class="cat-bg w-full ">
                <img src="assets/images/cats/<?php echo $ca_i;?>" alt="" class="">
            </div>
            <div class="name_cat absolute <?=($acat == $cid)?'bg-red-500':' bg-black'?>  w-full h-full top-0 bg-opacity-30">
                    <div class="w-full h-full flex justify-center items-center">
                        <p class="text-white capitalize text-center"><?php echo ucwords($cname) ?></p>
                    </div>
            </div>
        </a>
    </div>
 <!-- cateogry template -->
<?php
}
}
?>

    </div>






<!-- Featured -->
<div class="cat_name w-full flex justify-center items-center px-4 my-12">
    <div class="font-bold text-2xl  "><h2>Showing <span>All Meals 🥧</span> 😋</h2></div>
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


        <!-- PAGINATION -->
<div class="my-8 lg:mt-12 lg:text-2xl">
    <ol class="flex justify-center gap-1 text-xs font-medium">
        <li>
          <a
            href="#"
            class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
          >
            <span class="sr-only">Prev Page</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-3 w-3"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
        </li>
      
        <li>
          <a
            href="#"
            class="block h-8 w-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
          >
            1
          </a>
        </li>
      
        <li
          class="block h-8 w-8 rounded border-red-600 bg-red-600 text-center leading-8 text-white"
        >
          2
        </li>
      
        <li>
          <a
            href="#"
            class="block h-8 w-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
          >
            3
          </a>
        </li>
      
        <li>
          <a
            href="#"
            class="block h-8 w-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
          >
            4
          </a>
        </li>
      
        <li>
          <a
            href="#"
            class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
          >
            <span class="sr-only">Next Page</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-3 w-3"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
        </li>
      </ol>
</div>




    <!-- BANNER & FOOTER -->
    <?php
    include 'partials/banner.php';
    include 'partials/footer.php';
    ?>