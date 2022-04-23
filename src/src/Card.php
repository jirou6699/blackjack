<?php

namespace blackJack;

require_once('Game.php');

class Card
{
    private const CARD_RANK = [
        'A' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10
    ];

    /**
     * @param array<int,array<int,string>> $hand
     * @return int
     */
    public function getTotalPoints(array $hand): int
    {
        $convertToRank = [];
        foreach ($hand as $card) {
            $convertToRank[] = self::CARD_RANK[$card[1]];
        }
        $totalPoints = array_sum($convertToRank);
        return $totalPoints;
    }

    // /**
    //  * @param array<int,int> $convertToRank
    //  * @return int
    //  */
    // public function getTotalPoints(array $convertToRank)
    // {
    // }
}
