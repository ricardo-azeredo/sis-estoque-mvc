<?php 

class Produtos extends Model {

    public function getProdutos() {
        $array = array();

        $sql = "SELECT * FROM Produtos";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addProdutos($codigo,$produto, $preco, $quantidade, $min_quantidade) {
        $sql = "INSERT INTO produtos(codigo, produto, preco, quantidade, min_quantidade) Values (:codigo,:produto,:preco,:quantidade,:min_quantidade) ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":codigo", $codigo);
        $sql->bindValue(":produto", $produto);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":min_quantidade", $min_quantidade);
        $sql->execute();
    }
}