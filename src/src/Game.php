<?php

namespace blackJack;

require_once('Deck.php');
require_once('Player.php');

class Game
{
    public function __construct(private int $players)
    {

    }
    public function start(): int
    {
		$trumpCards = new Deck();
		$player = new Player($trumpCards);

	// Todo 仮の返り値
		return 2;
    }
}
