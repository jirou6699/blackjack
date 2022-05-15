<?php

namespace blackJack;

class HandGenerator
{
    public function __construct(private Deck $deck, private ScoreCounter $scoreCounter)
    {
    }

    /**
     * @return array<int,array<int,int|string>>
     */
    public function getHand(): array
    {
        $trumpCard = $this->deck->trumpCards();
        $cardNumbers = array_rand($trumpCard, 2);
        $hand = [];
        foreach ($cardNumbers as $num) {
            $hand[] = $trumpCard[$num];
        }
        return $hand;
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
     *  @param array<int,array<int,int|string>> $hand
     * @return int
     */
    public function currentScore($hand): int
    {
        return $this->scoreCounter->getScore($hand);
    }
}
