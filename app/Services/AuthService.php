<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Database;

final class AuthService
{
    public function __construct(private array $config)
    {
    }

    public function attempt(string $username, string $password): bool
    {
        $pdo = Database::connection($this->config);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if (!$user || !password_verify($password, $user['password_hash'])) {
            return false;
        }
        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function check(): bool
    {
        return isset($_SESSION['user_id']);
    }
}


