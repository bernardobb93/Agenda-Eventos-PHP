<?php
include ('../config/config.php');
include ('../config/configMysql.php');
$id_contato=$_GET["id_contato"];
echo excluirContato($servername, $username, $password, $dbname,$id_contato);

?>