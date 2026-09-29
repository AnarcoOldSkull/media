<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

    $medias =[];
            $conteudo=$db_classificacao_read->query(
            "SELECT *,
            Count(aluno) AS ocorrencias
            FROM 
            atrazos
            WHERE ano='".date('Y')."'
            GROUP BY aluno
            ORDER BY ocorrencias DESC");
        while($atribuindo=$conteudo->fetch_assoc()){
            $ocorrencias[$atribuindo['aluno']]=$atribuindo;
        }

        $tabela="<table>
            <thead>
            <tr>
            <th rowspan='4'>  <img src=\"../img/silverio.png\" alt=\"imblema representando a escola Silverio da Costa novo, envolto em um circulo vazado\"></th>
    <th colspan='4'>ESTADO DO RIO GRANDE DO SUL</th>
    </tr>
    <tr>
    <th></th>
    <th colspan='4'>SECRETARIA DA EDUCAÇÃO</th>
    </tr>
    <tr>
    <th></th>
    <th colspan='4'>18ª COORDENADORIA REGIONAL DE EDUCAÇÃO</th>
    </tr>
    <tr>
    <th></th>
    <th colspan='4'>ESCOLA ESTADUAL DE ENSINO MEDIO SILVERIO DA COSTA NOVO</th>
    </tr>
    <tr>
    <th></th>
    <th colspan='4'>Atrasos</th>
    </tr>
    <tr>
    <th>Posição</th>
    <th>Série</th>
    <th>Turma</th>
    <th>Aluno</th>
    <th>Ocorrências</th>
    </tr>
    </thead>
    <tbody>";
    $i=1;
    $j=1;

    foreach($ocorrencias as $alunos=>$pontuacao){
            $tabela.="<tr>
                        <td>$i</td>
                        <td>".identificaSerie($pontuacao['serie'])."</td>
                        <td>".identificaTurma($pontuacao['turma'])."</td>
                        <td>".identificaAluno($pontuacao['aluno'])."</td>
                        <td>".$pontuacao['ocorrencias']."</td>
                        </tr>";
           $i++; 
           $j++;
           if($j==35){
               $tabela.='<tr style="page-break-after: always;"></tr>';
               $j=1;
           }
        }

        echo $tabela;
?>
<script>print();</script>