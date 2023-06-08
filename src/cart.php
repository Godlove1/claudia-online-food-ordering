
<!-- HEADER -->
<?php include 'partials/header.php';?>
<!-- HEADER -->


<!-- show the cart here -->
<div class="h2 w-full flex justify-center items-center mt-8 font-extrabold text-xl">
  <h3>Your Shopping Cart</h3>
</div>
<div id="bv">
<div class="show__cart mb-12 p-4  flex justify-center items-center" id="cart-data" >

<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
	$cart_box = ' <div class="cart w-full flex flex-col">
	<div class="cart__table cart-table w-full  flex justify-center items-center" id="cart-data">
		<table class="w-full lg:w-1/2 cart-table__table break-words">
			<thead class="w-full cart-table__head">
				<tr class="cart-table__row">
				<th class="p-2 bg-red-500 text-white">Qty</th>
					<th class="p-1 border bg-black text-sm text-white">Name</th>
					<th class="p-1 border bg-black text-sm text-white">Price</th>
				</tr>
			</thead>
	<tbody class="cart-table__body">
	';
	$total = 0;
	$pnames='';
	foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

		//set variables to use them in HTML content below
		$product_name = $product["product_name"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		$product_qty = $product["product_qty"];

		$item_price = number_format($product_price * $product_qty,0);
 
$cart_box.='<tr class="cart-table__row">
<td class="p-1 tex-sm text-center border border-black"> '. $product_qty.'</td>
<td class="p-1 tex-sm text-center border border-black"> '.$product_name.'</td>
<td class="p-1 tex-sm text-center border border-black">'.$currency.number_format($product_price * $product_qty,1).'</td>
</tr>';
$pnames.="%0AQty:".$product_qty.", Size:".$product_name.", Item_Name:".$product_name.", Price:"."$currency$item_price%0A";

		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
		$gt=number_format($total,0);
	}
	$cart_box .= '
	</tbody>
	</table>
	</div>
	<div class="w-full flex flex-col justify-center items-center my-4">
	<p>Total : <span class="font-bold">'.$gt." ".$currency.'</span></p>
	<p>Min.Delivery Fee : <span class="font-bold">'.$shipping_cost." ".$currency.'</span></p>
	</div>
   ';
	$cart_box .="<div class='w-full flex justify-center items-center p-2 mt-12'>
 <div class='bg-green-500 shadow-lg text-white p-2 flex justify-center items-center text-xl font-bold  hover:bg-white hover:text-green-500 hover:border-green-500 border transition-all duration-300 ease-in'>
 <a target='_blank' href='https://wa.me/971508322923?text=Hi!,%20I%20will%20like%20to%20buy:%0A$pnames%0ATotal::%20$currency$gt%0A' class=\"checkout price \" >Check out via whatsapp</a><i class=\"fa-brands fa-whatsapp ml-2\"></i>
 </div>
  </div>
  </div>";
	 

	echo $cart_box;
}else{
	echo "Cart is empty";
}
?>
</div>
</div>



<!-- FOOTER -->
<?php include 'partials/footer.php';?>

  </body>
  </html>