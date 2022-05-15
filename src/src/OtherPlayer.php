<?php

namespace blackJack;

require_once('UserType.php');

class OtherPlayer extends UserType
{
    private array $hand;
    private array $card;
    private int $totalPoint;

    public function __construct(private HandGenerator $handGenerator, private string $playerName)
    {
        // $this->hand = $handGenerator->getHand();
        // $this->name = $playerName;
    }

    public function getHand(): array
    {
        $this->hand = $this->handGenerator->getHand();
        return $this->hand;
        // foreach ($hand as $card) {
        //     echo $this->name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        // }
    }

    public function getCurrentScore(): int
    {
        $this->totalPoint = $this->handGenerator->currentScore($this->hand);
        return $this->totalPoint;
        // echo $this->name . 'の現在の得点は' . $this->totalPoint . 'です。' . PHP_EOL;
    }

    public function addCard(): array
    {
        $this->card = $this->handGenerator->addCard();
        $this->hand[] = $this->card;
        return $this->hand;
        // $this->totalPoint = $this->handGenerator->currentScore($this->hand);
        // echo $this->name . 'の引いたカードは' . $this->card[0] . 'の' . $this->card[1] . 'です。' . PHP_EOL;
    }

    // public function showTotalPoint(): void
    // {
    //     echo $this->name . 'の得点は' . $this->totalPoint . 'です' . PHP_EOL;
    // }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->playerName;
    }

    /**
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->totalPoint;
    }
}
