<?php

namespace blackJack;

require_once('UserType.php');

class FirstPlayer extends UserType
{
    private array $hand;
    private array $card;
    private string $name = 'あなた';
    private int $totalPoint;

    public function __construct(private Deck $deck, private ScoreCounter $scoreCounter)
    {
        // $this->hand = $handGenerator->getHand();
    }

    public function getHand(): array
    {

		// その２↓
		$this->hand = $this->handGenerator->getHand();
		return $this->hand;
		// 最初↓
        // foreach ($this->hand as $card) {
        //     echo $this->name . 'の引いたカードは' . $card[0] . 'の' . $card[1] . 'です。' . PHP_EOL;
        // }
    }

    public function getCurrentScore(): int
    {
		// その２↓
        $this->totalPoint = $this->handGenerator->currentScore($this->hand);
        return $this->totalPoint;
		// 最初↓
        // echo $this->name . 'の現在の得点は' . $this->totalPoint . 'です。';
    }

    public function addCard(): array
    {
        $this->card = $this->handGenerator->addCard();
        $this->hand[] = $this->card;
        return $this->card;
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
