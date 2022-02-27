<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";



function tabelaContatos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr'><th>CONTATOS</th></tr><tr><th>Nome</th><th>Sobrenome</th><th>Telefone</th><th>Email</th><th>Data de Cadastro</th><th>Data de Atualização</th><th>Atualizar</th></tr>";

  class TableRows extends RecursiveIteratorIterator
  {
    function __construct($it)
    {
      parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }
    function beginChildren()
    {
      echo "<tr>";
    }

    function endChildren()
    {
      echo "<th><a href='pages/alterar.php' id='<?php echo lastInsertId();?>'>Alterar</a>" . "</th></tr>" . "\n";
    }
  }

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT nome,sobrenome,telefone,email,data_cadastro,data_atualizacao FROM contatos");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
      echo $v;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>";
}

function tabelaEventos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr'><th>Eventos</th></tr><tr><th>Nome Evento</th><th>Data</th><th>Hora</th><th>Atualizar</th></tr>";

  class TableEventRows extends RecursiveIteratorIterator
  {
    function __construct($it)
    {
      parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }
    function beginChildren()
    {
      echo "<tr>";
    }

    function endChildren()
    {
      echo "<th><input type='submit' class='btn btn-primary mb-3'name='acao'<?php echo 'teste'?>value='Alterar Evento'/>" . "</th></tr>" . "\n";
    }
  }

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT evento,data_evento,hora_evento FROM evento");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
      echo $v;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>";
}

function tabelaGrupos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr'><th>Grupos</th></tr><tr><th>Nome Evento</th><th>Data</th><th>Hora</th><th>Atualizar</th></tr>";

  class TableGrupoRows extends RecursiveIteratorIterator
  {
    function __construct($it3)
    {
      parent::__construct($it3, self::LEAVES_ONLY);
    }

    function current()
    {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }
    function beginChildren()
    {
      echo "<tr>";
    }

    function endChildren()
    {
      echo "<th><input type='submit' class='btn btn-primary mb-3'name='acao' value='Alterar Grupo'/>" . "</th></tr>" . "\n";
    }
  }

  try {
    $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt3 = $conn3->prepare("SELECT nome_grupo,datac_grupo,dataa_grupo FROM grupo");
    $stmt3->execute();

    $result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableGrupoRows(new RecursiveArrayIterator($stmt3->fetchAll())) as $k3 => $v3) {
      echo $v3;
    }
  } catch (PDOException $e3) {
    echo "Error: " . $e3->getMessage();
  }
  $conn3 = null;
  echo "</table>";
}



function cadastrarContatos($servername, $username, $password, $dbname)
{
  date_default_timezone_set('America/Sao_Paulo');
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_cadastro = date('y-m-d h:i:s');
    $data_atualizacao = date('y-m-d h:i:s');
    $sql = $pdo->prepare("INSERT INTO `contatos` VALUES (null, ?, ?,?, ?,?,?)");
    $sql->execute(array($nome, $sobrenome, $telefone, $email, $data_cadastro, $data_atualizacao));
    echo 'Contato inserido com sucesso!';
  }
}

function cadastrarGrupo($servername, $username, $password, $dbname)
{
  date_default_timezone_set('America/Sao_Paulo');
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  if (isset($_POST['acao'])) {
    $grupo = $_POST['nomeGrupo'];
    $datac_grupo = date('y-m-d h:i:s');
    $dataa_grupo = date('y-m-d h:i:s');
    $sql = $pdo->prepare("INSERT INTO `grupo` VALUES (null, ?, ?,?)");
    $sql->execute(array($grupo, $datac_grupo, $dataa_grupo));
    echo 'Grupo inserido com sucesso!';
  }
}

function cadastrarEvento($servername, $username, $password, $dbname)
{
  date_default_timezone_set('America/Sao_Paulo');
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  if (isset($_POST['acao'])) {
    $evento = $_POST['nomeEvento'];
    $data_evento = $_POST['dataEvento'];
    $hora_evento = $_POST['horaEvento'];
    $sql = $pdo->prepare("INSERT INTO `evento` VALUES (null, ?, ?,?)");
    $sql->execute(array($evento, $data_evento, $hora_evento));
    echo 'Evento inserido com sucesso!';
  }
}
