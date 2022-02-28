<?php
    include('../config/config.php');
    include('../config/configMysql.php');
    $evento = $_GET["evento"];
    $data = $_GET["data"];
    $hora = $_GET["hora"];
    $id_evento = $_GET["id_evento"];
    $email = $_GET["email"];

?>
<!doctype html>
    <html lang="pt-br">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link href="styles/styles.css" rel="stylesheet">
            <title>Atualização de Eventos</title>
        </head>
    <body>
        <div class="container-fluid">
            <div>
                <?php
                include 'header.php';
                ?>
            </div>
            <form class="evento justify-content-center" method="POST">
                <div class="mb-3">
                    <label for="evento" class="form-label">Nome Evento</label>
                    <input type="text" class="form-control" name="evento" required value="<?php echo $evento ?>">
                    <label for="data" class="form-label">Data Evento</label>
                    <input type="date" class="form-control" name="data" value="<?php echo $data ?>" required>
                    <label for="hora" class="form-label">Hora Evento</label>
                    <input type="time" class="form-control" name="hora" value="<?php echo $hora ?>" required>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                    <input name="id_evento" value="<?php echo $id_evento ?>" hidden>
                    <input type="submit" class="btn btn-primary mb-3" name="acao" <?php alterarEvento($servername, $username, $password, $dbname, $_POST); ?> value="Atualizar Evento" />
                </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </section>
        </div>
        </body>

</html>