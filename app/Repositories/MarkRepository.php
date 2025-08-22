<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Mark;
use PDO;

final class MarkRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function byStudent(int $studentId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM marks WHERE student_id = ? ORDER BY id DESC');
        $stmt->execute([$studentId]);
        $rows = $stmt->fetchAll();
        return array_map(fn($r) => new Mark((int)$r['id'], (int)$r['student_id'], $r['subject'], (int)$r['score'], (int)$r['max_score'], $r['created_at']), $rows);
    }

    public function create(Mark $mark): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO marks (student_id, subject, score, max_score, created_at) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$mark->studentId, $mark->subject, $mark->score, $mark->maxScore, $mark->createdAt]);
        return (int)$this->pdo->lastInsertId();
    }
}


