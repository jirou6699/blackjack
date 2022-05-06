<?php

namespace blackJack;

require_once('UserType.php');
require_once('Standard.php');
require_once('DoublingDown.php');
require_once('HandAction.php');

class FirstPlayer extends UserType
{
	public string $name  = 'あなた';
	public int $totalPoint = 0;
	public  array $hand;

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
		sleep(2);
	}
	/**
	 * @param array<int,array<int,int|string>> $hand
	 */
	public function getHand(): void
	{
		if (count($this->hand) === 2) {
			$type = $this->getAction();
			$action = new HandAction($type);
			$action->hitStay($this->hand, $this->name);
			$this->totalPoint = $type::$totalPoint;
		} else {
		}
	}

	private function getAction()
	{
		echo '1. カードを一枚だけ追加して勝負 (ダブリング)' . PHP_EOL;
		echo '2. 勝負を降りる（サレンダー)' . PHP_EOL;
		echo '3. 特殊ルールは追加せず続ける' . PHP_EOL;
		echo '4. ２手に分けて勝負する' . PHP_EOL;
		echo 'アクションを選択してください　: ';
		$num = (int) trim(fgets(STDIN));
		echo PHP_EOL;

		if ($num === 1) {
			// ダブリング
			return new DoublingDown($this->card, $this->deck);
		} elseif ($num === 2) {
			// サレンダー
		} elseif ($num === 3) {
			return new Standard($this->card, $this->deck);
		} elseif ($num === 4) {
			// スプリッティング
		}
	}

	public function showTotalPoint(): void
	{
		echo $this->name . 'の得点は' . $this->totalPoint . 'です' . PHP_EOL;
		sleep(1);
	}
}
