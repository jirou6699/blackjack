<?php

namespace blackJack;

require_once('Action.php');

class DoublingDown implements Action
{
    /** @var array<int,array<int,int|string>> */
    public static array $hand;
    public static int $totalPoint = 0;

    public function __construct(private Card $card, private Deck $deck)
    {
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param string $name
     */
    public function hitStay($hand, $name): void
    {
        $card = $this->deck->getOneCard();
        echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        self::$totalPoint = $this->card->getPoint($hand);
        echo $name . 'の現在の得点は' . self::$totalPoint . 'です' . PHP_EOL;
        self::$hand[] = $card;
        echo PHP_EOL;
    }
}
