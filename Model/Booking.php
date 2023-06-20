<?php

declare(strict_types=1);

class Booking
{
    public int $user_id;
    public int $boat_id;
    public string $date;

    public function __construct(int $user_id, int $boat_id, string $date)
    {
        $this->user_id = $user_id;
        $this->boat_id = $boat_id;
        $this->date = $date;
    }
}