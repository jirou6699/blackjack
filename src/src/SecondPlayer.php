<?php

namespace blackJack;

require_once('UserType.php');
require_once('Card.php');
require_once('Deck.php');

class SecondPlayer implements UserType
{
	public int $totalPoint = 0;
	public string $name = 'さとうさん';

	public function __construct(private Card $card, private Deck $deck)
	{
	}

	/**
	 * @param array<int,array<int,int|string>> $cards
	 */
	public function drawCards(array $cards): void
	{
		foreach ($cards as $card) {
			echo 'プレーヤー２の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
		}
	}

	/**
	 * @param array<int,array<int,int|string>> $hand
	 */
	public function hitStay(array $hand): void
	{
		while (true) {
			$this->totalPoint = $this->getTotalPoint($hand);
			echo 'プレーヤー２の現在の得点は' . $this->totalPoint . 'です' . PHP_EOL;
			if ($this->getTotalPoint($hand) <= 17) {
				$card = $this->deck->getOneCard();
				echo 'プレーヤー２が引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
				$hand[] = $card;
			} elseif($this->getTotalPoint($hand) > 17) {
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
		echo 'プレーヤー２の得点は' . $this->totalPoint . 'です' . PHP_EOL;
	}
}
