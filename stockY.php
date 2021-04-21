

<?php


$db = mysqli_connect('localhost','hv18624_shirts','Reading@10','hv18624_shirts');
$errmsg = $db->connect_error ;
if ($errmsg != null) echo "Error: $errmsg" ;
else
  {


$query="SELECT * FROM Products WHERE Stock = 'N' " ;
 $res = $db->query($query);

 if ($res)
{

require_once("header.html");  
         
      echo '      <div class="container"> ';
      echo '<form action="stockModY.php" method="post"> ';
      echo '<label>Product:';
    echo '<select name="product">';
      echo '<option>Select One</option>';

while($row = mysqli_fetch_assoc($res))
{

        $name = $row['productName'];
        echo '<option  name="product"  value="' .$name. '">' .$name. '</option>';
  
}

     echo '</select>';
     echo '</label>';
     echo '	<button name="stockMod" type="submit">Click to add selected item back in stock.</button> ';
     echo  ' </form> ';
}

$db->close();

}


?>
