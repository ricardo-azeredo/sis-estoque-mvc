<?php
namespace Models;

use \Core\Model;


class Usuarios extends Model {
	private $info;

	public function __construct() {
		parent::__construct();
		$email= "rico@email.com";

		$consulta = $this->db->query("SELECT * FROM usuarios where email = '$email'");
		if($consulta->rowCount() == 0){
			$sql ="INSERT INTO usuarios (nome,email,senha ) VALUES (:nome,:email,:senha)";
			$sql= $this->db->prepare($sql);
			$sql->bindValue(':nome',"Ricardo");
			$sql->bindValue(':email',$email);
			$sql->bindValue(':senha',password_hash("123",PASSWORD_DEFAULT));
			$sql->execute();
		}
	}

	public function verifyUser($email, $senha){
		$result = array();
		$query = $this->db->query("SELECT senha FROM usuarios WHERE email = '$email'");
		$result = $query->fetch();
		
		print_r($result['senha']);
		if(password_verify($senha,$result['senha'])){
			$sql = "SELECT * FROM usuarios Where email = :email AND senha = :senha ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':senha',$result['senha']);
			$sql->execute();
	
			if($sql->rowCount() > 0){
				return true;
			} else {
				return false;
			}
		}
		return false;
		

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
			
			$sql = "SELECT * FROM usuarios Where token = :token";
			//echo $sql;
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