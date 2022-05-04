<?php

namespace blackJack;

class Deck
{
    private const SUITS = ['ハート', 'スペード', 'ダイヤ', 'クラブ'];
    private const CARD_NUMBERS = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

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

    /**
     * @return array<int,array<int,int|string>>
     */
    public function getTwoCards(): array
    {
        $trumpCard = self::trumpCards();
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
        $trumpCard = self::trumpCards();
        $addCardNumber = array_rand($trumpCard, 1);
        $addCard = $trumpCard[$addCardNumber];
        return $addCard;
    }
}
