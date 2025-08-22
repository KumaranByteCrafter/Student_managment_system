<?php
declare(strict_types=1);

use App\Core\Database;

$dbFile = $config['db']['database'];
@mkdir(dirname($dbFile), 0777, true);

$pdo = Database::connection($config);

// Create tables if not exist
$pdo->exec('CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password_hash TEXT NOT NULL,
    created_at TEXT NOT NULL
)');

$pdo->exec('CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    phone TEXT,
    address TEXT,
    created_at TEXT NOT NULL
)');

$pdo->exec('CREATE TABLE IF NOT EXISTS marks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    student_id INTEGER NOT NULL,
    subject TEXT NOT NULL,
    score INTEGER NOT NULL,
    max_score INTEGER NOT NULL DEFAULT 100,
    created_at TEXT NOT NULL,
    FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE
)');

$pdo->exec('CREATE TABLE IF NOT EXISTS attendance (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    student_id INTEGER NOT NULL,
    date TEXT NOT NULL,
    status TEXT NOT NULL CHECK(status IN ("Present","Absent")),
    created_at TEXT NOT NULL,
    UNIQUE(student_id, date),
    FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE
)');

// Seed admin user if none
$exists = $pdo->query('SELECT COUNT(*) as c FROM users')->fetch()['c'] ?? 0;
if ((int)$exists === 0) {
    $stmt = $pdo->prepare('INSERT INTO users (username, password_hash, created_at) VALUES (?, ?, ?)');
    $stmt->execute(['admin', password_hash('admin123', PASSWORD_BCRYPT), date('c')]);
}


