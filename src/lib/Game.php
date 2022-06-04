<?php

namespace blackJack;

require_once('HandGenerator.php');
require_once('Player.php');
require_once('SubPlayer.php');
require_once('Dealer.php');

class Game
{
    public function __construct(private Deck $deck, private ScoreCounter $scoreCounter)
    {
    }

    public function start(): void
    {
        $handGenerator = new HandGenerator($this->deck, $this->scoreCounter);
        $player = new Player($handGenerator);
        $secondPlayer = new SubPlayer($handGenerator, 'さとうさん');
        $thirdPlayer = new SubPlayer($handGenerator, '藤原さん');
        $dealer = new Dealer($handGenerator);
        $players = [$player, $secondPlayer, $thirdPlayer, $dealer];
        echo 'ブラックジャックを開始します。' . PHP_EOL;
        $this->playerDrawCards($players);
        $this->dealerDrawCards($dealer);
        $this->askHitStay($player);
        $this->upCards($players);
        $this->showPlayersScore($players);
        $this->winner($players, $dealer);
        echo 'ブラックジャックを終了します。' . PHP_EOL;
    }

    /**
     * @param array<int,object> $players
     */
    public function playerDrawCards($players): void
    {
        array_splice($players, count($players) - 1);
        foreach ($players as $player) {
            foreach ($player->getHand() as $card) {
                echo $player->getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }

    /**
     * @param object $dealer
     */
    public function dealerDrawCards($dealer): void
    {
        foreach ($dealer->getHand() as $index => $card) {
            if ($index === 1) {
                echo $dealer->getName() . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;
            } elseif ($index === 0) {
                echo $dealer->getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }

    /**
     * @param object $player
     */
    public function askHitStay($player): void
    {
        while (true) {
            echo $player->getName() . 'の現在の得点は' . $player->getCurrentScore() . 'です。';
            echo 'カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $player->addCard();
                echo $player->getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                $player->setHand($card);
            } elseif ($string === 'N') {
                break;
            }
        }
    }

    /**
     * @param array<int,object> $players
     */
    public function upCards($players): void
    {
        array_shift($players);
        foreach ($players as $player) {
            echo $player->getName() . 'の現在の得点は' . $player->getCurrentScore() . 'です。' . PHP_EOL;
            while (true) {
                if ($player->getCurrentScore() < 17) {
                    $card = $player->addCard();
                    echo $player->getName() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                    $player->setHand($card);
                } elseif ($player->getCurrentScore() >= 17) {
                    break;
                }
            }
        }
    }

    /**
     * @param array<int,object> $players
     */
    public function showPlayersScore($players): void
    {
        foreach ($players as $player) {
            echo $player->getName() . 'の点数は' . $player->getScore() . 'です。' . PHP_EOL;
        }
    }

    /**
     * @param array<int,object> $players
     * @param object $dealer
     */
    public function winner($players, $dealer): void
    {
        array_splice($players, count($players) - 1);
        foreach ($players as $player) {
            $judgement = $player->getName() . 'は引き分けました。' . PHP_EOL;
            if ($this->isWinner($player, $dealer)) {
                $judgement = $player->getName() . 'は勝ちました!' . PHP_EOL;
            } elseif ($this->isLoser($player, $dealer)) {
                $judgement =  $player->getName() . 'は負けました。' . PHP_EOL;
            }
            echo $judgement;
        }
    }

    /**
     * @param object $player
     * @param object $dealer
     */
    private function isWinner($player, $dealer): bool
    {
        return $player->value() < $dealer->value();
    }

    /**
     * @param object $player
     * @param object $dealer
     */
    private function isLoser($player, $dealer): bool
    {
        return $player->value() > $dealer->value();
    }
}
