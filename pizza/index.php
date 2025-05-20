<?php 
require_once 'PizzaDAO.php';
require_once 'Pizza.php';

$dao = new PizzaDAO();

if(isset($_POST['sabor'])&& isset($_POST['tamanho'])&& isset($_POST['preco'])){
    $sabor =$_POST['sabor'];
    $tamanho =$_POST['tamanho'];
    $preco =$_POST['preco'];

    $pizza = new Pizza(null,$sabor,$tamanho,$preco);
    $dao->create($pizza);
    header("location:index.php");

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pizza</title>
</head>
<body>
    <h1>Cadastro de Pizza</h1>
    <form action="index.php" method="post">
        <div>
            <label for="sabor">Sabor :</label>
            <input type="text" name="sabor" id="sabor">
        </div>
               <div>
            <label for="tamanho">Tamanho :</label>
            <input type="text" name="tamanho" id="tamanho">
        </div>
               <div>
            <label for="preco">Preço :</label>
            <input type="text" name="preco" id="preco">
        </div>
        <input type="submit" value="Cadastrar">
    </form>
  <a href="form_pizzaria.php">Lista</a>  
</body>
</html>