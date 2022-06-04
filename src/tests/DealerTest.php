<?php

declare(strict_types=1);

namespace blackJack\Test;

use blackJack\HandGenerator;
use blackJack\Dealer;
use blackJack\Deck;
use blackJack\ScoreCounter;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Dealer.php');


final class DealerTest extends TestCase
{
    public function testGetName(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $dealer = new Dealer($handGenerator, 'ディーラー');
        $this->assertSame('ディーラー', $dealer->getName());
    }

    public function testGetHand(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $dealer = new Dealer($handGenerator, 'ディーラー');
        $this->assertCount(2, $dealer->getHand());
    }

    public function testAddCard(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $dealer = new Dealer($handGenerator, 'ディーラー');
        $this->assertCount(2, $dealer->addCard());
    }
}
