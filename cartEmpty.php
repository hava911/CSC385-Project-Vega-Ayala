<?php require_once("header.html"); 
session_start();
session_destroy(); ?>
<div class="container">

<link rel="stylesheet" type="text/css" href="assets/css/cart.css">       
    
<h3 class="myorder">My Order</h3>
<button class="addmore" onclick="location.href='view.php'">Add More Items</button>
<div class="cart">

	<form id='checkout' method='post' action='checkout.php'>
		<table class="tablecart">
			<tbody>
    				<tr>  

							<h3>Shopping Cart is Empty - please add items!</h3>
				
				</tr>
		





			</tbody>
		</table>
	</form>
	
	
<br><br>

Subtotal:<br>
Tax:<br>
Total:<br>

<br>
<!-- Make loop to go through every item in order and display it here -->

<button class="checkout">Check Out</button>
<button type="button" class="clear" onclick="cartEmpty.php';">Clear Cart</button>
</div>
</div>


<?php require_once("footer.html"); ?>
