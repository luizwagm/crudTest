<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Criar - Teste de CRUD (Simples)</title>
</head>
<body>

<div class="container">
    <h1>Criar Pessoa</h1>
    <form action="record.php?action=create" method="post">
        <div class="mb-3">
            <label class="form-label">Nome *</label>
            <input type="text" class="form-control" name="fullname">
        </div>
        <div class="mb-3">
            <label class="form-label">CPF *</label>
            <input type="text" class="form-control" id="cpf" name="document" onblur="validacaoCpf(this.value)">
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail *</label>
            <input type="email" class="form-control" name="email" onblur="validacaoEmail(this)">
        </div>
        <a href="./index.php" type="button" class="btn btn-secondary float-start">Voltar</a>
        <button type="submit" id="btnSubmit" class="btn btn-primary float-end">Criar</button>
    </form>
</div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./view/js/email.js"></script>
<script src="./view/js/cpf.js"></script>
</body>
</html>