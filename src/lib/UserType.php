<?php

namespace blackJack;

require_once('ScoreCounter.php');
require_once('Deck.php');

interface UserType
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return array<int,array<int,int|string>>
     */
    public function getHand();

    /**
     * @return array<int,int|string>
     */
    public function addCard();

    /**
     * @return int
     */
    public function getCurrentScore();

    /**
     * @return int
     */
    public function getScore();

    /**
     * @return int
     */
    public function value();
}
