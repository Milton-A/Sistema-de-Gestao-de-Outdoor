
$(document).ready(function () {
    $("#divAtividadeEmpresa").hide();
    $("#tipoClienteSelect").change(function () {
        var selectedOption = $(this).val();
        if (selectedOption === "Empresa") {
            $("#divAtividadeEmpresa").show();
        } else {
            $("#divAtividadeEmpresa").hide();
        }
    });
});

$(document).ready(function () {
    var senhaInput = $("#senhaInput");
    var confirmarSenhaInput = $("#confirmarSenhaInput");
    var senhaMismatchMessage = $("#senhaMismatchMessage");
    senhaInput.keyup(checkPasswordsMatch);
    confirmarSenhaInput.keyup(checkPasswordsMatch);
    function checkPasswordsMatch() {
        var senha = senhaInput.val();
        var confirmarSenha = confirmarSenhaInput.val();
        if (senha !== confirmarSenha) {
            senhaMismatchMessage.removeClass("d-none");
        } else {
            senhaMismatchMessage.addClass("d-none");
        }
    }
});

$(document).ready(function () {
    var emailInput = $("#emailInput");
    var confirmarEmailInput = $("#confirmarEmailInput");
    var emailMismatchMessage = $("#emailMismatchMessage");
    emailInput.keyup(checkEmailsMatch);
    confirmarEmailInput.keyup(checkEmailsMatch);
    function checkEmailsMatch() {
        var email = emailInput.val();
        var confirmarEmail = confirmarEmailInput.val();
        if (email !== confirmarEmail) {
            emailMismatchMessage.removeClass("d-none");
        } else {
            emailMismatchMessage.addClass("d-none");
        }
    }
});