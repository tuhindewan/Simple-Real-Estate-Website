<?php 
include_once 'helpers/format.php';
include_once 'lib/database.php';
class Agent{
	private $fm;
	private $db;

	public function __construct(){
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function agentRegistration($data){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		$password = mysqli_real_escape_string($this->db->link,$data['password']);

		$name = $this->fm->validation($name);
		$address = $this->fm->validation($address);
		$email = $this->fm->validation($email);
		$phone = $this->fm->validation($phone);
		$password = $this->fm->validation($password);

		if (empty($name) or empty($address) or empty($phone) or empty($password) or empty($email)) {
			$msg = "<span class= 'error'>Fields must not be empty</span>";
			return $msg;
		}

		$emailQuery = "SELECT * FROM tbl_agents WHERE email = '$email' LIMIT 1";
		$result = $this->db->select($emailQuery);

		if ($result) {
			$msg = "<span class= 'error'>Email already Exist.</span>";
			return $msg;

		}else{
			$query = "INSERT INTO tbl_agents (name,address,email,phone,password) VALUES ('$name','$address','$email','$phone','$password')";
			$row = $this->db->insert($query);

			if ($row) {
				$msg = "<span class= 'success'>Registration Successfull..</span>";
			return $msg;
			}else{
				$msg = "<span class= 'error'>Something Went Wrong!</span>";
			return $msg;
			}
		}
	}

	public function getaAgentData($id){
		$query = "SELECT * FROM tbl_agents WHERE id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function agentDataUpdate($data,$id){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);

		$name = $this->fm->validation($name);
		$address = $this->fm->validation($address);
		$email = $this->fm->validation($email);
		$phone = $this->fm->validation($phone);

		if (empty($name) or empty($address) or empty($phone) or empty($email)) {
			$msg = "<span class= 'error'>Fields must not be empty</span>";
			return $msg;
		}else{
			$query = "UPDATE tbl_agents SET name = '$name', address = '$address', email= '$email', phone = '$phone' WHERE id = '$id'";
			$row = $this->db->update($query);
			if ($row) {
				$msg = "<span class= 'success'>Updated Successfull..</span>";
			return $msg;
			}else{
				$msg = "<span class= 'error'>Something Went Wrong!</span>";
			return $msg;
			}
		}
	}
}


 ?>