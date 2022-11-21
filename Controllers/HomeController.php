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
		$data = array(
			'menu' => array(
				BASE_URL.'home/add' => 'Adicionar Produtos',
				BASE_URL.'relatorio' => 'Relatório',
				BASE_URL.'login/sair'=> 'Sair'
			)
		);
		$p = new Produtos();
		$search = '';
		
		if(!empty($_GET['busca'])){
			$search = $_GET['busca'];
		}

		$data['list'] = $p->getProdutos($search);
		
		$this->loadTemplate('home', $data);
	}

	public function add() {
		$data = array(
			'menu' => array(
				BASE_URL.'home/add' => 'Adicionar Produtos',
				BASE_URL.'relatorio' => 'Relatório',
				BASE_URL.'login/sair'=> 'Sair'
			)
		);
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
		$data = array(
			'menu' => array(
				BASE_URL.'home' => 'Home',
				BASE_URL.'home/add' => 'Adicionar Produtos',
				BASE_URL.'relatorio' => 'Relatório',
				BASE_URL.'login/sair'=> 'Sair'
			)
		);
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