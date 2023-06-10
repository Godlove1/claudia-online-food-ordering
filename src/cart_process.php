<?php
include_once("config/config.inc.php"); //include config file

if(isset($_POST["product_code"])){

	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
	}

	//we need to get product name and price from database.
	$statement = $db->prepare("SELECT product_name, product_price FROM products_list WHERE product_code=? LIMIT 1");
	$statement->bind_param('i', $new_product['product_code']);
	$statement->execute();
	$statement->bind_result($product_name, $product_price);


	while($statement->fetch()){
		$new_product["product_name"] = $product_name; //fetch product name from database
		$new_product["product_price"] = $product_price;  //fetch product price from database

		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['product_code']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['product_code']]); //unset old item
			}
		}

		$_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array
	}

 	$total_items = count($_SESSION["products"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json

}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1){
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = ' <div class="cart"  id="bv">
		<div class="cart__table cart-table w-full flex justify-center items-center" id="cart-data">
			<table class="w-full cart-table__table break-words">
				<thead class="w-full cart-table__head">
					<tr class="cart-table__row">
					<th class="p-2 bg-red-500 text-white">Qty</th>
					<th class="p-1 border bg-black text-sm text-white">Name</th>
					<th class="p-1 border bg-black text-sm text-white">Price</th>
					<th class="p-1 border bg-black text-sm text-white">Action</th>
					</tr>
				</thead>
		<tbody class="cart-table__body">
		';
		$total = 0;
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

			//set variables to use them in HTML content below
			$product_name = $product["product_name"];
			$promo_price = $product["promo_price"];
			$product_code = $product["product_code"];
			$product_qty = $product["product_qty"];
			$promo = $product['status'];

			if($promo == 0){
				$product_price = $product["product_price"];
			}else{
				$product_price = $promo_price;
			}

$cart_box.='<tr class="cart-table__row">
<td class="p-1 tex-sm text-center border border-black"> '. $product_qty.'</td>
<td class="p-1 tex-sm text-center border border-black"><a class="underline " href="product?'.$product_name.'&hair_key='.$product_code.'">'.$product_name.'</a></td>
<td class="p-1 tex-sm text-center border border-black">'.$currency.number_format($product_price * $product_qty,1).'</td>
<td class="p-1 tex-sm text-center border border-black">
<a href="#" class="remove-item" data-code="'.$product_code.'">
<i class="fa-solid fa-trash ml-2 text-red-500 hvr-buzz">
</i></a>
</td>
</tr>';

			$subtotal = ($product_price * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= '
		</tbody>
		</table>
		</div>

	</div>
	   ';
		$cart_box .= '<div class="mt-4 name cart-products-total w-full flex justify-end items-center">Total : <span class="hvr-shutter-out-horizontal cursor-pointer ml-2 font-bold hover:bg-red-500  border px-2">'.$currency.number_format($total,1).'</span> <a href="cart" title="Review Cart and Check-Out" class="hvr-radial-out ml-4 bg-red-500 text-white  p-1 transition-all ease-in-out">Check-out<i class="fa-solid fa-cash-register ml-2 "></i></a></div>';
		die($cart_box); //exit and output content
	}else{
		die("<p class='w-full text-center my-4'>Your Cart is empty</p"); //we have empty cart
	}
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["products"][$product_code]))
	{
		unset($_SESSION["products"][$product_code]);
	}

 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}

?>