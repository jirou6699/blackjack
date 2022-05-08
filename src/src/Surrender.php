<?php

namespace blackJack;

require_once('Action.php');

class Surrender implements Action
{
    public static int $totalPoint = 0;
    public static array $hand;

    public function __construct(private $card, private $deck)
    {
    }

    public function hitStay($hand, $name)
    {
        echo $name . 'このゲームから降りました.' . PHP_EOL;
        self::$hand = [$name => array()];
        echo PHP_EOL;
    }
}
