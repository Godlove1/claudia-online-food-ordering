<div class="cats w-full grid grid-flow-col auto-cols-max gap-4  overflow-x-scroll overflow-y-hidden  mb-8 p-4 ">

<?php

$get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
  $cid=$cats['id'];
  $cname=$cats['cat_name'];
  $ca_i=$cats['cat_image'];
  ?>

    <!-- cateogry template -->
    <div class="cat-temp-wrapper relative border shadow-lg  w-[100px] h-[100px] rounded-full overflow-hidden">
        <a href="restaurant?cat=<?php echo $cid;?>">
            <div class="cat-bg w-full ">
      <img src="assets/images/cats/<?php echo $ca_i;?>" alt="<?php echo ucwords($cname) ?>" class="">
            </div>
            <div class="name_cat absolute bg-black w-full h-full top-0 bg-opacity-30 hover:bg-red-500 transition-all duration-300 ease-in">
                    <div class="w-full h-full flex justify-center items-center">
                        <p class="text-white capitalize"><?php echo ucwords($cname) ?></p>
                    </div>
            </div>
        </a>
    </div>
 <!-- cateogry template -->
 <?php
 } 
?>

    </div>

