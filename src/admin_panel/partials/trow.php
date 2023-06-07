
<?php
if(isset($_GET['cat']) && strlen($_GET['cat'])<3){
    $prid=$_GET['cat'];
$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list` WHERE product_category=$prid ");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
//Create a SQL Query to Get all the Food
$sql = "SELECT * FROM products_list WHERE product_category=$prid  order by product_code DESC LIMIT $offset, $total_records_per_page";
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
    $title = $row['product_name'];
    $prod_imgs = $row['product_image'];
    $availability = $row['available'];
    $prod_img =explode(",",$prod_imgs);

    ?>
  <!--template-->
  <tr class="bg-white whitespace-nowrap font-medium  border-b">

                    <td class="px-2 py-4 ">
                    <?php echo $sn++; ?>
                    </td>

                    <td>
                    <?php
               //CHeck whether we have image or not
                  if($prod_imgs==""){
//WE do not have image, DIslpay Error Message
echo "<div class='text-red-500'>Image not Added.</div>";
}else{
//WE Have Image, Display Image
?>
 <img src="../assets/images/products/<?php echo $prod_img[0] ?>" alt="prods" class="object-cover h-[50px] w-[50px]">
<?php } ?>

                    </td>

                    <td class="px-2 py-4">
                    <?php echo substr(ucfirst($title),0,30); ?>
                    </td>

                     <td class="px-2 py-4 text-center">
                     <?php echo number_format($price,0); ?><span class="text-xs">F</span>
                    </td>

                    <td class="px-2 py-4 flex text-white">
<a href="update-prod?id=<?php echo $id; ?>" class="w-full text-center rounded bg-green-500 hover:bg-green-700 mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
<a href="delete?id=<?php echo $id; ?>&images=<?php echo $prod_imgs; ?>" class=" w-full text-center rounded bg-red-500 hover:bg-red-700"><i class="fa-solid fa-trash-can"></i></a>
                    </td>

                </tr>
                <!--template-->

                <?php
      }      }else{
            echo ' <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
            <p>No products Available. Add more</p>
          </div>';
        }
             }else{
$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `products_list`");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
//Create a SQL Query to Get all the Food
$sql = "SELECT * FROM products_list order by product_code DESC  LIMIT $offset, $total_records_per_page";
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
    $title = $row['product_name'];
    $prod_imgs = $row['product_image'];
     $availability = $row['available'];
    $prod_img =explode(",",$prod_imgs);

    ?>
  <!--template-->
  <tr class="bg-white whitespace-nowrap font-medium  border-b">

                    <td class="px-2 py-4 ">
                    <?php echo $sn++; ?>
                    </td>

                    <td>
                    <?php
               //CHeck whether we have image or not
                  if($prod_imgs==""){
//WE do not have image, DIslpay Error Message
echo "<div class='text-red-500'>Image not Added.</div>";
}else{
//WE Have Image, Display Image
?>
 <img src="../assets/images/products/<?php echo $prod_img[0] ?>" alt="prods" class="object-cover h-[50px] w-[50px]">
<?php } ?>

                    </td>

                    <td class="px-2 py-4">
                    <?php echo substr(ucfirst($title),0,30); ?>
                    </td>

                     <td class="px-2 py-4 text-center">
                     <?php echo number_format($price,0); ?><span class="text-xs">F</span>
                    </td>

                    <td class="px-2 py-4 flex text-white">
<a href="update-prod?id=<?php echo $id; ?>" class="w-full text-center rounded bg-green-500 hover:bg-green-700 mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
<a href="delete?id=<?php echo $id; ?>&images=<?php echo $prod_imgs; ?>" class=" w-full text-center rounded bg-red-500 hover:bg-red-700"><i class="fa-solid fa-trash-can"></i></a>
                    </td>

                </tr>
                <!--template-->

                <?php
      }       }else{
        echo ' <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
        <p>No products Available. Add more</p>
      </div>';
    }
}

                    ?>
