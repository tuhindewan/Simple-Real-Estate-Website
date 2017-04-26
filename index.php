<?php include_once 'inc/header.php'; ?>

  <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Welcome</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

  	<div class="w3-content w3-display-container">
	  <img class="mySlides" src="images/1.jpg" style="width:100%">
	  <img class="mySlides" src="images/2.jpg" style="width:100%">
	  <img class="mySlides" src="images/3.jpg" style="width:100%">
	  <img class="mySlides" src="images/4.jpg" style="width:100%">

	  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
	  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	</div>

		<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  if (n > x.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
		</script>
	<div class="section group">	      

</div>
		
    </div>
 </div>
<?php include_once 'inc/footer.php'; ?>
   