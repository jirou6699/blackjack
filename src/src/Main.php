<?php

namespace blackJack;

require_once('Deck.php');
require_once('Card.php');
require_once('Player.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');


$deck = new Deck();
$card = new Card();

$player = new Player($card, $deck);
$playerCards = $deck->getTwoCards();
$player->drawCards($playerCards);
$player->HitStay($playerCards);

$dealer = new Dealer($card, $deck);
$dealerCards = $deck->getTwoCards();
$dealer->drawCards($dealerCards);
$dealer->HitStay($dealerCards);

$player->showTotalPoint();
$dealer->showTotalPoint();

echo HandEvaluator::getWinner($player->totalPoint, $dealer->totalPoint) . PHP_EOL;
