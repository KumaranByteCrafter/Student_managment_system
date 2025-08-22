<?php
declare(strict_types=1);

namespace App\Models;

final class Student
{
    public ?int $id;
    public string $name;
    public string $email;
    public ?string $phone;
    public ?string $address;
    public string $createdAt;

    public function __construct(?int $id, string $name, string $email, ?string $phone, ?string $address, string $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->createdAt = $createdAt;
    }
}


