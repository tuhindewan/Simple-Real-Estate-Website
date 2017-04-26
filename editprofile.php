<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'classes/agent.php';
$ag = new Agent();
?>

<?php 

if (isset($_POST['submit'])) {
	
	$id = Session::get('agentId');

	$updateAgent = $ag->agentDataUpdate($_POST,$id);
}

 ?>
<style>
	.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;}
	.tblone tr td{text-align: justify;}
	.tblone h2  {text-align: center;}
	.tblone input[type="text"]{width: 400px;font-size: 15px;padding: 5px;}
</style>
 <div class="main">
    <div class="content">
<?php 
$id = Session::get("agentId");
$getData = $ag->getaAgentData($id);
if ($getData) {
	while ($result = $getData->fetch_assoc()) {

 ?>
    	 <form action="" method="post">
		<table class="tblone">
			<?php 


			if (isset($updateAgent)) {
				echo "<tr><td colspan='2'>".$updateAgent."</td></tr>";
			}

			 ?>	
			<tr>
				<td colspan="2"><h2>Update Profile Details</h2></td>			
			</tr>
			<tr>
				<td width="20%">Name</td>
				<td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
			</tr>
			
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save"></td>
			</tr>

			
		</table>
		</form>	
<?php } } ?>

 		</div>
 	</div>
	</div>
 <?php include_once 'inc/footer.php'; ?>
