<?php

namespace blackJack;

class ScoreCounter
{
    private const RANK_AMOUNT = 10;
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
    public function getScore(array $hand): int
    {
        $convertToRanks = $this->getRank($hand);
        asort($convertToRanks);
        $totalPoint = 0;
        foreach ($convertToRanks as $rank) {
            if ($totalPoint <= self::RANK_AMOUNT || $rank !== self::CARD_RANK['A']) {
                $totalPoint += $rank;
            } elseif ($rank === self::CARD_RANK['A']) {
                $totalPoint += 1;
            }
        }
        return $totalPoint;
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return array<int,int>
     */
    public function getRank(array $hand): array
    {
        $convertToRanks = [];
        foreach ($hand as $card) {
            $convertToRanks[] = self::CARD_RANK[$card[1]];
        }
        return $convertToRanks;
    }
}
