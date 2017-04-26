<?php include_once 'inc/header.php'; ?>

<?php 

include_once 'classes/agent.php';
$ag = new Agent();

 ?>

 <?php 

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
	$agentReg = $ag->agentRegistration($_POST);
}

  ?>


<?php 

include_once 'classes/agentlogin.php';
$aglog = new AgentLogin();

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
	$agentlog = $aglog->agentLogin($_POST);
}

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 <?php if (isset($agentlog)) {
    	 	echo $agentlog;
    	 } ?>
        	<h3>Existing Agents</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" >
                	<input name="email" type="text" placeholder="E-Mail" >
                    <input name="password" type="password" placeholder="Password" >
                    <div class="buttons"><div><button class="grey" name="submit">Sign In</button></div></div>
                    </div>
                 </form>
                    
    	<div class="register_account">
    	<?php if (isset($agentReg)) {
    		echo $agentReg;
    	} ?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="address" placeholder="Address" >
							</div>
							
							<div>
								<input type="text" name="email" placeholder="E-Mail">
							</div>
							<div>
								<input type="text" name="phone" placeholder="Phone">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="password" placeholder="Password" >
						</div>
		    	</td>
		    </tr> 
		    </tbody>
		    </table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 <?php include_once 'inc/footer.php'; ?>