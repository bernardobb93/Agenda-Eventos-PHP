<?php
    include ('../config/config.php');
    include ('../config/configMysql.php');
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Eventos</title>
</head>
<body>
    <section class="container-fluid">
    <div>
        <?php
        include 'header.php';
        ?>
    </div>
    <form class="evento justify-content-center"  method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Evento</label>
            <input type="text" class="form-control" name="nomeEvento" placeholder="Nome Evento">
            <label for="sobrenome" class="form-label">Data Evento</label>
            <input type="date" class="form-control" name="dataEvento" placeholder="Data Evento">
            <label for="telefone" class="form-label">Hora Evento</label>
            <input type="time" class="form-control" name="horaEvento" placeholder="Hora Evento">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <input type="submit" class="btn btn-primary mb-3"name="acao"<?php cadastrarEvento($servername,$username,$password,$dbname,$_POST);?>value="Cadastrar Evento"/>
        </div>
    </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>