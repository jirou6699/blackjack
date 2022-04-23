<?php

namespace blackJack;

require_once('Player.php');
require_once('Game.php');
require_once('Deck.php');

$game = new Game();
$deck = new Deck();
$trumpCards = $deck->trumpCards();
$player =  new Player($trumpCards);
$playerHand = $player->getHand();

echo 'ブラックジャックを開始します。' . PHP_EOL;
foreach($playerHand as $card){
	echo $playerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
}

// echo 'ディーラーの引いたカードは' . $cards[2][0] . 'の' . $cards[2][1] . 'です' . PHP_EOL;
// echo 'ディーラーの引いた2枚目のカードはわかりません。' . PHP_EOL;
// あなたの現在の得点は15です。カードを引きますか？（Y/N）
// Y
// あなたの引いたカードはスペードの５です。
// あなたの現在の得点は20です。カードを引きますか？（Y/N）
// N
// ディーラーの引いた2枚目のカードはダイヤの2でした。
// ディーラーの現在の得点は12です。
// ディーラーの引いたカードはハートのKです。
// あなたの得点は20です。
// ディーラーの得点は22です。
// あなたの勝ちです！
// ブラックジャックを終了します。
