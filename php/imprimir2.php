<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

    $medias3 =[];

            $conteudo33=$db_classificacao_read->query(
            "SELECT aluno,
            MIN(ptrimestre) AS minima,
            AVG(ptrimestre) AS media3 
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
            GROUP BY aluno
            HAVING minima<6
            ORDER BY media3 DESC");
            while($atribuindo33=$conteudo33->fetch_assoc()){
                $medias3[$atribuindo33['aluno']]=$atribuindo33['media3'];
        }
            
            $tabela3="<table>
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
    <th colspan='4'>1ª a 3ª Série</th>
    </tr>
    <tr>
    <th>Posição</th>
    <th>Série</th>
    <th>Turma</th>
    <th>Aluno</th>
    <th>Média</th>
    </tr>
    </thead>
    <tbody>";

    $i=1;
    $j=1;

    foreach($medias3 as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            
        }else{
            $tabela3.="<tr>
                        <td>$i</td>
                        <td>".identificaSerie(alunoSerie($alunos))."</td>
                        <td>".identificaTurma(alunoTurma($alunos))."</td>
                        <td>".identificaAluno($alunos)."</td>
                        <td>".number_format($pontuacao,2)."</td>
                        </tr>";
           $i++; 
           $j++;
           if($j==35){
               $tabela3.='<tr style="page-break-after: always;"></tr>';
               $j=1;
           }
        }
    }foreach($medias3 as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            $tabela3.="<tr>
                        <td>$i</td>
                        <td>".identificaSerie(alunoSerie($alunos))."</td>
                        <td>".identificaTurma(alunoTurma($alunos))."</td>
                        <td>".identificaAluno($alunos)."</td>
                        <td>$pontuacao</td>
                        </tr>";
           $i++; 
        }else{
        }
    }
    $tabela3.="</tbody>
    </table>";

    echo $tabela3;
?>
<script>print();</script>