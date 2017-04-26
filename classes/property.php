<?php 
include_once 'helpers/format.php';
include_once 'lib/database.php';
class Property{
	private $fm;
	private $db;

	public function __construct(){
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function agentPropertyData($data,$file,$id){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$charge = mysqli_real_escape_string($this->db->link,$data['charge']);
		$space = mysqli_real_escape_string($this->db->link,$data['space']);
		$floor = mysqli_real_escape_string($this->db->link,$data['floor']);
		$garage = mysqli_real_escape_string($this->db->link,$data['garage']);
		$bed = mysqli_real_escape_string($this->db->link,$data['bed']);
		$bath = mysqli_real_escape_string($this->db->link,$data['bath']);
		$belcony = mysqli_real_escape_string($this->db->link,$data['belcony']);
		$description = mysqli_real_escape_string($this->db->link,$data['description']);

		$name = $this->fm->validation($name);
		$address = $this->fm->validation($address);
		$charge = $this->fm->validation($charge);
		$space = $this->fm->validation($space);
		$floor = $this->fm->validation($floor);
		$garage = $this->fm->validation($garage);
		$bed = $this->fm->validation($bed);
		$bath = $this->fm->validation($bath);
		$belcony = $this->fm->validation($belcony);
		$description = $this->fm->validation($description);

		$permited = array('jpg','jpeg','png','gif');

		$filename = $file['image']['name'];
		$filesize = $file['image']['size'];
		$filetemp = $file['image']['tmp_name'];

		$div = explode('.', $filename);
		$file_ext = strtolower(end($div));
		$unique_name = substr(md5(time()),0,5).'.'.$file_ext;
		$upload_image = "upload/".$unique_name;

		if (empty($name) or empty($address) or empty($charge) or empty($space) or empty($floor) or empty($garage) or empty($bed) or empty($bath) or empty($belcony) or empty($description)) {
			$msg = "<span class= 'error'>Fields must not be empty</span>";
			return $msg;
		}elseif($filesize > 1048567){
			echo "<span class='error'>Select image less then 1MB.</span>";
		}elseif(in_array($file_ext, $permited)===false){
			echo "<span class='error'>You can only upload only:-".implode(',', $permited)."</span>";
		}else{
			move_uploaded_file($filetemp, $upload_image);

			$query = "INSERT INTO tbl_posts (name,address,charge,space,floor,garage,bed,bath,belcony,description,image,agent_id) VALUES ('$name','$address','$charge','$space','$floor','$garage','$bed','$bath','$belcony','$description','$upload_image','$id')";
			$row = $this->db->insert($query);

			if ($row) {
				for($i=0;$i<count($file['gimage']['name']);$i++){

					$filename = $file['gimage']['name'];
					$filesize = $file['gimage']['size'];
					$filetemp = $file['gimage']['tmp_name'];

					$div = explode('.', $filename);
					$file_ext = strtolower(end($div));
					$unique_name = substr(md5(time()),0,6).'.'.$file_ext;
					$upload_gimage = "gupload/".$unique_name;

					$query = "SELECT * FROM tbl_posts WHERE agent_id = '$id'";
					$result = $this->db->select($query)->fetch_assoc();
					if ($result) {
						$post_id = $result['id'];
						$agent_id = $result['agent_id'];

						$query = "INSERT INTO tbl_gimages (image_url,post_id,agent_id) VALUES ('$upload_gimage','post_id','$agent_id')";
						$result = $this->db->insert($query);

					}
				}
				$msg = "<span class= 'success'>Successfully Posted</span>";
				return $msg;
			}else{
				$msg = "<span class= 'error'>Something Went Wrong!</span>";
				return $msg;
			}
		}
	}

	public function getPropertyDetails($id){
		$query = "SELECT * FROM tbl_posts WHERE agent_id = '$id' LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getPropertydataById($post_id, $id){
		$query = "SELECT * FROM tbl_posts WHERE agent_id = '$id' AND id = '$post_id' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getGalleryImage($post_id, $id){
		$query = "SELECT * FROM tbl_gimages WHERE agent_id = '$id' AND post_id = '$post_id' LIMIT 5 ";
		$result = $this->db->select($query);
		return $result;
	}


 }
 ?>	