<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Dealer;
use blackJack\Deck;

require_once(__DIR__ . '/../src/Dealer.php');

final class DealerTest extends TestCase
{
    public function testGetFirstHand(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Dealer($trumpCards);
        $this->assertCount(2, $player->getFirstHand());
    }

	public function testAddCard(): void
	{
		$deck = new Deck();
		$trumpCards = $deck->trumpCards();
		$player = new Dealer($trumpCards);
		$this->assertCount(2, $player->addCard());
	}

    public function testGetName(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Dealer($trumpCards);
        $this->assertSame('ディーラー', $player->getName());
    }
}
