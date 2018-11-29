$(function () {
    $(".form-signin").submit(function () {
        $.ajax({
            url: "login.php",
            type: "POST",
            dataType: "json",
            data: {
                "email": $("#email").val(),
                "senha": $("#senha").val()
            },
            success: function () {
                window.location = '/home';
            },
            error: function (e) {
                alert("E-mail e/ou senha inválido!");
            }
        });
        return false;
    });
    $('#relacao').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "relacao.php"
        },
        "aoColumns": [{
            mData: 'saida',
            bSortable: false
        }, {
            mData: 'destino',
            bSortable: false
        }, {
            mData: 'motorista',
            bSortable: false
        }, {
            mData: 'placa',
            bSortable: false
        }]
    });
    $('#usuarios').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "usuarioslista.php"
        },
        "aoColumns": [{
            mData: 'nome',
            bSortable: false
        }, {
            mData: 'email',
            bSortable: false
        }]
    });
    $('#veiculos').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "veiculoslista.php"
        },
        "aoColumns": [{
            mData: 'placa',
            bSortable: false
        }, {
            mData: 'lotacao',
            bSortable: false
        }]
    });
    $('#viagens').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "viagenslista.php"
        },
        "aoColumns": [{
            mData: 'saida',
            bSortable: false
        }, {
            mData: 'destino',
            bSortable: false
        }]
    });

    $(".btnAddViagens, .btnAddVeiculos, .btnAddUsuarios").click(function () {
        $('#addModal').modal('toggle');
    });

    $(".formAdd").submit(function () {
        var action = $(this).attr("page");
        $.ajax({
            url: action,
            method: "POST",
            dataType: "json",
            data: $(this).serialize()
        }).success(function () {
            window.location.reload();
        }).error(function () {
            alert("Não deu certo!");
        });
        return false;
    });
    $(".motorista").autocomplete({
        source: "usuariosautocomplete.php",
        select: function (event, ui) {
            $(".motoristaid").val(ui.item.id);
        }
    });
    $(".veiculo").autocomplete({
        source: "veiculosautocomplete.php",
        select: function (event, ui) {
            $(".veiculoid").val(ui.item.id);
        }
    });
});