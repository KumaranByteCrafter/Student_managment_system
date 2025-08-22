<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

final class Database
{
    private static ?PDO $pdo = null;

    public static function connection(array $config): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $driver = $config['db']['driver'] ?? 'sqlite';
        if ($driver !== 'sqlite') {
            throw new \RuntimeException('Only sqlite is supported in this demo');
        }

        $dsn = 'sqlite:' . $config['db']['database'];
        try {
            self::$pdo = new PDO($dsn);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \RuntimeException('Database connection failed: ' . $e->getMessage());
        }

        return self::$pdo;
    }
}


