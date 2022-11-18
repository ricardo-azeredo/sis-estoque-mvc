<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

	private $user;

	public function __construct() {
		parent::__construct();

		$this->user = new User();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

	public function index() {
		$data = array();
		$p = new Produtos();

		$data['list'] = $p->getProdutos();


		$this->loadTemplate('home', $array);
	}

	public function add() {
		$data = array();
		

		$this->loadTemplate('add', $array);
	}

}