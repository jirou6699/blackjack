<?php

namespace blackJack;

require_once('UserType.php');

class Dealer extends UserType
{
    public string $name = 'ディーラー';
    public int $totalPoint = 0;
    public array $hand;

    /**
     * @param array<int,array<int,int|string>> $cards
     */
    public function drawCards(array $cards): void
    {
        foreach ($cards as $index => $card) {
            if ($index === 1) {
                echo 'ディーラーの引いた2枚目のカードはわかりません。' . PHP_EOL;
            } elseif ($index === 0) {
                echo 'ディーラーの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
        $this->hand = $cards;
        echo PHP_EOL;
        sleep(2);
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     */
    public function getHand(): void
    {
        echo 'ディーラーが引いた2枚目のカードは' . $this->hand[1][0] . 'の' . $this->hand[1][1] . 'です。' . PHP_EOL;
        $this->totalPoint = $this->card->getPoint($this->hand);
        echo 'ディーラーの現在の得点は' . $this->totalPoint . 'です' . PHP_EOL;
        while (true) {
            if ($this->totalPoint < 17) {
                $card = $this->deck->getOneCard();
                echo 'ディーラーが引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                $this->hand[] = $card;
                $this->totalPoint = $this->card->getPoint($this->hand);
            }
            break;
        }
        echo PHP_EOL;
        sleep(3);
    }

    public function showTotalPoint(): void
    {
        echo 'ディーラーの得点は' . $this->totalPoint . 'です' . PHP_EOL;
        sleep(1);
    }
}
