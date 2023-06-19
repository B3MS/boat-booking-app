<?php

declare(strict_types=1);

class Booking
{
    public string $user_id;
    public string $boat_id;
    public string $date;

    public function __construct(string $user_id, string $boat_id, string $date)
    {
        $this->user_id = $user_id;
        $this->boat_id = $boat_id;
        $this->date = $date;
    }
}