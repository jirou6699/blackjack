<?php

namespace blackJack;

class HandEvaluator
{
	// /**
	//  * @param int $playerPoint, $dealerPoint
	//  * @return string
	//  */
	// public static function getWinner(int $playerPoint, int $dealerPoint): string
	// {
	//     $values = [];
	//     foreach ([$playerPoint, $dealerPoint] as $point) {
	//         $values[] = abs($point - 21);
	//     }

	//     $winner = '引き分けです。' . PHP_EOL . 'ブラックジャックを終了します。';
	//     if ($values[0] < $values[1]) {
	//         $winner = 'あなたの勝ちです!' . PHP_EOL . 'ブラックジャックを終了します。';
	//     } elseif ($values[0] > $values[1]) {
	//         $winner =  'ディーラーの勝ちです。' . PHP_EOL . 'ブラックジャックを終了します。';
	//     }
	//     return $winner;
	// }

	public static function getWinner(array $allPlayersPoint)
	{
		foreach ($allPlayersPoint as $index => $playerPoint) {
			foreach ($playerPoint as $name => $point) {
				$value = abs($point - 21);
				$playerPoint[$name] = $value;
			}
			$allPlayersPoint[$index] = $playerPoint;
		}

		$dealerPoint = end($allPlayersPoint);
		$playersPoint = array_slice($allPlayersPoint, 0, count($allPlayersPoint) - 1);

		foreach ($playersPoint as $playerPoint) {
			foreach ($playerPoint as $name => $point) {
				$judgement = '引き分けです。' . PHP_EOL;
				if ($point < $dealerPoint['ディーラー']) {
					$judgement = $name . 'の勝ちです!' . PHP_EOL ;
				} elseif ($point < $dealerPoint['ディーラー']){
					$judgement =  $name . 'の負けです。' . PHP_EOL;
				}
				echo $judgement;
			}
		}
		echo 'ブラックジャックを終了します。';
	}

	// private function isPlayerWin($playerPoint){
	// 	$playerValue = abs($playerPoint['name'] - 21);
	// 	$dealerValue = abs(end($allPlayersPoint)['ディーラー'] - 21);
	// 	return $playerValue < $dealerValue;
	// }

	// private function isDealerWin($playerPoint){
	// 	$playerValue = abs($playerPoint['name'] - 21);
	// 	$dealerValue = abs(end($allPlayersPoint)['ディーラー'] - 21);
	// 	return $playerValue > $dealerValue;
	// }
}
