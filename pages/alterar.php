<?php
    include ('../config/config.php');
    include ('../config/configMysql.php');
    $nome_contato=$_GET["nome"];
    $sobrenome_contato=$_GET["sobrenome"];
    $telefone_contato=$_GET["telefone"];
    $id_contato=$_GET["id_contato"];
    $email_contato=$_GET["email"];

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Alteração de Contato</title>
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
            <label for="nome_contato" class="form-label" >Nome</label>
            <input type="text" class="form-control" name="nome_contato" placeholder="Nome"value="<?php echo $nome_contato?>" required>
            <label for="sobrenome_contato" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome_contato" placeholder="Sobrenome" value="<?php echo $sobrenome_contato?>"required>
            <label for="telefone_contato" class="form-label">Celular</label>
            <input type="text" class="form-control" name="telefone_contato" placeholder="Celular 55999999999" pattern="[0-9]{11}"value="<?php echo $telefone_contato?>"required>
            <label for="email_contato" class="form-label">Email</label>
            <input name="id_contato"value="<?php echo $id_contato?>"hidden>
            <input type="email" class="form-control" name="email_contato" placeholder="name@example.com"value="<?php echo $email_contato?>" required>
        </div>
            <input type="submit" class="btn btn-primary mb-3" name="acao" value="Atualizar Contato" <?php alterarContato($servername,$username,$password,$dbname,$_POST);?>>
            
</form>

    </section>
    <script src="<?php echo INCLUDE_PATHIN;?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATHIN;?>js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>