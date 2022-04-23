<?php

namespace blackJack;

require_once('UserType.php');

class Dealer extends UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    public function getFirstHand(): array
    {
        $randomCards = array_rand($this->trumpCards, 2);
        $getHand = [];
        foreach ($randomCards as $card) {
            $getHand[] = $this->trumpCards[$card];
        }
        return $getHand;
    }

    /**
     * @return array<int,int|string>
     */
    public function addCard(): array
    {
        $addCardNumber = array_rand($this->trumpCards, 1);
        $addHand = $this->trumpCards[$addCardNumber];
        return $addHand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ディーラー';
    }
}
