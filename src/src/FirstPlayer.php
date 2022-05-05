<?php

namespace blackJack;

require_once('UserType.php');

class FirstPlayer extends UserType
{
    public string $name  = 'あなた';
    public int $totalPoint = 0;
    public array $hand;

    /**
     * @param array<int,array<int,int|string>> $cards
     */
    public function drawCards(array $cards): void
    {
        echo 'ブラックジャックを開始します。' . PHP_EOL;
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
    public function hitStay(): void
    {
        $this->totalPoint = $this->card->getPoint($this->hand);
        while (true) {
            echo $this->name . 'の現在の得点は' . $this->totalPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $this->deck->getOneCard();
                echo $this->name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                $this->hand[] = $card;
                $this->totalPoint = $this->card->getPoint($this->hand);
            } elseif ($string === 'N') {
                break;
            }
        }
    }

    public function showTotalPoint(): void
    {
        echo $this->name . 'の得点は' . $this->totalPoint . 'です' . PHP_EOL;
        sleep(1);
    }
}
