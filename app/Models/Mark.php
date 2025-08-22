<?php
declare(strict_types=1);

namespace App\Models;

final class Mark
{
    public ?int $id;
    public int $studentId;
    public string $subject;
    public int $score;
    public int $maxScore;
    public string $createdAt;

    public function __construct(?int $id, int $studentId, string $subject, int $score, int $maxScore, string $createdAt)
    {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->subject = $subject;
        $this->score = $score;
        $this->maxScore = $maxScore;
        $this->createdAt = $createdAt;
    }
}


