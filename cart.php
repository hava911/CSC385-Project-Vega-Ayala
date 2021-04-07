<?php require_once("header.html"); 

session_start(); ?>
<div class="container">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<link rel="stylesheet" type="text/css" href="assets/css/cart.css">


<script async
    src="https://maps.googleapis.com/maps/api/js?key=[KEY]&libraries=geometry&callback=initMap">
</script>

<script
    src="https://www.paypal.com/sdk/js?client-id=ATcW4C7pZtV2cOoRXQhACJRokFalEqNqt3LHU2URi46DubMjfD7n5GWSY6Ile_B3lZIzXLDADGWo17v4"> ;
  </script>

<script> 
    
    var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
 
  
 var latitude1 = position.coords.latitude;
var longitude1 = position.coords.longitude;
var latitude2 = 40.5105;
var longitude2 = -75.7830 ;

var TotalDistanceInMeters= google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));
 var miles = TotalDistanceInMeters / 1609 ;
  console.log(miles);
  
  if(miles < 10){
  
  alert("Success");
  }
  else {
  alert("Cannot deliver to your location. We are currenly delivering to places within a 10 mile radius from our shop. Please Select Pickup.");
  document.querySelector('input[id="delivery"]:checked').checked = false;
  }
  }
  </script>


  
 
    
<h3 class="myorder">My Order</h3>
<button class="addmore" onclick="location.href='view.php';">Add More Items</button>
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
                                            //Could possibly just check item in database eventually
                                            
                                        if(isset($_POST['Product_Name'][$r]) == false){
                                        break;
                                        }
                                        elseif(($_POST['Product_Name'][$r] == $_SESSION['Product_Name'][$x]) &&  ($_POST['size'][$r] == $_SESSION['size'][$x])  && ($_POST['notes'][$r] == $_SESSION['notes'][$x])){
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
					$db = mysqli_connect('localhost','hv18624_pizzapal','Reading@10','hv18624_pizzapal');
					$query="SELECT * FROM MenuItem WHERE ItemName = '$Pname'";
					$result = $db->query($query);
					if ($result){
						$queryres= $result->fetch_assoc();
						$Picture = $queryres['Picture'];
						if($Size == "small"){
						$Price = $queryres["PriceS"];
						}
						else if($Size == "medium"){
						$Price = $queryres["PriceM"];
						}
						else if($Size == "large"){
						$Price = $queryres["PriceL"];
						}
						
					}
				}
				else{
				$Picture = "Custom";
				}
				
                                if($Crust == "deep") $Price += 2;

				$Price = number_format($Price,2);
				$subtotal += $Quantity*$Price;
				

                                echo" <td class='img'><div class='frontLogo . $Picture . bookBgImg'</div></td>\n";
                                echo" <td class='prodname'>$Pname<input type = 'hidden' name = 'Product Name[]' value ='$Pname' /></td>\n";
                                echo" <td class='prodname'>$Size<input type = 'hidden' name = 'size[]' value ='$Size' /></td>\n";
                                echo" <td class='quantity'>$Quantity<input type = 'hidden' name = 'qty[]' value ='$Quantity' /></td>\n";
                                echo" <td class='price'>$Price<input type = 'hidden' name = 'Price[]' value ='Price' /></td>\n";
                                echo" <input type = 'hidden' name = 'crust[]' value ='crust' />";
                                echo" <td class='notes'>$Notes<input type = 'hidden' name = 'notes[]' value ='$Notes' /></td>\n";
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
<input type="radio" id="delivery" name="method[]" onclick="getLocation()" required>
    <label for="pickup"><i></i> Pickup</label>
<input type="radio" id="pickup" name="method[]"> 


<br><br>
 
 
  <label for="cash" ><i></i> Cash</label>
<input type="radio" id="cash" name="payment[]" required>
 <label for="card"><i></i> Card </label>
<input type="radio" id="myBtn" name="payment[]"> <br><br>


<div id="myModal" class="modal">

  
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Pay Here.</p>
    <div id="paypal-button-container"></div>
   
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: "<?php echo"$total"?>"
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>



<br><br>
<button class="checkout" input type='submit' value='Checkout'>Check Out</button>
<button type ="button" class="clear" onclick="location.href='cartEmpty.php';">Clear Cart</button>
</form>
</div>
</div>


<?php req
