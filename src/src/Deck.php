<?php

namespace blackJack;

class Deck
{
    private const SUITS = ['ハート', 'スペード', 'ダイヤ', 'クラブ'];
    private const CARD_NUMBERS = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

    /**
     * @return array<int,array<int,int|string>>
     */
    public function trumpCards(): array
    {
        $cards = [];
        foreach (self::SUITS as $suit) {
            $card = [];
            foreach (self::CARD_NUMBERS as $number) {
                $card = [$suit, $number];
                $cards[] = $card;
            }
        }
        return $cards;
    }
}
