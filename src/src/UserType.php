<?php

namespace blackJack;

interface UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards();

    /**
     * @return array<int,int|string>
     */
    public function addCard();

    /**
     * @return string
     */
    public function getName();
}
