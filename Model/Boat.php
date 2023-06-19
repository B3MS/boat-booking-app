<?php

declare(strict_types=1);

class Boat
{
    public string $name;
    public string $type;
    public string $capacity;
    public string $price;

    public function __construct(string $name, string $type, string $capacity, string $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->capacity = $capacity;
        $this->price = $price;
    }
}