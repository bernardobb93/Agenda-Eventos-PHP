<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "agenda";
  


function tabelaContatos($servername,$username,$password,$dbname){
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Nome</th><th>Sobrenome</th><th>Telefone</th><th>Email</th><th>Data de Cadastro</th><th>Data de Atualização</th><th>Atualizar</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }
  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "<th><a href='pages/alterar.php' id='<?php echo lastInsertId();?>'>Alterar</a>"."</th></tr>" . "\n";
  } 
  
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT nome,sobrenome,telefone,email,data_cadastro,data_atualizacao FROM contatos");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
   
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
function cadastrarContatos($servername,$username,$password,$dbname){
  date_default_timezone_set('America/Sao_Paulo');
$pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
if (isset($_POST['acao'])){
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$data_cadastro=date('y-m-d h:i:s');
$data_atualizacao=date('y-m-d h:i:s');
$sql = $pdo->prepare("INSERT INTO `contatos` VALUES (null, ?, ?,?, ?,?,?)");
$sql->execute(array($nome,$sobrenome,$telefone,$email,$data_cadastro,$data_atualizacao));
echo 'Contato inserido com sucesso!';
}
}
function cadastrarGrupo($servername,$username,$password,$dbname){
  date_default_timezone_set('America/Sao_Paulo');
$pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
if (isset($_POST['acao'])){
$grupo=$_POST['grupo'];
$datac_grupo=date('y-m-d h:i:s');
$dataa_grupo=date('y-m-d h:i:s');
$sql = $pdo->prepare("INSERT INTO `grupos` VALUES (null, ?, ?,?)");
$sql->execute(array($grupo,$datac_grupo,$dataa_grupo));
echo 'Grupo inserido com sucesso!';
}
}
function cadastrarEvento($servername,$username,$password,$dbname){
  date_default_timezone_set('America/Sao_Paulo');
$pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
if (isset($_POST['acao'])){
$evento=$_POST['nomeEvento'];
$data_evento=$_POST['dataEvento'];
$hora_evento=$_POST['horaEvento'];
$sql = $pdo->prepare("INSERT INTO `evento` VALUES (null, ?, ?,?)");
$sql->execute(array($evento,$data_evento,$hora_evento));
echo 'Evento inserido com sucesso!';
}
}
?> 