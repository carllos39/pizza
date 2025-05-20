<?php
require 'PizzaDAO.php';

$bd = new PizzaDAO();
$pizzas = $bd->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pizzas</title>
</head>

<body>
    <h1>Lista de Pizzas</h1>
    <table border="2">
        <tr>
            <th>Id :</th>
            <th>Sabor :</th>
            <th>Tamanho :</th>
            <th>Preço:</th>
            <th>Ação:</th>
             <th>Ação:</th>
             </tr>
            <?php foreach($pizzas as $pizza){?>
             <tr>
                <td><?=$pizza->getId()?></td>
                <td><?=$pizza->getSabor()?></td>
                <td><?=$pizza->getTamanho()?></td>
                <td><?=$pizza->getPreco()?></td>
                 <td><a href="alterar_pizza.php?id=<?=$pizza->getId()?>">Alterar</a></td>
                <td><a href="delete_pizza.php?id=<?=$pizza->getId()?>">Excluir</a></td>
             </tr>
            <?php }?>
    </table>
<a href="index.php">Cadastrar</a>
</body>
</html>