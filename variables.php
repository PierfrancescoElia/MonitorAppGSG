<?php
/********** VARIABILI **********/
$host = "192.168.0.254";
$user = "usernamedb";
$password = "passworddb";
$database = "nomedb";
/*******************************/

$config = json_decode(file_get_contents("config.json"), true);

try {
    $db = new PDO('pgsql:host='.$host.';dbname='.$database, $user, $password);
} catch (PDOException $e) {
    http_response_code(403);
    exit();
}
?>