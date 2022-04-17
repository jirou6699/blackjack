<?php

namespace blackJack;

class Card
{
    private const SUITS = ['ハート', 'スペード', 'ダイヤ', 'クラブ'];
    private const CARD_NUMBERS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

    public function __construct(private int $players)
    {
    }

    public function trumpCards(): array
    {
        $cards = [];
        foreach (self::SUITS as $suit) {
            $perCards = [];
            foreach (self::CARD_NUMBERS as $number) {
                $perCards[$suit] = $number;
                $cards[] = $perCards;
            }
        }
        return $cards;
    }

    public function getCards(): array
    {
        $allCards = $this->trumpCards();
        $numberOfCards = $this->players * 2;
        $randomCards = array_rand($allCards, $numberOfCards);
        $getCards = [];
        foreach ($randomCards as $card){
            $getCards[] = $allCards[$card];
        }
        return $getCards;
    }
}
