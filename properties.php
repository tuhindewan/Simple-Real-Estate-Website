<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'lib/session.php';

 ?>
 <?php 
include_once 'classes/property.php';
$prty = new Property();
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Properties</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php 


	      $id = Session::get('agentId');
	      $getDetails = $prty->getPropertyDetails($id);
	      if ($getDetails) {
	      	while ($result=$getDetails->fetch_assoc()) {

	       ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['name']; ?></h2>
					 <p><?php echo $result['address']; ?></p>
					 <p><span class="price">$<?php echo $result['charge']; ?></span></p>
				     <div class="button"><span><a href="details.php?post_id=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
			
    </div>
 </div>
</div>
  <?php include_once 'inc/footer.php'; ?>
