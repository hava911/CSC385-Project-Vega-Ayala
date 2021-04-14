<?php require_once("header.html"); 

session_start(); ?>
<div class="container">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<link rel="stylesheet" type="text/css" href="assets/css/cart.css">

<?php include("cartA.js"); ?> 



<h3 class="myorder">My Cart</h3>
<button class="addmore" onclick="location.href='view.php'">Add More Items</button>
<div class="cart">

<form id='checkout' method='post' action='checkout.php'>
<table class="tablecart">

<?php 
$subtotal = 0;
$SProName = "";
$SProName = isset($_SESSION['Product_Name']) ? $_SESSION['Product_Name'] : '';
$PProName = "";
$PProName = isset($_POST['Product_Name']) ? $_POST['Product_Name'] : '';

//checking if there are any objects in the cart
if($SProName == "" && $PProName == ""){
	echo"<h3>Shopping Cart is Empty - please add items!</h3>";
}
else { 
	echo"<tbody>";
	echo"<thead>";
	echo"<td></td>";
	echo"	<td>Item</td>";
	echo"	<td>Size</td>";
	echo"	<td>Quantity</td>";
	echo"	<td>Item Price</td>";
	echo"	<td>Notes</td>";
	echo" <td></td>";
	echo"</thead>";
	echo"<tr> ";
	//sets s to 1			
	$s = count($SProName);
	

	
	//if Post is empty, a = 1
	if ($PProName == ""){
		$a=$s;
	}
	//if post isn't empty, a = 
	else{
		$a = $s + count($PProName);
		if($SProName == "") $a--;
	}

	for($r=0; $r < $a; $r++) {
		
		//if Post is not empty
		if($_POST['Product_Name'][0]!=""){
			for($x=0; $x < $s; $x++){
				//Checking for same names. If same names, just add quantity, dont make new item.
				//Need to check for same size, otherwise new item
			
				
				if(isset($_POST['Product_Name'][$r]) == false){
					break;
				}
				elseif(($_POST['Product_Name'][$r] == $_SESSION['Product_Name'][$x]) &&  ($_POST['size'][$r] == $_SESSION['size'][$x]) &&  ($_POST['notes'][$r] == $_SESSION['notes'][$x])){
					$_SESSION['qty'][$x] +=$_POST['qty'][$r];
					$a--;
				}
				else{
					if($SProName == ""){
						$_SESSION['Product_Name'][$r] = $_POST['Product_Name'][$r];
						$_SESSION['size'][$r]= $_POST['size'][$r];
						
						$_SESSION['price'][$r]= $_POST['price'][$r];
						$_SESSION['qty'][$r]= $_POST['qty'][$r];
						$_SESSION['notes'][$r]= $_POST['notes'][$r];
					}
					else {
						$_SESSION['Product_Name'][($r+$s)] = $_POST['Product_Name'][$r];
						$_SESSION['size'][($r+$s)]= $_POST['size'][$r];

						$_SESSION['price'][$r+$s]= $_POST['price'][$r];
						$_SESSION['qty'][($r+$s)]= $_POST['qty'][$r];
						$_SESSION['notes'][($r+$s)]= $_POST['notes'][$r];
					}
					
				}
			}
		}
		echo "      <tr>\n";
		$Price= "";
		$Price= isset($_SESSION['price'][$r]) ? $_SESSION['price'][$r] : '';
		$Pname = $_SESSION['Product_Name'][$r];
		$Quantity= $_SESSION['qty'][$r];
		$Notes= $_SESSION['notes'][$r];
		$Size = $_SESSION['size'][$r];
		
		if($Price == 0){
			$db = mysqli_connect('localhost','hv18624_shirts','Reading@10','hv18624_shirts');
			$query="SELECT * FROM Products WHERE productName = '$Pname'";
			$result = $db->query($query);
			if ($result){
				$queryres= $result->fetch_assoc();
				
				$Picture = $queryres['Picture'];
				
				echo '	<style> ';
				echo '	.'.$Picture.' { background-image: url("assets/images/'.$Picture.'");} ';
				echo '	</style> ';
				
				
				if($Size == "small"){
					$Price = $queryres["priceReg"];
				}
				else if($Size == "medium"){
					$Price = $queryres["priceReg"];
				}
				else if($Size == "large"){
					$Price = $queryres["priceReg"];
				}
				else if($Size == "xLarge"){
					$Price = $queryres["priceXlarge"];
				}
				
			}
		}
		
		
		
		$Price = number_format($Price,2);
		$subtotal += $Quantity*$Price;
		
		

		echo" <td class='img'><div class='frontLogo ".$Picture." bookBgImg'</div></td>\n";
		echo" <td class='prodname'>$Pname<input type = 'hidden' name = 'Product Name[]' value ='$Pname' /></td>\n";
		echo" <td class='prodname'>$Size<input type = 'hidden' name = 'size[]' value ='$Size' /></td>\n";
		echo" <td class='quantity'>$Quantity<input type = 'hidden' name = 'qty[]' value ='$Quantity' /></td>\n";
		echo" <td class='price'>$Price<input type = 'hidden' name = 'Price[]' value ='Price' /></td>\n";
		echo" <td class='notes'>$Notes<input type = 'hidden' name = 'notes[]' value ='$Notes' /></td>\n";
		echo" <td class='prodname'></td>";
		echo"  </tr>\n";
	}
	
}		

echo" </tr>";






echo" </tbody>";
echo" </table>";



echo"<br><br>";
$subtotal = number_format($subtotal,2);
$tax = $subtotal * .06;
$tax = number_format($tax,2);
$total = $subtotal + $tax;
$total = number_format($total,2);
$_SESSION['Total'] = $total;
echo"<table>";
echo"<tr>";
echo"<td class ='total'> Order Sub-Total:</td><td>$subtotal</td>";
echo"</tr>";
echo"<tr>";
echo"<td class ='total'> Tax: </td> <td>$tax</td>";
echo"</tr>";
echo"<tr>";
echo"<td class ='total'> Order Total: </td> <td>$total</td> ";
echo"</tr>";
echo"</table><br>";
?>




<label for="delivery" ><i></i> Delivery</label>
<input type="radio" id="delivery" value="delivery"  name="saleType[]" onclick="getLocation()" required>
<label for="pickup"><i></i> Pickup</label>
<input type="radio" id="pickup" value="pickup" name="saleType[]"> 


<br><br>

<label for="deliAdd" id="deliAdd" style="display:none;"><i></i> Customer Information </label>
<input type="radio" id="myBtn2" value="deliAdd" name="deliAdd[]" style="display:none;"> 

<div id="myModal2" class="modal">
<div class="modal-content">
<span class="close2">&times;</span>
<?php include("info.html"); ?>
</div>
</div>



<label for="card"><i></i> Click To Pay </label>
<input type="radio" id="myBtn" value="card" name="paymentType[]"> <br><br>


<div id="myModal" class="modal">
<div class="modal-content">
<span class="close">&times;</span>
<p>Pay Here.</p>
<div id="paypal-button-container"></div>
</div>
</div>


 <?php include("cartB.js"); ?> 


<br><br>
<button class="checkout" type='submit' value="checkout" name="checkout">Check Out</button>
<button type ="button" class="clear" onclick="location.href='cartEmpty.php';">Clear Cart</button>
</form>
</div>
</div>


<?php require_once("footer.html"); ?>
