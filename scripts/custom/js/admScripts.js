$(document).ready(function () {
    $(document).on('click', '#listarDados #ativar', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'ativarcliente',
                idCliente: idCliente
            },
            success: function (response) {
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #bloquear', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'bloquear',
                idCliente: idCliente
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #desbloquear', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();

        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'desbloquear',
                idCliente: idCliente
            },
            success: function (response) {
                location.reload();
            }
        });
    });

    $(document).on('click', '#listarDados #alterarGestor', function () {
        $('#alterarGestorModal').modal('show');
    });
    
    $(document).on('click', '#idge #enviarId', function () {
        var idPedido = document.getElementById("novoId");
        
        console.log(idPedido);
        
       /* $.ajax({
            url: 'controllers/SolicitacaoController.php',
            type: 'POST',
            data: {
                action: 'alterarGestor',
                idPedido: idPedido
            },
            success: function (response) {
            }
        });*/
    });

    $(document).on('click', '#verGestores', function () {
        $.ajax({
            url: 'controllers/gestorController.php',
            type: 'POST',
            success: function (response) {
                $('#divTabela').append(response);
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "controllers/clienteController.php",
            success: function (response) {
                $('#listarDados').append(response);
            }
        });
    });
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "controllers/gestorController.php",
            success: function (response) {
                $('#listarDados').append(response);
            }
        });
    });
    $(document).ready(function () {
        var startIndex = 0;
        var elementsPerPage = 10;

        $('#listarDados tr').hide();
        $('#listarDados tr').slice(startIndex, startIndex + elementsPerPage).show();

        $('#nextButton').click(function () {
            $('#listarDados tr').hide();
            startIndex += elementsPerPage;
            $('#listarDados tr').slice(startIndex, startIndex + elementsPerPage).show();
        });
    });
    $(document).ready(function () {
        $('.dropdown-item.alterar-email').on('click', function () {
            $('#alterarEmailModal').modal('show');
        });
    });
    
    $(document).ready(function () {
        $('.dro.verCarrinho').on('click', function () {
            $('#verCarrinhoModal').modal('show');
        });
    });
    
     $(document).ready(function () {
        $('.dro.verSolicitacao').on('click', function () {
            $('#verSolicitacaoModal').modal('show');
        });
    });
});