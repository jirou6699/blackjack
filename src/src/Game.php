<?php

namespace blackJack;

require_once('HandGenerator.php');
require_once('FirstPlayer.php');
require_once('OtherPlayer.php');
require_once('Dealer.php');

class Game
{
    private $hand;

    public function __construct(private Deck $deck, private Card $card)
    {
        $this->hand = new HandGenerator($deck, $card);
    }

    public function start(): void
    {
        $player = new FirstPlayer($this->hand);
        $secondPlayer = new OtherPlayer($this->hand, 'さとうさん');
        $thirdPlayer = new OtherPlayer($this->hand, '藤原さん');
        $dealer = new Dealer($this->hand);
        $allPlayers = [$player, $secondPlayer, $thirdPlayer];
        $otherPlayers = [$secondPlayer, $thirdPlayer, $dealer];

        echo 'ブラックジャックを開始します。' . PHP_EOL;
        $this->playerDrawCards($allPlayers);
        $this->dealerDrawCards($dealer);
        $this->askHitStay($player);
        $this->upCards($otherPlayers);
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
            $this->showScore($player);
            echo 'カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $this->hit($player);
            } elseif ($string === 'N') {
                break;
            }
        }
    }

    public function upCards($otherPlayers)
    {
        foreach ($otherPlayers as $player) {
            $score = $player->getCurrentScore();
            while (true) {
                if ($score < 17) {
                    $player->addCard();
                } elseif ($score >= 17) {
                    break;
                }
            }
        }
    }

    public function showScore($player){
        $score = $player->getCurrentScore();
        $name = $player->getName();
        echo $name . 'の現在の得点は' . $score . 'です。';
    }

    public function hit($player) {
        $card = $player->addCard();
        $name = $player->getName();
        echo $name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
    }


    // public function allPlayers(): array
    // {
    //     $hand = new HandGenerator($this->deck, $this->card);
    //     $firstPlayer = new FirstPlayer($hand);
    //     $secondPlayer = new OtherPlayer($hand, 'さとうさん');
    //     $thirdPlayer = new OtherPlayer($hand, '藤原さん');

    //     $allPlayers = [$firstPlayer, $secondPlayer, $thirdPlayer];
    //     return $allPlayers;
    // }

    // public function withoutPlayer(): array
    // {
    //     $hand = new HandGenerator($this->deck, $this->card);
    //     $secondPlayer = new OtherPlayer($hand, 'さとうさん');
    //     $thirdPlayer = new OtherPlayer($hand, '藤原さん');
    //     $dealer = new Dealer($hand);

    //     $otherPlayers = [$secondPlayer, $thirdPlayer, $dealer];
    //     return $otherPlayers;
    // }
}
