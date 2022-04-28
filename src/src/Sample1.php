<?php

namespace blackJack;

require_once('Deck.php');
require_once('Card.php');
require_once('Dealer.php');
require_once('Player.php');
require_once('Game.php');

$card = new Card();
$deck = new Deck();
$player = new Player($deck);
$dealer = new Dealer($deck);
// $playerHand = $player->drawCards();
// $playerAddCard = $player->addCard();

// $dealerHand = $dealer->drawCards();
// $dealerAddCard = $dealer->addCard();

// $userPoints = $card->getTotalPoints($playerHand, $dealerHand);
// $playerPoint = $userPoints[0];
// $dealerPoint = $userPoints[1];

$game = new Game();
$game->start($player, $dealer, $card); //$player->Name, $player->Hand...
// $game->UserTotalPoints()
// $game->getWinner();
