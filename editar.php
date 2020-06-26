<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE produtos SET nome=:nome, marca=:marca, 
    valor=:valor, quantidade=:quantidade WHERE id=:id");
    $stmt->bindParam( $id);
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':quantidade', $quantidade);

    $id                     = $_GET['id'];
    $nome_produto           = $_POST['nome_produto'];
    $marca                  = $_POST['marca'];
    $valor                  = $_POST['valor'];
    $quantidade             = $_POST['quantidade'];

    $stmt->execute();


    echo "Produto atualizado com sucesso!<br>";
    echo $id;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    //header('Location: index_dist.php');
?> 