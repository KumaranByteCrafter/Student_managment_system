<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Student;
use PDO;

final class StudentRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function all(): array
    {
        $rows = $this->pdo->query('SELECT * FROM students ORDER BY id DESC')->fetchAll();
        return array_map(fn($r) => new Student((int)$r['id'], $r['name'], $r['email'], $r['phone'] ?? null, $r['address'] ?? null, $r['created_at']), $rows);
    }

    public function find(int $id): ?Student
    {
        $stmt = $this->pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        $r = $stmt->fetch();
        if (!$r) return null;
        return new Student((int)$r['id'], $r['name'], $r['email'], $r['phone'] ?? null, $r['address'] ?? null, $r['created_at']);
    }

    public function create(Student $student): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO students (name, email, phone, address, created_at) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$student->name, $student->email, $student->phone, $student->address, $student->createdAt]);
        return (int)$this->pdo->lastInsertId();
    }

    public function update(Student $student): void
    {
        $stmt = $this->pdo->prepare('UPDATE students SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?');
        $stmt->execute([$student->name, $student->email, $student->phone, $student->address, $student->id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM students WHERE id = ?');
        $stmt->execute([$id]);
    }
}


