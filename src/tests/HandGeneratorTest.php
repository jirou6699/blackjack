<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\HandGenerator;
use blackJack\Deck;
use blackJack\Card;

require_once(__DIR__ . '/../src/HandGenerator.php');


final class HandGeneratorTest extends TestCase
{
    public function testGetTwoCards(): void
    {
        $deck = new Deck();
        $card = new Card();
        $hand = new HandGenerator($deck, $card);
        $this->assertCount(2, $hand->getHand());
    }

    public function testGetOneCard(): void
    {
        $deck = new Deck();
        $card = new Card();
        $hand = new HandGenerator($deck, $card);
        $this->assertCount(2, $hand->addCard());
    }
}