<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class LoginController extends Controller {

    public function index() {
        $data =array(
            'msg' => ''
        );

        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $users = new User();
            
            if($users->verifyUser($email,$senha)){
                $token = $users->createToken($email);
                $_SESSION['token'] = $token;

                header("Location:".BASE_URL);
                exit;
            } else {
                $data['msg'] = 'Número ou senha errados';
            }
        }
        
        $this->loadTemplate('login', $data);
    }
}