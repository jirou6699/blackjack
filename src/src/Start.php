<?php

namespace blackJack;

require_once ('Game.php');
require_once ('Deck.php');
require_once ('Card.php');

$deck = new Deck();
$card = new Card();
$game = new Game($deck, $card);
$game->start();
