<?php

namespace blackJack;

require_once('ScoreCounter.php');
require_once('Deck.php');

abstract class UserType
{
    /**
     * @return void
     */
    abstract public function getHand();

    abstract public function addCard();

    abstract public function getCurrentScore();

    abstract public function getName();

    abstract public function getTotalScore();
}
