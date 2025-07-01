<?php

require_once '../Config.php'; // accesses the credentials

try {
    $connection = new PDO($dsn,$username,$password,$options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());

}
?>