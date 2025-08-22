<?php
declare(strict_types=1);

namespace App\Models;

final class User
{
    public ?int $id;
    public string $username;
    public string $passwordHash;
    public string $createdAt;

    public function __construct(?int $id, string $username, string $passwordHash, string $createdAt)
    {
        $this->id = $id;
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->createdAt = $createdAt;
    }
}


