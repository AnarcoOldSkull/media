<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

    $medias =[];
            $conteudo=$db_classificacao_read->query(
            "SELECT aluno,
            MIN(ptrimestre) AS minima,
            AVG(ptrimestre) AS media1 
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='1' OR serie='2' OR serie='3'
            GROUP BY aluno
            HAVING minima>=6
            ORDER BY media1 DESC");
        while($atribuindo=$conteudo->fetch_assoc()){
            $medias[$atribuindo['aluno']]=$atribuindo['media1'];
        }
        $conteudo1=$db_classificacao_read->query(
        "SELECT aluno,
        MIN(ptrimestre) AS minima
        FROM 
        notas
        WHERE ano='".date('Y')."' AND serie='1' OR serie='2' OR serie='3'
        GROUP BY aluno
        HAVING minima<6");
        while($atribuindo1=$conteudo1->fetch_assoc()){
            $medias[$atribuindo1['aluno']]='Aluno em EAC';
    }
    
    $medias2 =[];
    
    $conteudo2=$db_classificacao_read->query(
        "SELECT aluno,
            MIN(ptrimestre) AS minima,
            AVG(ptrimestre) AS media2 
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='4' OR serie='5' OR serie='6' OR serie='7'
            GROUP BY aluno
            HAVING minima>=6
            ORDER BY media2 DESC");
            while($atribuindo2=$conteudo2->fetch_assoc()){
                $medias2[$atribuindo2['aluno']]=$atribuindo2['media2'];
                }
            $conteudo22=$db_classificacao_read->query(
                "SELECT aluno,
            MIN(ptrimestre) AS minima
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='4' OR serie='5' OR serie='6' OR serie='7'
            GROUP BY aluno
            HAVING minima<6");
            while($atribuindo22=$conteudo22->fetch_assoc()){
                $medias2[$atribuindo22['aluno']]='Aluno em EAC';
                }
                
    $medias3 =[];

    $conteudo3=$db_classificacao_read->query(
            "SELECT aluno, 
            MIN(ptrimestre) AS minima,
            AVG(ptrimestre) AS media3 
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
            GROUP BY aluno
            HAVING minima>=6
            ORDER BY media3 DESC");
        while($atribuindo3=$conteudo3->fetch_assoc()){
            $medias3[$atribuindo3['aluno']]=$atribuindo3['media3'];
            }
            $conteudo33=$db_classificacao_read->query(
            "SELECT aluno,
            MIN(ptrimestre) AS minima
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
            GROUP BY aluno
            HAVING minima<6");
            while($atribuindo33=$conteudo33->fetch_assoc()){
                $medias3[$atribuindo33['aluno']]='Aluno em EAC';
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
    <th colspan='4'>3ª a 5ª anos</th>
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

    foreach($medias as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            
        }else{
            $tabela.="<tr>
                        <td>$i</td>
                        <td>".identificaSerie(alunoSerie($alunos))."</td>
                        <td>".identificaTurma(alunoTurma($alunos))."</td>
                        <td>".identificaAluno($alunos)."</td>
                        <td>".number_format($pontuacao,2)."</td>
                        </tr>";
           $i++; 
           $j++;
           if($j==35){
               $tabela.='<tr style="page-break-after: always;"></tr>';
               $j=1;
           }
        }
    }foreach($medias as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            $tabela.="<tr>
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
    $tabela.="</tbody>
    </table>";


$tabela2="<table>
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
    <th colspan='4'>6ª a 9ª anos</th>
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

    foreach($medias2 as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            
        }else{
            $tabela2.="<tr>
                        <td>$i</td>
                        <td>".identificaSerie(alunoSerie($alunos))."</td>
                        <td>".identificaTurma(alunoTurma($alunos))."</td>
                        <td>".identificaAluno($alunos)."</td>
                        <td>".number_format($pontuacao,2)."</td>
                        </tr>";
           $i++; 
           $j++;
           if($j==35){
               $tabela2.='<tr style="page-break-after: always;"></tr>';
               $j=1;
           }
        }
    }foreach($medias2 as $alunos=>$pontuacao){
        if($pontuacao=='Aluno em EAC'){
            $tabela2.="<tr>
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
    $tabela2.="</tbody>
    </table>";
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
    <th colspan='4'>1ª a 3ª série</th>
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

    echo $tabela;
    echo "<div style='page-break-before: always'>";
    echo $tabela2;
    echo "<div style='page-break-before: always'>";
    echo $tabela3;
?>
<script>print();</script>