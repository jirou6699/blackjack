<?php

namespace blackJack;

require_once('UserType.php');

class Player implements UserType
{
    // private $primaryCards;

    public function __construct(private Card $card)
    {
    }

    $primaryCards = $card->getPrimaryCards();

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'あなた';
    }

    public function drawCards()
    {
        echo 'ブラックジャックを開始します。' . PHP_EOL;
        foreach ($this->card->getPrimaryCards() as $card) {
            echo self::getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        }
    }

    public function hitStay()
    {
        echo self::getName() . 'の現在の得点は' . $this->card->getPoint() . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
        $string = trim(fgets(STDIN));
        while (true) {
            if ($string == 'Y') {
                $newCard = $this->card->getOneCard();
                echo self::getName() . 'の引いたカードは' . $newCard[0] . 'の' . $newCard[1] . 'です。' . PHP_EOL;
                $hand = $this->card->addedCards($this->card->getPrimaryCards(), $newCard);
                // $card = new Card();
                $playerPoint = $this->card->getPoint();
                echo self::getName() . 'の現在の得点は' . $playerPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
                $string = trim(fgets(STDIN));
            } elseif ($string == 'N') {
                break;
            }
        }
    }
}
