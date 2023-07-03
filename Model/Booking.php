<?php

declare(strict_types=1);

class Booking
{
    public int $id;
    public string $name;
    public string $surname;
    public string $date;
    public string $boatname;
    public float $price;

    public function __construct(int $id, string $name, string $surname, string $date, string $boatname, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->date = $date;
        $this->boatname = $boatname;
        $this->price = $price;
    }
}