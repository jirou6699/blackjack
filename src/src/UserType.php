<?php

namespace blackJack;

require_once('Card.php');
require_once('Deck.php');

abstract class UserType
{
    public function __construct(protected Card $card, protected Deck $deck)
    {
    }
    /**
     * @param array<int,array<int,int|string>> $cards
     * @return void
     */
    abstract public function drawCards(array $cards);

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return void
     */
    abstract public function getHand();
}
