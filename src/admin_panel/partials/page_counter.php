

<div class="w-full flex justify-center items-center my-8">
    <nav aria-label="Page navigation">
        <ul class="inline-flex">

	
	<li><button class="<?php if($page_no <= 1){ echo "disabled"; } ?> h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 rounded-l-lg focus:shadow-outline hover:bg-teal-100">
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Prev</a></button></li>

    <?php
	if ($total_no_of_pages <= 10){
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li><button class='h-10 px-3 text-white transition-colors duration-150 bg-teal-600 border border-r-0 border-teal-600 hover:bg-teal-100'><a>$counter</a></button></li>";
				}else{
	 echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600'><a href='?page_no=$counter'>$counter</a></button></li>";
				}    
        }
	} elseif($total_no_of_pages > 10){

	if($page_no <= 4) {
	 for ($counter = 1; $counter < 8; $counter++){
			if ($counter == $page_no) {
				echo "<li><button class='h-10 px-3 text-white transition-colors duration-150 bg-teal-600 border border-r-0 border-teal-600 hover:bg-teal-100'><a>$counter</a></button></li>";
			}else{
 echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600'><a href='?page_no=$counter'>$counter</a></button></li>";
			}  
        }
		echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '>...</button></li>";
		echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=$second_last'>$second_last</a></button></li> ";
		echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></button></li> ";

		}elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
	echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=1'>1</a></button></li> ";
	echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=2'>2</a></button></li> ";
	echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a>...</a></button></li> ";
		
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
           if ($counter == $page_no) {
			echo "<li><button class='h-10 px-3 text-white transition-colors duration-150 bg-teal-600 border border-r-0 border-teal-600 hover:bg-teal-100'><a>$counter</a></button></li>";
		}else{
echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600'><a href='?page_no=$counter'>$counter</a></button></li>";
		}  
       }
	   echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '>...</button></li>";
	   echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=$second_last'>$second_last</a></button></li> ";
	   echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></button></li> ";
            }

		else {
			echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=1'>1</a></button></li> ";
			echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=2'>2</a></button></li> ";
			echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a>...</a></button></li> ";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
			echo "<li><button class='h-10 px-3 text-white transition-colors duration-150 bg-teal-600 border border-r-0 border-teal-600 active'><a>$counter</a></button></li>";
		}else{
			echo "<li><button class='h-10 px-3  text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600 '><a href='?page_no=$counter'>$counter</a></button></li>";
		}
                }
            }
	}
?>

	<li><button <?php if($page_no >= $total_no_of_pages){ echo "disabled"; } ?> class=" h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-r-0 border-teal-600  focus:shadow-outline hover:bg-teal-100">
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a></button></li>

    <?php if($page_no < $total_no_of_pages){
		echo "<li><button class='h-10 px-3 text-teal-600 transition-colors duration-150 bg-white border border-teal-600 rounded-r-lg focus:shadow-outline hover:bg-teal-100'><a class='font-bold' href='?page_no=$total_no_of_pages'>Last</a></button></li>";
		} ?>

 </ul>
      </nav>
</div>