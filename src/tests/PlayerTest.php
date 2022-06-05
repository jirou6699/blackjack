<?php

declare(strict_types=1);

namespace blackJack\Test;

use blackJack\HandGenerator;
use blackJack\Player;
use blackJack\Deck;
use blackJack\ScoreCounter;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Player.php');


final class PlayerTest extends TestCase
{
    public function testGetName(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $player = new Player($handGenerator, 'あなた');
        $this->assertSame('あなた', $player->name());
    }

    public function testGetHand(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $player = new Player($handGenerator, 'あなた');
        $this->assertCount(2, $player->getHand());
    }

    public function testAddCard(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $player = new Player($handGenerator, 'あなた');
        $this->assertCount(2, $player->addCard());
    }
}
