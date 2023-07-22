$(document).ready(function () {
    $('#Provincia').change(function () {
        var selectedOption = $(this).val();
        $.ajax({
            type: "POST",
            url: "controllers/MunicipioController.php",
            data: { id:selectedOption},
            success: function (response) {
                $('#Municipio').append(response);
            },
            error: function(response){
                console.log(response);
            }
        });
    });
});

$(document).ready(function () {
    $('#Municipio').change(function () {
        var selectedOption = $(this).val();
        console.log(selectedOption);
        $.ajax({
            type: "POST",
            url: "controllers/ComunaController.php",
            data: {id: selectedOption},
            success: function (response) {
                $('#Comuna').append(response);
            }
        });
    });
});
