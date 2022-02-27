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
    <title>Cadastro de Contatos</title>
</head>

<body>
    <section class="container-fluid">
    <div>
        <?php
        include 'header.php';
        ?>
    </div>
    <form class="contatos" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label" >Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
            <label for="telefone" class="form-label">Celular</label>
            <input type="number" class="form-control" name="telefone" placeholder="Celular 55999999999" required>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
        </div>
            <input type="submit" class="btn btn-primary mb-3" name="acao" value="Cadastrar Contato" <?php cadastrarContatos($servername,$username,$password,$dbname,$_POST);?>/>
            
</form>

    </section>
    <script src="<?php echo INCLUDE_PATHIN;?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATHIN;?>js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>