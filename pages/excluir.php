<?php
include ('../config/config.php');
include ('../config/configMysql.php');
$id_evento=$_GET["id_evento"];
echo excluirEvento($servername, $username, $password, $dbname,$id_evento);

?>