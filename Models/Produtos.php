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
}