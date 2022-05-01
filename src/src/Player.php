<?php

namespace blackJack;

require_once('UserType.php');
require_once('Card.php');
require_once('Deck.php');

class Player implements UserType
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
		echo 'ブラックジャックを開始します。' . PHP_EOL;
		foreach ($cards as $card) {
			echo 'あなたの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
		}
    }

	public function hitStay(array $hand){
		$this->totalPoint += $this->card->getPoint($hand);
		while(true) {
			echo 'あなたの現在の得点は'. $this->totalPoint .'です。カードを引きますか？（Y/N）' . PHP_EOL;
			$string = trim(fgets(STDIN));
			if ($string === 'Y') {
				$card = $this->deck->getOneCard();
				echo 'あなたの引いたカードは' . $card[0] . 'の' . $card[1] . 'です。';
				$hand [] = $card;
				$this->totalPoint = $this->getTotalPoint($hand);
			} elseif ($string === 'N') {
				break;
			}
		}
	}

	public function getTotalPoint(array $hand)
	{
		return $this->card->getPoint($hand);
	}

	// /**
	//  * @return string
	//  */
	// public function getName(): string
	// {
	// 	return 'あなた';
	// }

	public function showTotalPoint(){
		echo 'あなたの得点は'. $this->totalPoint .'です' . PHP_EOL;
	}
}
