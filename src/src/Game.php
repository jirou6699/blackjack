<?php

namespace blackJack;

require_once('Player.php');
require_once('Dealer.php');
require_once('Card.php');

class Game
{
    const DEALER = 'ディーラー';
    const PRIMARY_CARD = 0;

    public function start(Player $player, Dealer $dealer, Card $card)
    {
        $playerHand = $player->drawCards();
        $playerName = $player->getName();
        $dealerName = $dealer->getName();
        $dealerHand = $dealer->drawCards();
        $playerPoint = $card->getPoint($playerHand);
        $dealerPoint = $card->getPoint($dealerHand);

        echo 'ブラックジャックを開始します。' . PHP_EOL;
        foreach ($playerHand as $card) {
            echo $playerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        }

        foreach ($dealerHand as $index => $card) {
            if ($index === self::PRIMARY_CARD) {
                echo $dealerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            } else {
                echo $dealerName . 'の引いた2枚目のカードはわかりません' . PHP_EOL;
            }
        }

        while (true) {
            echo $playerName . 'の現在の得点は' . $playerPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string == 'Y') {
                $addCard = $player->addCard();
                echo $playerName . 'の引いたカードは' . $addCard[0] . 'の' . $addCard[1] . 'です。' . PHP_EOL;
                $playerHand = $player->getHand($playerHand, $addCard);
                $card = new Card();
                $playerPoint = $card->getPoint($playerHand);
            } elseif ($string == 'N') {
                break;
            }
        }

        

        // $hand = $dealer->drawCards();
        // echo $dealer->getName() . 'が引いた2枚目のカードは' . $hand[1][0] . 'の' . $hand[1][1] . 'です。' . PHP_EOL;
        // echo $dealer->getName() . 'の現在の得点は' . $card->getPoint($hand) . 'です' . PHP_EOL;
    }
}
