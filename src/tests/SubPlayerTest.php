<?php

declare(strict_types=1);

namespace blackJack\Test;

use blackJack\HandGenerator;
use blackJack\SubPlayer;
use blackJack\Deck;
use blackJack\ScoreCounter;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/SubPlayer.php');


final class SubPlayerTest extends TestCase
{
    public function testGetName(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $subPlayer = new SubPlayer($handGenerator, '片桐さん');
        $this->assertSame('片桐さん', $subPlayer->name());
    }

    public function testGetHand(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $subPlayer = new SubPlayer($handGenerator, '片桐さん');
        $this->assertCount(2, $subPlayer->getHand());
    }

    public function testAddCard(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $subPlayer = new SubPlayer($handGenerator, '片桐さん');
        $this->assertCount(2, $subPlayer->addCard());
    }
}
