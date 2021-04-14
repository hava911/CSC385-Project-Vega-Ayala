<?php

	
	
	if (isset($_POST['stockMod'])){
		
			
			$db = mysqli_connect('localhost','hv18624_shirt','Reading@10','hv18624_shirt');

			$errmsg = $db->connect_error ;
			if ($errmsg != null) echo "Error: $errmsg" ;
			else
			  {
			
			$query = "UPDATE Products SET Stock = 'Y' Where productName = '".$_POST['product']."' ";
			
			$res = $db->query($query);
			
			
			if ($res) {
        header('Location: successIn.php');
    } else {
        die("<strong>Error ".mysql_error()."</strong>");
    }
			
	
		
	
	}
	}
	
	
	    // Close connection
    	$db->close();
    	
	
?>
