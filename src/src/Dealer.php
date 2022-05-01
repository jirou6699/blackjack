<?php

namespace blackJack;

require_once('UserType.php');

class Dealer implements UserType
{
	public $totalPoint = 0;

	public function __construct(private Card $card, private Deck $deck)
	{
	}
	/**
	 * @return array<int,array<int,int|string>>
	 */
	public function drawCards(array $cards): void
	{
		foreach ($cards as $index => $card) {
			if ($index === 1) {
				echo 'ディーラーの引いた2枚目のカードはわかりません。' . PHP_EOL;
			} else {
				echo 'ディーラーの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
			}
		}
	}


	public function hitStay(array $hand)
	{
		echo 'ディーラーが引いた2枚目のカードは' . $hand[1][0] . 'の' . $hand[1][1] . 'です。' . PHP_EOL;
		$this->totalPoint += $this->card->getPoint($hand);
		echo 'ディーラーの現在の得点は' . $this->totalPoint . 'です' . PHP_EOL;
		while (true) {
			if ($this->getTotalPoint($hand) <= 17) {
				$card = $this->deck->getOneCard();
				echo 'ディーラーが引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
				$hand[] = $card;
				$this->totalPoint = $this->getTotalPoint($hand);
			}
			break;
		}
	}

	public function getTotalPoint(array $hand)
	{
		return $this->card->getPoint($hand);
	}

	public function showTotalPoint()
	{
		echo 'ディーラーの得点は' . $this->totalPoint . 'です' . PHP_EOL;
	}
	// /**
	//  * @return string
	//  */
	// public function getName(): string
	// {
	// 	return 'ディーラー';
	// }
}
