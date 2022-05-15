<?php

// namespace blackJack;

// require_once('Deck.php');
// require_once('Card.php');
// require_once('FirstPlayer.php');
// require_once('OtherPlayer.php');
// require_once('Dealer.php');
// require_once('HandEvaluator.php');
// require_once('HandGenerator.php');

// $deck = new Deck();
// $card = new Card();
// $hand = new HandGenerator($deck, $card);

// $firstPlayer = new FirstPlayer($hand);
// $secondPlayer = new OtherPlayer($hand, 'さとうさん');
// $thirdPlayer = new OtherPlayer($hand, '藤原さん');
// $dealer = new Dealer($hand);

// $players = [$firstPlayer, $secondPlayer, $thirdPlayer, $dealer];
// $otherPlayers = [$secondPlayer, $thirdPlayer, $dealer];

// echo 'ブラックジャックを開始します。' . PHP_EOL;
// foreach ($players as $player) {
//     $player->drawCards();
// }

// // ToDo このアクションをMain.phpにもってくるべきか？
// while (true) {
//     $firstPlayer->showCurrentScore();
//     echo 'カードを引きますか？（Y/N）' . PHP_EOL;
//     $string = trim(fgets(STDIN));
//     if ($string === 'Y') {
//         $firstPlayer->addCard();
//     } elseif ($string === 'N') {
//         break;
//     }
// }

// // ToDo 他のプレーヤーのアクションをMain.phpにもってくるべきか？
// foreach ($otherPlayers as $player) {
//     $player->showCurrentScore();
//     while (true) {
//         if ($player->getTotalPoint() < 17) {
//             $player->addCard();
//         } elseif ($player->getTotalPoint() >= 17) {
//             break;
//         }
//     }
// }

// foreach ($players as $player) {
//     $player->showTotalPoint();
// }

// $allPlayersPoint = [];
// foreach ($players as $player) {
//     $name = $player->getName();
//     $totalPoint = $player->getTotalPoint();
//     $playerPoint = [$name => $totalPoint];
//     $allPlayersPoint[] = $playerPoint;
// }

// $handEvaluator = new HandEvaluator($allPlayersPoint);
// $handEvaluator->getWinner();
