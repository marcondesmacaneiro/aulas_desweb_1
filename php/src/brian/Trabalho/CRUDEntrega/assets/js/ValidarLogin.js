//NESTE ARQUIVO FAZ A REQUISIÇÃO AJAX DO LOGIN E INFORMA A MENSAGEM DE ERRO 
//OU DIRECIONA PARA A PÁGINA PRINCIPAL.
$(document).ready(function () {
    $("#informar_login").submit(function () {
        event.preventDefault();
        var dados = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: "requisicao_login.php",
            data: dados,
            success: function (data) {
                if (!data) {
                    $("#mensagem").html("<p>Login ou senha inválido");
                } else {
                    window.location.href = "index.php";
                }
            }
        });
    });
});