<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'classes/agent.php';
$ag = new Agent();
?>

<?php 
$agentlogin = Session::get('agentlogin');
if ($agentlogin==false) {
	header("Location:login.php");
}

 ?>

<style>
	.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;}
	.tblone tr td{text-align: justify;}
	.tblone h2  {text-align: center;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
<?php 

$id = Session::get("agentId");
$getAgent = $ag ->getaAgentData($id);
if ($getAgent) {
	while ($result = $getAgent->fetch_assoc()) {
		
 ?>
		<table class="tblone">
			<tr>
				<td colspan="3"><h2>Your Profile Details</h2></td>			
			</tr>
			<tr>
				<td width="20%">Name</td>
				<td width="5%">:</td>
				<td><?php echo $result['name']; ?></td>
			</tr>
			
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $result['address']; ?></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $result['email']; ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo $result['phone']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><a href="editProfile.php">Update Details</a></td>
			</tr>

			
		</table>
<?php } }  ?>			
 		</div>
 	</div>
	</div>
<?php include_once 'inc/footer.php'; ?>