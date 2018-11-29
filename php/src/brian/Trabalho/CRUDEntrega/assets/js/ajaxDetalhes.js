//NESTA FUNÇÃO FARÁ A LIGAÇÃO COM O ARQUIVO DELETAR O LIVRO, QUE ASSIM QUE COMPLETA
// OS CAMPOS FICARAM EM BRANCO E A PÁGINA ATUALIZARÁ COM O ARQUIVO EXCLUIDO DO BANCO DE DADOS E DA PÁGINA
function deletar(){
    event.preventDefault();
    aDelete = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aDelete.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: 'autorlivro/deletar.php',
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
//NESTA FUNÇÃO QUANDO O USUÁRIO INFORMAR OS DETALHES DO LIVRO, ELE SERÁ REDICERIONADO PARA UMA PÁGINA DE DETALHES.
function novaPagina(){
    window.location.href="livro.php";
}
//NESTA FUNÇÃO O USUÁRIO IRÁ INFORMAR QUAL LIVRO ELE PRETENDE VER OS DETALHES, PELO CHECKBOX QUE É UM ARRAY.
function selecionarDetalhes(){
    event.preventDefault;
    aCheck = new Array();
    $("input[name='checkbox[]']:checked").each(function (){
        aCheck.push($(this).val());
    });
    
}