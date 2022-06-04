<?php

namespace blackJack;

require_once('ScoreCounter.php');
require_once('Deck.php');

abstract class UserType
{
    /** @var array<int,array<int,int|string>> */
    private array $hand;
    /** @var array<int,int|string>*/
    private array $card;
    /** @var int*/
    private int $score;

    public function __construct(private HandGenerator $handGenerator, private string $playerName)
    {
        $this->hand = $this->handGenerator->hand();
    }

    /**
     * @param array<int,int|string> $card
     */
    public function setHand($card): void
    {
        $this->hand[] = $card;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->playerName;
    }

    /**
     * @return array<int,array<int,int|string>>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * @return array<int,int|string>
     */
    public function addCard(): array
    {
        $this->card = $this->handGenerator->addCard();
        return $this->card;
    }

    /**
     * @return int
     */
    public function getCurrentScore(): int
    {
        $scoreCounter = new ScoreCounter();
        $this->score = $scoreCounter->score($this->hand);
        return $this->score;
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
