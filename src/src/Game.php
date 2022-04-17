<?php

namespace blackJack;

require_once('Card.php');

class Game
{
    public function __construct(private int $players)
    {

    }
    public function start()
    {
        $Card = new Card($this->players);
        return $this->players;
    }
}
