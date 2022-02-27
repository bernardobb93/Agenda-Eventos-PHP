<?php
    include ('../config/config.php');
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Grupo de Contatos</title>
</head>
<body>
    <section>
    <a href="<?php echo INCLUDE_PATHIN;?>index.php">Voltar</a>
        <div class="mb-3">
            <label for="nome" class="form-label">Grupo de Contatos</label>
            <input type="text" class="form-control" id="nomeGrupo" placeholder="Nome do Grupo">
        </div>
        <!--<div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="date" class="form-control" id="cadastroDate">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="date" class="form-control" id="cadastroAtualiza">
        </div>-->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cadastrar</button>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>