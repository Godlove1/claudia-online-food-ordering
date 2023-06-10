<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// header
include 'partials/header-add.php';
// varibale for filter
@$cat=$_GET['cat'];

// pagination
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 25;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

?>
<!-- successfull login -->
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_GET['cat'])){
                    $active_cat =$_GET['cat']; 
            }
            ?>
<!-- successfull login -->

    <!-- stats -->
    <div class="stats mt-4 w-full flex flex-wrap p-4 lg:pt-9">
        <div class="stat hover:shadow-none <?php if($active_cat && $active_cat !== "Home"){ echo 'hover:bg-teal-500 hover:text-white';}else{echo ' bg-teal-500 text-white';} ?> flex text-sm transition-all ease-in-out p-2 border ">
        <a href="index?cat=Home" class="text-sm flex">
            <h1 class="font-bold">
            (<?php
                        //Sql Query
    $sql1 = "SELECT * FROM products_list";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?>)
            </h1>
            <p>Total dishes</p>
            </a>
        </div>

        <?php
$get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>
<!--  dynamically -->
<div class="stat hover:shadow-none <?php if($active_cat == $cid){ echo 'bg-teal-500 text-white';}else{ echo 'hover:bg-teal-500 hover:text-white ';} ?> flex text-sm transition-all ease-in-out  p-2 border">
        <a href="index?cat=<?php echo $cid; ?>" class="text-sm flex">
            <h1 class="font-bold">
            (<?php
                        //Sql Query
    $sql1 = "SELECT * FROM products_list WHERE product_category=$cid";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                      
                            echo $count1;
                    
                    ?>)
                    </h1>
                    <p><?php  echo ucwords($cname);?></p>
                    </a>
                </div>
        <!--  dynamically -->
    <?php
 } 
      ?>

            </div>

   

    <!-- filter -->
<div class="filter my-4 px-2 w-full flex justify-around items-center lg:px-[100px]">
 <!-- add button -->
 <div class="my-4 add__btn flex justify-around items-center " >
 <a href="add" class="text-white bg-teal-500 p-2 rounded-sm font-semibold"><span>Add Food</span><i class="fa-solid fa-plus ml-2"></i></a>
    </div>

<form  method="post" action="aux_cat" onchange="submit()" >
    <select name='other_cat' class="text-center border-2 border-gray-500 rounded-md p-2 ">
        <option value="Default sorting">--Select--</option>
        <option value="0">Unavailable</option>
        <option value="1">On Promo</option>
        <!-- <option value="2">Best Sellers</option> -->
    </select>
</form>
</div>
</div>

<!-- table of products/customers -->

<section class=" w-full flex justify-center items-center ">
   <div class="w-full px-2 lg:w-1/2 ">

     <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

                               <!--template-->
                               <?php include 'partials/trow.php'; ?>
                        <!--template-->

            </tbody>
        </table>
    </div>
</section>


<!-- footer -->
<?php include 'partials/footer.php'; ?>