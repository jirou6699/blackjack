<?php

namespace blackJack;

require_once('Deck.php');
require_once('Card.php');
require_once('FirstPlayer.php');
require_once('SecondPlayer.php');
require_once('ThirdPlayer.php');
require_once('FourthPlayer.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');


$deck = new Deck();
$card = new Card();

$firstPlayer = new FirstPlayer($card, $deck);
$secondPlayer = new SecondPlayer($card, $deck);
$thirdPlayer = new ThirdPlayer($card, $deck);
$fourthPlayer = new FourthPlayer($card, $deck);
$lastPlayer = new Dealer($card, $deck);

$players = [$firstPlayer, $secondPlayer, $thirdPlayer, $fourthPlayer, $lastPlayer];

foreach ($players as $player) {
    $playerCards = $deck->getTwoCards();
    $player->drawCards($playerCards);
}

foreach ($players as $player) {
    $player->getHand();
}

foreach ($players as $player) {
    $player->showTotalPoint();
}

$allPlayersPoint = [];
foreach ($players as $player) {
    // $name = $player->name;
	if($player->totalPoint !== 0) {
		$playerPoint = [$player->name => $player->totalPoint];
		$allPlayersPoint[] = $playerPoint;
	}
}

$handEvaluator = new HandEvaluator($allPlayersPoint);
$handEvaluator->getWinner();
