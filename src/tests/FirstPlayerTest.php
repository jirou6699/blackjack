<?php

declare(strict_types=1);

namespace blackJack\Test;

use blackJack\HandGenerator;
use blackJack\FirstPlayer;
use blackJack\Deck;
use blackJack\ScoreCounter;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/FirstPlayer.php');


final class FirstPlayerTest extends TestCase
{
    public function testGetName(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $firstPlayer = new FirstPlayer($handGenerator);
        $this->assertSame('あなた', $firstPlayer->getName());
    }

    public function testGetHand(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $firstPlayer = new FirstPlayer($handGenerator);
        $this->assertCount(2, $firstPlayer->getHand());
    }

    public function testAddCard(): void
    {
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $firstPlayer = new FirstPlayer($handGenerator);
        $this->assertCount(2, $firstPlayer->addCard());
    }

    public function testSetHand(): void
    {
        $card = ['ハート', 2];
        $handGenerator = new HandGenerator(new Deck(), new ScoreCounter());
        $firstPlayer = new FirstPlayer($handGenerator);
        $this->assertCount(3, $firstPlayer->setHand($card));
    }
}
