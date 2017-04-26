<?php include_once 'inc/header.php'; ?>

 <?php 
include_once 'classes/property.php';
$prty = new Property();
  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
<?php 

if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
}
$id = Session::get('agentId');

$getProperty = $prty->getPropertydataById($post_id, $id);
if ($getProperty) {
	while ($result=$getProperty->fetch_assoc()) {

 ?>    	
				<div class="cont-desc ">				
					<div class="grid images_3_of_2">
						<img src="<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['name']; ?> </h2>
					<p><?php echo $result['address']; ?></p>					
					<div class="price">
						<p>Monthly Charge: <span>$<?php echo $result['charge']; ?></span></p>
						<p>Space: <span><?php echo $result['space']; ?> sqft</span></p>
						<p>Floor:<span><?php echo $result['floor']; ?>th</span></p>
						<p>Garages:<span><?php echo $result['garage']; ?></span></p>
						<p>Beds:<span><?php echo $result['bed']; ?></span></p>
						<p>Baths:<span><?php echo $result['bath']; ?></span></p>
						<p>Balcony:<span><?php echo $result['belcony']; ?></span></p>
					</div>
				
			</div>

		<div class="product-desc">
			<h2>Property Details</h2>
			<p><?php echo $result['description']; ?></p>
	    </div>
	</div>

	<?php } } ?>
	   <div class="product-desc">
			<h2>Property Images</h2>

<?php 

$getImage = $prty->getGalleryImage($post_id, $id);
if ($getImage) {
	while ($result=$getImage->fetch_assoc()) {

 ?>			
			<div class="gallery">
			  <a target="" href="<?php echo $result['image_url']; ?>">
			    <img src="gupload/abc125.jpg" alt="Trolltunga Norway" width="300" height="200">
			  </a>
			</div>

<?php } } ?>
	    </div>

		    
 		</div>
		<div class="add-cart">
					<a href="" class="buysubmit">See Agent Details</a>			
		</div>
 	</div>
	</div>

<?php include_once 'inc/footer.php'; ?>

