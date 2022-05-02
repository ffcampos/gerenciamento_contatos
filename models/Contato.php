<?php
	class Contato extends Model{

		public function getContactById($id){
			$return = array();

			$sql = "SELECT * FROM contato WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$return = $sql->fetch();
			}
			return $return;
		}

		public function getList(){
			$return = array();

			$sql = "SELECT * FROM contato";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$return = $sql->fetchAll(PDO::FETCH_ASSOC);
			}

			return $return;
		}

		public function emailExists($email){

			$sql = "SELECT id FROM contato WHERE email = :email";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":email", $email);
			$sql->execute();

			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function addContato($name, $email){

			$sql = "INSERT INTO contato (name, email) VALUES (:name, :email)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":name", $name);
			$sql->bindValue(":email", $email);
			$sql->execute();
			
		}

		public function editarContato($name, $email, $id){

			$sql = "UPDATE contato SET name = :name, email = :email WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":name", $name);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":id", $id);
			$sql->execute();
		}

		public function deleteContato($id){

			$sql = "DELETE FROM contato WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();
			
		}
	}
?>