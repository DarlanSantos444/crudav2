<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO produtos(nome_produto, marca, valor, quantidade)
    VALUES (:nome_produto, :marca, :valor, :quantidade)");
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':quantidade', $quantidade);

    $nome_produto    = $_POST['nome_produto'];
    $marca           = $_POST['marca'];
    $valor           = $_POST['valor'];
    $quantidade      = $_POST['quantidade'];

    $stmt->execute();


    echo "Produto cadastrado com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_p.php');
?> 