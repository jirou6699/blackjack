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
        $Player = new Player($handGenerator);
        $this->assertSame('あなた', $Player->getName());
    }

    public function testGetHand(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $Player = new Player($handGenerator);
        $this->assertCount(2, $Player->getHand());
    }

    public function testAddCard(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $Player = new Player($handGenerator);
        $this->assertCount(2, $Player->addCard());
    }

    public function testSetHand(): void
    {
        $card = ['ハート', 2];
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $Player = new Player($handGenerator);
        $this->assertCount(3, $Player->setHand($card));
    }
}
