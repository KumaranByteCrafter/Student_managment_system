<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;

final class ReportController extends BaseController
{
    private function requireAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function marksReport(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $sql = 'SELECT s.id, s.name, AVG(CAST(m.score AS FLOAT) / m.max_score * 100) AS avg_percent
                FROM students s
                LEFT JOIN marks m ON m.student_id = s.id
                GROUP BY s.id, s.name
                ORDER BY s.name ASC';
        $rows = $pdo->query($sql)->fetchAll();
        $this->render('reports/marks.view.php', compact('rows'));
    }

    public function attendanceReport(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $sql = 'SELECT s.id, s.name,
                       SUM(CASE WHEN a.status = "Present" THEN 1 ELSE 0 END) AS presents,
                       COUNT(a.id) AS total
                FROM students s
                LEFT JOIN attendance a ON a.student_id = s.id
                GROUP BY s.id, s.name
                ORDER BY s.name ASC';
        $rows = $pdo->query($sql)->fetchAll();
        $this->render('reports/attendance.view.php', compact('rows'));
    }
}


