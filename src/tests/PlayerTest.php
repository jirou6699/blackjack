<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Player;
use blackJack\Deck;

require_once(__DIR__ . '/../src/Player.php');

final class PlayerTest extends TestCase
{
    public function testGetHand(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);

        $this->assertCount(2, $player->getHand());
    }

    public function testGetName(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $this->assertSame('あなた', $player->getName());
    }
}
