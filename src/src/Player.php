<?php

namespace blackJack;

require_once('UserType.php');

class Player extends UserType
{
    /**
     * @param array<int,array<int,int|string>>
     * @return array<int,array<int,int|string>>
     */
    public function getHand(): array
    {
        $randomCards = array_rand($this->trumpCards, 2);
        $getHand = [];
        foreach ($randomCards as $card) {
            $getHand[] = $this->trumpCards[$card];
        }
        return $getHand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'あなた';

    }
}
