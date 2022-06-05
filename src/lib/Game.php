<?php

namespace blackJack;

require_once('HandGenerator.php');
require_once('Player.php');
require_once('SubPlayer.php');
require_once('Dealer.php');

class Game
{
    private const OVER_SCORE = 21;
    private const ADD_CARD_SCORE = 17;

    public function __construct(private Deck $deck, private ScoreCounter $scoreCounter)
    {
    }

    public function start(): void
    {
        $handGenerator = new HandGenerator($this->deck, $this->scoreCounter);
        $player = new Player($handGenerator, 'あなた');
        $secondPlayer = new SubPlayer($handGenerator, 'さとうさん');
        $thirdPlayer = new SubPlayer($handGenerator, '藤原さん');
        $dealer = new Dealer($handGenerator, 'ディーラー');
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
                echo $player->name() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
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
                echo $dealer->name() . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;
            } elseif ($index === 0) {
                echo $dealer->name() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
        }
    }

    /**
     * @param object $player
     */
    public function askHitStay($player): void
    {
        while (true) {
            echo $player->name() . 'の現在の得点は' . $player->currentScore() . 'です。';
            if ($player->currentScore() > self::OVER_SCORE) {
                echo 'バーストしました。' . PHP_EOL;
                break;
            }
            echo 'カードを引きますか？（Y/N）' . PHP_EOL;
            $string = trim(fgets(STDIN));
            if ($string === 'Y') {
                $card = $player->addCard();
                $player->setHand($card);
                echo $player->name() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
            }
            if ($string === 'N') {
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
            echo $player->name() . 'の現在の得点は' . $player->currentScore() . 'です。' . PHP_EOL;
            while (true) {
                if ($player->currentScore() < self::ADD_CARD_SCORE) {
                    $card = $player->addCard();
                    $player->setHand($card);
                    echo $player->name() . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
                }
                if ($player->currentScore() >= self::ADD_CARD_SCORE) {
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
            echo $player->name() . 'の点数は' . $player->currentScore() . 'です。' . PHP_EOL;
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
            $judgement = $player->name() . 'は引き分けました。' . PHP_EOL;
            if ($this->isDealerBurst($dealer) || $this->isWinner($player, $dealer)) {
                $judgement = $player->name() . 'は勝ちました!' . PHP_EOL;
            }
            if ($this->isPlayerBurst($player) || $this->isLoser($player, $dealer)) {
                $judgement =  $player->name() . 'は負けました。' . PHP_EOL;
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

    /**
     * @param object $player
     */
    private function isPlayerBurst($player): bool
    {
        return $player->currentScore() > self::OVER_SCORE;
    }

    /**
     * @param object $dealer
     */
    private function isDealerBurst($dealer): bool
    {
        return $dealer->currentScore() > self::OVER_SCORE;
    }
}
