function validacaoCpf(cpf) {
    cpf = cpf.toString().replace(/[^\d]+/g, "");
    if (cpf == "") {
        document.getElementById("cpf").style.border = "1px solid #f00";
        document.getElementById("cpf").focus();
        document.getElementById("btnSubmit").disabled = true;
        return false;
    }
    // Elimina CPFs invalidos conhecidos
    if (
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"
    ) {
        document.getElementById("cpf").style.border = "1px solid #f00";
        document.getElementById("cpf").focus();
        document.getElementById("btnSubmit").disabled = true;
        return false;
    }
    // Valida 1o digito
    add = 0;
    for (i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(9))) {
        document.getElementById("cpf").style.border = "1px solid #f00";
        document.getElementById("cpf").focus();
        document.getElementById("btnSubmit").disabled = true;
        return false;
    }
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(10))) {
        document.getElementById("cpf").style.border = "1px solid #f00";
        document.getElementById("cpf").focus();
        document.getElementById("btnSubmit").disabled = true;
        return false;
    }
    document.getElementById("cpf").style.border = "1px solid green";
    document.getElementById("btnSubmit").disabled = false;
    return true;
}
