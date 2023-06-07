
<div class="carousel_container_wrapper w-full h-[200px] mb-16 overflow-hidden ">
<div class="swiper mySwiper w-full h-full ">
      <div class="swiper-wrapper h-full flex  items-center ml-12">

      <?php

$get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
  $cid=$cats['id'];
  $cname=$cats['cat_name'];
  $ca_i=$cats['cat_image'];
  ?>
        <div class="swiper-slide mx-8 border border-black rounded-full overflow-hidden" style="max-width:300px;height:300px">
      
          <img
            class="object-contain w-full h-full border border-black"
            src="assets/images/cats/<?php echo $ca_i;?>"
            alt="<?php echo ucwords($cname) ?>"
          />
       
        <div class="absolute w-full h-full top-0">
        <a href="shop?cat=<?php echo $cid;?>">
     <div class="w-full h-full flex justify-center items-center">
      <p class="bg-[#FFD700] px-2"><?php echo ucwords($cname) ?></p>
      </div>
      </a>
        </div>
        </div>
       
        <?php
 } 
?>



      </div>
      <div class="swiper-button-next" style="color:black"></div>
      <div class="swiper-button-prev" style="color:black"></div>
    </div>


</div>