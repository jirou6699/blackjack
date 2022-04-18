<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Card;

require_once(__DIR__ . '/../src/Card.php');

final class CardTest extends TestCase
{

	public function testTrumpCards()
	{
		$card = new Card(2);
		$this->assertSame([['ハート', 'A'], ['ハート', 2], ['ハート', 3], ['ハート', 4], ['ハート', 5], ['ハート', 6], ['ハート', 7], ['ハート', 8], ['ハート', 9], ['ハート', 10], ['ハート', 'J'], ['ハート', 'Q'], ['ハート', 'K'], ['スペード', 'A'], ['スペード', 2], ['スペード', 3], ['スペード', 4], ['スペード', 5], ['スペード', 6], ['スペード', 7], ['スペード', 8], ['スペード', 9], ['スペード', 10], ['スペード', 'J'], ['スペード', 'Q'], ['スペード', 'K'], ['ダイヤ', 'A'], ['ダイヤ', 2], ['ダイヤ', 3], ['ダイヤ', 4], ['ダイヤ', 5], ['ダイヤ', 6], ['ダイヤ', 7], ['ダイヤ', 8], ['ダイヤ', 9], ['ダイヤ', 10], ['ダイヤ', 'J'], ['ダイヤ', 'Q'], ['ダイヤ', 'K'], ['クラブ', 'A'], ['クラブ', 2], ['クラブ', 3], ['クラブ', 4], ['クラブ', 5], ['クラブ', 6], ['クラブ', 7], ['クラブ', 8], ['クラブ', 9], ['クラブ', 10], ['クラブ', 'J'], ['クラブ', 'Q'], ['クラブ', 'K']], $card->trumpCards());
	}

	public function testGetCards()
	{
		$card = new Card(2);
		$allCards = $card->trumpCards();
		// 配列の要素数が正しいかどうか
		$this->assertCount(4, $card->getCards());

		$result = [];
		foreach ($allCards as $card) {
			$suit = $card[0];
			$number = $card[1];
			if ($suit === 'ハート' && $number === 'A') {
				$result[] = [$card[0], $card[1]];
			} elseif ($suit === 'スペード' && $number === 2) {
				$result[] = [$card[0], $card[1]];
			} elseif ($suit === 'ダイヤ' && $number === 3) {
				$result[] = [$card[0], $card[1]];
			} elseif ($suit === 'クラブ' && $number === 4) {
				$result[] = [$card[0], $card[1]];
			}
		}
		// foreachで回した結果があているかどうか
		$this->assertSame([['ハート', 'A'], ['スペード', 2], ['ダイヤ', 3], ['クラブ', 4]],$result);
	}

	public function testGetRank()
	{
		// $card = new Card(2);
		// $this->assertSame([7, 10, 4, 9], $card->getRank());
	}
}
