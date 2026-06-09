<?php
require_once("mysqli.php");
function identificaSerie($valor){
    if($valor==1){
        return "3° ano";
    }elseif($valor==2){
        return "4° ano";
    }elseif($valor==3){
        return "5° ano";
    }elseif($valor==4){
        return "6° ano";
    }elseif($valor==5){
        return "7° ano";
    }elseif($valor==6){
        return "8° ano";
    }elseif($valor==7){
        return "9° ano";
    }elseif($valor==8){
        return "1° série";
    }elseif($valor==9){
        return "2° série";
    }elseif($valor==10){
        return "3° série";
    }
}
function identificaTurma($valor){
    global $db_classificacao_read;
    $turminar=$db_classificacao_read->query("SELECT * FROM turmas WHERE id = '$valor'");
    while($turminha=$turminar->fetch_assoc()){
        return $turminha['turma'];
    }
}
function identificaAluno($valor){
    global $db_classificacao_read;
    $turminar=$db_classificacao_read->query("SELECT * FROM alunos WHERE id = '$valor'");
    while($turminha=$turminar->fetch_assoc()){
        return $turminha['nome'];
    }
    }
function alunoTurma($valor){
        
        global $db_classificacao_read;
        $turminar=$db_classificacao_read->query("SELECT * FROM alunos WHERE id = '$valor'");
        while($turminha=$turminar->fetch_assoc()){
            return $turminha['turma'];
        }
}
function alunoSerie($valor){
        
        global $db_classificacao_read;
        $turminar=$db_classificacao_read->query("SELECT * FROM alunos WHERE id = '$valor'");
        while($turminha=$turminar->fetch_assoc()){
            return $turminha['serie'];
        }
}
function identificaDisciplina($valor){
    global $db_classificacao_read;
    $turminar=$db_classificacao_read->query("SELECT * FROM disciplinas WHERE id = '$valor'");
    while($turminha=$turminar->fetch_assoc()){
        return $turminha['disciplina'];
    }
}
?>