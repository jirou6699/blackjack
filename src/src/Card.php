<?php

namespace blackJack;

require_once('Deck.php');

class Card
{

    public function __construct(private Deck $deck)
    {

    }

    private const MIN_MAX = 10;
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
     * @return array<int,array<int,int|string>>
     */
    public function getPrimaryCards(): array
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
    public function getOneCard(): array
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
    public function AddedCards(): array
    {
        self::getPrimaryCards()[] = self::getOneCard();
        return self::getPrimaryCards();
    }


    /**
     * @param array<int,array<int,int|string>> $hand
     * @return int
     */
    public function getPoint(): int
    {
        $convertToRanks = [];
        foreach (self::getPrimaryCards() as $card) {
            $convertToRanks[] = self::CARD_RANK[$card[1]];
        }
        asort($convertToRanks);
        $totalPoint = 0;
        foreach($convertToRanks as $rank) {
            if($totalPoint <= self::MIN_MAX){
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
