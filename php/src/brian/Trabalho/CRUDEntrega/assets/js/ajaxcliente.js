var aChecks;
var sMensagem;

function verificaTamanho(sNome, iTamanho, input) {
    retorno = false;
    if (sNome.length < iTamanho) {
        retorno = true;
        sMensagem = 'O ' + input + ' é menor que ' + iTamanho + ' caracteres!';
    }
    return retorno;
}

/*Funcao que envia os dados através da requisicao ajax para a pagina de inserir 
 * caso nao exista valor no codigo ou para pagina de alterar caso exista. 
 * Na pagina inserir vai pegar os dados e inseri-los na tabela, e na alterar vai 
 * atualiza-los. Se tudo ocorrer bem limpa os inputs e da mensagem ok, ou se der 
 * errado mostra mensagem de erro */
function enviaDados() {
    event.preventDefault();
    var sUrl;
    var sCodigo = $("#codigo").val();
    if (verificaTamanho($('#nome').val(), 3, 'nome')) {
        $('#mensagem').empty().html(sMensagem);
        $("#mensagem").css('display','block');
        $("#mensagem").attr('class','alert alert-danger');
        setTimeout(function(){
            $("#mensagem").css('display','none');
        },5000);
    }else if ($("#select_enderecos").val() === ''){
        $('#mensagem').empty().html('Insira um endereço!');
        $("#mensagem").css('display','block');
        $("#mensagem").attr('class','alert alert-danger');
        setTimeout(function(){
            $("#mensagem").css('display','none');
        },5000);
    }else{
        if (sCodigo) {
            sUrl = 'cliente/alterar.php';
        }
        else {
            sUrl = 'cliente/inserir.php';
            sCodigo = '';
        }

        $.ajax({
            url: sUrl,
            type: 'POST',
            data: {
                codigo: sCodigo,
                nome: $("#nome").val(),
                select_enderecos: $("#select_enderecos").val(),
            },
            success: function (data) {
                $('#resultado').empty().html(data);
                $("#codigo").val("");
                $("#nome").val("");
                $("#select_enderecos").val("");
                $("#mensagem").css('display', 'block');
                $("#mensagem").attr('class', 'alert alert-success');
                setTimeout(function () {
                    $("#mensagem").css('display', 'none');
                }, 3000);
            },
            error: function () {
                $("#mensagem").html('Erro!!!');
                $("#mensagem").css('display', 'block');
                $("#mensagem").attr('class', 'alert alert-danger');
                setTimeout(function () {
                    $("#mensagem").css('display', 'none');
                }, 3000);
            }
        });
    }    
}
/*Funcao que recebe os valores dos checkbox marcados e insere em um array,
 * e envia para a pagina de deletar atraves da requisicao ajax, se tudo der certo
 * deleta os dados da linha do checkbox marcado e insere os dados atualizados
 * a div resultado */
function deletar() {
    event.preventDefault();
    aDelete = new Array();
    $("input[name='checkbox[]']:checked").each(function () {
        aDelete.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'cliente/deletar.php',
        data: {'checkbox': aDelete},
        success: function (data) {
            $("#resultado").empty().html(data);
            $("#mensagem").css('display','block');
            $("#mensagem").attr('class','alert alert-success');
            setTimeout(function (){
                $("#mensagem").css('display','none');
            },3000);
        }
    });
}

/*Funcao que recebe os checkbox marcados, se for mais de um da uma mensagem de erro
 * pois só pode selecionar um. Caso seja só um, envia o array, na, posicao 0 que recebeu 
 * o valor do checkbox, para pagina selecionar via requisicao ajax e, se der tudo certo
 * insere os valores selecionados em suas respectivas ids/inputs */
function selecionar() {
    event.preventDefault();
    aSelect = new Array();
    $("input[name='checkbox[]']:checked").each(function () {
        aSelect.push($(this).val());
    });
    if (aSelect.length > 1) {
        $('#mensagem').empty().html('Não é possível selecionar mais que um registro!');
        $("#mensagem").css('display', 'block');
        $("#mensagem").attr('class', 'alert alert-danger');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
    } else {
        $.ajax({
            type: 'POST',
            url: 'cliente/selecionar.php',
            data: {'codigo': aSelect[0]},
            success: function (data) {
                var aClientes = JSON.parse(data);
                $("#codigo").val(aClientes[0]);
                $("#nome").val(aClientes[1]);
                $("#select_enderecos").val(aClientes[2]);
            }
        });
    }
}



