<?php
    include ('config/config.php');
?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Agenda</title>
</head>

<body>
    <header>
        <div>
   <ul>
    <li><a href="<?php echo INCLUDE_PATH;?>contatos.php">Cadastro de Contatos</a></li>
    <li><a href="<?php echo INCLUDE_PATH;?>grupocontatos.php">Cadastro de Grupos</a></li>
    <li><a href="<?php echo INCLUDE_PATH;?>eventos.php">Cadastro de Eventos</a></li>
    </ul>
        </div>
   </header>   
    <div>
    <?php
    include 'pages/home.php';
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
</body>

</html>