<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Produtos;

class HomeController extends Controller {

	private $user;

	public function __construct() {
		
		$this->user = new Usuarios();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

	public function index() {
		$data = array();
		$p = new Produtos();

		$data['list'] = $p->getProdutos();
		
		$this->loadTemplate('home', $data['list']);
	}

	public function add() {
		$data = array();
		$p = new Produtos(); 

		if(!empty($_POST['codigo'])) {
			$codigo = $_POST['codigo'];
			$produto = $_POST['produto'];
			$preco = $_POST['preco'];
			$quantidade = $_POST['quantidade'];
			$min_quantidade = $_POST['minima'];

			$p->addProdutos($codigo,$produto, $preco, $quantidade, $min_quantidade);
			header("Location: ".BASE_URL);
			exit;
		}

		$this->loadTemplate('add', $data);
	}

	public function editar($id){
		$data = array();
		$p = new Produtos();

		if(!empty($_POST['codigo'])) {
			$codigo = $_POST['codigo'];
			$produto = $_POST['produto'];
			$preco = $_POST['preco'];
			$quantidade = $_POST['quantidade'];
			$min_quantidade = $_POST['minima'];

			$p->editProduto($codigo,$produto, $preco, $quantidade, $min_quantidade, $id);
			header("Location: ".BASE_URL);
			exit;
		}

		$data['info'] = $p->getProduto($id);


		$this->loadTemplate('editar', $data);
	}

}