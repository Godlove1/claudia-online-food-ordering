

<div class="w-full aspect-video mb-4  shadow-md rounded-md ">
     <a href="product?<?php echo $name; ?>&hair_key=<?php echo $prod_id ?>" title="<?php echo $name; ?>" >
        <img src="assets/images/products/<?php echo $prod_img[0] ?>" class="object-contain rounded-t-md"/>
     </a>
     <div class="add_to_cart w-full ">
      <form  method="post" class="form-item">
        <input name="product_code" type="hidden" value="<?php echo $prod_id ?>">
        <input name="product_size" type="hidden" value='M'>
        <input name="product_qty" type="hidden" value="1">

        <?php 
// change these values to match your product 
$productName = $name; 
$productImage = "https://sheyoncefashion.store/assets/images/products/".$prod_img[0]; 
$phoneNumber = "971508322923"; 
$messageURL = "https://wa.me/{$phoneNumber}?text=Hi!,%20I%20will%20like%20to%20buy%20{$name}%20Priced%20at%20{$currency} ".number_format($price,1)."%0A%0Aimage:%0A{$productImage}"; 
 
// output the WhatsApp share button with the product image 
echo "<a href='{$messageURL}' target='_blank'><img src='{$productImage}' alt='{$productName}' class='w-full text-sm p-3 flex justify-center items-center font-bold bg-red-500 text-white'><p>Buy on</p><i class='fa-brands fa-whatsapp ml-2'></i></a>"; 
?>
<!--         
 <a  target='_blank' href='https://wa.me/971508322923?text=Hi!,%20I%20will%20like%20to%20buy%20<?php// echo ucfirst( $name); ?>%20Priced%20at%20<?php// echo $currency.''.number_format($price,1);?>%0A' class="w-full text-sm p-3 flex justify-center items-center font-bold bg-red-500 text-white"><p>Buy on</p><i class="fa-brands fa-whatsapp ml-2"></i></a> -->

            <button type="submit" class="w-full text-sm  p-3 flex justify-center items-center font-bold bg-black text-white"><i class="fa-solid fa-plus mr-1"></i><p>Add To Cart</p></button>
        </form>
      </div>
      <div class="prdo_details">
      <a href="product?<?php echo $name; ?>&hair_key=<?php echo $prod_id ?>" title="<?php echo $name; ?>" >
        <p class="text-[#FFD700] font-medium mt-1 text-center"><?php 
        if(strlen($name)>24){
          echo substr($name,0,24).'...';
        }else{
          echo $name;
        }
        ?></p>
       </a>
        <div class="price flex justify-center mb-2 -mt-2">
          
           <?php
if($promo == 0){
?>
   <p class="price"><span class="text-xs">F CFA </span><span class="font-bold text-xl "><?php echo number_format($price,1); ?></span> </p>
<?php
}else{
  ?>
    <p class="price"><span class="text-xs">F CFA </span><span class="font-bold text-xl "><?php echo number_format($pprice,1); ?></span> </p>
 <p class="text-sm mb-[-440px] text-slate-400"><strike> F<?php echo number_format($price,0); ?></strike></p>
  <?php
}
           ?>
        </div>
      </div>
    </div>