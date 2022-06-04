<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\HandGenerator;
use blackJack\Deck;
use blackJack\ScoreCounter;

require_once(__DIR__ . '/../lib/HandGenerator.php');


final class HandGeneratorTest extends TestCase
{
    public function testHand(): void
    {
        $deck = new Deck();
        $card = new ScoreCounter();
        $handGenerator = new HandGenerator($deck, $card);
        $this->assertCount(2, $handGenerator->hand());
    }

    public function testGetOneCard(): void
    {
        $deck = new Deck();
        $card = new ScoreCounter();
        $hand = new HandGenerator($deck, $card);
        $this->assertCount(2, $hand->addCard());
    }
}
