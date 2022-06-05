<?php

namespace blackJack;

require_once('ScoreCounter.php');
require_once('Deck.php');

abstract class UserType
{
    private const STRONGEST_SCORE = 21;
    /** @var array<int,array<int,int|string>> */
    private array $hand;

    public function __construct(private HandGenerator $handGenerator, private string $playerName)
    {
        $this->hand = $this->handGenerator->hand();
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->playerName;
    }

    /**
     * @param array<int,int|string> $card
     */
    public function setHand($card): void
    {
        $this->hand[] = $card;
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
        $card = $this->handGenerator->addCard();
        return $card;
    }

    /**
     * @return int
     */
    public function currentScore(): int
    {
        $score = 0;
        $scoreCounter = new ScoreCounter();
        $score = $scoreCounter->score($this->hand);
        return $score;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        $value = abs($this->currentScore() - self::STRONGEST_SCORE);
        return $value;
    }
}
