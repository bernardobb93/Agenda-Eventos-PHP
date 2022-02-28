<?php
include ('../config/config.php');
include ('../config/configMysql.php');
$id_grupo=$_GET["id_grupo"];
echo excluirGrupo($servername, $username, $password, $dbname,$id_grupo);
?>