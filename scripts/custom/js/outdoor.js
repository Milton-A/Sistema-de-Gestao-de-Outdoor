$(document).ready(function () { 
    $(document).on('click', '#listarDados #ativar', function () {
        var idItem = document.getElementById('idItem').value;
        var precoItem = document.getElementById('precoItem').value;
        var dataInicio = document.getElementById('dataInicio').value;
        var dataFim = document.getElementById('dataFim').value;
        var cardData = {
            idItem: idItem,
            precoItem: precoItem,
            dataInicio: dataInicio,
            dataFim: dataFim
        };
        var listaItens = JSON.parse(localStorage.getItem('listaItens')) || [];
        listaItens.push(cardData);
        localStorage.setItem('listaItens', JSON.stringify(listaItens));
    });
});
