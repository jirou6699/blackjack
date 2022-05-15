<?php

namespace blackJack;

require_once('UserType.php');

class Dealer extends UserType
{
    private array $hand;
    private array $card;
    private string $name = 'ディーラー';
    private int $totalPoint;

    public function __construct(private HandGenerator $handGenerator)
    {
        // $this->hand = $handGenerator->getHand();
    }

    public function getHand(): array
    {
        $this->hand = $this->handGenerator->getHand();
        return $this->hand;
        // foreach ($this->hand as $index => $card) {
        //     if ($index === 1) {
        //         $this->name . 'の引いた2枚目のカードはわかりません。' . PHP_EOL;
        //     } elseif ($index === 0) {
        //         $this->name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        //     }
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
        // echo $this->name . 'の引いたカードは' . $this->card[0] . 'の' . $this->card[1] . 'です。' . PHP_EOL;
        // $this->totalPoint = $this->handGenerator->currentScore($this->hand);
    }

    // public function showTotalPoint(): void
    // {
    //     echo 'ディーラーの得点は' . $this->totalPoint . 'です' . PHP_EOL;
    // }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->totalPoint;
    }
}
