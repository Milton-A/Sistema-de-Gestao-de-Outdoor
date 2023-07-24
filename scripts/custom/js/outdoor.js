
const btn = document.querySelectorAll(".add");

for (let i = 0; i < btn.length; i++) {

    btn[i].addEventListener('click', function (e) {
        const file = document.querySelector('#idA');
        const element = e.target.parentElement;
        const dataInicio = element.children[1].value;
        const dataFim = element.children[2].value;
        const imagem = $(this).parent().children().eq(3)[0].files[0];
        const recibo = $(this).parent().children().eq(4)[0].files[0];
        const idSelecionado = element.children[5].value;
        const preco = element.children[6].value;

        const outdoor = new FormData();
        outdoor.append('dataInicio', dataInicio);
        outdoor.append('dataFim', dataFim);
        outdoor.append('id', idSelecionado);
        outdoor.append('imagem', imagem);
        outdoor.append('recibo', recibo);
        outdoor.append('preco', preco);

        $.ajax({
            url: 'index.php?op=addOutdoor',
            type: 'POST',
            data: outdoor,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('Sucesso:', response);
                location.reload();
            },
            error: function (response) {
                console.error('Erro:', response);
            }
        });
    })
}
const abrirModalSecundarioBtn = document.getElementById('abrirModalSecundario');
abrirModalSecundarioBtn.addEventListener('click', function () {
    var modalSecundario = new bootstrap.Modal(document.getElementById('modalSecundario'));
    modalSecundario.show();
});