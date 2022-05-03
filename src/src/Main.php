<?php

namespace blackJack;

require_once('Deck.php');
require_once('Card.php');
require_once('FirstPlayer.php');
require_once('SecondPlayer.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');


$deck = new Deck();
$card = new Card();

// $player = new FirstPlayer($card, $deck);
// $playerCards = $deck->getTwoCards();
// $player->drawCards($playerCards);
// $player->HitStay($playerCards);

// $secondPlayer = new SecondPlayer($card, $deck);
// $secondPlayerCards = $deck->getTwoCards();
// $secondPlayer->drawCards($secondPlayerCards);
// $secondPlayer->HitStay($secondPlayerCards);

// $dealer = new Dealer($card, $deck);
// $dealerCards = $deck->getTwoCards();
// $dealer->drawCards($dealerCards);
// $dealer->HitStay($dealerCards);

// $player->showTotalPoint();
// $dealer->showTotalPoint();
// $secondPlayer->showTotalPoint();

// echo HandEvaluator::getWinner($player->totalPoint, $dealer->totalPoint) . PHP_EOL;

$players = [new FirstPlayer($card, $deck), new SecondPlayer($card, $deck), new Dealer($card, $deck)];

$allPlayersPoint = [];
foreach ($players as $player) {
    $playerCards = $deck->getTwoCards();
    $player->drawCards($playerCards);
    $player->HitStay($playerCards);
    $name = $player->name;
    $playerPoint = [$player->name => $player->totalPoint];
    $allPlayersPoint[] = $playerPoint;
}

foreach ($players as $player) {
    $player->showTotalPoint();
}

echo HandEvaluator::getWinner($allPlayersPoint) . PHP_EOL;
