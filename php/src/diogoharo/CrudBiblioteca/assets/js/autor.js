var aChecks;

var iPosicao;

$(document).ready(function() {
    $("input[name='checkbox[]']").click(function() {
        if ($(this).is(':checked')) {
            this.checked = false;
        } else {
            this.checked = true;
        }
    });
    //Quando clicar na linha da tabela ira selecionar o checkBox
    $("#tabela tbody tr").click(function() {
        iPosicao = $(this).index();
        $("input[name='checkbox[]']").each(function(iContador) {
            if (iPosicao == iContador) {
                if ($(this).is(':checked')) {
                    this.checked = false;
                } else {
                    this.checked = true;
                }
            }
        });
    });
    //Quando der 2 clicks na linha da tabela irá apenas selecionar esse e colocará essas informaçoes nos inputs.
    $("#tabela tbody tr").dblclick(function() {
        iPosicao = $(this).index();
        var sCodigo;
        $("input[name='checkbox[]']").each(function(iContador) {
            if (iPosicao == iContador) {
                this.checked = true;
                sCodigo = $(this).val();
            } else {
                this.checked = false;
            }
        });
        if (sCodigo) {
            ajaxSelecionar(sCodigo);
        }
    });

});
// Puxa as informações para os inputs
function ajaxSelecionar(sCodigo) {
    $.ajax({
        type: 'POST',
        url: 'autor/selecionar.php',
        data: {codigo: sCodigo},
        success: function(data) {
            var aAutor = JSON.parse(data);
            $("#codigo").val(aAutor[0]);
            $("#autor").val(aAutor[1]);
        }
    });
}
//a partir do checkbox selecionado faz a requisição ajax se der sucesso limpa a div resultado..
function deletar() {
    event.preventDefault();
    var aChecks = new Array();
    $("input[name='checkbox[]']:checked").each(function() {
        aChecks.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'autor/deletar.php',
        data: {'checkbox': aChecks},
        success: function(data) {
            $('#resultado').empty().html(data);
            $("#mensagem").attr('class', 'alert alert-success');
            setTimeout(function() {
                $("#mensagem").css('display', 'none');
            }, 3000);
        }

    });
}
//verifica  qual checkbox ta seleciona e coloca no vetor de aChecks ,não deixa selecionar
//mais de um check box apos chama a função ajaxSelecionar
function selecionar() {
    event.preventDefault();
    aChecks = new Array;
    $("input[name='checkbox[]']:checked").each(function() {
        aChecks.push($(this).val());
    });
    if (aChecks.length > 1) {
        $('#mensagem').empty().html('Não pode ser selecionado mais de um elemento');
        setTimeout(function() {
            $("#mensagem").css('display', 'none');
        }, 3000);
    } else if (aChecks.length === 0) {
        $("#mensagem").empty().html('Nenhum registro selecionado');
        setTimeout(function() {
            $("#mensagem").css('display', 'none');
        }, 3000);
    } else {
        ajaxSelecionar(aChecks[0]);
    }

}
//Verifica se o codigo foi informado se sim chama o update senão chama o insert,
//recebe os dados do formulário apartir do serialize e faz a requisição ajax se
// ocorrer tudo bem limpa a div resultado e os inputs.
function enviar() {
    event.preventDefault();
    sCodigo = $("#codigo").val();
    if (sCodigo) {
        sUrl = 'autor/update.php';
    } else {
        sUrl = 'autor/insert.php';
        sCodigo = '';
    }
    event.preventDefault();
    var dados = $("#form-salvar").serialize();
    $.ajax({
        url: sUrl,
        type: 'POST',
        data: dados,
        success: function(data) {

            $('#resultado').empty().html(data);
            $("#codigo").val("");
            $("#autor").val("");
            $("#mesnagem").css('display', 'block');
            $("#mensagem").attr('class', 'alert alert-success');
            setTimeout(function() {
                $("#mensagem").css('display', 'none');
            }, 3000);
        },
        error: function() {
            $("#mensagem").html('Erro');
            $("#mensagem").attr('class', 'alert alert-danger');
        }
    });
}
