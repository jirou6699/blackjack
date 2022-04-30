<?php

namespace blackJack;

require_once('Player.php');
require_once('Dealer.php');
require_once('Card.php');
require_once('HandEvaluator.php');

$card = new Card(new Deck());
$player = new Player($card);
$dealer = new Dealer($card);

$player->drawCards();
$dealer->drawCards();
$player->hitStay();
