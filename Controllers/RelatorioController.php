<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Produtos;

class RelatorioController extends Controller {
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

        $data['list'] = $p->getLowQuantityProducts();

        $this->loadTemplate('relatorio', $data); 
    }
}