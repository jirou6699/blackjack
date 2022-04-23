<?php

namespace blackJack;

require_once('UserType.php');

class Player extends UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    public function getFirstHand(): array
    {
        $cardNumbers = array_rand($this->trumpCards, 2);
        $hand = [];
        foreach ($cardNumbers as $num) {
            $hand [] = $this->trumpCards[$num];
        }
        return $hand;
    }

    /**
     * @return array<int,int|string>
     */
    public function addCard(): array
    {
        $addCardNumber = array_rand($this->trumpCards, 1);
        $addCard = $this->trumpCards[$addCardNumber];
        return $addCard;
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param array<int,int|string> $addCard
     * @return array<int,array<int,int|string>>
     */
    public function getHand(array $hand, array $addCard)
    {
        $hand [] = $addCard;
        return $hand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'あなた';
    }
}
