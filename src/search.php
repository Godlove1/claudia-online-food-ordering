
<!-- HEADER -->
<?php 
include 'config/config.inc.php';
include 'partials/header.php';

//Get the Search Keyword
$search = mysqli_real_escape_string($conn,strip_tags(stripcslashes($_POST['search'])));

?>

<!-- display prdoucts -->

<?php 
  $sql = "SELECT * FROM products_list  WHERE product_name LIKE '%$search%'";
  //Execute the qUery
  $res = mysqli_query($conn, $sql);
  //Count Rows to check whether we have items or not
  $count = mysqli_num_rows($res);
  
  if($count>0){
?>
<div class="cats w-full grid grid-cols-2 gap-4 lg:grid-cols-6 p-4 my-2">
<?php
  while($row=mysqli_fetch_assoc($res)){
    $prod_id=$row["product_code"];
    $name=$row["product_name"];
    $prod_imgs=$row["product_image"];
    $price= $row["product_price"];
    $pprice= $row["product_pprice"];
    $prod_img =explode(",",$prod_imgs);
    $promo=$row["promo"];
                             ?>
                             <!--template-->
                             <?php
    include 'partials/fet.php';
    ?>
                      <!--template-->
  </div>
                      <?php

                }    }else{
                    echo ' 
                    <div class="card w-full h-[200px] flex justify-center items-center flex-col capitalize bg-teal-500 p-6 text-white font-bold">
                    <p>'.$search.' is not yet Available.</p>
                    <p><a href="shop" class="underline fony-bold">goto shop</a> for similar products</p>
                  </div>';
                }
                    
                ?>

       



<!-- FOOTER -->
<?php include 'partials/footer.php';?>
<!-- FOOTER -->
  </body>
  </html>