<!--
Project: Clothing E-Commerce Website
Professor: Dr. Schwesinger
Class: CSC 385
File Name: combo.php
Purpose: To display all the combo products and categories as well to sort through it.
--> 

<?php


$db = mysqli_connect('localhost','hv18624_shirts','Reading@10','hv18624_shirts');
$errmsg = $db->connect_error ;
if ($errmsg != null) echo "Error: $errmsg" ;
else
  {


$query="SELECT * FROM Products WHERE productCategory = 'Combo' ";
 $res = $db->query($query);

 if ($res)
{

require_once("header.html");  

     echo '   <link rel="stylesheet" type="text/css" href="assets/css/slide.css"> ';
            
      echo '      <div class="container"> ';
               
               require_once("categories.html"); 
               
       echo '        <h1> Shirts </h1> ';



while($row = mysqli_fetch_assoc($res))
{

		
		include("flipFirstLine.html");
		
               echo '     <div class="front"> ';
               echo '     <div class="frontTitle"> ' . $row['productName'] .  ' </div> ';
               echo '        <div class="frontLogo ' . $row['picture'] . ' bookBgImg"></div> ';
               echo '         <div class="frontLocation"> ' . $row['description'] . ' </div> ';
               echo '     </div> ';
     
               echo '    <div class="back"> ';
               echo '    <div class="backTitle">'  . $row['productName'] . '</div> ';
               echo '    <div class="backParagraph"> ';
                            
               echo '       <form> ';
                            
               echo '        <input type="radio" id="small" name="size" value="small"> ';
  	       echo '		<label for="small">Small $' . $row['priceReg'] . '.00 </label><br> ';
  	       echo '	     <input type="radio" id="medium" name="size" value="medium"> ';
	       echo '    	<label for="medium">Medium $' . $row['priceReg'] . '.00 </label><br> ';
	       echo '	     <input type="radio" id="large" name="size" value="large"> ';
  	       echo '		<label for="large">Large  $' . $row['priceReg'] . '.00 </label> <br> ';
  	       echo '	     <input type="radio" id="xLarge" name="size" value="xLarge"> ';
  	       echo '		<label for="xLarge"> X Large  $' . $row['priceXlarge'] . '.00 </label> <br> ';
  				
  	       echo '	<label for="line">---------------------------</label> <br> ';	
 		
 	
  		echo '		<label for="qty"><i></i> Quantity</label> ';
                echo '           <input type="number" id="qty" name="qty" placeholder="Quantity"> ';
                echo '         	<label for="notes"><i></i> Notes</label> ';
                echo '           <input type="text" id="notes" name="notes" placeholder="Any notes?"> ';
  				
                echo '    </div> ';
                echo '      <div class="backGoto"> <a href="#" target="_blank" title="..."><h1>Add To Cart</h1></a> </div> ';
                echo '		</form> ';
                echo '    </div> ';
                echo '    </div> ';





}
}

$db->close();

}


require_once("footer.html"); 

?>
