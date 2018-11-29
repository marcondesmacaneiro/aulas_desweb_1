$(document).ready(function() {
    $("#form_login").submit(function() {
        event.preventDefault();
        var dados = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: "requisicao_login.php",
            data: dados,
            success: function(data) {
                if (!data) {
                    $("#mensagem").attr("class", "alert alert-warning");
                    $("#mensagem").html('<p>Login ou senha Inválidos</p>');
                    setTimeout(function() {
                        $("#mensagem").css('display', 'none');
                    }, 3000);
                } else {
                    window.location.href = "index.php";
                }
            }
        });
    });
});