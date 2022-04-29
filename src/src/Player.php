<?php

namespace blackJack;

require_once('UserType.php');
require_once('Deck.php');

class Player implements UserType
{

	public function __construct(private Deck $deck)
	{
	}

    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards(): array
    {
        $trumpCard = $this->deck->trumpCards();
        $cardNumbers = array_rand($trumpCard, 2);
        $hand = [];
        foreach ($cardNumbers as $num) {
            $hand [] = $trumpCard[$num];
        }
        return $hand;
    }

    /**
     * @return array<int,int|string>
     */
    public function addCard(): array
    {
        $trumpCard = $this->deck->trumpCards();
        $addCardNumber = array_rand($trumpCard, 1);
        $addCard = $trumpCard[$addCardNumber];
        return $addCard;
    }

    /**
     * @param array<int,array<int,int|string>> $hand
     * @param array<int,int|string> $addCard
     * @return array<int,array<int,int|string>>
     */
    public function getHand(array $hand, array $addCard): array
    {
        $hand [] = $addCard;
        return $hand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'あなた';
    }
}
