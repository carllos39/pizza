<?php 
require_once 'PizzaDAO.php';
require_once 'Pizza.php';
$id=$_GET['id'];

$dao = new PizzaDAO();

if(isset($_POST['id']) && isset($_POST['sabor']) && isset($_POST['tamanho'])&& isset($_POST['preco'])){
    $id= $_POST['id'];
    $sabor =$_POST['sabor'];
    $tamanho =$_POST['tamanho'];
    $preco =$_POST['preco'];

    $pizza = new Pizza($id,$sabor,$tamanho,$preco);
    $dao->atualizar($pizza);
    header("location:index.php");

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar de Pizza</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Alterar de Pizza</h1>
    <form action="alterar_pizza.php" method="post">
         <div>
            <label for="id">Id :</label>
            <input type="text" value="<?=$id?>" name="id" id="id">
        </div>
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
        <input type="submit" value="Alterar">
    </form>
  <a href="form_pizzaria.php">Lista</a>  
</body>
</html>