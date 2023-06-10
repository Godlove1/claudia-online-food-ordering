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

   <!-- back btn -->
  <div class="m-4">
  <a href="index" class="w-auto p-1 bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>
  </div>

    <!-- add button -->
    <div class="my-4 add__btn w-full flex justify-around items-center " >
 <p class="text-white bg-teal-500 p-2 "><span>Showing 
    <?php
if($sort_cat == 0){
    echo 'Unavailable dishes';
}elseif($sort_cat == 1){
    echo 'Food on Promo';
}else{
    echo 'Best Sells';
}

?>

 </span></p>

    </div>

    <!-- filter -->
<div class="filter  mt-12 mb-4 px-2 w-full flex justify-center items-center lg:px-[100px]">

<form  method="post" action="aux_cat" onchange="submit()" >
    <select name='other_cat' class="text-center border-2 border-gray-500 rounded-md p-1">
        <option value="Default sorting">--select--</option>
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
                               <?php include 'partials/aux_row.php'; ?>
                        <!--template-->

            </tbody>
        </table>
    </div>
</section>



<!-- footer -->
<?php include 'partials/footer.php'; ?>