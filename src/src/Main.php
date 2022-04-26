<?php

namespace blackJack;

require_once('Deck.php');
require_once('Player.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');
require_once('Card.php');

$card = new Card();
$deck = new Deck();

$player = new Player($deck);
$playerName = $player->getName();
$playerHand = $player->drawCard();
$playerAddCard = $player->addCard();
$playerTotalPoints = $card->getTotalPoints($playerHand);

$dealer =  new Dealer($deck);
$dealerName = $dealer->getName();
$dealerHand = $dealer->drawCard();
$dealerAddCard = $dealer->addCard();
$dealerTotalPoints = $card->getTotalPoints($dealerHand);

echo 'ブラックジャックを開始します。' . PHP_EOL;
foreach ($playerHand as $card) {
    echo $playerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
}

echo $dealerName . 'の引いたカードは' . $dealerHand[0][0] . 'の' . $dealerHand[0][1] . 'です。' . PHP_EOL;
echo $dealerName . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;

while (true) {
    echo $playerName . 'の現在の得点は' . $playerTotalPoints . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
    $choice = trim(fgets(STDIN));
    if ($choice == 'Y') {
        echo $playerName . 'の引いたカードは' . $playerAddCard[0] . 'の' . $playerAddCard[1] . 'です。' . PHP_EOL;
        $playerHand = $player->getHand($playerHand, $playerAddCard);
        $card = new Card();
        $playerTotalPoints = $card->getTotalPoints($playerHand);
    } elseif ($choice == 'N') {
        break;
    }
    $player =  new Player($deck);
    $playerAddCard = $player->addCard();
}

echo $dealerName . 'が引いた2枚目のカードは' . $dealerHand[1][0] . 'の' . $dealerHand[1][1] . 'です。' . PHP_EOL;
echo $dealerName . 'の現在の得点は' . $dealerTotalPoints . 'です' . PHP_EOL;

while (true) {
    if ($dealerTotalPoints <= 17) {
        $dealerHand = $dealer->getHand($dealerHand, $dealerAddCard);
        echo $dealerName . 'が引いたカードは' . $dealerAddCard[0] . 'の' . $dealerAddCard[1] . 'です。' . PHP_EOL;
        $card = new Card();
        $dealerTotalPoints = $card->getTotalPoints($dealerHand);
    } else {
        break;
    }
    $dealer =  new Dealer($deck);
    $dealerAddCard = $dealer->addCard();
}

echo $playerName . 'の現在の得点は' . $playerTotalPoints . 'です。' . PHP_EOL;
echo $dealerName . 'の現在の得点は' . $dealerTotalPoints . 'です' . PHP_EOL;

echo HandEvaluator::getWinner($playerTotalPoints, $dealerTotalPoints) . PHP_EOL;
echo 'ブラックジャックを終了します。' . PHP_EOL;
