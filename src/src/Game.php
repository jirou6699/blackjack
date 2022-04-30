<?php

namespace blackJack;

require_once('Player.php');
require_once('Dealer.php');
require_once('Card.php');
require_once('HandEvaluator.php');

class Game
{
    /**
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function start(Player $player, Dealer $dealer, Card $card): void
    {
        $playerHand = $player->drawCards();
        $playerName = $player->getName();
        $dealerName = $dealer->getName();
        $dealerHand = $dealer->drawCards();
        $playerPoint = $card->getPoint($playerHand);
        $dealerPoint = $card->getPoint($dealerHand);



        echo $dealerName . 'が引いた2枚目のカードは' . $dealerHand[1][0] . 'の' . $dealerHand[1][1] . 'です。' . PHP_EOL;
        echo $dealerName . 'の現在の得点は' . $dealerPoint . 'です' . PHP_EOL;

        while (true) {
            if ($dealerPoint <= 17) {
                $dealerAddCard = $dealer->addCard();
                $dealerHand = $dealer->getHand($dealerHand, $dealerAddCard);
                echo $dealerName . 'が引いたカードは' . $dealerAddCard[0] . 'の' . $dealerAddCard[1] . 'です。' . PHP_EOL;
                $card = new Card();
                $dealerPoint = $card->getPoint($dealerHand);
            }
            break;
        }

        echo $playerName . 'の現在の得点は' . $playerPoint . 'です。' . PHP_EOL;
        echo $dealerName . 'の現在の得点は' . $dealerPoint . 'です' . PHP_EOL;

        echo HandEvaluator::getWinner($playerPoint, $dealerPoint) . PHP_EOL;
        echo 'ブラックジャックを終了します。' . PHP_EOL;
    }
}
