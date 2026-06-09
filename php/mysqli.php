<?php

$user="root";
$pass="";
$server="localhost";

        $db_classificacao_read = new mysqli($server, $user, $pass, "classificacao");
        $db_classificacao_write = new mysqli($server, $user, $pass, "classificacao");

        $db_classificacao_read->set_charset('utf8');
        $db_classificacao_write->set_charset('utf8');
        
        if($db_classificacao_read->connect_errno>0){
            die("Não foi possivel realizar a conexão [".$db_classificacao_read->erro."]");
        }
        
        if($db_classificacao_write->connect_errno>0){
            die("Não foi possivel realizar a conexão [".$db_classificacao_write->erro."]");
        }
?>