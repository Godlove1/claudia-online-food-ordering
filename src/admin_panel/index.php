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
            ?>
<!-- successfull login -->

    <!-- stats -->
    <div class="stats my-4 w-full flex flex-wrap p-4 lg:pt-9">
        <div class="stat hover:shadow-none bg-teal-500 text-white flex text-sm transition-all ease-in-out shadow-md rounded p-2 border m-2">
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
            <p>Total products</p>
            </a>
        </div>

        <?php
$get_cats="SELECT * FROM tbl_category order by id ASC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['cat_name'];
    ?>
<!--  dynamically -->
<div class="stat hover:shadow-none  flex text-sm transition-all ease-in-out shadow-md rounded p-2 border m-2">
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

    <!-- add button -->
    <div class="my-4 add__btn w-full flex justify-around items-center " >
 <a href="add" class="text-white bg-teal-500 p-2 rounded-sm font-semibold"><span>New Product</span><i class="fa-solid fa-plus ml-2"></i></a>
 <!-- <a href="orders" class="text-white bg-teal-500 p-2 rounded-sm font-semibold"><span>Orders</span><i class="fa-solid fa-list mx-4"></i></a> -->
    </div>

    <!-- filter -->
<div class="filter border-b mt-12 mb-4 px-2 w-full flex justify-between items-center lg:px-[100px]">
<p class="text-gray-500">Products Filter</p>

<form  method="post" action="aux_cat" onchange="submit()" >
    <select name='other_cat' class="text-center border rounded-md p-1">
        <option value="Default sorting">--Sub-category--</option>
        <option value="0">Unavailable</option>
        <option value="1">New Arrivals</option>
        <option value="2">Best Sellers</option>
    </select>
</form>
</div>
</div>

<!-- table of products/customers -->

<section class=" w-full  lg:flex justify-center items-center">
   <div class="w-full border-4 overflow-scroll bg-gray-200 lg:w-[80%]">
        <table class="w-full whitespace-nowrap text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
<th scope="col" class="px-2 py-3">S.N</th>
<th scope="col" class="px-2 py-3 ">Image</th>
<th scope="col" class="px-2 py-3 ">Name</th>
<th scope="col" class="px-2 py-3 text-center">Price</th>
<th scope="col" class="px-2 py-3 ">Actions</th>
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



<!-- pagination -->
<?php include '../page_counter.php';?>


<!-- footer -->
<?php include 'partials/footer.php'; ?>