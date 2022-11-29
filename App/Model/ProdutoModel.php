<?php
namespace AppWeb\App\Model;
use AppWeb\App\DAO\ProdutoDAO;

class ProdutoModel
{
    public $id, $nome, $data_fabricacao, $data_validade;
    public $rows;

    public function save()
    {
        include 'DAO/ProdutoDAO.php';
        $dao = new ProdutoDAO();

        if(empty($this->id))
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/ProdutoDAO.php';
        $dao = new ProdutoDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/ProdutoDAO.php';
        $dao = new ProdutoDAO();
        $obj = $dao->selectById($id);
        
        return ($obj) ? $obj : new ProdutoModel();
    }

    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php';
        $dao = new ProdutoDAO();
        $dao->delete($id);
    }
}