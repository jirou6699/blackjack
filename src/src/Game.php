<?php

namespace blackJack;

require_once('Deck.php');
require_once('Player.php');

class Game
{
    public function start(UserType $userType): int
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $hands = $userType->getHand();

    // Todo 仮の返り値
        return 2;
    }
}
