<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

if($_POST["alunos"]==true){
    $i=1;
    $turminar=$db_classificacao_read->query("SELECT * FROM alunos ORDER BY id DESC");
    while($turminha=$turminar->fetch_assoc()){
        $turma[$i]=$turminha;
        $i++;
    }
    $tabela = "<table id='listaAluno'  class='cell-border'>
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>ano</th>
                    <th>série</th>
                    <th>turma</th>
                    <th>aluno</th>
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
                  <td id='ajustar".$conteudo['id']."'>".$conteudo['nome']."</td>
                  <td>
                  <button title='Editar ".$conteudo['nome']."' class='editar' onclick=\"editar(".$conteudo['id'].",'alunos','".$conteudo['nome']."')\"><i class='bi bi-pencil'></i></button>
                  <button title='Deletar ".$conteudo['nome']."' class='deletar' onclick=\"deletar(".$conteudo['id'].",'alunos')\"><i class='bi bi-trash-fill'></i></button>
                  </td>
                  </tr>";
    }
                      
                    $tabela.="</tbody></table>";
                    echo $tabela;
    }elseif($_POST['aluno']!="" && $_POST['turmas']!="" && $_POST['serie']!="" && $_POST['ano']!=""){

        $cadastrar=$db_classificacao_write->query("INSERT INTO alunos (serie, 
                                                                            turma,
                                                                            ano,
                                                                            nome) 
                                                VALUES 
                                                ('".$_POST["serie"]."',
                                                '".$_POST["turmas"]."',
                                                '".$_POST['ano']."',
                                                '".$_POST['aluno']."')");
}elseif($_POST['busca']!="" && $_POST['turba']!="" && $_POST['ano']!=""){
    $i=0;
    $turminar=$db_classificacao_read->query("SELECT * FROM alunos WHERE serie='".$_POST['busca']."' AND turma='".$_POST['turba']."' AND ano='".$_POST['ano']."' ORDER BY nome asc");
    while($turminha=$turminar->fetch_assoc()){
            $turma[$i]=$turminha;
            $i++;
            }
            if($_POST['atrazado']==1){
                $selecionavel = "<select id='alunoDisc' name='alunoDisc'>";
            }else{
                $selecionavel = "<select id='alunoDisc' name='alunoDisc'  ONCHANGE='buscaNotas()'>";
            }
            $selecionavel.="<option value=''>Selecione o aluno</option>";
            foreach($turma as $conteudo){
                $selecionavel.="<option value='".$conteudo['id']."'>".$conteudo['nome']."</option>";
            }
                
            $selecionavel.="</select>";
            echo $selecionavel;
            }elseif($_POST['editar']==true){

                            $editar=$db_classificacao_write->query("UPDATE alunos SET nome = '".$_POST['valor']."'
                                                                        WHERE id=".$_POST['identificacao']);

            }elseif($_POST['deletar']==true){

                $deletar=$db_classificacao_write->query("DELETE FROM alunos WHERE id=".$_POST['identificacao']);
                $deletar=$db_classificacao_write->query("DELETE FROM notas WHERE aluno=".$_POST['identificacao']);
            }
?>