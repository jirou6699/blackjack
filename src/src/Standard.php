<?php

namespace blackJack;

require_once('Action.php');

class Standard implements Action
{
    /** @var array<int,array<int,int|string>> */
    public static array $hand;
    public static int $totalPoint = 0;
    public static int $splitTotalPoint = 0;

    public function __construct(private Card $card, private Deck $deck)
    {
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param string $name
     */
    public function hitStay($hand, $name): void
    {
        self::$hand = $hand;
        while (true) {
            self::$totalPoint = $this->card->getPoint(self::$hand);
            echo $name . 'の現在の得点は' . self::$totalPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $this->deck->getOneCard();
                echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                self::$hand[] = $card;
            } elseif ($string === 'N') {
                break;
            }
        }
    }
}
