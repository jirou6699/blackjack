<?php

namespace blackJack;

require_once('UserType.php');

class ThirdPlayer extends UserType
{
    public string $name = '鈴木さん';
    public int $totalPoint = 0;
    public int $splitTotalPoint = 0;
    public array $hand;

    /**
     * @param array<int,array<int,int|string>> $cards
     */
    public function drawCards(array $cards): void
    {
        foreach ($cards as $card) {
            echo $this->name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
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
        $this->totalPoint = $this->card->getPoint($this->hand);
        echo $this->name . 'の現在の得点は' . $this->totalPoint . 'です' . PHP_EOL;
        while (true) {
            if ($this->totalPoint < 17) {
                $card = $this->deck->getOneCard();
                echo $this->name . 'が引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                $this->hand[] = $card;
                $this->totalPoint = $this->card->getPoint($this->hand);
            } elseif ($this->totalPoint > 17) {
                break;
            }
        }
        echo PHP_EOL;
        sleep(3);
    }

    public function showTotalPoint(): void
    {
        echo $this->name . 'の得点は' . $this->totalPoint . 'です' . PHP_EOL;
        sleep(1);
    }
}
