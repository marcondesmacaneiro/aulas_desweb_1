//NESTA FUNÇÃO, QUANDO O USUÁRIO INFORMAR O GÊNERO, ELE PODERÁ SELECIONAR PARA ALTERAR OS DADOS
// É USADO UM ARRAY NO BECKBOX PARA INFORMAR QUAL VALOR FOI SELECIONADO.
function selecionar(){
    event.preventDefault();
    aCheckbox = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aCheckbox.push($(this).val());
    });
    if(aCheckbox.length > 1){
        $('#mensagem').empty().html('Não é possível selecionar mais que um registro!');
        $("#mensagem").css('display', 'block');
        $("#mensagem").attr('background-color', 'alert alert-danger');
        setTimeout(function () {
        $("#mensagem").css('display', 'none');
        }, 3000);
    }
    else{
        $.ajax({
            type: 'POST',
            url: 'genero/selecionar.php',
            data: {'codigo': aCheckbox[0]},
            success: function (data) {
                var aLocalizacoes = JSON.parse(data);
                $("#codigo").val(aLocalizacoes[0]);
                $("#genero").val(aLocalizacoes[1]);
            }
        });
    }
}
//NESTA FUNÇÃO SERÁ ENVIADO PARA A PÁGINA DE INSERÇÃO DE DADOS OU DE ALTERAÇÃO
//CONFORME A ESCOLHA DO USUÁRIO,  QUANDO A FUNÇÃO ESTIVER COMPLETA, OS CAMPOS FICARÃO EM BRANCO
//E A PÁGINA SERÁ ATUALIZADA COM O NOVO GÊNERO INFORMADO
function enviaDados(){
    event.preventDefault();
    var sUrl = '';
    var sCodigo = $("#codigo").val();
    if(sCodigo){
        sUrl = 'genero/update.php';
    }
    else{
        sUrl = 'genero/insert.php';
        sCodigo = '';
    }
    $.ajax({
        url: sUrl,
        type: 'POST',
        data: {
            codigo: sCodigo,
            genero: $("#genero").val()
        },
        success: function (data){
            $("#resultado").empty().html(data);
            $("#codigo").val("");
            $("#genero").val("");
            $("#mensagem").css('display', 'block');
            $("#mensagem").attr('class', 'alert alert-success');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
        },
        error: function () {
            $("#mensagem").html('Erro!!!');
        }        
    });
}
//NESTA FUNÇÃO FARÁ A LIGAÇÃO COM O ARQUIVO DELETAR O GÊNERO, QUE ASSIM QUE COMPLETA
// OS CAMPOS FICARAM EM BRANCO E A PÁGINA ATUALIZARÁ COM O ARQUIVO EXCLUIDO DO BANCO DE DADOS E DA PÁGINA
function deletar(){
    event.preventDefault();
    aDelete = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aDelete.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'genero/deletar.php',
        data: {'checkbox': aDelete},
        success: function (data){
            $("#resultado").empty().html(data);
            $("#mensagem").css('display', 'block');
            $("#mensagem").attr('class', 'alert alert-danger');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
        }
    });
}