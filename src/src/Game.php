<?php

namespace blackJack;

require_once('Card.php');
require_once('FirstPlayer.php');

class Game
{
    public function __construct(private int $players)
    {

    }
    public function start()
    {
        $card = new Card($this->players);
		$cards = $card->getCards();
		return 2;
    }
}
