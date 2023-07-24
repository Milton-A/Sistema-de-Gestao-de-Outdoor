
const btn = document.querySelectorAll(".verRecibo");

for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener('click', function (e) {
        const element = e.target.parentElement;
        const pdf = element.children[0].value;
        

        const idOutdoor = $(this).closest('tr').find('td:first').text();
        console.log(idOutdoor);

        let mostrar = document.getElementById("mostrarId");

        mostrar.value = idOutdoor;
        var urlDoReciboPDF = pdf; // Substitua pelo caminho real do PDF do recibo
        document.getElementById('iframeRecibo').setAttribute('src', urlDoReciboPDF);
        var modal = new bootstrap.Modal(document.getElementById('modalRecibo'));
        modal.show();

    })
}
