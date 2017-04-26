<?php 
 
include_once 'helpers/format.php';
include_once 'lib/database.php';
include_once 'lib/session.php';

Session::checkLogin();

?>

<?php
class AgentLogin{
	private $fm;
	private $db;

	public function __construct(){
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function agentLogin($data){
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$password = mysqli_real_escape_string($this->db->link,$data['password']);

		$email = $this->fm->validation($email);
		$password = $this->fm->validation($password);

		if (empty($email) or empty($password)) {
			$msg = "<span class= 'error'>Fields must not be empty</span>";
			return $msg;
		}else{
			$query = "SELECT * FROM tbl_agents WHERE email = '$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result==true) {
				$value = $result->fetch_assoc();

				Session::set('agentlogin',true);
				Session::set('agentId',$value['id']);
				Session::set('name',$value['name']);
				header("Location:index.php");
			}else{
				$msg = "<span class= 'error'>Email and Password not match!</span>";
				return $msg;
			}
		}
	}
	
		
}

?>