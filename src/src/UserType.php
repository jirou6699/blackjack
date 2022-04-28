<?php

namespace blackJack;

abstract class UserType
{
    public function __construct(protected Deck $deck)
    {
    }

    /**
     * @return array<int,array<int,int|string>>
     */
    abstract public function drawCards();

    /**
     * @return array<int,int|string>
     */
    abstract public function addCard();

    /**
     * @return string
     */
    abstract public function getName();
}
