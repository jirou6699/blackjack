<?php

namespace blackJack;

require_once('UserType.php');
require_once('ScoreCounter.php');

class Player implements UserType
{
    /** @var array<int,array<int,int|string>> */
    private array $hand;
    /** @var array<int,int|string>*/
    private array $card;
    /** @var string*/
    private string $name = 'あなた';
    /** @var int*/
    private int $score;

    public function __construct(private HandGenerator $handGenerator)
    {
        $this->hand = $this->handGenerator->hand();
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getHand(): array
    {
        return $this->hand;
    }

    public function getCurrentScore(): int
    {
        $scoreCounter = new ScoreCounter();
        $this->score = $scoreCounter->score($this->hand);
        return $this->score;
    }

    public function addCard(): array
    {
        $this->card = $this->handGenerator->addCard();
        return $this->card;
    }

    /**
     * @param array<int,int|string> $card
     */
    public function setHand($card): void
    {
        $this->hand[] = $card;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        $value = abs($this->score - 21);
        return $value;
    }
}
