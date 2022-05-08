<?php

namespace blackJack;

require_once('Action.php');

class Surrender implements Action
{
    /** @var array<int,array<int,int|string>> */
    public static array $hand;
    public static int $totalPoint = 0;
    public static int $splitTotalPoint = 0;

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param string $name
     */
    public function hitStay($hand, $name): void
    {
        echo $name . 'このゲームから降りました.' . PHP_EOL;
		foreach($hand as &$card) {
			$card[1] = 0;
		}
		unset($card);
		self::$hand = $hand;
        echo PHP_EOL;
    }
}
