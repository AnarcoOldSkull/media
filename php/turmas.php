<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);
if($_POST["turmas"]==true){
    $i=1;
    $turminar=$db_classificacao_read->query("SELECT * FROM turmas");
    while($turminha=$turminar->fetch_assoc()){
        $turma[$i]=$turminha;
        $i++;
    }
    $tabela = "<table id='listaTurma'  class='cell-border'>
    <thead>
                    <tr>
                    <th>id</th>
                    <th>ano</th>
                    <th>série</th>
                    <th>turma</th>
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
                  <td id='ajustar".$conteudo['id']."'>".$conteudo['turma']."</td>
                  <td>
                  <button title='Editar ".$conteudo['turma']."' class='editar' onclick=\"editar(".$conteudo['id'].",'turmas','".$conteudo['turma']."')\"><i class='bi bi-pencil'></i></button>
                  <button title='Deletar ".$conteudo['turma']."' class='deletar' onclick=\"deletar(".$conteudo['id'].",'turmas')\"><i class='bi bi-trash-fill'></i></button>
                  </td>
                  </tr>";
    }
                      
                    $tabela.="</tbody></table>";
                    echo $tabela;
                    }elseif($_POST['turma']!="" && $_POST['serie']!="" && $_POST['ano']!=""){
                        
                        $cadastrar=$db_classificacao_write->query("INSERT INTO turmas (serie, 
                                                                   turma,
                                                                    ano) 
                                                               VALUES 
                                                               ('".$_POST["serie"]."',
                                                               '".$_POST["turma"]."',
                                                               '".$_POST['ano']."')");
                                                               }elseif($_POST['busca']!="" && $_POST['ano']!=""){
                                                                   $turminar=$db_classificacao_read->query("SELECT * FROM turmas WHERE serie='".$_POST['busca']."' AND ano='".$_POST['ano']."'");
                                                                   while($turminha=$turminar->fetch_assoc()){
                                                                       $turma[$i]=$turminha;
                                                                       $i++;
                                                                       }
                                                                       $selecionavel = "<select id='turmaDisc' name='turmaDisc' ";
                                                                       if($_POST['disciplinar']=='buscar'){
                                                                        $selecionavel.= "onchange='buscaAluno();verificaNotas()'";
                                                                       }
                                                                       $selecionavel.=">";
                                                                       $selecionavel.="<option value=''>Selecione a turma</option>";
                                                                       foreach($turma as $conteudo){
                                                                           $selecionavel.="<option value='".$conteudo['id']."'>".$conteudo['turma']."</option>";
                                                                           }
                                                                           
                                                                           $selecionavel.="</select>";
                                                                           echo $selecionavel;
                        }elseif($_POST['editar']==true){

                            $editar=$db_classificacao_write->query("UPDATE turmas SET turma = '".$_POST['valor']."'
                                                                        WHERE id=".$_POST['identificacao']);

                        }elseif($_POST['deletar']==true){

                            $deletar=$db_classificacao_write->query("DELETE FROM turmas WHERE id=".$_POST['identificacao']);

                        }
?>