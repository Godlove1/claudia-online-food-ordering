

<!-- HEADER -->
<?php 
include 'config/config.inc.php';

        //CHeck whether Post id is set or not
        if(isset($_GET['hair_key'])){
            //Get the Post id and details of the selected Post
            $hair_key = $_GET['hair_key'];
            $_SESSION['hair_key'] = $hair_key;
            //Get the DEtails of the SElected Post
            $sql = "SELECT * FROM products_list WHERE product_code=$hair_key";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1){
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);
                $prod_id=$row["product_code"];
                $name=$row["product_name"];
                $prod_imgs=$row["product_image"];
                $price= $row["product_price"];
                $pprice= $row["product_pprice"];
                $prod_img =explode(",",$prod_imgs);
                $image_names = explode(",", $row["product_image"]);
                $promo=$row["promo"];
                $category =$row['product_category'];
                $desc = $row['product_desc'];
                $seo = $row['product_seo'];
                
            }
            else
            {
                //Post not Availabe
                //REdirect to Home Page
                header('location:index');
            }
        }
        else
        {
            //Redirect to homepage
            header('location:index');
        }
  
include 'partials/header.php';
?>

<!-- /HEADER -->

<div class="w-full lg:flex flex-col ">

<div class="w-full lg:flex ">
<!-- Product name -->
<div class="w-full product my-8 lg:my-0 border-r-2 border-yellow-500 ">
<div class="my-8 p-4">
<h2 class="text-2xl font-bold"><?php echo $name ?></h2>
</div>

<!-- PRODUCT DETAILS -->
<div class="product">
  <div class="product__images">
      <img
          src="assets/images/products/<?php echo $prod_img[0] ?>"
          alt="<?php echo $name ?>"
          class="product__main-image lg:object-contain lg:max-h-[300px]"
          id="main-image"
      />

      <div class="product__slider-wrap">
          <div class="product__slider">
<?php
          foreach ($image_names as $image_name) {
             if (!empty($image_name)) {
        ?>
             <img
                  src="assets/images/products/<?php echo $image_name ?>"
                  alt="<?php echo $name ?>"
                  class="product__image product__image--active"
              />
<?php
}}
     ?>        
             
          </div>
      </div>
  </div>
</div>
<!-- shopping details -->
<div class="flex justify-center items-center flex-col  p-4">
<h2 class="text-3xl font-light"><?php echo $name ?></h2>
<p class="my-2 p-4 font-bold text-xl capitalize"><strong><?php echo $desc ?></strong></p>
<p class="price text-2xl mt-4 font-bold border border-black p-2"><?php echo number_format($price ,1);?><span class="text-sm"> FCFA</span></p>
</div>

<div class="px-4  mb-20 w-full justify-center items-center flex-col ">
  <form  method="post" class="form-item w-full lg:w-1/2">
  <div class=" mx-2 ">
  <p class="text-slate-500 font-bold mb-2">Select your size:</p>
  <div class="w-full flex justify-center items-center">
<select name="product_size" class="w-full p-3 border  bg-white focus:outline-none focus:border-red-500">
 <option value='M'>Medium</option>
 <option value='S'>Small</option>
 <option value='XS'>Extra-small</option>
 <option value='XL'>Extra-large</option>
 <option value='L'>Large</option>
</select>
  </div>

  </div>
  <div class="quantity mb-2 p-4">
    <p class="text-slate-500 text-sm mb-2 font-bold">Quantity:</p>
    <input name="product_code" type="hidden" value="<?php echo $prod_id ?>">
    <div class="custom-number-input h-10 w-1/2 mb-8">
  <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
    <p id="decrement-count" class="border flex justify-center items-center hover:text-gray-700 hover:bg-gray-400 h-full w-32 rounded-l cursor-pointer outline-none">
      <span class="m-auto text-2xl font-thin">−</span>
    </p>

    <input type="number" id="total-count" class="outline-none  border-t border-b focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center" name="product_qty" value="1" min="1"/>

  <p id="increment-count" class="border flex justify-center items-center hover:text-gray-700 hover:bg-gray-400 h-full w-32 rounded-r cursor-pointer">
    <span class="m-auto text-2xl font-thin">+</span>
  </p>
</div>
  </div>

  <div class="flex justify-between items-center">
    <button type="submit" class="w-full text-sm p-3 flex justify-center items-center font-bold bg-black text-white"><i class="fa-solid fa-plus mr-1"></i><p>Add To Cart</p></button>
    <?php 
// change these values to match your product 
$productName = $name; 
$productImage = "https://sheyoncefashion.store/assets/images/products/".$prod_img[0]; 
$phoneNumber = "971508322923"; 
$messageURL = "https://wa.me/{$phoneNumber}?text=Hi!,%20I%20will%20like%20to%20buy%20{$name}%20Priced%20at%20{$currency} ".number_format($price,1)."%0A%0Aimage:%0A{$productImage}"; 
 
// output the WhatsApp share button with the product image 
echo "<a href='{$messageURL}' target='_blank'><img src='{$productImage}' alt='{$productName}' class='w-full text-sm p-3 flex justify-center items-center font-bold bg-red-500 text-white'><p>Buy on</p><i class='fa-brands fa-whatsapp ml-2'></i></a>"; 
?>
  </div>
</form> 
</div>
      </div>
      </div>

<!-- PRODUCT DETAILS -->
<div class="w-full lg:w-1/2 lg:pt-8">
<!-- CATEGORY NAME -->
<div class="cat_name w-full flex justify-between items-center px-4">
    <div class="font-bold text-2xl"><h2>Others you might like</h2></div>
    <div>
        <a href="shop" class="flex justify-center items-center font-bold">
            <p>More</p>
            <i class="fa-solid fa-chevron-right text-sm ml-1 font-extrabold "></i>
        </a>
    </div>
</div>

<!-- Recommended -->
<!-- <div class="cats w-full flex  overflow-x-scroll overflow-y-hidden flex-row  p-4 mb-2 mt-8 border-8 border-red-500 "> -->
<div class="cats w-full grid grid-flow-col auto-cols-max gap-4  overflow-x-scroll overflow-y-hidden  p-4 mb-2 mt-8">
<?php
$sql = "SELECT * FROM products_list WHERE product_category=$category order by rand() limit 0,5 ";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
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


<?php
} } else{
  echo ' No products';
}
    ?>
  
  </div>
<!-- Recommded -->
</div>
</div>


<!-- FOOTER -->

<?php
include 'partials/footer.php';
?>
</div>
<script src="assets/js/slider.js"></script>

<script>
  // Select increment and decrement buttons
const incrementCount = document.getElementById("increment-count");
const decrementCount = document.getElementById("decrement-count");

// Select total count
const totalCount = document.getElementById("total-count");

// Display initial count value
var count = Number(totalCount.value);

// Function to increment count
const handleIncrement = () => {
   count++;
   totalCount.value=count;
};

// Function to decrement count
const handleDecrement = () => {
 
 if(count==1){
  totalCount.value=1;
 }else{
  count--;
  totalCount.value=count;
 }
};

// Add click event to buttons
incrementCount.addEventListener("click", handleIncrement);
decrementCount.addEventListener("click", handleDecrement);
</script>
</body>
</html>