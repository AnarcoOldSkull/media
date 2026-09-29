<?php
require_once("mysqli.php");
require_once("funcoes.php");
error_reporting(E_ERROR | E_PARSE);

$aluninhos = $db_classificacao_read->query(
    "SELECT aluno
        FROM
        notas
        WHERE ano='".date('Y')."' AND serie='1' OR serie='2' OR serie='3'
        ORDER BY aluno"
        );
    while($identifica=$aluninhos->fetch_assoc()){
        $conjuntoalunos[$identifica['aluno']]=$identifica['aluno'];
        }
        $aluninhos2 = $db_classificacao_read->query(
            "SELECT aluno
        FROM
        notas
        WHERE ano='".date('Y')."' AND serie='4' OR serie='5' OR serie='6' OR serie='7'
        ORDER BY aluno"
        );
        while($identifica2=$aluninhos2->fetch_assoc()){
        $conjuntoalunos2[$identifica2['aluno']]=$identifica2['aluno'];
        }
        $aluninhos3 = $db_classificacao_read->query(
            "SELECT aluno
        FROM
        notas
        WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
        ORDER BY aluno"
        );
        while($identifica3=$aluninhos3->fetch_assoc()){
            $conjuntoalunos3[$identifica3['aluno']]=$identifica3['aluno'];
        }
            /**
             * 3 ao 5
             * primeiro trimestre
             */
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
            $media1[$atribuindo1['aluno']]='Aluno em EAC';
            }
            /**
             * segundo trimestre
            */
            $mediass =[];
            $conteudos=$db_classificacao_read->query(
                "SELECT aluno,
            MIN(strimestre) AS minimas,
            AVG(strimestre) AS media1s 
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='1' OR serie='2' OR serie='3'
            GROUP BY aluno
            HAVING minimas>=6
            ORDER BY media1s DESC");
            while($atribuindos=$conteudos->fetch_assoc()){
                $mediass[$atribuindos['aluno']]=$atribuindos['media1s'];
                }
                $conteudo1s=$db_classificacao_read->query(
                    "SELECT aluno,
            MIN(strimestre) AS minimas
            FROM 
            notas
            WHERE ano='".date('Y')."' AND serie='1' OR serie='2' OR serie='3'
            GROUP BY aluno
            HAVING minimas<6");
            while($atribuindo1s=$conteudo1s->fetch_assoc()){
                $medias1s[$atribuindo1s['aluno']]='Aluno em EAC';
                }
                
                
                /**
                 * 6 ao 9
                 * primeiro trimestre
                */
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
                $media2[$atribuindo22['aluno']]='Aluno em EAC';
                }
                /**
                 * segundo trimestre
                */
                $mediass2 =[];
                $conteudos2=$db_classificacao_read->query(
                    "SELECT aluno,
                MIN(strimestre) AS minimas,
                AVG(strimestre) AS media2s 
                FROM 
                notas
                WHERE ano='".date('Y')."' AND serie='4' OR serie='5' OR serie='6' OR serie='7'
                GROUP BY aluno
                HAVING minimas>=6
                ORDER BY media2s DESC");
                while($atribuindos2=$conteudos2->fetch_assoc()){
                    $mediass2[$atribuindos2['aluno']]=$atribuindos2['media2s'];
                    }
                    $conteudo2s=$db_classificacao_read->query(
                        "SELECT aluno,
                MIN(strimestre) AS minimas
                FROM 
                notas
                WHERE ano='".date('Y')."' AND serie='4' OR serie='5' OR serie='6' OR serie='7'
                GROUP BY aluno
                HAVING minimas<6");
                while($atribuindo2s=$conteudo2s->fetch_assoc()){
                    $medias2s[$atribuindo2s['aluno']]='Aluno em EAC';
                    }
            /***
             * 1série a 3 serie  
             **/        
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
                $media3[$atribuindo33['aluno']]='Aluno em EAC';
                }
                /**
                 * segundo trimestre
                */
                $mediass3 =[];
                $conteudos3=$db_classificacao_read->query(
                    "SELECT aluno,
                MIN(strimestre) AS minimas,
                AVG(strimestre) AS media3s 
                FROM 
                notas
                WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
                GROUP BY aluno
                HAVING minimas>=6
                ORDER BY media3s DESC");
                while($atribuindos3=$conteudos3->fetch_assoc()){
                    $mediass3[$atribuindos3['aluno']]=$atribuindos3['media3s'];
                    }
                    $conteudo3s=$db_classificacao_read->query(
                        "SELECT aluno,
                MIN(strimestre) AS minimas
                FROM 
                notas
                WHERE ano='".date('Y')."' AND serie='8' OR serie='9' OR serie='10'
                GROUP BY aluno
                HAVING minimas<6");
                while($atribuindo3s=$conteudo3s->fetch_assoc()){
                    $medias3s[$atribuindo3s['aluno']]='Aluno em EAC';
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
    <th>Média 1° T</th>
    <th>Média 2° T</th>
    <th>Média Total</th>
    </tr>
    </thead>
    <tbody>";
    $i=1;
    $j=1;
    foreach($conjuntoalunos as $alunos){
        if($media1[$alunos] == 'Aluno em EAC' || $medias1s[$alunos] =='Aluno em EAC'){

            $exibicao[$alunos][0]='Aluno em EAC';
            if($media1[$alunos]=='Aluno em EAC'){
                    $exibicao[$alunos][1]='Aluno em EAC';
                }else{
                    $exibicao[$alunos][1]=$medias[$alunos];
            }
            if($medias1s[$alunos]=='Aluno em EAC'){
                  $exibicao[$alunos][2]='Aluno em EAC';
                }else{
                  $exibicao[$alunos][2]=$mediass[$alunos];
            }
        }else{

            $exibicao[$alunos][0]=($medias[$alunos]+$mediass[$alunos])/2;
            $exibicao[$alunos][1]=$medias[$alunos];
            $exibicao[$alunos][2]=$mediass[$alunos];
        }
    }
    arsort($exibicao);
   foreach($exibicao as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
       }else{
               $tabela.="<tr>
                           <td>$i</td>
                           <td>".identificaSerie(alunoSerie($aluno))."</td>
                           <td>".identificaTurma(alunoTurma($aluno))."</td>
                           <td>".identificaAluno($aluno)."</td>
                           <td>".number_format($pontuacao[1],2)."</td>
                           <td>".number_format($pontuacao[2],2)."</td>
                           <td>".number_format($pontuacao[0],2)."</td>
                           </tr>";
              $i++; 
              $j++;
              if($j==21){
                  $tabela.='<tr style="page-break-after: always;"></tr>';
                  $j=1;
           }
       }
   }
   foreach($exibicao as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
           $tabela.="<tr>
                       <td>$i</td>
                       <td>".identificaSerie(alunoSerie($aluno))."</td>
                       <td>".identificaTurma(alunoTurma($aluno))."</td>
                       <td>".identificaAluno($aluno)."</td>";
                        if($pontuacao[1]=='Aluno em EAC'){
                            $tabela.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela.="<td>".number_format($pontuacao[1],2)."</td>";
                        }
                        if($pontuacao[2]=='Aluno em EAC'){
                            $tabela.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela.="<td>".number_format($pontuacao[2],2)."</td>";
                        }
                
            $tabela.="<td>Aluno em EAC</td>
                           </tr>";
          $i++; 
          $j++;
          if($j==21){
              $tabela.='<tr style="page-break-after: always;"></tr>';
              $j=1;
       }
       }
   }
   /*
   foreach($medias as $alunos=>$pontuacao){
    if($pontuacao=='Aluno em EAC'){
        
    }else{
        $tabela.="<tr>
    <td>$i</td>
    <td>".identificaSerie(alunoSerie($alunos))."</td>
    <td>".identificaTurma(alunoTurma($alunos))."</td>
    <td>".identificaAluno($alunos)."</td>
    <td>".number_format($pontuacao,2)."</td>
    
    <td>".number_format(($pontuacao+$mediass[$alunos])/2,2)."</td>
    </tr>";
    $i++; 
    $j++;
    if($j==35){
        $tabela.='<tr style="page-break-after: always;"></tr>';
        $j=1;
        }
        }
        }
        
        foreach($medias as $alunos=>$pontuacao){
            if($pontuacao=='Aluno em EAC'){
            $tabela.="<tr>
            <td>$i</td>
            <td>".identificaSerie(alunoSerie($alunos))."</td>
            <td>".identificaTurma(alunoTurma($alunos))."</td>
            <td>".identificaAluno($alunos)."</td>
            <td>$pontuacao</td>
            </tr>";
            $i++; 
            if($j==35){
            $tabela.='<tr style="page-break-after: always;"></tr>';
            $j=1;
            }
            }else{
        }
    }
    */
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
    <th>Média 1° T</th>
    <th>Média 2° T</th>
    <th>Média Total</th>
    </tr>
    </thead>
    <tbody>";
    $i=1;
    $j=1;
       foreach($conjuntoalunos2 as $alunos){
        if($media2[$alunos] == 'Aluno em EAC' || $medias2s[$alunos] =='Aluno em EAC'){

            $exibicao2[$alunos][0]='Aluno em EAC';
            if($media2[$alunos]=='Aluno em EAC'){
                    $exibicao2[$alunos][1]='Aluno em EAC';
                }else{
                    $exibicao2[$alunos][1]=$medias2[$alunos];
            }
            if($medias2s[$alunos]=='Aluno em EAC'){
                  $exibicao2[$alunos][2]='Aluno em EAC';
                }else{
                  $exibicao2[$alunos][2]=$mediass2[$alunos];
            }
        }else{

            $exibicao2[$alunos][0]=($medias2[$alunos]+$mediass2[$alunos])/2;
            $exibicao2[$alunos][1]=$medias2[$alunos];
            $exibicao2[$alunos][2]=$mediass2[$alunos];
        }
    }

    arsort($exibicao2);
   foreach($exibicao2 as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
       }else{
               $tabela2.="<tr>
                           <td>$i</td>
                           <td>".identificaSerie(alunoSerie($aluno))."</td>
                           <td>".identificaTurma(alunoTurma($aluno))."</td>
                           <td>".identificaAluno($aluno)."</td>
                           <td>".number_format($pontuacao[1],2)."</td>
                           <td>".number_format($pontuacao[2],2)."</td>
                           <td>".number_format($pontuacao[0],2)."</td>
                           </tr>";
              $i++; 
              $j++;
              if($j==21){
                  $tabela.='<tr style="page-break-after: always;"></tr>';
                  $j=1;
           }
       }
   }
   foreach($exibicao2 as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
           $tabela2.="<tr>
                       <td>$i</td>
                       <td>".identificaSerie(alunoSerie($aluno))."</td>
                       <td>".identificaTurma(alunoTurma($aluno))."</td>
                       <td>".identificaAluno($aluno)."</td>";
                        if($pontuacao[1]=='Aluno em EAC'){
                            $tabela2.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela2.="<td>".number_format($pontuacao[1],2)."</td>";
                        }
                        if($pontuacao[2]=='Aluno em EAC'){
                            $tabela2.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela2.="<td>".number_format($pontuacao[2],2)."</td>";
                        }
                
            $tabela2.="<td>Aluno em EAC</td>
                           </tr>";
          $i++; 
          $j++;
          if($j==21){
              $tabela2.='<tr style="page-break-after: always;"></tr>';
              $j=1;
       }
       }
   }
   
   /*
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
        */
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
    <th>Média 1° T</th>
    <th>Média 2° T</th>
    <th>Média Total</th>
    </tr>
    </thead>
    <tbody>";
    $i=1;
    $j=1;
       foreach($conjuntoalunos3 as $alunos){
        if($media3[$alunos] == 'Aluno em EAC' || $medias3s[$alunos] =='Aluno em EAC'){

            $exibicao3[$alunos][0]='Aluno em EAC';
            if($media3[$alunos]=='Aluno em EAC'){
                    $exibicao3[$alunos][1]='Aluno em EAC';
                }else{
                    $exibicao3[$alunos][1]=$medias3[$alunos];
            }
            if($medias3s[$alunos]=='Aluno em EAC'){
                  $exibicao3[$alunos][2]='Aluno em EAC';
                }else{
                  $exibicao3[$alunos][2]=$mediass3[$alunos];
            }
        }else{

            $exibicao3[$alunos][0]=($medias3[$alunos]+$mediass3[$alunos])/2;
            $exibicao3[$alunos][1]=$medias3[$alunos];
            $exibicao3[$alunos][2]=$mediass3[$alunos];
        }
    }
    arsort($exibicao3);
   foreach($exibicao3 as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
       }else{
               $tabela3.="<tr>
                           <td>$i</td>
                           <td>".identificaSerie(alunoSerie($aluno))."</td>
                           <td>".identificaTurma(alunoTurma($aluno))."</td>
                           <td>".identificaAluno($aluno)."</td>
                           <td>".number_format($pontuacao[1],2)."</td>
                           <td>".number_format($pontuacao[2],2)."</td>
                           <td>".number_format($pontuacao[0],2)."</td>
                           </tr>";
              $i++; 
              $j++;
              if($j==21){
                  $tabela.='<tr style="page-break-after: always;"></tr>';
                  $j=1;
           }
       }
   }
   foreach($exibicao3 as $aluno=>$pontuacao){
       if($pontuacao[0]=='Aluno em EAC'){
           $tabela3.="<tr>
                       <td>$i</td>
                       <td>".identificaSerie(alunoSerie($aluno))."</td>
                       <td>".identificaTurma(alunoTurma($aluno))."</td>
                       <td>".identificaAluno($aluno)."</td>";
                        if($pontuacao[1]=='Aluno em EAC'){
                            $tabela3.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela3.="<td>".number_format($pontuacao[1],2)."</td>";
                        }
                        if($pontuacao[2]=='Aluno em EAC'){
                            $tabela3.="<td>Aluno em EAC</td>";
                        }else{
                            $tabela3.="<td>".number_format($pontuacao[2],2)."</td>";
                        }
                
            $tabela3.="<td>Aluno em EAC</td>
                           </tr>";
          $i++; 
          $j++;
          if($j==21){
              $tabela3.='<tr style="page-break-after: always;"></tr>';
              $j=1;
       }
       }
   }
    /*
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
        */
    $tabela3.="</tbody>
    </table>";

    echo $tabela;
    echo "<div style='page-break-before: always'>";
    echo $tabela2;
    echo "<div style='page-break-before: always'>";
    echo $tabela3;
?>
<script>print();</script>