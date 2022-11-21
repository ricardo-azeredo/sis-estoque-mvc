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
        $data = array(
            'menu' => array(
                BASE_URL.'home' => 'Home',
				BASE_URL.'home/add' => 'Adicionar Produtos',				
				BASE_URL.'login/sair'=> 'Sair'
			)
        );
        $p = new Produtos();

        $data['list'] = $p->getLowQuantityProducts();

        $this->loadTemplate('relatorio', $data); 
    }
}