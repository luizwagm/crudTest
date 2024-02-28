<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Teste de CRUD (Simples)</title>
</head>
<body>

<div class="container">
    <h1>Controle de Pessoas</h1>
    <a href="./index.php?page=create" type="button" class="btn btn-primary float-end">Criar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col">Criação</th>
                <th scope="col">Atualização</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($getAll as $row)
                {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['document']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($row['created_at'])); ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($row['updated_at'])); ?></td>
                    <td>
                        <a href="./record.php?action=delete&id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger float-end">Excluir</a>
                        <a href="./index.php?page=edit&id=<?php echo $row['id']; ?>" type="button" class="btn btn-light float-end">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>