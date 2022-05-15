<?php

namespace blackJack;

require_once('Game.php');
require_once('Deck.php');
require_once('ScoreCounter.php');

$deck = new Deck();
$score = new ScoreCounter();
$game = new Game($deck, $score);
$game->start();
