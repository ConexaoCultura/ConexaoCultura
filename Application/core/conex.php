<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db_name = "conexao_cultura";
    $conn = mysqli_connect($hostname, $user, $password, $db_name);

    if (!$conn) {
        print "Falha com a conexão no Banco de dados";
    }
    
?>