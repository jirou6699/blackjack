<?php

namespace blackJack;

require_once('Player.php');
require_once('Dealer.php');
require_once('Card.php');
require_once('HandEvaluator.php');

class Game
{
    private const PRIMARY_CARD = 0;
    private const SECONDARY_CARD = 1;

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

        echo 'ブラックジャックを開始します。' . PHP_EOL;
        foreach ($playerHand as $card) {
            echo $playerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        }

        foreach ($dealerHand as $index => $card) {
            if ($index === self::PRIMARY_CARD) {
                echo $dealerName . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            } elseif($index === self::SECONDARY_CARD)
            echo $dealerName . 'の引いた2枚目のカードはわかりません' . PHP_EOL;
        }

        while (true) {
            echo $playerName . 'の現在の得点は' . $playerPoint . 'です。カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string == 'Y') {
                $playerAddCard = $player->addCard();
                echo $playerName . 'の引いたカードは' . $playerAddCard[0] . 'の' . $playerAddCard[1] . 'です。' . PHP_EOL;
                $playerHand = $player->getHand($playerHand, $playerAddCard);
                $card = new Card();
                $playerPoint = $card->getPoint($playerHand);
            } elseif ($string == 'N') {
                break;
            }
        }

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
