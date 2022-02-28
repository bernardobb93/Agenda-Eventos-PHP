<?php
    include ('../config/config.php');
    include ('../config/configMysql.php');
    $nome_grupoa=$_GET["nome_grupo"];
    $id_grupo=$_GET["id_grupo"];
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Atualização de Grupo de Contatos</title>
</head>
<body>
    <section class="container-fluid">
    <div>
        <?php
        include 'header.php';
        ?>
    </div>
        <form class="grupo" method="POST">
        <div class="mb-3">
            <label for="nome_grupoa" class="form-label">Grupo de Contatos</label>
            <input type="text" class="form-control" name="nome_grupoa" placeholder="Nome do Grupo" value="<?php echo $nome_grupoa?>" required>
            <input name="id_grupo"value="<?php echo $id_grupo?>"hidden>
            <input type="submit" class="btn btn-primary mb-1"name="acao"<?php alterarGrupo($servername,$username,$password,$dbname,$_POST);?>value="Atualizar Grupo"/>
        </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>