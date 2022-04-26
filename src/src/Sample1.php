<?php

namespace blackJack;

require_once('Card.php');
require_once('Deck.php');
require_once('Card.php');
require_once('Dealer.php');
require_once('Player.php');

$deck = new Deck();
$player = new Player($deck);
$playerHand = $player->drawCard();
$playeraddCard = $player->addCard();

$dealer = new Dealer($deck);
$dealerHand = $dealer->drawCard();
$dealeraddCard = $dealer->addCard();

$userPoints = $card->getTotalPoints($playerHand, $dealerHand);
$playerPoint = $userPoints[0];
$dealerPoint = $userPoints[1];

$game = new Game();
$game->start($player, $dealer); //$player->Name, $player->Hand...
$game->getPlayerHandOption($player, $playerAddCard, $playerPoint);
$game->addDealerHand($dealer, $playerAddCard, $playerPoint);
$game->UserTotalPoints()
$game->getWinner();
