$(document).ready(function () {
    $(document).on('click', '#iframeReciboVer #aprovar', function (e) {
        
        const element = e.target.parentElement;
        const id = element.children[0].value;
        
        console.log(id);
        $.ajax({
            url: 'controllers/SolicitacaoController.php',
            type: 'POST',
            data: {
                action: 'aprovar',
                idAluguer: id,
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#iframeReciboVer #reprovar', function (e) {
        const element = e.target.parentElement;
        const id = element.children[0].value;
        
        $.ajax({
            url: 'controllers/SolicitacaoController.php',
            type: 'POST',
            data: {
                action: 'reprovar',
                idAluguer: id,
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #eliminar', function () {
        var id = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/OutdoorController.php',
            type: 'POST',
            data: {
                action: 'eliminar',
                id: id,
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #alterar', function () {
        var id = $(this).closest('tr').find('td:first').text();
        var tipo = $(this).closest('tr').find('td:eq(1)').text();
        var comuna = $(this).closest('tr').find('td:eq(2)').text();
        var preco = $(this).closest('tr').find('td:eq(4)').text();

        $.ajax({
            url: 'index.php?op=gestor&&estado=addOutdoor',
            method: 'POST',
            data: {idO: id},
            success: function (response) {
                var url = 'index.php?op=gestor&&estado=addOutdoor';
                window.location.href = url;
            },
            error: function (xhr, status, error) {
            }
        });
    });
    
    $(document).ready(function() {
        $('.dropdown-item.alterar-email').on('click', function() {
            $('#alterarEmailModal').modal('show');
        });
    });
});