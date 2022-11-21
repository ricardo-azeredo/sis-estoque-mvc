<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class ProdutosController extends Controller {

	public function index() {
		
		$this->loadTemplate('produtos', $data);
	}
}