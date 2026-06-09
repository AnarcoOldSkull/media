<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);
if($_POST['serie']!="" && $_POST['ano']!="" && $_POST['turma']!=""){

    $quantificar=$db_classificacao_read->query("SELECT COUNT(DISTINCT aluno) FROM notas WHERE serie='".$_POST['serie']."' AND turma='".$_POST['turma']."' AND ano='".$_POST['ano']."'");
    $quantos=$quantificar->fetch_assoc();
    
    $notar=$db_classificacao_read->query("SELECT aluno FROM notas WHERE serie='".$_POST['serie']."' AND ano='".$_POST['ano']."' AND turma='".$_POST['turma']."'");
    while($nota=$notar->fetch_assoc()){
        $notas[$nota['aluno']]=$nota['aluno'];
    }
    $quantificar2=$db_classificacao_read->query("SELECT COUNT(DISTINCT disciplina) FROM notas WHERE serie='".$_POST['serie']."' AND turma='".$_POST['turma']."' AND ano='".$_POST['ano']."'");
    $quantos2=$quantificar2->fetch_assoc();
    
    $notar2=$db_classificacao_read->query("SELECT disciplina FROM notas WHERE serie='".$_POST['serie']."' AND ano='".$_POST['ano']."' AND turma='".$_POST['turma']."'");
    while($nota2=$notar2->fetch_assoc()){
        $notas2[$nota2['disciplina']]=$nota2['disciplina'];
    }
        $lista=$db_classificacao_read->query("SELECT * FROM alunos WHERE serie='".$_POST['serie']."' AND ano='".$_POST['ano']."' AND turma='".$_POST['turma']."'");
        while($aluno=$lista->fetch_assoc()){
            $alunos[$aluno['id']]=$aluno;
        }
        $listas=$db_classificacao_read->query("SELECT * FROM disciplinas WHERE serie='".$_POST['serie']."' AND ano='".$_POST['ano']."' AND turma='".$_POST['turma']."'");
        while($disciplina=$listas->fetch_assoc()){
            $disciplinas[$disciplina['id']]=$disciplina;
        }
        $insert= "INSERT INTO notas (ano, serie, turma, aluno, disciplina) VALUES";

        foreach($alunos as $nome){
            foreach($disciplinas as $materia){
                if(array_key_exists($nome['id'],$notas)){

                }else{
                    $insert.="(".$_POST['ano'].",".$_POST['serie'].",".$_POST['turma'].",".$nome['id'].",".$materia['id']."),";
                    }
                if(array_key_exists($materia['id'],$notas2)){
                        
                }else{
                    $insert.="(".$_POST['ano'].",".$_POST['serie'].",".$_POST['turma'].",".$nome['id'].",".$materia['id']."),";
                }
            }
        }
        if(strlen($insert)>63){
        $insert=substr($insert,0,-1);
         $cadastrar=$db_classificacao_write->query($insert);
         echo "Disciplinas atribuidas aos alunos da turma selecionada para a serie selecionada no ano letivo escolhido com sucesso";
        }
}else if($_POST['series']!="" && $_POST['anos']!="" && $_POST['turmas']!="" && $_POST['aluno']!=""){
    $verificacao=$db_classificacao_read->query("SELECT COUNT(`ptrimestre`) AS primeiro FROM notas WHERE aluno=".$_POST['aluno']." AND `ptrimestre`!='' AND serie='".$_POST['series']."' AND ano='".$_POST['anos']."' AND turma='".$_POST['turmas']."'");
    $verifica=$verificacao->fetch_assoc();
    $tot=$db_classificacao_read->query("SELECT COUNT(`aluno`) AS totprimeiro FROM notas WHERE aluno=".$_POST['aluno']." AND serie='".$_POST['series']."' AND ano='".$_POST['anos']."' AND turma='".$_POST['turmas']."'");
    $tota=$tot->fetch_assoc();

    $notar=$db_classificacao_read->query("SELECT * FROM notas WHERE serie='".$_POST['series']."' AND ano='".$_POST['anos']."' AND turma='".$_POST['turmas']."' AND aluno='".$_POST['aluno']."'");
    while($nota=$notar->fetch_assoc()){
        $notas.="<tr>
                <td>".$nota['id']."</td>
                <td>".identificaAluno($nota['aluno'])."</td>
                <td>".$nota['ano']."</td>
                <td>".identificaSerie($nota['serie'])."</td>
                <td>".identificaTurma($nota['turma'])."</td>
                <td>".identificaDisciplina($nota['disciplina'])."</td>
                <td id='ptri".$nota['id']."'>";
                if($nota['ptrimestre']==""){
                    $notas.="<input type='text' name='insNota".$nota['id']."' id='insNota".$nota['id']."' onblur=\"inserirNotaAluno('".$nota['id']."','1' )\"/>";
                    }elseif($nota['ptrimestre']!=""){
                        $notas.="<button class='";
                        if($nota['ptrimestre']>=6){
                        $notas.=  "editar2";
                        }elseif ($nota['ptrimestre']<6) {
                            $notas.=  "deletar2";
                        }
                        $notas.="' onclick=\"editarNotaAluno('".$nota['id']."','1')\">".str_replace('.',',',$nota['ptrimestre'])."<i class=\"bi bi-pencil\"></i></button>";
                    }
                    $notas.="</td>
                    <td id='stri".$nota['id']."'>";
                    if($nota['ptrimestre']=="" && $nota['strimestre']==""){
                     }elseif($nota['strimestre']!=""){
                        $notas.="<button class='";
                        if($nota['strimestre']>=6){
                        $notas.=  "editar2";
                        }elseif ($nota['strimestre']<6) {
                            $notas.=  "deletar2";
                        }
                        $notas.="' onclick=\"editarNotaAluno('".$nota['id']."','2')\">".str_replace('.',',',$nota['strimestre'])."<i class=\"bi bi-pencil\"></i></button>";
                    }elseif($verifica['primeiro']==$tota['totprimeiro']){
                        $notas.="<input type='text' name='insNota".$nota['id']."' id='insNota".$nota['id']."' onblur=\"inserirNotaAluno('".$nota['id']."','2' )\"/>";
                    }
                                    $notas.="</td>
                                    <td></td>
                                    </tr>";
    }
    $tabela = "<table id='listaAluno'  class='cell-border'>
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>aluno</th>
                    <th>ano</th>
                    <th>série</th>
                    <th>turma</th>
                    <th>disciplina</th>
                    <th>1º Trimestre</th>
                    <th>2º Trimestre</th>
                    <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
                    $tabela.=$notas;
                    $tabela.="</tbody>
                    </table>";
    echo $tabela;
}elseif($_POST['identificacao']!="" && $_POST['trimestre']!="" && $_POST['nota']!=""){
    $update="UPDATE notas set ".$_POST['trimestre']." = '".str_replace(',','.',$_POST['nota'])."' WHERE id = '".$_POST['identificacao']."'";
    $cadastrar=$db_classificacao_write->query($update);
    if($_POST['trimestre']=="ptrimestre"){
        $adicionar="1";
    }elseif($_POST['trimestre']=="strimestre"){
        $adicionar="2";
    }
    $temp= "<button class='";
    if($_POST['nota']>=6){
    $temp.=  "editar2";
    }elseif ($_POST['nota']<6) {
        $temp.=  "deletar2";
    }
    $temp.="' onclick=\"editarNotaAluno('".$_POST['identificacao']."','".$adicionar."')\">".str_replace('.',',',$_POST['nota'])."<i class=\"bi bi-pencil\"></i></button>";
    echo $temp;
}
?>