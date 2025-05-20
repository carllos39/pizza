<?php 
require 'PizzaDAO.php';
$dao = new PizzaDAO();
$id=$_GET['id'];


$dao->delete($id);
header("location:form_pizzaria.php");
?>