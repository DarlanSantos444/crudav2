<?php
    //Conexão com banco de dados
    function connection(){
        $servername = "sql111.epizy.com";
        $username   = "epiz_26106940";
        $password   = "8dJBDvcI4g2pr0";
        $db         = "epiz_26106940_loja";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão realizada com sucesso!";
        return $conn;

        } catch(PDOException $e) {
        echo "Conexão falhou! Erro: " . $e->getMessage();
        }
    }
?> 