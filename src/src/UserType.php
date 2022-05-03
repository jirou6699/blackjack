<?php

namespace blackJack;

interface UserType
{
    /**
     * @param array<int,array<int,int|string>> $cards
     * @return void
     */
    public function drawCards(array $cards);

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return void
     */
    public function hitStay(array $hand);

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return int
     */
    public function getTotalPoint(array $hand);
}
