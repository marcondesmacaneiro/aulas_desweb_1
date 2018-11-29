//NESTA FUNÇÃO SERÁ ENVIADO PARA A PÁGINA DE INSERÇÃO DE DADOS USANDO 2 SELECTS DO GÊNERO E DO LOCAL
//QUANDO A FUNÇÃO ESTIVER COMPLETA, OS CAMPOS FICARÃO EM BRANCO 
//E A PÁGINA SERÁ ATUALIZADA COM O NOVO GÊNERO INFORMADO
function enviaDados(){
    event.preventDefault();
    var sCodigo = $("#codigo").val(); 
    aCheck = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aCheck.push($(this).val());
    });
    $.ajax({
        url: 'livro/insert.php',
        type: 'POST',
        data: {
            codigo: sCodigo,
            livro: $("#livro").val(),
            select_genero: $("#select_genero").val(),
            select_local: $("#select_local").val(),
            'checkbox': aCheck
        },
        success: function (data){
            $("#resultado").empty().html(data);
            $("#codigo").val("");
            $("#livro").val("");
            $("#select_genero").val("");
            $("#select_local").val("");
            $("#checkbox").prop("checked", false);
            $("#mensagem").css('display', 'block');
            $("#mensagem").attr('class', 'alert alert-success');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
        },
        error: function () {
            $("#mensagem").html('Erro!!!');
            $("#mensagem").css('background-color', 'red');
            $("#mensagem").css('display', 'block');
            setTimeout(function () {
                $("#mensagem").css('display', 'none');
            }, 3000);
        }        
    });
}
