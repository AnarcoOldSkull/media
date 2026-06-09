function alunos(){
    document.getElementById('conteudo').innerHTML = `<div class="bloco">
                                                    <div class="labeamento">Ano:</div>
                                                    ${selectAno()}
                                                    </div>
                                                    <div class="bloco">
                                                    <div class="labeamento">Série: </div>
                                                    ${serieTurmas()} </div>
                                                    <div class="bloco2">
                                                    <div class="labeamento">Turmas: </div>
                                                    <div class="turma">&nbsp</div>
                                                    </div>
                                                    <div class="bloco">
                                                    <div class="labeamento">Adicionar Aluno:</div>
                                                    <input type="text" name="nomealuno" id="nomealuno"/></div>
                                                    <div class="bloco"><button class="buttonformat" class="inserir" onclick="enviar('alunos')">Inserir</button></div>
                                                    <div class="listagem"></div>`;
                                                    getAlunos();
}
function notas(){
    document.getElementById('conteudo').innerHTML = `<div class="bloco">
                                                    <div class="labeamento">Ano:</div>
                                                    ${selectAno()}
                                                    </div>
                                                    <div class="bloco">
                                                    <div class="labeamento">Série: </div>
                                                    ${serieTurmas('buscar')} </div>
                                                    <div class="bloco2">
                                                    <div class="labeamento">Turmas: </div>
                                                    <div class="turma">&nbsp</div>
                                                    </div>
                                                    <div class="bloco2">
                                                    <div class="labeamento">Aluno: </div>
                                                    <div class="disciplina">&nbsp</div>
                                                    </div>
                                                    </div>
                                                 
                                                    <div class="listagem"></div>`;
                                                    getNotas();
}
function turmas(){
    document.getElementById('conteudo').innerHTML = `<div class="bloco">
                                                    <div class="labeamento">Série: </div>
                                                    ${serie()} </div>
                                                    <div class="bloco">
                                                    <div class="labeamento">Adicionar Turma:</div>
                                                    <input type="text" name="nometurma" id="nometurma"/></div>
                                                    <div class="bloco">
                                                    <div class="labeamento">&nbsp</div>
                                                    ${selectAno()}
                                                    </div>
                                                    <div class="bloco"><button class="buttonformat" class="inserir" onclick="enviar('turma')">Inserir</button></div>
                                                    <div class="listagem"></div>`;
                                                    getTurmas();
    }
function disciplinas(){
    document.getElementById('conteudo').innerHTML = `<div class="bloco">
                                                <div class="labeamento">Ano:</div>
                                                ${selectAno()}
                                                </div>
                                                <div class="bloco">
                                                <div class="labeamento">Série: </div>
                                                ${serieTurmas()} </div>
                                                <div class="bloco2">
                                                <div class="labeamento">Turmas: </div>
                                                <div class="turma">&nbsp</div>
                                                </div>
                                                <div class="bloco">
                                                <div class="labeamento">Adicionar Disciplinas:</div>
                                                <input type="text" name="nomedisciplinas" id="nomedisciplinas"/></div>
                                                <div class="bloco"><button class="buttonformat" class="inserir" onclick="enviar('disciplinas')">Inserir</button></div>
                                                <div class="listagem"></div>`;
                                                getDisciplinas();
}

function serie(){
    return `<select name='serie' id='serie'focus>
            <option value=''>Selecione a Série</option>
            <option value='1'>3° ano</option>
            <option value='2'>4° ano</option>
            <option value='3'>5° ano</option>
            <option value='4'>6° ano</option>
            <option value='5'>7° ano</option>
            <option value='6'>8° ano</option>
            <option value='7'>9° ano</option>
            <option value='8'>1° série</option>
            <option value='9'>2° série</option>
            <option value='10'>3° série</option>
            </select>`;
}
function serieTurmas(buscar){
    return `<select name='serie' id='serie' onchange='buscaTurmas("${buscar}")'>
            <option value=''>Selecione a Série</option>
            <option value='1'>3° ano</option>
            <option value='2'>4° ano</option>
            <option value='3'>5° ano</option>
            <option value='4'>6° ano</option>
            <option value='5'>7° ano</option>
            <option value='6'>8° ano</option>
            <option value='7'>9° ano</option>
            <option value='8'>1° série</option>
            <option value='9'>2° série</option>
            <option value='10'>3° série</option>
            </select>`;
}
function selectAno(){
    let atual = new Date().getFullYear();
    let opcoes = "";
    for(let i = 2026; i<=atual; i++){
        opcoes+=`<option value="${i}">${i}</option>`;
    }
    let selecionavel = `<select id="ano" name="ano">
                        <option value="">Selecionar Ano</option>
                        ${opcoes}
                        </select>`;
    return selecionavel;
}

function getTurmas(){
    $.post("php/turmas.php",{turmas: true })
    .done(function(data){
        if(data=="" || data==false){
            $(".listagem").append("Nenhum dado inserido ainda na lista");
        }else{
            $(".listagem").empty();
            $(".listagem").append(data);
            $(document).ready(function(){
                $('#listaTurma').DataTable({order: [[0, 'desc']]});
            });
        }
    });
}
function getDisciplinas(){
    $.post("php/disciplinas.php",{disciplinas: true })
    .done(function(data){
        if(data=="" || data==false){
            $(".listagem").append("Nenhum dado inserido ainda na lista");
        }else{
            $(".listagem").empty();
            $(".listagem").append(data);
            $(document).ready(function(){
                $('#listaDisciplina').DataTable({order: [[0, 'desc']]});
            });
        }
    });
}
function getAlunos(){
    $.post("php/alunos.php",{alunos: true })
    .done(function(data){
        if(data=="" || data==false){
            $(".listagem").append("Nenhum dado inserido ainda na lista");
        }else{
            $(".listagem").empty();
            $(".listagem").append(data);
            $(document).ready(function(){
                $('#listaAluno').DataTable({order: [[0, 'desc']],"pageLength": 50});
            });
        }
    });
}
function getNotas(){
    $.post("php/notas.php",{alunos: true })
    .done(function(data){
        if(data=="" || data==false){
            $(".listagem").append("Nenhum dado inserido ainda na lista");
        }else{
            $(".listagem").empty();
            $(".listagem").append(data);
            $(document).ready(function(){
                $('#listaNota').DataTable({order: [[0, 'desc']]});
            });
        }
    });
}
function buscaTurmas(disciplina){
    let serie = $("#serie").val();
    let ano= $("#ano").val();
    if(disciplina == "buscar"){
        let disciplina = 'buscar';
    }else{ 
        let disciplina = false;
    }
    let teste = document.getElementById('alunoDisc');
    if(teste!=null){
        $(".disciplina").empty();
    }
    $.post("php/turmas.php",{busca: serie, ano:ano, disciplinar: disciplina })
    .done(function(data){
        $(".turma").empty();
        $(".turma").append(data);
    })
}
function verificaNotas(){
    let serie = $("#serie").val();
    let ano= $("#ano").val();
    let turma= $("#turmaDisc").val();
    $.post("php/notas.php",{serie: serie, ano:ano, turma: turma})
    .done(function(data){
        if(data!=""){
        alert(data);
        }
    })
}
function buscaDisciplina(){
    let serie = $("#serie").val();
    let turma = $("#turmaDisc").val();
    let ano= $("#ano").val();
    $.post("php/disciplinas.php",{busca: serie, turbulencia:turma, ano:ano })
    .done(function(data){
        $(".disciplina").empty();
        $(".disciplina").append(data);
    })
}
function buscaNotas(){
    let serie = $("#serie").val();
    let turma = $("#turmaDisc").val();
    let ano= $("#ano").val();
    let aluno= $("#alunoDisc").val();
    $.post("php/notas.php",{series: serie, turmas:turma, anos:ano, aluno: aluno })
    .done(function(data){
        $(".listagem").empty();
        $(".listagem").append(data);
        $(document).ready(function(){
            $('#listaAluno').DataTable({"pageLength": 25});
        });
    })
}
function buscaAluno(){
    let serie = $("#serie").val();
    let turma = $("#turmaDisc").val();
    let ano= $("#ano").val();
    $.post("php/alunos.php",{busca: serie, turba:turma, ano:ano })
    .done(function(data){
        $(".disciplina").empty();
        $(".disciplina").append(data);
    })
}
function enviar(arquivo){
    if(arquivo=='turma'){
        let turma= $("#nometurma").val();
        let serie= $("#serie").val();
        let ano= $("#ano").val();
        $.post(`php/${arquivo}.php`,{turma: turma, serie: serie, ano: ano })
        .done(function(data){
            $("#nometurma").val("");
            $("#serie").val("");
            $("#ano").val("");
            $(".listagem").empty();
            $(".listagem").append(getTurmas());
            $(document).ready(function(){
                $('#listaTurma').DataTable({order: [[0, 'desc']]});
            });
        })
    }else if(arquivo=='disciplinas'){
        let turma= $("#turmaDisc").val();
        let disciplina= $("#nomedisciplinas").val();
        let serie= $("#serie").val();
        let ano= $("#ano").val();
        $.post(`php/${arquivo}.php`,{turmas: turma, disciplina: disciplina, serie: serie, ano: ano })
        .done(function(data){
            $("#nomedisciplinas").val("");
            $(".listagem").empty();
            $(".listagem").append(getDisciplinas());
            $(document).ready(function(){
                $('#listaDisciplina').DataTable({order: [[0, 'desc']]});
            });
            
        })
    }else if(arquivo=='alunos'){
        let turma= $("#turmaDisc").val();
        let aluno= $("#nomealuno").val();
        let serie= $("#serie").val();
        let ano= $("#ano").val();
        $.post(`php/${arquivo}.php`,{turmas: turma, aluno: aluno, serie: serie, ano: ano })
        .done(function(data){
            $("#nomealuno").val("");
            $(".listagem").empty();
            $(".listagem").append(getAlunos());
            $(document).ready(function(){
                $('#listaAluno').DataTable({order: [[0, 'desc']]});
            });
            
        })
    }
}

function editar(identificacao,tabelas,valor){
    $(`#ajustar${identificacao}`).empty();
    $(`#ajustar${identificacao}`).append(`<input type='text' id='atualizando' value='${valor}' onblur="atualizar(${identificacao},'${tabelas}')" />`)
}
function atualizar(identificacao, tabelal){
    var valor = $("#atualizando").val();
    var identifica = identificacao;
    var tabel = tabelal;
    $.post(`php/${tabel}.php`,{tabela: tabel, identificacao: identifica, editar: true, valor: valor})
    .done(function(data){
        $(`.listagem`).empty();
        if(tabelal=='turmas'){
            variavel = getTurmas();
        }else if(tabelal=='disciplinas'){
            variavel = getDisciplinas();
        }else if(tabelal=='alunos'){
            variavel = getAlunos();
        }
        $(`.listagem`).append(variavel);
    })
}
function deletar(identificacao, tabela){
    $.post(`php/${tabela}.php`,{tabela: tabela, identificacao: identificacao, deletar: true})
    .done(function(data){
        $(`.listagem`).empty();
        if(tabela=='turmas'){
            variavel = getTurmas();
        }else if(tabela=='disciplinas'){
            variavel = getDisciplinas();
        }else if(tabela=='alunos'){
            variavel = getAlunos();
        }
        $(`.listagem`).append(variavel);
    })
}
function inserirNotaAluno(id, trimestre){
    var identificacao = id;
    var trimes="";
    var onde="";
    if(trimestre==1){
        trimes = "ptrimestre";
        onde="ptri"+identificacao;
    }else if(trimestre==2){
        trimes ="strimestre";
        onde="stri"+identificacao;
    }
    let nota= $("#insNota"+id).val();

    $.post("php/notas.php",{identificacao: identificacao, trimestre:trimes, nota:nota})
    .done(function(data){
        if(data==""){
            let adiciona ="<input type='text' name='insNota"+identificacao+"' id='insNota"+identificacao+"' onblur=\"inserirNotaAluno('"+identificacao+"','"+trimestre+"' )\"/>";
            $("#"+onde).empty();
            $("#"+onde).append(adiciona);
        }else{
        $("#"+onde).empty();
        $("#"+onde).append(data);
        }
    })
}
function editarNotaAluno(identificacao,trimestre){
    var onde="";
    if(trimestre==1){
        onde="ptri"+identificacao;
    }else if(trimestre==2){
        onde="stri"+identificacao;
    }
    let adiciona ="<input type='text' name='insNota"+identificacao+"' id='insNota"+identificacao+"' onblur=\"inserirNotaAluno('"+identificacao+"','"+trimestre+"' )\"/>";
    $("#"+onde).empty();
    $("#"+onde).append(adiciona);
}   