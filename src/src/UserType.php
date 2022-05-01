<?php

namespace blackJack;

interface UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards(array $cards);

    /**
     * @return array<int,int|string>
     */
    public function hitStay(array $hand);

    // /**
    //  * @return string
    //  */
    // public function getName();

	public function getTotalPoint(array $hand);
}
