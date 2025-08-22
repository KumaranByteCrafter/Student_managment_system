<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;

final class AuthController extends BaseController
{
    public function showLogin(): void
    {
        if ($this->isAuthenticated()) {
            header('Location: /students');
            return;
        }
        $error = $_GET['error'] ?? '';
        $this->render('auth/login.view.php', compact('error'));
    }

    public function login(): void
    {
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            header('Location: /login?error=Missing+credentials');
            return;
        }

        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            header('Location: /login?error=Invalid+username+or+password');
            return;
        }

        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: /students');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
    }

    private function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }
}


