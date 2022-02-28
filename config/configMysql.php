
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";



function tabelaContatos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><td >Contatos</td></tr><tr><td>Nome</td><td>Sobrenome</td><td>Telefone</td> <td>Email</td><td>Data Cadastro</td> <td>Data Alteração</td><td>Atualizar</td></tr>";

  $cx = mysqli_connect($servername, $username, $password);

  $db = mysqli_select_db($cx, $dbname);

  $sql = mysqli_query($cx, "SELECT * FROM contatos") or die(mysqli_error($cx));

  while ($aux = mysqli_fetch_assoc($sql)) {
    echo "<tr >";
    echo "<td >" . $aux["nome"] . "</td>";
    echo "<td >" . $aux["sobrenome"] . "</td>";
    echo "<td >" . $aux["telefone"] . "</td>";
    echo "<td>" . $aux["email"] . "</td>";
    echo "<td >" . $aux["data_cadastro"] . "</td>";
    echo "<td >" . $aux["data_atualizacao"] . "</td>";
    echo "<td >" . "<a href=pages/alterar.php?id=" . $aux["id"] . "&nome=" . $aux["nome"] . "&sobrenome=" . $aux["sobrenome"] . "&telefone=" . $aux["telefone"] . "&email=" . $aux["email"] . ">Alterar</a>" . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

function tabelaEventos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><td >Eventos</td></tr><tr><td>Evento</td><td>Data</td><td>Hora</td><td>Email Evento</td> <td>Atualizar</td><td>Excluir</td></tr>";

  $cx = mysqli_connect($servername, $username, $password);

  $db = mysqli_select_db($cx, $dbname);

  $sql = mysqli_query($cx, "SELECT * FROM evento") or die(mysqli_error($cx));

  while ($aux = mysqli_fetch_assoc($sql)) {
    echo "<tr >";
    echo "<td >" . $aux["evento"] . "</td>";
    echo "<td >" . $aux["data_evento"] . "</td>";
    echo "<td >" . $aux["hora_evento"] . "</td>";
    echo "<td >" . $aux["email_evento"] . "</td>";
    echo "<td >" . "<a href=pages/alterarevento.php?id_evento=" . $aux["id_evento"] . "&evento=" . $aux["evento"] . "&data=" . $aux["data_evento"] . "&hora=" . $aux["hora_evento"]."&email=" . $aux["email_evento"]. ">Alterar</a>" . "</td>";
    echo "<td >" . "<a href=pages/excluir.php?id_evento=" . $aux["id_evento"] . ">Excluir</a>". "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

function tabelaGrupos($servername, $username, $password, $dbname)
{
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><td >Contatos</td></tr><tr><td>Nome</td><td>Sobrenome</td><td>Telefone</td> <td>Email</td><td>Data Cadastro</td> <td>Data Alteração</td><td>Atualizar</td></tr>";

  $cx = mysqli_connect($servername, $username, $password);

  $db = mysqli_select_db($cx, $dbname);

  $sql = mysqli_query($cx, "SELECT * FROM contatos") or die(mysqli_error($cx));

  while ($aux = mysqli_fetch_assoc($sql)) {
    echo "<tr >";
    echo "<td >" . $aux["nome"] . "</td>";
    echo "<td >" . $aux["sobrenome"] . "</td>";
    echo "<td >" . $aux["telefone"] . "</td>";
    echo "<td>" . $aux["email"] . "</td>";
    echo "<td >" . $aux["data_cadastro"] . "</td>";
    echo "<td >" . $aux["data_atualizacao"] . "</td>";
    echo "<td >" . "<a href=pages/alterar.php?id=" . $aux["id"] . "&nome=" . $aux["nome"] . "&sobrenome=" . $aux["sobrenome"] . "&telefone=" . $aux["telefone"] . "&email=" . $aux["email"] . ">Alterar</a>" . "</td>";
    echo "</tr>";
  }
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
    header("Refresh:0; url=../index.php");
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
    header("Refresh:0; url=../index.php");
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
    $email_evento = $_POST['emailEvento'];
    $sql = $pdo->prepare("INSERT INTO `evento` VALUES (null, ?, ?,?,?)");
    $sql->execute(array($evento, $data_evento, $hora_evento,$email_evento));
    header("Refresh:0; url=../index.php");
  }
}
function alterarEvento($servername, $username, $password, $dbname)
{
  date_default_timezone_set('America/Sao_Paulo');
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  if (isset($_POST['acao'])) {
    $evento = $_POST['evento'];
    $data_evento = $_POST['data'];
    $hora_evento = $_POST['hora'];
    $email_evento = $_POST['email'];
    $id=$_POST['id_evento'];
    $sql = $pdo->prepare("UPDATE `evento`SET evento='$evento',data_evento='$data_evento',hora_evento='$hora_evento',email_evento='$email_evento'  WHERE id_evento='$id'");
    if ($sql->execute()){
    header("Refresh:0; url=../index.php");
    }
    
  }
}
function excluirEvento($servername, $username, $password, $dbname,$id_evento)
{
  date_default_timezone_set('America/Sao_Paulo');
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $id=$id_evento;
    $sql = $pdo->prepare("DELETE FROM `evento`WHERE id_evento=?");
    if ($sql->execute(array($id))){
    header("Refresh:0; url=../index.php");
    
    }
    
}

?>