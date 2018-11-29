var aChecks;
var sMensagem;

function verificaTamanho(sNome, iTamanho, input) {
    retorno = false;
    if (sNome.length < iTamanho) {
        retorno = true;
        sMensagem = 'A ' + input + ' é menor que ' + iTamanho + ' caracteres!';
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
    if (verificaTamanho($('#entrega').val(), 3, 'descrição')) {
        $('#mensagem').empty().html(sMensagem);
        $("#mensagem").css('display','block');
        $("#mensagem").attr('class','alert alert-danger');
        setTimeout(function(){
            $("#mensagem").css('display','none');
        },5000);
        
    } else {
    if (sCodigo) {
        sUrl = 'entrega/alterar.php';
    }
    else {
        sUrl = 'entrega/inserir.php';
        sCodigo = '';
    }
    
    $.ajax({
        url: sUrl,
        type: 'POST',
        data: {
            codigo: sCodigo,
            entrega: $("#entrega").val(),
        },
        success: function (data) {
            $('#resultado').empty().html(data);
            $("#codigo").val("");
            $("#entrega").val("");
            $("#mensagem").css('display', 'block');
            $("#mensagem").attr('class', 'alert alert-success');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
        },
        error: function () {
            $("#mensagem").html('Erro');
            $("#mensagem").css('display','block');
            $("#mensagem").attr('class','alert alert-success');
            setTimeout(function (){
                $("#mensagem").css('display','none');
            },3000);
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
        url: 'entrega/deletar.php',
        data: {'checkbox': aDelete},
        success: function (data) {
            $('#resultado').empty().html(data);
            $("#mensagem").css('display','block');
            $("#mensagem").attr('class','alert alert-success');
            setTimeout(function(){
                $("#mensagem").css('display', 'none'); 
            }, 3000);
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
        $("#mensagem").attr('class', 'alert alert-warning');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
    } else {
        $.ajax({
            type: 'POST',
            url: 'entrega/selecionar.php',
            data: {'codigo': aSelect[0]},
            success: function (data) {
                var aEntregas = JSON.parse(data);
                $('#codigo').val(aEntregas[0]);
                $('#entrega').val(aEntregas[1]);
            }
        });
    }
}
