<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model {
	private $info;

	public function verifyUser($email, $senha){

		$sql = "SELECT * FROM usuario Where email = :email AND senha = :senha ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':senha',$senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		} else {
			return false;
		}

	}
	
	public function createToken($email) {
		$token = md5(time().rand(0,9999).time().rand(0,9999));
		$sql = "UPDATE usuarios SET token = :token WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':token',$token);
		$sql->bindValue(':email',$email);
		$sql->execute();

		return $token;
	}

	public function checkLogin(){
		if(!empty($_SESSION['token'])){
			$token = $_SESSION['token'];

			$sql = "SELECT * FROM usuario Where token = '$token'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':token', $token);
			$sql->execute();

			if($sql->rowCount() > 0 ) {
				$this->info = $sql->fetch();
				return true;							
			}
		}
		return false;
	}

	public function getAll() {
		$array = array();

		$sql = "SELECT * FROM usuarios";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

}