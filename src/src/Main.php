<?php

namespace blackJack;

require_once('Game.php');
require_once('Deck.php');
require_once('Player.php');
require_once('Dealer.php');

$game = new Game();
$deck = new Deck();
$card = new Card();
$trumpCards = $deck->trumpCards();

$player =  new Player($trumpCards);
$playerName = $player->getName();
$playerHand = $player->getFirstHand();
$playerAddCard = $player->addCard();
$playerTotalPoints = $card->getTotalPoints($playerHand);

$dealer =  new Dealer($trumpCards);
$dealerName = $dealer->getName();
$dealerHand = $player->getFirstHand();

echo 'ブラックジャックを開始します。' . PHP_EOL;
foreach ($playerHand as $card) {
    echo $playerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
}

foreach ($dealerHand as $index => $card) {
    if ($index === 0) {
        echo $dealerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
    } elseif ($index === 1) {
        echo $dealerName . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;
    }
}

echo 'あなたの現在の得点は' . $playerTotalPoints . 'です。カードを引きますか？（Y/N）' . PHP_EOL;

while (true) {
    $choice = trim(fgets(STDIN));
    if ($choice == 'Y') {
        echo $playerName . 'の引いたカードは' . $playerAddCard[0] . 'の' . $playerAddCard[1] . 'です。' . PHP_EOL;
        $playerHand = $player->getHand($playerHand, $playerAddCard);
        $card = new Card();
        $playerTotalPoints = $card->getTotalPoints($playerHand);
        echo $playerName . 'の現在の得点は' . $playerTotalPoints . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
    } elseif ($choice == 'N') {
        break;
    }
}

// ディーラーの引いた2枚目のカードはダイヤの2でした。
// ディーラーの現在の得点は12です。
// ディーラーの引いたカードはハートのKです。
// あなたの得点は20です。
// ディーラーの得点は22です。
// あなたの勝ちです！
// ブラックジャックを終了します。
