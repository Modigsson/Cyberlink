<?php
declare(strict_types=1);
$fileName = __DIR__ . "/databas.sql";
$dsn = "sqlite:$fileName";
try {
    $pdo = new PDO($dsn);
} catch (Exception $ex) {
    throw new Exception("Could not connect to DB");
}
