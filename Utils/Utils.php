<?php
namespace Utils;

use PDO;
require_once __DIR__ . '/../env.php';

class Utils {
    public static function connect(): PDO {
        $dsn = 'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME;
        return new PDO($dsn, BDD_USERNAME, BDD_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function sanitize(string $data):string{
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }
}
