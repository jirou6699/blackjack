<?php

namespace blackJack;

require_once('UserType.php');

class Dealer extends UserType
{
    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards(): array
    {
        $trumpCard = $this->deck->trumpCards();
        $randomCards = array_rand($trumpCard, 2);
        $getHand = [];
        foreach ($randomCards as $card) {
            $getHand[] = $trumpCard[$card];
        }
        return $getHand;
    }

    /**
     * @return array<int,int|string>
     */
    public function addCard(): array
    {
        $trumpCard = $this->deck->trumpCards();
        $addCardNumber = array_rand($trumpCard, 1);
        $addCard = $trumpCard[$addCardNumber];
        return $addCard;
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param array<int,int|string> $addCard
     * @return array<int,array<int,int|string>>
     */
    public function getHand(array $hand, array $addCard)
    {
        $hand[] = $addCard;
        return $hand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ディーラー';
    }
}
