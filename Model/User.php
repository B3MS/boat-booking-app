<?php

declare(strict_types=1);

class User
{
    public string $username;
    public string $name;
    public string $surname;
    public string $email;
    public string $password;

    public function __construct(string $username, string $name, string $surname, string $email, string $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }
}