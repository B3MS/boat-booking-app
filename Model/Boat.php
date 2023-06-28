<?php

declare(strict_types=1);

class Boat
{
    public int $id;
    public string $name;
    public string $type;
    public int $capacity;
    public int $price;
    public string $img;

    public function __construct(int $id, string $name, string $type, int $capacity, int $price, string $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->img = $img;
    }
}