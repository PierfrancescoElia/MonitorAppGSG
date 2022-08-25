<?php
/********** VARIABILI **********/
$host = "192.168.0.3";
$user = "sagra";
$password = "sagra";
$database = "sanrocco";
/*******************************/

$config = json_decode(file_get_contents("config.json"), true);

try {
    $db = new PDO('pgsql:host='.$host.';dbname='.$database, $user, $password);
} catch (PDOException $e) {
	echo $e;
    http_response_code(403);
    exit();
}
?>
