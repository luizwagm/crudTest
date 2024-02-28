function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(
        field.value.indexOf("@") + 1,
        field.value.length
    );

    if (
        usuario.length >= 1 &&
        dominio.length >= 3 &&
        usuario.search("@") == -1 &&
        dominio.search("@") == -1 &&
        usuario.search(" ") == -1 &&
        dominio.search(" ") == -1 &&
        dominio.search(".") != -1 &&
        dominio.indexOf(".") >= 1 &&
        dominio.lastIndexOf(".") < dominio.length - 1
    ) {
        field.style.border = "1px solid green";
        document.getElementById("btnSubmit").disabled = false;
        return true;
    }
        field.style.border = "1px solid #f00";
        field.focus();
        document.getElementById("btnSubmit").disabled = true;
        return false;
}
