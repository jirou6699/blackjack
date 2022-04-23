<?php

namespace blackJack;

abstract class UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    abstract public function getHand();

    /** @return string */
    abstract public function getName();

    /**
     * @param array<int,array<int,int|string>> $trumpCards
     */
    public function __construct(protected array $trumpCards)
    {
    }
}
