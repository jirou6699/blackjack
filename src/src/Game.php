<?php

namespace blackJack;

require_once('HandGenerator.php');
require_once('FirstPlayer.php');
require_once('OtherPlayer.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');

class Game
{
    private $hand;

    public function __construct(private Deck $deck, private ScoreCounter $scoreCounter)
    {
        $this->hand = new HandGenerator($deck, $scoreCounter);
    }

    public function start(): void
    {
        $player = new FirstPlayer($this->hand);
        $secondPlayer = new OtherPlayer($this->hand, 'さとうさん');
        $thirdPlayer = new OtherPlayer($this->hand, '藤原さん');
        $dealer = new Dealer($this->hand);
        $allPlayers = [$player, $secondPlayer, $thirdPlayer, $dealer];
        $otherPlayers = [$secondPlayer, $thirdPlayer, $dealer];

        echo 'ブラックジャックを開始します。' . PHP_EOL;
        $this->playerDrawCards($allPlayers);
        $this->dealerDrawCards($dealer);
        $this->askHitStay($player);
        $this->upCards($otherPlayers);
        $playersScore = [];
        foreach ($allPlayers as $player) {
            $playersScore[] = $player->nameScore();
        }
        $handEvaluator = new HandEvaluator($playersScore);
        $handEvaluator->getWinner();
    }

    public function playerDrawCards($allPlayers)
    {
        foreach ($allPlayers as $player) {
            $hand = $player->getHand();
            $name = $player->getName();
            foreach ($hand as $card) {
                echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }

    public function dealerDrawCards($dealer)
    {
        $hand = $dealer->getHand();
        $name = $dealer->getName();
        foreach ($hand as $index => $card) {
            if ($index === 1) {
                echo $name . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;
            } elseif ($index === 0) {
                echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }

    public function askHitStay($player)
    {
        while (true) {
            $score = $player->getCurrentScore();
            $name = $player->getName();
            echo $name . 'の現在の得点は' . $score . 'です。';
            echo 'カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $player->addCard();
                echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            } elseif ($string === 'N') {
                break;
            }
        }
    }

    public function upCards($otherPlayers)
    {
        foreach ($otherPlayers as $player) {
            $score = $player->getCurrentScore();
            echo $player->getName() . 'の現在の得点は' . $score . 'です。' . PHP_EOL;
            while (true) {
                if ($score < 17) {
                    // $name = $player->getName();
                    $card = $player->addCard();
                    echo $player->getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                } elseif ($score >= 17) {
                    break;
                }
                $score = $player->getCurrentScore();
            }
        }
    }
}
