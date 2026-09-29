<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

if($_POST["atrazos"]==true){
    $i=1;
    $turminar=$db_classificacao_read->query("SELECT * FROM atrazos ORDER BY id DESC");
    while($turminha=$turminar->fetch_assoc()){
        $turma[$i]=$turminha;
        $i++;
    }
    $tabela = "<table id='listaAtrazo'  class='cell-border'>
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>ano</th>
                    <th>série</th>
                    <th>turma</th>
                    <th>aluno</th>
                    <th>Data</th>
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
                  <td>".identificaAluno($conteudo['aluno'])."</td>
                  <td id='ajustar".$conteudo['id']."'>".date('d/m/Y H:i:s',$conteudo['quando'])."</td>
                  <td>
                  <button title='Editar ".$conteudo['id']."' class='editar' onclick=\"editar(".$conteudo['id'].",'atrazos',".$conteudo['quando'].")\"><i class='bi bi-pencil'></i></button>
                  <button title='Deletar ".$conteudo['id']."' class='deletar' onclick=\"deletar(".$conteudo['id'].",'atrazos')\"><i class='bi bi-trash-fill'></i></button>
                  </td>
                  </tr>";
    }
                      
                    $tabela.="</tbody></table>";
                    echo $tabela;
    }elseif($_POST['aluno']!="" && $_POST['turmas']!="" && $_POST['serie']!="" && $_POST['ano']!="" && $_POST['atrazado']!=""){
        
        $cadastrar=$db_classificacao_write->query("INSERT INTO atrazos     (serie, 
                                                                            turma,
                                                                            ano,
                                                                            aluno,
                                                                            quando) 
                                                VALUES 
                                                ('".$_POST["serie"]."',
                                                '".$_POST["turmas"]."',
                                                '".$_POST['ano']."',
                                                '".$_POST['aluno']."',
                                                '".(int)strtotime($_POST['atrazado'])."')");
    }elseif($_POST['editar']==true){
                            $editar=$db_classificacao_write->query("UPDATE atrazos SET quando = '".(int)strtotime($_POST['valor'])."'
                                                                        WHERE id=".$_POST['identificacao']);

    }elseif($_POST['deletar']==true){
        $deletar=$db_classificacao_write->query("DELETE FROM atrazos WHERE id=".$_POST['identificacao']);
    }
?>