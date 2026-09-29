<?php
if($_SERVER['HTTP_HOST']=='localhost'){
    $previo="./";
    }else if($_SERVER['HTTP_HOST']=='escolasilverio.intranet'){
    $previo="http://escolasilverio.intranet/";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href=<?php echo $previo."css/corpo.css" ?>>
    <title>Silverio da Costa Novo</title>
</head>
<body>
    <div id="cabeca">
    <img src=<?php echo $previo."img/img.png"?> id="silverio" alt="logotipo da escola silverio da costa novo , envolto por um semi circulo vazado">
    </div>
    <div id="modelar">
    <div id="buttomizar">
        <ul>
            <li class="drop buttonformat">
                Cadastro
                <ul class="down">
                    <li>
                        <button class="buttonformat" onclick="alunos()">Alunos</button>
                        <button class="buttonformat" onclick="turmas()">Turmas</button>
                        <button class="buttonformat" onclick="disciplinas()">Disciplinas</button>
                    </li>
                </ul>
            </li>
        
            <li class="drop buttonformat">
                Atrasos
                <ul class="down">
                    <li><button class="buttonformat" onclick="atrazos()">adicionar</button></li> 
                    <li><a href=<?php echo $previo."php/imprimir3.php"?> target="__blank"><button class="buttonformat">p/ aluno</button></a></li>
                    <li><a href=<?php echo $previo."php/imprimir4.php"?> target="__blank"><button class="buttonformat">em minutos</button></a></li>
                    <li><a href=<?php echo $previo."php/imprimir5.php"?> target="__blank"><button class="buttonformat">Total Tempo</button></a></li>
                </ul>
            </li>
            <li class="drop buttonformat">
                Listas
                <ul class="down">
            <li>
                <button class="buttonformat" onclick="notas()">Notas</button>
                <a href=<?php echo $previo."php/imprimir.php"?> target="__blank"><button class="buttonformat">imprimir</button></a>
                <a href=<?php echo $previo."php/imprimir2.php"?> target="__blank" ><button class="buttonformat">Desempate</button></a>
            </li>
            </ul>
        </li>
    </ul>
    </div>
    <div id="conteudo">
    </div>
    </div>
   
</body>
<script src=<?php echo $previo."js/funcoes.js"?>></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
</html>

<?php

?>
