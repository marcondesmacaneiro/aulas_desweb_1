//NESTA FUNÇÃO, QUANDO O USUÁRIO INFORMAR O AUTOR, ELE PODERÁ SELECIONAR PARA ALTERAR OS DADOS
// É USADO UM ARRAY NO BECKBOX PARA INFORMAR QUAL VALOR FOI SELECIONADO.
function selecionar(){
    event.preventDefault();
    aCheckbox = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aCheckbox.push($(this).val());
    });
    if(aCheckbox.length > 1){
        $('#mensagem').empty().html('Não é possível selecionar mais que um registro!');
        $("#mensagem").css('background-color', 'orange');
        $("#mensagem").attr('background-color', 'alert alert-danger');
        setTimeout(function () {
        $("#mensagem").css('display', 'none');
        }, 3000);
    }{
        $.ajax({
            type: 'POST',
            url: 'autor/selecionar.php',
            data: {'codigo': aCheckbox[0]},
            success: function (data) {
                var aAutor = JSON.parse(data);
                $("#codigo").val(aAutor[0]);
                $("#autor").val(aAutor[1]);
            }
        });
    }
}
//NESTA FUNÇÃO SERÁ ENVIADO PARA A PÁGINA DE INSERÇÃO DE DADOS OU DE ALTERAÇÃO
//CONFORME A ESCOLHA DO USUÁRIO,  QUANDO A FUNÇÃO ESTIVER COMPLETA, OS CAMPOS FICARÃO EM BRANCO
//E A PÁGINA SERÁ ATUALIZADA COM O NOVO AUTOR INFORMADO
function enviaDados(){
    event.preventDefault();
    var sUrl = '';
    var sCodigo = $("#codigo").val();
    if(sCodigo){
        sUrl = 'autor/update.php';
    }
    else{
        sUrl = 'autor/insert.php';
        sCodigo = '';
    }
    $.ajax({
        url: sUrl,
        type: 'POST',
        data: {
            codigo: sCodigo,
            autor: $("#autor").val()
        },
        success: function (data){
            $("#resultado").empty().html(data);
            $("#codigo").val("");
            $("#autor").val("");
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
//NESTA FUNÇÃO FARÁ A LIGAÇÃO COM O ARQUIVO DELETAR O AUTOR, QUE ASSIM QUE COMPLETA
// OS CAMPOS FICARAM EM BRANCO E A PÁGINA ATUALIZARÁ COM O ARQUIVO EXCLUIDO DO BANCO DE DADOS E DA PÁGINA
function deletar(){
    event.preventDefault();
    aDelete = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aDelete.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'autor/deletar.php',
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