<?php

namespace blackJack;

require_once('UserType.php');
require_once('Card.php');
require_once('Deck.php');

class FirstPlayer implements UserType
{
	public string $name  = 'あなた';
    public int $totalPoint = 0;
	


    public function __construct(private Card $card, private Deck $deck)
    {
    }

    /**
     * @param array<int,array<int,int|string>> $cards
     */
    public function drawCards(array $cards): void
    {
        echo 'ブラックジャックを開始します。' . PHP_EOL;
        foreach ($cards as $card) {
            echo 'あなたの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        }
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     */
    public function hitStay(array $hand): void
    {
        $this->totalPoint += $this->card->getPoint($hand);
        while (true) {
            echo 'あなたの現在の得点は' . $this->totalPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $this->deck->getOneCard();
                echo 'あなたの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。';
                $hand[] = $card;
                $this->totalPoint = $this->getTotalPoint($hand);
            } elseif ($string === 'N') {
                break;
            }
        }
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @return int
     */
    public function getTotalPoint(array $hand): int
    {
        return $this->card->getPoint($hand);
    }

    public function showTotalPoint(): void
    {
        echo 'あなたの得点は' . $this->totalPoint . 'です' . PHP_EOL;
    }
}
