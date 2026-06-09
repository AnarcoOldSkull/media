<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);
if($_POST["disciplinas"]==true){
    $i=1;
    $turminar=$db_classificacao_read->query("SELECT * FROM disciplinas");
    while($turminha=$turminar->fetch_assoc()){
        $turma[$i]=$turminha;
        $i++;
    }
    $tabela = "<table id='listaDisciplina'  class='cell-border'>
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>ano</th>
                    <th>série</th>
                    <th>turma</th>
                    <th>disciplinas</th>
                    <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
                    foreach($turma as $conteudo){
                        $tabela.="<tr>
                  <td>".$conteudo['id']."</td>
                  <td>".$conteudo['ano']."</td>
                  <td>".identificaSerie($conteudo['serie'])."</td>
                  <td>".identificaTurma($conteudo['turma'])."</td>
                  <td id='ajustar".$conteudo['id']."'>".$conteudo['disciplina']."</td>
                  <td>
                  <button title='Editar ".$conteudo['disciplina']."' class='editar' onclick=\"editar(".$conteudo['id'].",'disciplinas','".$conteudo['disciplina']."')\"><i class='bi bi-pencil'></i></button>
                  <button title='Deletar ".$conteudo['disciplina']."' class='deletar' onclick=\"deletar(".$conteudo['id'].",'disciplinas')\"><i class='bi bi-trash-fill'></i></button>
                  </td>
                  </tr>";
    }
                      
                    $tabela.="</tbody></table>";
                    echo $tabela;
    }elseif($_POST['disciplina']!="" && $_POST['turmas']!="" && $_POST['serie']!="" && $_POST['ano']!=""){

$cadastrar=$db_classificacao_write->query("INSERT INTO disciplinas (serie, 
                                                                            turma,
                                                                            ano,
                                                                            disciplina) 
                                                VALUES 
                                                ('".$_POST["serie"]."',
                                                '".$_POST["turmas"]."',
                                                '".$_POST['ano']."',
                                                '".$_POST['disciplina']."')");
}elseif($_POST['busca']!="" && $_POST['turbulencia']!="" && $_POST['ano']!=""){
    $i=0;
    $turminar=$db_classificacao_read->query("SELECT * FROM disciplinas WHERE serie='".$_POST['busca']."' AND turma='".$_POST['turbulencia']."' AND ano='".$_POST['ano']."'");
    while($turminha=$turminar->fetch_assoc()){
            $turma[$i]=$turminha;
            $i++;
            }
            
            $selecionavel = "<select id='disciplinaDisc' name='disciplinaDisc'>";
            $selecionavel.="<option value=''>Selecione a disciplina</option>";
            foreach($turma as $conteudo){
                $selecionavel.="<option value='".$conteudo['id']."'>".$conteudo['disciplina']."</option>";
        }
                
            $selecionavel.="</select>";
            echo $selecionavel;
            }elseif($_POST['editar']==true){

                            $editar=$db_classificacao_write->query("UPDATE disciplinas SET disciplina = '".$_POST['valor']."'
                                                                        WHERE id=".$_POST['identificacao']);

            }elseif($_POST['deletar']==true){

                $deletar=$db_classificacao_write->query("DELETE FROM disciplinas WHERE id=".$_POST['identificacao']);

            }
?>