<?php

// declare(strict_types=1);

// namespace blackJack\Test;

// use PHPUnit\Framework\TestCase;
// use blackJack\Card;

// require_once(__DIR__ . '/../src/Card.php');

// final class CardTest extends TestCase
// {

// 	public function testGetCards()
// 	{
// 		$card = new Card(2);
// 		$allCards = $card->trumpCards();
// 		// 配列の要素数が正しいかどうか
// 		$this->assertCount(4, $card->getCards());

// 		$result = [];
// 		foreach ($allCards as $card) {
// 			$suit = $card[0];
// 			$number = $card[1];
// 			if ($suit === 'ハート' && $number === 'A') {
// 				$result[] = [$card[0], $card[1]];
// 			} elseif ($suit === 'スペード' && $number === 2) {
// 				$result[] = [$card[0], $card[1]];
// 			} elseif ($suit === 'ダイヤ' && $number === 3) {
// 				$result[] = [$card[0], $card[1]];
// 			} elseif ($suit === 'クラブ' && $number === 4) {
// 				$result[] = [$card[0], $card[1]];
// 			}
// 		}
// 		// foreachで回した結果があているかどうか
// 		$this->assertSame([['ハート', 'A'], ['スペード', 2], ['ダイヤ', 3], ['クラブ', 4]],$result);
// 	}

// 	public function testGetRank()
// 	{
// 		// $card = new Card(2);
// 		// $this->assertSame([7, 10, 4, 9], $card->getRank());
// 	}
// }
