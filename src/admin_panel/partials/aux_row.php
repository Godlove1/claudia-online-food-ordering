
<?php
if($sort_cat != 0 ){
    $prid=$sort_cat;
$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list` WHERE best_or_new=$prid ");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
//Create a SQL Query to Get all the Food
$sql = "SELECT * FROM products_list WHERE best_or_new=$prid  order by product_code DESC LIMIT $offset, $total_records_per_page";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have foods or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
$sn=1;
if($count>0){
while($row=mysqli_fetch_assoc($res))
{//get the values from individual columns
    $id = $row['product_code'];
    $price = $row['product_price'];
    // $title = $row['product_name'];
    $prod_imgs = $row['product_image'];
    $availability = $row['available'];
    $prod_img =explode(",",$prod_imgs);

    ?>
    <!--template-->
    <tr>
  
                      <td class="w-10">
                      <?php echo $sn++; ?>
                      </td>
  
                      <td class="w-20">
                      <?php
                 //CHeck whether we have image or not
                    if($prod_imgs==""){
  //WE do not have image, DIslpay Error Message
  echo "<div class='text-red-500'>Image not Added.</div>";
  }else{
  //WE Have Image, Display Image
  ?>
   <img src="../assets/images/products/<?php echo $prod_img[0] ?>" alt="prods" class="object-cover h-[80px] ">
  <?php } ?>
  
                      </td>
  
                     
                       <td class="w-20">
                       <?php echo number_format($price,0); ?><span class="">F</span>
                      </td>
  
                      <td class="w-20">
  <a href="update-prod?id=<?php echo $id; ?>" class="w-full text-center rounded bg-green-500 hover:bg-green-700 p-2 "><i class="fa-solid fa-pen-to-square text-xl text-white"></i></a>
  <a href="delete?id=<?php echo $id; ?>&images=<?php echo $prod_imgs; ?>" class=" w-full text-center rounded bg-red-500 hover:bg-red-700 p-2"><i class="fa-solid fa-trash-can text-xl text-white"></i></a>
                      </td>
  
                  </tr>
                  <!--template-->

                <?php
      }      }else{
            echo '';
        }
             }else{
$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list` WHERE available=0");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
//Create a SQL Query to Get all the Food
$sql = "SELECT * FROM `products_list` WHERE available=0";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have foods or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
$sn=1;
if($count>0){
while($row=mysqli_fetch_assoc($res))
{//get the values from individual columns
    $id = $row['product_code'];
    $price = $row['product_price'];
    // $title = $row['product_name'];
    $prod_imgs = $row['product_image'];
     $availability = $row['available'];
    $prod_img =explode(",",$prod_imgs);

    ?>
    <!--template-->
    <tr>
  
                      <td class="w-10">
                      <?php echo $sn++; ?>
                      </td>
  
                      <td class="w-20">
                      <?php
                 //CHeck whether we have image or not
                    if($prod_imgs==""){
  //WE do not have image, DIslpay Error Message
  echo "<div class='text-red-500'>Image not Added.</div>";
  }else{
  //WE Have Image, Display Image
  ?>
   <img src="../assets/images/products/<?php echo $prod_img[0] ?>" alt="prods" class="object-cover h-[80px] ">
  <?php } ?>
  
                      </td>
  
                     
                       <td class="w-20">
                       <?php echo number_format($price,0); ?><span class="">F</span>
                      </td>
  
                      <td class="w-20">
  <a href="update-prod?id=<?php echo $id; ?>" class="w-full text-center rounded bg-green-500 hover:bg-green-700 p-2 "><i class="fa-solid fa-pen-to-square text-xl text-white"></i></a>
  <a href="delete?id=<?php echo $id; ?>&images=<?php echo $prod_imgs; ?>" class=" w-full text-center rounded bg-red-500 hover:bg-red-700 p-2"><i class="fa-solid fa-trash-can text-xl text-white"></i></a>
                      </td>
  
                  </tr>
                  <!--template-->

                <?php
      }       }else{
        echo '';
    }
}

                    ?>
