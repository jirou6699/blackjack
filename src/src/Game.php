<?php

namespace blackJack;

require_once('Deck.php');
require_once('Player.php');
require_once('Card.php');

class Game
{
    public function start(): int
    {
        $deck = new Deck();
        $card = new Card();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $playerHand = $player->getFirstHand();

    // Todo 仮の返り値
        return 2;
    }
}
