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
    }

    public function getHand(): array
    {
        $this->hand = $this->handGenerator->getHand();
        return $this->hand;
    }

    public function getCurrentScore(): int
    {
        $this->totalPoint = $this->handGenerator->currentScore($this->hand);
        return $this->totalPoint;
    }

    public function addCard(): array
    {
        $this->card = $this->handGenerator->addCard();
        $this->hand[] = $this->card;
        return $this->card;
    }

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

    public function nameScore(): array
    {
        $playerScore = [$this->playerName => $this->totalPoint];
        return $playerScore;
    }
}
