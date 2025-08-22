<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;

final class StudentController extends BaseController
{
    private function requireAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $students = $pdo->query('SELECT * FROM students ORDER BY id DESC')->fetchAll();
        $this->render('students/index.view.php', compact('students'));
    }

    public function create(): void
    {
        $this->requireAuth();
        $student = ['id' => null, 'name' => '', 'email' => '', 'phone' => '', 'address' => ''];
        $this->render('students/form.view.php', compact('student'));
    }

    public function store(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('INSERT INTO students (name, email, phone, address, created_at) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            trim($_POST['name'] ?? ''),
            trim($_POST['email'] ?? ''),
            trim($_POST['phone'] ?? ''),
            trim($_POST['address'] ?? ''),
            date('c')
        ]);
        header('Location: /students');
    }

    public function edit(): void
    {
        $this->requireAuth();
        $id = (int)($_GET['id'] ?? 0);
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        $student = $stmt->fetch() ?: null;
        $this->render('students/form.view.php', compact('student'));
    }

    public function update(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('UPDATE students SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?');
        $stmt->execute([
            trim($_POST['name'] ?? ''),
            trim($_POST['email'] ?? ''),
            trim($_POST['phone'] ?? ''),
            trim($_POST['address'] ?? ''),
            (int)($_POST['id'] ?? 0)
        ]);
        header('Location: /students');
    }

    public function delete(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
        $stmt->execute([(int)($_POST['id'] ?? 0)]);
        header('Location: /students');
    }

    public function marks(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $id = (int)($_GET['id'] ?? 0);
        $student = $pdo->query('SELECT * FROM students WHERE id = ' . $id)->fetch();
        $marks = $pdo->query('SELECT * FROM marks WHERE student_id = ' . $id . ' ORDER BY id DESC')->fetchAll();
        $this->render('marks/index.view.php', compact('student','marks'));
    }

    public function saveMarks(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('INSERT INTO marks (student_id, subject, score, max_score, created_at) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            (int)($_POST['student_id'] ?? 0),
            trim($_POST['subject'] ?? ''),
            (int)($_POST['score'] ?? 0),
            (int)($_POST['max_score'] ?? 100),
            date('c')
        ]);
        header('Location: /students/marks?id=' . (int)($_POST['student_id'] ?? 0));
    }

    public function attendance(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $id = (int)($_GET['id'] ?? 0);
        $student = $pdo->query('SELECT * FROM students WHERE id = ' . $id)->fetch();
        $attendance = $pdo->query('SELECT * FROM attendance WHERE student_id = ' . $id . ' ORDER BY date DESC')->fetchAll();
        $this->render('attendance/index.view.php', compact('student','attendance'));
    }

    public function saveAttendance(): void
    {
        $this->requireAuth();
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $pdo = Database::connection($config);
        $stmt = $pdo->prepare('INSERT OR REPLACE INTO attendance (id, student_id, date, status, created_at) VALUES ((SELECT id FROM attendance WHERE student_id = ? AND date = ?), ?, ?, ?, ?)');
        $studentId = (int)($_POST['student_id'] ?? 0);
        $date = trim($_POST['date'] ?? '');
        $status = $_POST['status'] === 'Present' ? 'Present' : 'Absent';
        $stmt->execute([$studentId, $date, $studentId, $date, $status, date('c')]);
        header('Location: /students/attendance?id=' . $studentId);
    }
}


