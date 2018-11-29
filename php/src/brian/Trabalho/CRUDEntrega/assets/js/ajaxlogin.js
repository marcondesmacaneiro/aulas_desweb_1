/*Pega os dados do formulario pelo serialize, envia para a pagina de requisicao 
através do Ajax e se ocorrer tudo certo irá enviar para pagina index, caso contrário
da uma mensagem de erro no login.
*/
$(document).ready(function (){
    $("#form_login").submit(function(){ 
        event.preventDefault(); 
        var dados = $(this).serialize();       
        $.ajax({
            type: 'POST', 
            url: "requisicao_do_login.php", 
            data: dados,
            success: function(data){
                if(data){  
                    $("#mensagem").html(data); 
                    $("#mensagem").css('display', 'block');  
                    $("#mensagem").attr('class', 'alert alert-danger');
                    setTimeout(function () { 
                        $("#mensagem").css('display', 'none'); 
                    }, 3000);
                }
                else{  
                    window.location.href = "index.php";
                }
            }
        });
    });
});


