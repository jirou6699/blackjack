<?php

namespace blackJack;

require_once('Action.php');

class DoublingDown implements Action
{
	static int $totalPoint = 0;
	static array $hand;

	public function __construct(private $card, private $deck)
	{
	}

	public function hitStay($hand, $name)
	{
		$card = $this->deck->getOneCard();
		echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
		self::$totalPoint = $this->card->getPoint($hand);
		echo $name . 'の現在の得点は' . self::$totalPoint . 'です' . PHP_EOL;
		self::$hand[] = $card;
		echo PHP_EOL;
	}
}

