<?php


$db = mysqli_connect('localhost','hv18624_shirts','Reading@10','hv18624_shirts');
$errmsg = $db->connect_error ;
if ($errmsg != null) echo "Error: $errmsg" ;
else
  {


$query="SELECT * FROM Products WHERE Stock = 'Y' " ;
 $res = $db->query($query);

 if ($res)
{

require_once("header.html");  
         
      echo '      <div class="container"> ';
      echo '<form action="stockMod.php" method="post"> ';
      echo '<label>Product:';
    echo '<select name="product">';
    echo '<option value="">Select One</option>';   

while($row = mysqli_fetch_assoc($res))
{

		
        $name = $row['productName'];
        echo '<option  name="product"  value="' .$name. '">' .$name. '</option>';
  
}

     echo '</select>';
     echo '</label>';
     echo '	<button name="stockMod" type="submit">Click to remove selected item from stock.</button> ';
     echo  ' </form> ';
}

$db->close();

}


?>
