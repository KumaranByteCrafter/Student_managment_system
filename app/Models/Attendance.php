<?php
declare(strict_types=1);

namespace App\Models;

final class Attendance
{
    public ?int $id;
    public int $studentId;
    public string $date;
    public string $status;
    public string $createdAt;

    public function __construct(?int $id, int $studentId, string $date, string $status, string $createdAt)
    {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->date = $date;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }
}


