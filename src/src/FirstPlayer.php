<?php

namespace blackJack;

require_once('UserType.php');
require_once('Standard.php');
require_once('DoublingDown.php');
require_once('Surrender.php');
require_once('Split.php');
require_once('HandAction.php');

class FirstPlayer extends UserType
{
    /** @var array<int,array<int,int|string>> */
    public array $hand;
    public string $name  = 'あなた';
    public int $totalPoint = 0;
    public int $splitTotalPoint = 0;

    public function __construct(Card $card, Deck $deck)
    {
        parent::__construct($card, $deck);
    }

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
    }


    public function getHand(): void
    {
        $cardRanks = $this->card->getRank($this->hand);
        $primaryCard = $cardRanks[0];
        $secondaryCard = $cardRanks[1];
        if (count($this->hand) === 2) {
            $type = $this->getAction($cardRanks);
            $action = new HandAction($type);
            $action->hitStay($this->hand, $this->name);
        }
        $this->hand = $type::$hand;
        $this->totalPoint = $type::$totalPoint;
        if ($primaryCard === $secondaryCard) {
            $this->splitTotalPoint = $type::$splitTotalPoint;
        }
    }

    /**
     * @param array<int,int> $cardRanks
     */
    private function getAction($cardRanks)
    {
        $primaryCard = $cardRanks[0];
        $secondaryCard = $cardRanks[1];
        echo '1. カードを一枚だけ追加して勝負 (ダブリング)' . PHP_EOL;
        echo '2. 勝負を降りる（サレンダー)' . PHP_EOL;
        echo '3. 特殊ルールは追加せず続ける(ノーマル)' . PHP_EOL;
        if ($primaryCard === $secondaryCard) {
            echo '4. ２手に分けて勝負する(スプリッティング)' . PHP_EOL;
        }
        echo 'アクションを選択してください : ';
        $num = (int) trim(fgets(STDIN));
        echo PHP_EOL;

        if ($num === 1) {
            // ダブリング
            return new DoublingDown($this->card, $this->deck);
        } elseif ($num === 2) {
            // サレンダー
            return new Surrender($this->card, $this->deck);
        } elseif ($num === 3) {
            // 通常の処理
            return new Standard($this->card, $this->deck);
        } elseif ($num === 4) {
            // スプリッティング
            return new Split($this->card, $this->deck);
        }
    }

    public function showTotalPoint(): void
    {
        if ($this->totalPoint === 0) {
            echo $this->name . 'はゲームを降りました。' . PHP_EOL;
        } elseif($this->splitTotalPoint > 0) {
            echo $this->name . '1つ目の手札の得点は' . $this->totalPoint . 'です' . PHP_EOL;
            echo $this->name . '2つ目の手札の得点は' . $this->splitTotalPoint . 'です' . PHP_EOL;
        } elseif($this->totalPoint > 0) {
            echo $this->name . 'の得点は' . $this->totalPoint . 'です' . PHP_EOL;
        }
    }
}
