<?php 

include 'cart_process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/custom.css">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico">


   <script src="https://kit.fontawesome.com/3ecb4095fb.js" crossorigin="anonymous"></script>

 <!-- Swiper's CSS -->
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <!-- loadmore script -->
 <script src="assets/js/tocart.js"></script>

 
<!-- dynamic header -->
<?php
    $url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$str = $parts['path'];

// Getting the current page URL
$cur_page = substr($str,strrpos($str,"/")+1);

if($cur_page == 'product'){
  ?>
 
<!-- SEO -->
<title><?php  echo $name; ?>  | Sheyonce Fashion Boutique, Shirts & Clothes | Sheyonce Fashion Boutique</title>
<meta name="description" content="Buy <?php  echo $name; ?> | Sheyonce Fashion Boutique  
 from Sheyonce Fashion Boutique">
 <link rel="canonical" href="https://www.sheyoncefashion.store/product?hair_key=<?php  echo $prod_id; ?>">
 <!-- SEO - Social -->
<meta property="og:site_name" content="Sheyonce Fashion Boutique">
<meta property="og:url" content="https://www.sheyoncefashion.store/product?hair_key=<?php  echo $prod_id; ?>">
<meta property="og:title" content="<?php  echo $name; ?>">
<meta property="og:type" content="product">
<meta property="og:description" content="Buy <?php  echo $name; ?> from Sheyonce Fashion Boutique.">

  <meta property="og:price:amount" content="<?php  echo number_format($price,2); ?>">
  <meta property="og:price:currency" content="FCFA">

<meta property="og:image" content="https://www.sheyoncefashion.store/assets/images/products/<?php echo $prod_img[0] ?>">
<meta property="og:image" content="https://www.sheyoncefashion.store/assets/images/products/<?php echo $prod_img[0] ?>">
<meta property="og:image" content="https://www.sheyoncefashion.store/assets/images/products/<?php echo $prod_img[0] ?>">
<meta property="og:image:secure_url" content="https://www.sheyoncefashion.store/assets/images/products/<?php echo $prod_img[0] ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php  echo $name; ?>">
<meta name="twitter:description" content="Buy <?php  echo $name; ?> from Sheyonce Fashion Boutique.">
<meta name="keywords" content="<?php echo $seo; ?>">

<?php
    }else{
        ?>

<title>Sheyonce Fashion Boutique | Fashion Online For Women | Affordable Women&#39;s Clothing | Sheyonce Fashion Boutique</title>
       <link rel="canonical" href="https://www.sheyoncefashion.store/"> 
<!-- SEO -->
<meta name="keywords" content="Sheyonce Fashion Boutique,,top online fashion store, for women, Shop, sexy club dresses, jeans, shoes, bodysuits, skirts, affordable fashion online">
<meta name="description" content="Sheyonce Fashion Boutique is the top online fashion store for women. Shop sexy club dresses, jeans, shoes, bodysuits, skirts and more. Cheap &amp;amp; affordable fashion online.">
 <!-- SEO - Social -->
<meta property="og:site_name" content="Sheyonce Fashion Boutique">
<meta property="og:url" content="https://www.sheyoncefashion.store/">
<meta property="og:title" content="Sheyonce Fashion Boutique | Fashion Online For Women | Affordable Women&#39;s Clothing">
<meta property="og:type" content="website">
<meta property="og:description" content="Sheyonce Fashion Boutique is the top online fashion store for women. Shop sexy club dresses, jeans, shoes, bodysuits, skirts and more. Cheap &amp; affordable fashion online.">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Sheyonce Fashion Boutique | Fashion Online For Women | Affordable Women&#39;s Clothing">
<meta name="twitter:description" content="Sheyonce Fashion Boutique is the top online fashion store for women. Shop sexy club dresses, jeans, shoes, bodysuits, skirts and more. Cheap &amp; affordable fashion online.">
    <?php
    }
?>


</head>
<body>
    

<!-- shopping cart -->
<div class="shopping-cart-box hidden fixed z-50 top-0 p-2 w-full font-medium">
<div class="w-full h-full flex justify-center items-center">
<div class='w-full lg:w-1/2 border border-black rounded-md shadow-lg p-1 bg-white'>
<div class="flex justify-end items-center"><a href="#" class="close-shopping-cart-box" ><i class="fa-solid fa-xmark text-2xl font-extrabold text-black mr-4 transition-all ease-in-out hover:text-red-500"></i></a></div>
<h1 class="border-b border-white text-center text-xl  font-bold">Your Shopping Cart</h1>
    <div id="shopping-cart-results" class="mt-4">
    </div>
</div>
</div>
</div>



<!-- HEADER/ -->
<div class=" w-full menu_wrpper sticky top-0 z-20 bg-white">
<!-- menu_top -->
<div class="w-full header_top pl-2 py-4 flex justify-between items-center h-12 border-b">
  <!-- menu_btn -->
  <div class="m_btn">
    <i class="fa-solid fa-bars text-2xl"  onclick="openNav()"></i>
</div>
<!-- logo -->
<div class=" w-full h-full flex justify-center items-center">
   <div class="">
   <a href="index"> 
      <img src="assets/images/logo.webp" alt="mmb" class="w-[200px] pt-4 mb-4">
        <!-- <p class="text-2xl lg:text-4xl">Sheyonce Fashion Boutique</p> -->
  </a>
</div>
</div>

<!-- menu_cart -->
<div class="cart flex justify-center items-center">
<div class="mx-4">
    <i class="fa-solid fa-magnifying-glass text-xl cursor-pointer" onclick="openSearch()"></i>
   </div>
<div class="cartert flex mr-4">
<a href="#" title="cart" class="cart-box"><i class="fa-solid fa-cart-shopping text-xl"></i> </a>
    <p  class="cart-info cart-total  bg-red-500 text-white w-4 h-4 text-center rounded-md  text-xs">
                  <?php
            if(isset($_SESSION["products"])){
                    echo count($_SESSION["products"]);
                                        }else{
                                            echo 0;
                                        }
                     ?>
    </p>

</div>
</div>
  
</div>
<!-- menu_top -->
<!-- header search -->
<div class="w-full h-0 transition-all ease-in-out overflow-hidden " id="search_bar">
  <form action="search" method="post" onchange="submit()" class="relative my-4 pb-4 w-full flex justify-center items-center">
  <input type="search" name="search" placeholder="search ..." class="border placeholder:italic placeholder:text-xs focus:outline-none focus:border-red-500 p-2">
  <i class="fa-solid fa-xmark text-xl cursor-pointer absolute top-0 right-[20px]" onclick="closeSearch()"></i>
  </form>
</div>

</div>
<!-- HEADER/ -->

<!-- SERVICES -->
<div class="services w-full h-5 my-4 flex justify-between items-center">
<div class="serv w-full h-full border-r-2  text-xs flex justify-center items-center">
    <i class="fa-solid mx-2 fa-plane-departure"></i>
    <p>48-hr Delivery </p>
</div>
<div class="serv w-full h-full border-r-2  text-xs flex justify-center items-center">
    <i class="fa-solid mx-2 fa-recycle"></i>
    <p>30-day Free-return </p>
</div>
<div class="serv w-full h-full border-r-2  text-xs flex justify-center items-center">
    <i class="fa-solid mx-2 fa-money-bill"></i>
    <p>cash-on delivery</p>
</div>
</div>


<!-- MOBILE MENU -->

  <!-- mobile menu (sidebar) -->
  <div id="mobiside" class="mobile__sidebar transition-all ease-in-out fixed w-0 left-0  h-screen  overflow-hidden z-50 top-0 lg:hidden bg-slate-800 bg-opacity-80">
      <div class="w-full h-full flex justify-start ">
       
      <!-- menu-items -->
      <div class="menu__item w-3/5  text-black bg-white h-full right-0 relative ">
         <!-- close button -->
      <div class="close__mo_side p-2 absolute right-[-30px]">
        <center><i class="fa-solid fa-xmark w-5 h-5 text-xl font-bold transition-all ease-in-out hover:text-[#A23445] bg-white text-blackrounded-lg shadow-md" onclick="closeNav()"></i></center>
      </div>

      <!-- mobile menu logo -->
      <div class="w-full  text-center mb-4">
        <!-- <img src="images/logos/l5.png" alt="mmb" class="pt-4 mb-4"> -->
        <a href="index" class="log" title="Sheyonce">
        <p style="font-size:1.5rem;" class="mt-4">Sheyonce Fashion</p>
     </a>
        <div class="flex justify-center items-center mb-2">
         <a href="https://wa.me/971508322923" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-whatsapp"></i></a>
         <a href="" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-facebook"></i></a>
         <a href="" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-instagram"></i></a>
         </div>
      </div>

    <!-- menu intems -->
<ul class="w-full">
<li class="w-full flex justify-center items-center text-center "><a href="index" class="text-sm uppercase  border p-2 border-black ">Menu</a></li>

<li class="border-b w-full  border-black mt-2 p-2 transition-all ease-in-out hover:bg-red-500 hover:text-white"><a href="shop" class="capitalize w-full name">Shop</a></li>
<?php
$get_cats = $db->query("SELECT * FROM tbl_category order by id ASC");
while($row = $get_cats->fetch_assoc()) {
 $c_id = $row['id'];
 $c_name = $row['cat_name'];
  ?>

<li class="border-b  border-black  p-2 transition-all ease-in-out hover:bg-yellow-300 hover:text-white  name"><a href="shop?<?php echo $c_name.''.md5($c_name); ?>&cat=<?php echo $c_id; ?>" class="capitalize"><?php echo $c_name; ?></a></li>

<?php } ?>

<li class="w-full flex justify-center hover:bg-red-500 hover:text-white transition-all ease-out mt-4 items-center text-center "><a href="admin_panel" class="text-sm uppercase  border p-2 border-black" target="_blank" class="capitalize name">Log in</a></li>
</ul>

      </div>
     
      </div>
</div>

<!-- MOBILE MENU -->
