<?php
require 'Conexao.php';
require 'Pizza.php';

class PizzaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getBd();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizza = [];
        while ($row = $stmt->fetch((PDO::FETCH_ASSOC))) {
            $pizza[] = new Pizza(
                $row['id'],
                $row['sabor'],
                $row['tamanho'],
                $row['preco']
            );
        }
        return $pizza;
    }
    public function create(Pizza $pizza)
    {
        $stmt = $this->db->prepare("INSERT INTO pizza(sabor,tamanho,preco)
        VALUES(:sabor,:tamanho,:preco)");

        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam('sabor', $sabor);
        $stmt->bindParam('tamanho', $tamanho);
        $stmt->bindParam('preco', $preco);
        $stmt-> execute();
    }
   public function delete(int $id): void
{
    $stmt = $this->db->prepare("DELETE FROM pizza WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
public function getById($id){
    try{
    $sql="SELECT * FROM pizza WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id'=>$id]);
    $pizza =$stmt->fetch(PDO::FETCH_ASSOC);
    return $pizza = new Pizza($pizza['id'],$pizza['sabor'],$pizza['tamanho'],$pizza['preco']);
    }catch(PDOException $e){
        error_log($e->getMessage());
        return null;
    }
}
public function atualizar(Pizza $pizza){
    try{
   $sql="UPDATE pizza SET sabor= :sabor,tamanho= :tamanho,preco= :preco WHERE id= :id ";
   $stmt = $this->db->prepare($sql);
   $stmt->execute([
    'sabor'=> $pizza->getSabor(),
    'tamanho' => $pizza->getTamanho(),
    'preco' => $pizza ->getPreco(),
    'id'=> $pizza->getId()
   ]);
   return true;
}catch(PDOException $e){
error_log($e->getMessage());
return false;
}
    }
}

