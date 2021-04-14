<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-RCaI48DorsPE6G2tCIO0xswQ5CLZMg4&libraries=geometry&callback=initMap">
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
  
   
  alert("Delivery Takes 3-5 Days.");
  }
  else {
  document.getElementById("myBtn2").style.display = "block";
  document.getElementById("deliAdd").style.display = "block";
  alert("Cannot deliver to your location. We are currenly delivering to places within a 10 mile radius from our shop. Please Select Pickup.");
  document.querySelector('input[id="delivery"]:checked').checked = false;
  
  }
  }
  </script>
