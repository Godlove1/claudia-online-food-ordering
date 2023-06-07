<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';
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


//Get the Search Keyword
$sort_cat =$_POST['other_cat'];

?>
<!-- successfull login -->
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
<!-- successfull login -->

 
    <!-- add button -->
    <div class="my-4 add__btn w-full flex justify-around items-center " >
 <p class="text-white bg-teal-500 p-2 "><span>Showing 
    <?php
if($sort_cat == 0){
    echo 'Unavailable Products';
}elseif($sort_cat == 1){
    echo 'New Arrivals';
}else{
    echo 'Best Sells';
}

?>

 </span></p>

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
                               <?php include 'partials/aux_row.php'; ?>
                        <!--template-->

            </tbody>
        </table>
    </div>
</section>



<!-- pagination -->
<?php include '../page_counter.php';?>


<!-- footer -->
<?php include 'partials/footer.php'; ?>