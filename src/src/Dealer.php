<?php

namespace blackJack;

require_once('UserType.php');
require_once('Card.php');

class Dealer implements UserType
{
    public function __construct(private Card $card)
    {
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ディーラー';
    }

    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards()
    {
        foreach ($this->card->getPrimaryCards() as $index => $card) {
            if($index === 1) {
                echo self::getName() . 'の引いた2枚目のカードはわかりません' . PHP_EOL;
            } else {
                echo self::getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }


    public function hitStay()
    {
    }

    // /**
    //  * @return array<int,int|string>
    //  */
    // public function addCard(): array
    // {
    //     $trumpCard = $this->deck->trumpCards();
    //     $addCardNumber = array_rand($trumpCard, 1);
    //     $addCard = $trumpCard[$addCardNumber];
    //     return $addCard;
    // }

    // /**
    //  * @param array<int,array<int,int|string>> $hand
    //  * @param array<int,int|string> $addCard
    //  * @return array<int,array<int,int|string>>
    //  */
    // public function getHand(array $hand, array $addCard)
    // {
    //     $hand[] = $addCard;
    //     return $hand;
    // }

}
