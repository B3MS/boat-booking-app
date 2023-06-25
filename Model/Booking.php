<?php

declare(strict_types=1);

class Booking
{
    public string $name;
    public string $surname;
    public string $date;
    public string $boatname;
    public float $price;

    public function __construct(string $name, string $surname, string $date, string $boatname, float $price)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->date = $date;
        $this->boatname = $boatname;
        $this->price = $price;
    }
}