<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Attendance;
use PDO;

final class AttendanceRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function byStudent(int $studentId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM attendance WHERE student_id = ? ORDER BY date DESC');
        $stmt->execute([$studentId]);
        $rows = $stmt->fetchAll();
        return array_map(fn($r) => new Attendance((int)$r['id'], (int)$r['student_id'], $r['date'], $r['status'], $r['created_at']), $rows);
    }

    public function upsert(Attendance $attendance): void
    {
        $stmt = $this->pdo->prepare('INSERT OR REPLACE INTO attendance (id, student_id, date, status, created_at) VALUES ((SELECT id FROM attendance WHERE student_id = ? AND date = ?), ?, ?, ?, ?)');
        $stmt->execute([$attendance->studentId, $attendance->date, $attendance->studentId, $attendance->date, $attendance->status, $attendance->createdAt]);
    }
}


