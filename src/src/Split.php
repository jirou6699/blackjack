<?php

namespace blackJack;

require_once('Action.php');

class Split implements Action
{

	static int $totalPoint = 0;
	static int $splitTotalPoint = 0;
	static array $hand;

	public function __construct(private $card, private $deck)
	{
	}

	public function hitStay($hand, $name)
	{
		self::$hand = $this->splitHand($hand);
		$totalPoints = [];

		echo 'スプリットで手札を分けました。' . PHP_EOL;
		foreach(self::$hand as $index => $hands) {
			echo $index + 1 . 'つ目の手札です。' . PHP_EOL;
			$card = $this->deck->getOneCard();
			echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
			$hands[] = $card;
			while (true) {
				$totalPoints[$index] = $this->card->getPoint($hands);
				echo $name . 'の現在の得点は' . $totalPoints[$index] . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
				$string = trim(fgets(STDIN));
				if ($string === 'Y') {
					$card = $this->deck->getOneCard();
					echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
					$hands[] = $card;
				} elseif ($string === 'N') {
					break;
				}
			}
		}
		self::$totalPoint = $totalPoints[0];
		self::$splitTotalPoint = $totalPoints[1];
	}

	public function splitHand($hand)
	{
		foreach ($hand as $index => $card) {
			$splitHand = [];
			$splitHand[] = $card;
			$hand[$index] = $splitHand;
		}
		return $hand;
	}
}
