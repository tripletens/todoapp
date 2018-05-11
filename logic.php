<?php
	class db{
		public $dbhost = "localhost";
		public $dbusername = "root";
		public $dbpass = "";
		public $dbname = "tutorial";
		public $conn;
		public $query;
		public function __construct(){
			$this->conn = new mysqli($this->dbhost, $this->dbusername, $this->dbpass , $this->dbname);
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			}
		}
		public function conn(){
			return $this->conn;
		}
		public function db_insert($name){
			//insert items in db
			$this->query = "INSERT INTO `items`(`name`) VALUES ('$name')"; 
			$this->conn->query($this->query);
			return $this->conn;
		}
		public function db_select_all(){
			//select items in db
			$this->query = "SELECT `name` FROM `items`";
			return $this->conn->query($this->query);
		}
		public function db_select_1($name){
			//select items in db
			$this->query = "SELECT `name` FROM `items` WHERE `name`= '$name'";
			$selected = $this->conn->query($this->query);
			return $selected;
		}
		public function name_exists($name){
			$result = $this->db_select_1($name);
			if($result->num_rows > 0){
				return true;
			};
		}
		
		public function name_exists_all(){
			$result = $this->db_select_all();
			if($result->num_rows > 0){
				return true;
			};
		}
		public function db_fetch_assoc(){
			$result = $this->db_select_all();
			$this->row = mysqli_fetch_assoc($result);
			return $this->row;		
		}
		public function db_update($newname,$oldname){
			//update items in db 
			$this->query = "UPDATE `items` SET `name`= '$newname' WHERE `name` = '$oldname'";
			return $this->conn->query($this->query);
		}
		public function db_delete($deleteitem){
			//delete items in db 
			$this->query = "DELETE FROM `items` WHERE `name` = '$deleteitem'";
			$this->conn->query($this->query);
			return $this->conn;
		}
	}
	// checkmagento
	class checks{
		public function empty($item){
			//checks if fields are empty
			if(!empty($item)){
				return true;
			}else{
				return false;
			}
		}
		public function clean($item){
			$trim_item = trim($item);
			$strip_item = stripslashes($trim_item);
			$final_clean = htmlspecialchars($strip_item);
			return $final_clean;
		}
	}
?>