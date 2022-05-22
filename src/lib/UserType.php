<?php

namespace blackJack;

require_once('ScoreCounter.php');
require_once('Deck.php');

abstract class UserType
{
    /**
     * @return string
     */
    abstract public function getName();

    /**
     * @return array<int,array<int,int|string>>
     */
    abstract public function getHand();

    /**
     * @return array<int,int|string>
     */
    abstract public function addCard();

    /**
     * @return int
     */
    abstract public function getCurrentScore();

    /**
     * @return int
     */
    abstract public function getScore();

    /**
     * @return int
     */
    abstract public function value();
}
