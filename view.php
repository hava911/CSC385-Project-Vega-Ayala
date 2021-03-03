<!--
Project: Clothing E-Commerce Website
Professor: Dr. Schwesinger
Class: CSC 385
File Name: view.php
Purpose: To display all the products and categories as well to sort through it.
-->

<?php require_once("header.html"); ?> 

        <link rel="stylesheet" type="text/css" href="assets/css/slide.css">
            <!-- begining of our menu -->
            <div class="container">
               
      
               
               <h1> Shirts </h1>
               
               <div class="hover panel" onmouseout="javascript:this.className = 'hover panel';" onmouseover="javascript:this.className += ' flip';">
                    <div class="front">
                        <div class="frontTitle">
                            The Jordan Shirt
                        </div>
                        <div class="frontLogo twice-fleming bookBgImg"></div>
                        <div class="frontLocation">
                            	Air Highness
                        </div>
                    </div>
                    <div class="back">
                        <div class="backTitle">
                           The Jordan Shirt $15.00
                        </div>
                        <div class="backParagraph">
                            
                            <form>
                            
                            <input type="radio" id="small" name="size" value="small">
  				<label for="small">Small </label><br>
  			     <input type="radio" id="medium" name="size" value="medium">
				<label for="medium">  Medium</label><br>
			     <input type="radio" id="large" name="size" value="large">
  				<label for="large">   Large </label> <br>
  				<input type="radio" id="xlarge" name="size" value="xlarge">
  				<label for="lxarge">  X-Large </label> <br>
  			<label for="line">---------------------------</label> <br>	
  				
                         
  				
  				
  				<label for="qty"><i></i> Quantity</label>
                            <input type="number" id="qty" name="qty" placeholder="Quantity">
                            	<label for="notes"><i></i> Notes</label>
                            <input type="text" id="notes" name="notes" placeholder="Any notes?">
  				
  				</form>
  				
                        </div>
                        <div class="backGoto">
                            <a href="#" target="_blank" title="..."><h1>Add To Cart</h1></a>
                        </div><h1>
                    </div>
                </div>
               
                
                
                <div class="hover panel" onmouseout="javascript:this.className = 'hover panel';" onmouseover="javascript:this.className += ' flip';">
                    <div class="front">
                        <div class="frontTitle">
                            The Nike Shirt
                        </div>
                        <div class="frontLogo sherlock-doyle bookBgImg"></div>
                        <div class="frontLocation">
                            	Just Do It
                        </div>
                    </div>
                    <div class="back">
                        <div class="backTitle">
                            The Nike Shirt $15.00
                        </div>
                        <div class="backParagraph">
                           
                           <form>
                            
                            <input type="radio" id="small" name="size" value="small">
  				<label for="small">Small </label><br>
  			     <input type="radio" id="medium" name="size" value="medium">
				<label for="medium">  Medium</label><br>
			     <input type="radio" id="large" name="size" value="large">
  				<label for="large">   Large </label> <br>
  				<input type="radio" id="xlarge" name="size" value="xlarge">
  				<label for="lxarge">  X-Large </label> <br>
  				
  			<label for="line">---------------------------</label> <br>	

  				
  				
  				<label for="qty"><i></i> Quantity</label>
                            <input type="number" id="qty" name="qty" placeholder="Quantity">
                            	<label for="notes"><i></i> Notes</label>
                            <input type="text" id="notes" name="notes" placeholder="Any notes?">
  				
  				</form>
                           
                        </div>
                        <div class="backGoto">
                            <a href="#" target="_blank" title="..."><h1>Add To Cart</h1></a>
                        </div>
                    </div>
                </div>
                
                <div class="hover panel" onmouseout="javascript:this.className = 'hover panel';" onmouseover="javascript:this.className += ' flip';">
                    <div class="front">
                        <div class="frontTitle">
                            The Champion Shirt
                        </div>
                        <div class="frontLogo rebellion-morgan bookBgImg"></div>
                        <div class="frontLocation">
                            We are the Champions!
                        </div>
                    </div>
                    <div class="back">
                        <div class="backTitle">
                           The Champion Shirt $15.00
                        </div>
                        <div class="backParagraph">
                          
                          <form>
                            <input type="radio" id="small" name="size" value="small">
  				<label for="small">Small </label><br>
  			     <input type="radio" id="medium" name="size" value="medium">
				<label for="medium">  Medium</label><br>
			     <input type="radio" id="large" name="size" value="large">
  				<label for="large">   Large </label> <br>
  				<input type="radio" id="xlarge" name="size" value="xlarge">
  				<label for="lxarge">  X-Large </label> <br>
                          
  			<label for="line">---------------------------</label> <br>	
  	
  				
  				<label for="qty"><i></i> Quantity</label>
                            <input type="number" id="qty" name="qty" placeholder="Quantity">
                            	<label for="notes"><i></i> Notes</label>
                            <input type="text" id="notes" name="notes" placeholder="Any notes?">
  				
  				</form>
                           
                        </div>
                        <div class="backGoto">
                            <a href="#" target="_blank" title="..."><h1>Add To Cart<h1></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
              
      
               
                            
            <!-- ending of our menu -->
	
<?php require_once("footer.html"); ?>
