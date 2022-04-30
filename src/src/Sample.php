<?php

namespace blackJack;

$num = 2;

$players = ['あなた', 'さとう', 'くぼた'];
$joinPlayers = array_slice($players, 0, $num);

const TRUMP_CARD = [['ハート', 'A'], ['ハート', '2'], ['ハート', '3'], ['ハート', '4'], ['ハート', '5'], ['ハート', '6'], ['ハート', '7'], ['ハート', '8'], ['ハート', '9'], ['ハート', '10'], ['ハート', 'J'], ['ハート', 'Q'], ['ハート', 'K'], ['スペード', 'A'], ['スペード', '2'], ['スペード', '3'], ['スペード', '4'], ['スペード', '5'], ['スペード', '6'], ['スペード', '7'], ['スペード', '8'], ['スペード', '9'], ['スペード', '10'], ['スペード', 'J'], ['スペード', 'Q'], ['スペード', 'K'], ['ダイヤ', 'A'], ['ダイヤ', '2'], ['ダイヤ', '3'], ['ダイヤ', '4'], ['ダイヤ', '5'], ['ダイヤ', '6'], ['ダイヤ', '7'], ['ダイヤ', '8'], ['ダイヤ', '9'], ['ダイヤ', '10'], ['ダイヤ', 'J'], ['ダイヤ', 'Q'], ['ダイヤ', 'K'], ['クラブ', 'A'], ['クラブ', '2'], ['クラブ', '3'], ['クラブ', '4'], ['クラブ', '5'], ['クラブ', '6'], ['クラブ', '7'], ['クラブ', '8'], ['クラブ', '9'], ['クラブ', '10'], ['クラブ', 'J'], ['クラブ', 'Q'], ['クラブ', 'K']];

// プレーヤー全ての手札を連想配列で生成する
$playerAllHands = drawCards($joinPlayers);
function drawCards($joinPlayers)
{
	$allHands = [];
	foreach ($joinPlayers as $player) {
		$hand = [];
		$cardNumbers = array_rand(TRUMP_CARD, 2);
		foreach ($cardNumbers as $num) {
			$hand[] = TRUMP_CARD[$num];
		}
		$allHands[$player] = $hand;
	}
	return $allHands;
}

// すべてのプレーヤのカードの呼び出し
foreach ($playerAllHands as $name => $hand) {
	foreach ($hand as $card) {
		echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です.' . PHP_EOL;
	}
	// echo PHP_EOL;
}

const MIN_MAX = 10;
const CARD_A = 11;
const CARD_RANK = [
	'2' => 2,
	'3' => 3,
	'4' => 4,
	'5' => 5,
	'6' => 6,
	'7' => 7,
	'8' => 8,
	'9' => 9,
	'10' => 10,
	'J' => 10,
	'Q' => 10,
	'K' => 10,
	'A' => 11,
];

// あなたの合計得点の呼び出し
$yourPoint = getPoint($playerAllHands['あなた']);

// あなたの合計点数を求める
function getPoint(array $hand): int
{
	$convertToRanks = [];
	foreach ($hand as $card) {
		$convertToRanks[] = CARD_RANK[$card[1]];
	}
	asort($convertToRanks);
	$totalPoint = 0;
	foreach ($convertToRanks as $rank) {
		if ($totalPoint <= MIN_MAX) {
			$totalPoint += $rank;
		} elseif ($rank === CARD_A) {
			$totalPoint += 1;
		} else {
			$totalPoint += $rank;
		}
	}
	return $totalPoint;
}

// あなたのカードを一枚追加する
// $yourAddCard = addCard($playersAllHands['あなた']);
function addCard()
{
	// $trumpCard = $this->deck->trumpCards();
	$addCardNumber = array_rand(TRUMP_CARD, 1);
	$addCard = TRUMP_CARD[$addCardNumber];
	return $addCard;
}

// カードの合計を計算する

// $yourHand = getHand($playerAllHands['あなた'], $yourAddCard);

function getHand(array $hand, array $addCard): array
{
	$hand[] = $addCard;
	return $hand;
}


// あなたのカードを1枚追加する
while (true) {
	echo 'あなたの現在の得点は' . $yourPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
	$string = trim(fgets(STDIN));
	if ($string == 'Y') {
		// $playerAddCard = $player->addCard();
		$yourAddCard = addCard($playerAllHands['あなた']);
		echo 'あなたの引いたカードは' . $yourAddCard[0] . 'の' . $yourAddCard[1] . 'です。' . PHP_EOL;
		// $playerHand = $player->getHand($playerAllHands['あなた'], $yourAddCard);
		$playerHand = getHand($playerAllHands['あなた'], $yourAddCard);
		// $card = new Card();
		// $yourPoint = $card->getPoint($playerHand);
		$yourPoint = getPoint($playerAllHands['あなた']);
	} elseif ($string == 'N') {
		break;
	}
}

echo $playerName . 'の現在の得点は' . $yourPoint . 'です。' . PHP_EOL;
