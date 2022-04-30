<?php

namespace blackJack;

class Card
{
    private const CARD_A = 11;
    private const CARD_RANK = [
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
        'K' => 10,
        'A' => 11,
    ];

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return int
     */
    public function getPoint(array $hand): int
    {
        $convertToRanks = [];
        foreach ($hand as $card) {
            $convertToRanks[] = self::CARD_RANK[$card[1]];
        }
        asort($convertToRanks);
        $totalPoint = 0;
        foreach($convertToRanks as $rank) {
            if($totalPoint <= 10){
                $totalPoint += $rank;
            } elseif($rank === self::CARD_A ){
                $totalPoint += 1;
            } else {
                $totalPoint += $rank;
            }
        }
        return $totalPoint;
    }
}
