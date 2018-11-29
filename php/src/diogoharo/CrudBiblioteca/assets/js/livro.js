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
    //Quando der 2 clicks na linha da tabela irá apenas selecionar esse.
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
    });

});
//a partir do checkbox selecionado faz a requisição ajax se der sucesso limpa a div resultado..
function deletar() {
    event.preventDefault();
    var aChecks = new Array();
    $("input[name='checkbox[]']:checked").each(function() {
        aChecks.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'livro/deletar.php',
        data: {'checkbox': aChecks},
        success: function(data) {
            $('#resultado').empty().html(data);
            $("#mensagem").attr('class', 'alert alert-success')
            setTimeout(function() {
                $("#mensagem").css('display', 'none');
            }, 3000);
        }

    });
}

// Pega o valor do checkbox dos autores listados e com os inputs faz a requisição ajax se ocorrer tudo bem
// limpa a div resultado e todos os inputs.
function enviar() {
    event.preventDefault();
    aChecks = new Array;
    $("input[name='checkbox[]']:checked").each(function() {
        aChecks.push($(this).val());
    });
    event.preventDefault();

    $.ajax({
        url: 'livro/insert.php',
        type: 'POST',
        data: {'checkbox': aChecks,
            livro: $("#livro").val(),
            select_genero: $("#select_genero").val(),
            select_localizacao: $("#select_localizacao").val()
        },
        success: function(data) {

            $('#resultado').empty().html(data);
            $("#codigo").val("");
            $("#livro").val("");
            $("#select_genero").val("");
            $("#select_localizacao").val("");
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
function retorna() {
    window.location.href = "livro.php";
}
//Direciona para a página cadastroLivro.php
function direcionar() {
    window.location.href = "cadastroLivro.php";
}
