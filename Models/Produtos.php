<?php 
namespace Models;

use \Core\Model;

class Produtos extends Model {

    public function getProdutos($search='') {
        $array = array();
            
        if(!empty($search)){
            $sql = "SELECT * FROM produtos WHERE codigo = :codigo or produto LIKE :produto";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":codigo", $search);
            $sql->bindValue(":produto", "%$search%");
            $sql->execute();
        } else {
            $sql = "SELECT * FROM Produtos";
            $sql = $this->db->query($sql);
        }


        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    private function verifyProduct($codigo) {

        return true;
    }

    public function addProdutos($codigo,$produto, $preco, $quantidade, $min_quantidade) {
             
        if($this->verifyProduct($codigo)) {
            $sql = "INSERT INTO produtos(codigo, produto, preco, quantidade, min_quantidade) Values (:codigo,:produto,:preco,:quantidade,:min_quantidade) ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":codigo", $codigo);
            $sql->bindValue(":produto", $produto);
            $sql->bindValue(":preco", $preco);
            $sql->bindValue(":quantidade", $quantidade);
            $sql->bindValue(":min_quantidade", $min_quantidade);
            $sql->execute();
        } else {
            return false;
        }
    }

    public function getProduto($id) {
        $array = array();

        $sql = "SELECT * FROM produtos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function editProduto($codigo,$produto, $preco, $quantidade, $min_quantidade,$id) {
        if($this->verifyProduct($codigo)) {
            $sql = "UPDATE produtos SET codigo = :codigo, produto = :produto, preco = :preco, quantidade = :quantidade, min_quantidade = :min_quantidade WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":codigo", $codigo);
            $sql->bindValue(":produto", $produto);
            $sql->bindValue(":preco", $preco);
            $sql->bindValue(":quantidade", $quantidade);
            $sql->bindValue(":min_quantidade", $min_quantidade);
            $sql->bindValue(":id", $id);
            $sql->execute();
        } else {
            return false;
        }
    }


}

